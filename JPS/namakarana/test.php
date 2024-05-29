<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<body>

<div style="overflow-y: scroll; height:400px;" ng-app="myApp" ng-controller="customersCtrl"> 
 <ul>
  <li ng-repeat="x in myData">
    {{ x.Name + ', ' + x.Country }}
  </li>
</ul>

</div>
<button onclick="myFunc()">OK</button>

<script>


  
 function myFunc() {

  var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
  $http.get("https://harekrishnasamacar.com/JPS/namakarana/namakarana_main.php").then(function (response) {
      $scope.myData = response.data.records; 
      
    
    
    
    });
});


     }






</script>