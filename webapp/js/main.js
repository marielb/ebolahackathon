var app = angular.module('smsApp', ['ngRoute', 'restangular', 'chart.js']);

app.controller('AppCtrl', ['$scope','InformationService',function($scope, InformationService) {
    $scope.loadMoreTweets = function() {
        alert('Loading tweets!');
    }

    $scope.deleteTweets = function() {
        alert(InformationService.getData());
    }

    $scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales"];
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
    RestangularProvider.setBaseUrl('https://marielbartolo.me/');
});

app.service('InformationService', ['Restangular', function(Restangular) {
    var informationService = {};

    informationService.getData = function() {
        //var info = Restangular.one('information.php').get();
        return 'test';
    };

    return informationService;

}]);