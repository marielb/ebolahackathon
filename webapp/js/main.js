var app = angular.module('smsApp', ['ngRoute', 'restangular', 'chart.js']);

app.controller('AppCtrl', ['$scope','InformationService',function($scope, InformationService) {

    $scope.deleteTweets = function() {
        alert(InformationService.getData());
    }

    InformationService.getData().then(function(data) {
        $scope.people = data;
        console.log('test');
    });

}]);

app.directive('enter', function() {
    return function(scope, element, attrs) {
        element.bind('mouseenter', function() {
            scope.$apply(attrs.enter)
        })
    }
});

app.controller("DoughnutCtrl", ['$scope', '$timeout', function ($scope, $timeout) {
    $scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales"];
    $scope.data = [300, 500, 100];

    $timeout(function () {
      $scope.data = [350, 450, 100];
    }, 5000);
}]);

app.config(function (RestangularProvider) {
    RestangularProvider.setBaseUrl('http://marielbartolo.me/ebolahackathon/');
});

app.service('InformationService', ['Restangular', function(Restangular) {
    var informationService = {};

    informationService.getData = function() {
        var info = Restangular.one('alerts.php').get();
        return info;
    };

    return informationService;
}]);