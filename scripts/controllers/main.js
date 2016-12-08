
'use strict';

angular
    .module('hiddenFiguresApp')
    .controller('usersCtrl', function ($scope, $http) {
          // sort options
        $scope.insertData = function () {


            $scope.time = new Date();
            console.log ("time:"+ $scope.time);

            $http.post('api/insert.php', {
                'email': $scope.email,
                'time': $scope.time
            })
                .success(function(data, status, headers, config){
                    console.log('Data Inserted successfully');
                    window.location.href="confirm.html";

                })
                .error(function() {
                    console.log('Error');
                });

        };
    });

angular
    .module('hiddenFiguresApp')
    .controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("api/select.php")
                .success(function(data){
                    $scope.data = data;
                    //console.log("item:" + data);

                    $scope.getArray = $scope.data;
                })
                .error(function() {
                    $scope.data = "Error reaching the database";
                });
    }]);

