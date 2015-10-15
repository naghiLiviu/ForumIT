var app = angular.module("myApp", []);

app.controller("root", ["$scope", function($scope) {
    $scope.users = [
        {id: 1, name: "John Smith", rank: "1", picture: "img/Image1.jpg", ownedBadges: [0, 1, 2], description: "Nobody knows him"},
        {id: 2, name: "Nicolae Popescu", rank: "1", picture: "img/Image2.jpg", ownedBadges: [1, 2], description: "Just very strong"},
        {id: 3, name: "Tudor Eugen", rank: "1", picture: "img/Image3.jpg", ownedBadges: [1, 2,], description: "Sick sense of humor"},
        {id: 4, name: "Vasile Alexandru", rank: "1", picture: "img/Image4.jpg", ownedBadges: [0, 1]},
        {id: 5, name: "Cristina Andreea", rank: "2", picture: "img/Image5.jpg", ownedBadges: [1]},
        {id: 6, name: "Ella Utza", rank: "2", picture: "img/Image6.jpg", ownedBadges: [2]},
        {id: 7, name: "Mihaela Alina", rank: "3", picture: "img/Image7.jpg", ownedBadges: [0]},
        {id: 8, name: "Ion Ion", rank: "3", picture: "img/Image8.jpg", ownedBadges: [0, 1, 2, ]},
        {id: 9, name: "Mircel Utilizator", rank: "3", picture: "img/Image9.jpg", ownedBadges: [0, 1, 2]}
    ];
    $scope.badges = [
        {badgeid: 1, name: "Police Badge", location: "img/Badge1.jpg", tooltip: "Police Badge"},
        {badgeid: 2, name: "Ranger Badge", location: "img/Badge2.jpg", tooltip: "Ranger Badge"},
        {badgeid: 3, name: "Love Badge", location: "img/Badge3.jpg", tooltip: "Love Badge"},
        {},
        {},
        {},
        {}
    ]
    $scope.selectedUser = $scope.users[0];
    $scope.userSelected = function (input){
        $scope.selectedUser = input.user;
    }
    }]);

myApp.directive('tooltip', function () {
    return {
        restrict:'A',
        link: function(scope, element, attrs)
        {
            $(element)
                .attr('title',scope.$eval(attrs.tooltip))
                .tooltip({placement: "right"});
        }
    }
})