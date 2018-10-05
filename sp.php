<?php
header("Cache-Control: No-cache");
// THIS IS MY SAMPLE AJAX RESPONSE PAGE FOR ANY GRID I CREATE

//Database Connection 
$serverName = "HOSTNAME"; 
$connectionInfo = array( "Database"=>"DBNAME", "UID"=>"DBUSER", "PWD"=>"DSPASSWORD", 'ReturnDatesAsStrings'=>true );
$DEVconn = sqlsrv_connect( $serverName, $connectionInfo );
if( $DEVconn === false ) {
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

// Define the Default Sort Order if nothing is sent from the grid
if ( !isset( $_REQUEST['sort'][0]['field'] ) ) { $_REQUEST['sort'][0]['field'] = "EmployeeID"; }
if ( !isset( $_REQUEST['sort'][0]['dir']   ) ) { $_REQUEST['sort'][0]['dir'] = "asc"; }

/*

Parse the kendo passed filter info and make a sql server where clause out of it
Example: the grid sends this 

action:ReadGrid
take:50
skip:0
page:1
pageSize:50
filter[logic]:and
filter[filters][0][field]:UserDeviceCount
filter[filters][0][operator]:eq
filter[filters][0][value]:1
filter[filters][1][logic]:or
filter[filters][1][filters][0][field]:Office
filter[filters][1][filters][0][operator]:gt
filter[filters][1][filters][0][value]:90
filter[filters][1][filters][1][field]:Remote
filter[filters][1][filters][1][operator]:gt
filter[filters][1][filters][1][value]:90
filter[filters][1][filters][2][field]:Unknown
filter[filters][1][filters][2][operator]:gt
filter[filters][1][filters][2][value]:90

We generate this SQL ...

DECLARE @Page INT = 0;
DECLARE @PageSize INT = 50;
WITH    UNPAGED
          AS (
               SELECT
                    *
                  , COUNT(*) OVER ( ) AS Counter
                  , ROW_NUMBER() OVER ( ORDER BY EmployeeID ASC ) AS RowNumber
                FROM
                    TABLENAME
                WHERE                    
                    UserDeviceCount = '1'
                    AND ( Office > 90 OR Remote > 90 OR Unknown > 90 )
             )
     SELECT * FROM [UNPAGED]
        WHERE [RowNumber] BETWEEN ( @Page * @PageSize + 1 ) AND ( @Page * @PageSize + @PageSize )


The Default Filter Below Is To Return Everything

*/
$where = " 1 = 1 ";

if ( isset( $_REQUEST['filter'] )) $where = parseFilters( $_REQUEST['filter'] );

// Initial count of the returned rows
$total = 0;

// What are we doing?
switch ( $_REQUEST['action'] ) {
    case 'ReadGrid':        
        $unpaged = "SELECT 
                 * 
                ,COUNT(*) OVER() AS Counter 
                ,ROW_NUMBER() OVER ( ORDER BY " . $_REQUEST['sort'][0]['field'] . " " . $_REQUEST['sort'][0]['dir'] . " ) AS RowNumber 
            FROM TABLENAME WHERE $where 
        ";    
        $sql = "DECLARE @Page INT = " . ( $_REQUEST['page'] - 1 ) . ";
            DECLARE @PageSize INT = " . $_REQUEST['pageSize'] . ";
            WITH UNPAGED AS ( $unpaged ) 
            SELECT * FROM [UNPAGED] 
                WHERE [RowNumber] BETWEEN ( @Page * @PageSize + 1 ) AND ( @Page * @PageSize + @PageSize ) ";
        $string=[];
        $results = sqlsrv_query( $DEVconn ,  $sql ) or die( print_r( sqlsrv_errors(), true));
        $count = 0;
        while ( $row = sqlsrv_fetch_array( $results , SQLSRV_FETCH_ASSOC)) { 
            // Only do this once
            if ( $count == 0 ) $total = $row['Counter'];
            $string[] = json_encode($row); 
            $count++;
        }        
        header("Content-type: application/json");
        /*
         We also return the query itself in the response to aid in debugging...
         You just need an additional div id'd as "sql" on the calling page and add this to your datasource

        schema: {
            data: function(response) {
                // Populated the div with the returned sql query
                $("#sql").html( response.sql );
                return response.data;
            },
            total: "total",  

        */
        echo "{\"data\": [" . join( $string , "," ) . "] ,\"total\": " . $total . " , \"sql\": \"" . oneline( $sql ) . "\"}";
		break;
	case 'UpdateGrid':         
        $return = 'true';
        foreach ( $_REQUEST['models'] as $record ) {
            $sql = "EXEC [dbo].[sp_StoredProcedure] 
                        @Hostid   =" . $record['HostID'] . ", 
                        @UserID   =" . $record['UserID'] . ", 
                        @GovHardwareActionID         ='" . $record['GovHardwareActionID'] . "', 
                        @GovHardwareDecisionID       ='" . $record['GovHardwareDecisionID']."', 
                        @GovHardwareRecommendationID ='" . $record['GovHardwareRecommendationID'] . "',
                        @UserHWRecommendationID      ='" . $record['UserHWRecommendationID'] . "',
                        @ManagerHWRecommendedID      ='" . $record['ManagerHWRecommendedID'] . "',
                        @FinalHWRecommendationID     ='" . $record['FinalHWRecommendationID'] . "'
                    \n";   
            sqlsrv_query( $DEVconn ,  $sql );
        }
        echo $return;
		break;
	default:
		break;
}        

function parseFilters( $filters , $count = 0 ) {  
    $where = "";    
    $intcount = 0;
    $noend= false;
    $nobegin = false;
    // Do we actually have filters or noi ?
    if ( isset( $filters['filters'] ) ) {        
        $itemcount = count( $filters['filters'] );
        if ( $itemcount == 0 ) {
            $noend= true;
            $nobegin = true;
        } elseif ( $itemcount == 1 ) {
            $noend= true;
            $nobegin = true;           
        } elseif ( $itemcount > 1 ) {
            $noend= false;
            $nobegin = false;           
        }
        foreach ( $filters['filters'] as $key => $filter ) {
            if ( isset($filter['field'])) {
                switch ( $filter['operator'] ) {
                    case 'startswith':
                        $compare = " LIKE ";
                        $field = $filter['field'];
                        $value = "'" . $filter['value'] . "%' ";
                        break;
                    case 'contains':
                        $compare = " LIKE ";
                        $field = $filter['field'];
                        $value = " '%" . $filter['value'] . "%' ";
                        break;
                    case 'doesnotcontain':
                        $compare = " NOT LIKE ";
                        $field = $filter['field'];
                        $value = " '%" . $filter['value'] . "%' ";
                        break;
                    case 'endswith':
                        $compare = " LIKE ";
                        $field = $filter['field'];
                        $value = "'%" . $filter['value'] . "' ";
                        break;
                    case 'eq':
                        $compare = " = ";
                        $field = $filter['field'];
                        $value = "'" . $filter['value'] . "'";
                        break;
                    case 'gt':
                        $compare = " > ";
                        $field = $filter['field'];
                        $value = $filter['value'];
                        break;
                    case 'lt':
                        $compare = " < ";
                        $field = $filter['field'];
                        $value = $filter['value'];
                        break;
                    case 'gte':
                        $compare = " >= ";
                        $field = $filter['field'];
                        $value = $filter['value'];
                        break;
                    case 'lte':
                        $compare = " <= ";
                        $field = $filter['field'];
                        $value = $filter['value'];
                        break;
                    case 'neq':
                        $compare = " <> ";
                        $field = $filter['field'];
                        $value = "'" . $filter['value'] . "'";
                        break;
                }                
                if ( $count == 0 && $intcount == 0 ) { 
                    $before = ""; 
                    $end = " " . $filters['logic'] . " ";
                } elseif ( $count > 0 && $intcount == 0 ) { 
                    $before = ""; 
                    $end = " " . $filters['logic'] . " ";
                } else {
                    $before = " " . $filters['logic'] . " ";
                    $end = ""; 
                }        
                $where .= ( $nobegin ? "" : $before ) . $field . $compare . $value . ( $noend ? "" : $end );
                $count ++;
                $intcount ++;
            } else {
                $where .= " ( " . parseFilters( $filter , $count ) . " )" ;        
            }      
            $where = str_replace( " or  or " , " or " , $where );
            $where = str_replace( " and  and " , " and " , $where );
        } 
    } else {
            $where = " 1 = 1 ";
    }
    return $where;
}

function oneline( $sql ) {
    $str = $sql;    
    $str = str_replace("\n\r", '<br />', $str );
    $str = str_replace("\r\n", '<br />', $str );
    $str = preg_replace("/[ ]+/", ' ', $str );
    $str = str_replace("\t", '', $str );
    return trim($str);
}
