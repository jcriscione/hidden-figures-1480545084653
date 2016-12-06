
'use strict';

angular
    .module('hiddenFiguresApp')
    .controller('usersCtrl', function ($scope, $http) {
          // sort options
        $scope.insertData = function () {

            $http.post('api/insert.php', {
                'email': $scope.email,
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

                    $scope.getArray = $scope.data;
                })
                .error(function() {
                    $scope.data = "Error reaching the database";
                });
    }]);

angular
    .module('hiddenFiguresApp')
    .controller('exportCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.exportData = function () {
            $http.get("api/export.php")
                .success(function(data){
                    $scope.data = data;
                    console.log("success connection for export");

                })
                .error(function() {
                    $scope.data = "Error reaching the database in export";
                });
        };

    }]);