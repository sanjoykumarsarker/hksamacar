<!DOCTYPE html>
<html lang="en" ng-app="myModule">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    </head>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<body ng-controller="myController">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://campcodes.com" >CampCodes</a>
        </div>
    </nav>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">PHP - Fetching MySQLi Server Using AngularJS</h3>
        <hr style="border-top:1px dotted #ccc;">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="alert-info">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat = "student in students">
                        <td>{{student.firstname}}</td>
                        <td>{{student.lastname}}</td>
                        <td>{{student.gender}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <center><button class="btn btn-primary" ng-click="fetchAll()">Fetch All</button></center>
            <br />
            <center><button class="btn btn-info" ng-click="fetchOne()">Fetch One</button></center>
        </div>
    </div>

<script>
var app = angular.module("myModule", [])
                .controller("myController", function($scope, $http){
 
                    $scope.fetchAll = function(){
                        $http.get('https://harekrishnasamacar.com/JPS/namakarana/namakarana_main1.php').then(function(response){
                            $scope.students = response.data;
                        });
                    }
 
                
 
 
                });


</script>

