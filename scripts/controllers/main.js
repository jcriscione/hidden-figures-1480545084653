
'use strict';

angular
    .module('hiddenFiguresApp')
    .controller('usersCtrl', function ($scope, $http) {
          // sort options
        $scope.insertData = function () {

            $http.post('api/insert.php', {
                'uemail': $scope.uemail,
                'photoid': $scope.photoid
            })
                .success(function(data, status, headers, config){
                    console.log('Data Inserted successfully');
                    $http.get("confirm.html");
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
                    console.log("item:" + data);
                })
                .error(function() {
                    $scope.data = "Error reaching the database";
                });
    }]);
