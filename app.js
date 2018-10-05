var app = angular.module('angularjsTable', ['angularUtils.directives.dirPagination']);
app.controller('listitemdata',function($scope, $http){
    $scope.products = []; //declare an empty array
    $http.get("dataJson/demodata.json").success(function(response){ 
        $scope.products = response;  //ajax request to fetch data into $scope.data
    });
    
    $scope.sort = function(keyname){
        $scope.sortBy = keyname;   //set the sortBy to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }
});