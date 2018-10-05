<!DOCTYPE html>
<html lang="en" ng-app="angularjsTable">
  <head>
    <meta charset="utf-8">
    <title>Angular js</title>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- Angular JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>
 
  </head>
<body style="background: #e1e1e1;">
     <div class="panel panel-primary">
       <div class="panel-heading">Searching Sorting and Pagination in Angular js</div>
        <div class="panel-body">
      <div ng-controller="listitemdata">
        <div class="alert alert-success">
          <p>Sort By: {{sortBy}}</p>
          <p>Reverse: {{reverse}}</p>
          <p>Search Text : {{search}}</p>
        </div>
       
          <div class="col-md-12">
          
            <input type="text" ng-model="search" class="form-control" placeholder="Type your search keyword..">
          </div>
        
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th ng-click="sort('id')">Id
                <span class="glyphicon sort-icon" ng-show="sortBy=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
              </th>
              <th ng-click="sort('product_name')">Product Name
                <span class="glyphicon sort-icon" ng-show="sortBy=='product_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
              </th>
              <th ng-click="sort('product_details')">Product Details
                <span class="glyphicon sort-icon" ng-show="sortBy=='product_details'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
              </th>
              
            </tr>
          </thead>
          <tbody>
            <tr dir-paginate="product in products|orderBy:sortBy:reverse|filter:search|itemsPerPage:5">
              <td>{{product.id}}</td>
              <td>{{product.product_name}}</td>
              <td>{{product.product_details}}</td>
            </tr>
          </tbody>
        </table> 
        <dir-pagination-controls
          max-size="5"
          direction-links="true"
          boundary-links="true" >
        </dir-pagination-controls>
      </div>
    </div>
    
      </div>
<script src="lib/dirPagination.js"></script>
<script src="app/app.js"></script>
</body>
</html>