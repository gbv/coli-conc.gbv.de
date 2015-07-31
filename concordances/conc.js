var conc = angular.module('Concordance', ['ngSKOS']);

conc.controller('myController',['$rootScope','$scope','$http','$q', function ($rootScope, $scope, $http, $q){
    
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
    $scope.transformData = function(data){
        angular.forEach(data, function(d){
            if(d.value){
                d = d.value;
            }
            var mt = "";
            var mr = "";
            if(d.mappingRelevance){
                mr = d.mappingRelevance;
            }
            if(d.mappingType){
                mt = d.mappingType;
            }
            var mapping = {
                creator: d.creator,
                mappingRelevance: mr,
                mappingType: mt,
                from: d.from,
                to: d.to
            }
            $scope.retrievedMapping.push(mapping);
        });
    }
    $scope.requestMappings = function(target){
        $scope.retrievedMapping = [];
        var url = "http://coli-conc.gbv.de/cocoda/api/mappings?";
        var get = $http.jsonp;
        if($scope.source.scheme != ''){
          url += "fromSchemeNotation=" + $scope.source.scheme + "&";
        }
        if(target != ''){
          url += "toSchemeNotation=" + target + "&";
        }
        if($scope.creator != ''){
          url += "creator=" + $scope.creator + "&";
        }
        url += "fromNotation=" + $scope.source.notation;
        url += url.indexOf('?') == -1 ? '?' : '&';
        url += 'callback=JSON_CALLBACK';

        get(url).success(function(data, status){
            $scope.transformData(data);
            
            if(!$scope.retrievedMapping.length){
              $scope.retrievalSuccess = false;
            }else{
              $scope.retrievalSuccess = true;
            }
        }).error(function(data, status, headers){
            console.log("Failed!" + status);
        });
    }
}])