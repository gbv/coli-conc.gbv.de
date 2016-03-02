/**
 * Web Interface to coli-conc mapping database or any other database with JSOS-API.
 */
var conc = angular.module('Concordance', ['ngSKOS']);

conc.constant('CONFIG', {
    baseURL: 'https://coli-conc.gbv.de/cocoda/api'
});

conc.run(['$rootScope','$http','CONFIG',function($rootScope,$http,CONFIG) {
    $rootScope.baseURL = CONFIG.baseURL;
    $http.get(CONFIG.baseURL).success(function(data){
        $rootScope.database = data;
    });
}]);

conc.controller('searchMappingsController', ['$scope','$http','CONFIG', function ($scope, $http, CONFIG){
    
    $scope.source = {
        scheme: 'DDC',
        notation: ''
    }
    $scope.target = {
        scheme: ''
    }
    $scope.creator = '';
    $scope.language = 'en';
    
    $scope.retrievedMapping = [];
    $scope.requestMappings = function(link) {
        var page = link;
        // set up query
        var params = { };
        if ($scope.source.notation != '') {
            params.fromNotation = $scope.source.notation;
        }
        if ($scope.source.scheme != '') {
            params.fromSchemeNotation = $scope.source.scheme;
        }
        if ($scope.target.scheme != ''){
            params.toSchemeNotation = $scope.target.scheme;
        }
        if ($scope.creator != ''){
            params.creator = $scope.creator;
        }
        if(page){
          page = link.split('page=');
          params.page = page[1];
        }
        // perform request
        $scope.retrievedMapping = [];
        $scope.mappingCount = null;
        $scope.httpError = null;
        $http.get(CONFIG.baseURL + "/mappings", { 
            params: params,
        }).success(function(data, status, headers) {
            $scope.retrievedMapping = data;
            $scope.mappingCount = headers('X-Total-Count');
            $scope.paginationLinks = [];
            $scope.pLinkString = headers('Link');
            if($scope.pLinkString){
              $scope.pLinkString = $scope.pLinkString.split(", ");
              if(typeof $scope.pLinkString === 'string'){
                $scope.paginationLinks.push(link.replace(/"|<|>/g, '').replace("rel=", '').split('; '));
              }else{
                angular.forEach($scope.pLinkString, function(link){
                  $scope.paginationLinks.push(link.replace(/"|<|>/g, '').replace("rel=", '').split('; '));
                })
              }
            }
        }).error(function(data, status, headers){
            $scope.httpError = data ? data : {
                message: "HTTP request failed. The mapping database may be down."
            };
        });
    }
}])
