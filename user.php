<?php
global $user;
$user=new user();
class user
    {
        public $dbHost;
        public $dbUser;
        public $dbPass;
        public $dbName;
        public $connection;
        public function __construct() {
            global $connection;
            $this->dbHost = 'localhost';
            $this->dbUser = 'root';
            $this->dbPass = '';
            $this->dbName = 'CRM';
            $connection = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass,$this->dbName)
                or die("Could not connect to the database:<br />" . mysqli_error());
        }

        function checkRefId($id)
        {   
            global $connection;
            $getCount="SELECT * FROM orders where ref_no='".$id."'";
            $result = mysqli_query($connection,$getCount);
            $rowsCount = mysqli_num_rows($result);
            return $rowsCount;
            
        }
        function chkrefNoExist($refId)
        {   
            global $connection;
            $getId="SELECT orders.id FROM orders where ref_no='".$refId."'"; 
            $result = mysqli_query($connection,$getId);
            $id = mysqli_fetch_assoc($result);
            //print_r($id);die;
            return $id;
        }
        function chkNameExist($name)
        {   
            global $connection;
            $getname="SELECT orders.ref_no FROM orders where ref_no='".$name."'";
            $result=mysqli_query($connection,$getname);
            $ref_id= mysqli_fetch_assoc($result);
            //print_r($ref_id);die;
            return $ref_id;
        }
        function chkstatus($ref_no)
        {   
                global $connection;
                $getAllStatus="SELECT orders.status FROM orders where ref_no='".$ref_no."'";
                $result=mysqli_query($connection,$getAllStatus);
                $row=mysqli_fetch_assoc($result);
                if($row['status']=='reporting')
                {
                    return true;
                }
        }
        function dateFormatChange($dateFormat)
        {
            $newDate=date('Y-m-d', strtotime($dateFormat));
            return $newDate;
        }
        function chkemailExist($email)
        {
            global $connection;
            $getname="SELECT users.email FROM users where email='".$email."'";
            $result=mysqli_query($connection,$getname);
            $emailExist= mysqli_fetch_assoc($result);
            //print_r($emailExist);die;
            return $emailExist;
        }
    }
?>