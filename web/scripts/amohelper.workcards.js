AmoHelperApp.controller('WorkCardsController', function ($rootScope, $scope, $http, $q, $filter, $location, $anchorScroll, $compile) {
    $scope.workCards = [];    
    
    $scope.workOrderNumber = '';
    
    $scope.init = function(workOrderNumber) {
        $scope.workOrderNumber = workOrderNumber;
        
        $scope.resetForm();
    }
    
    $scope.resetForm = function() {
        $scope.currentDiscrepancy = '';
        $scope.currentRectification = '';
        $scope.currentIndependentCheck = false;
        $scope.currentMajorRepair = false;
        $scope.currentSDR = false;
    }
    
    $scope.addWorkCard = function() {
        $scope.workCards.push({
            discrepancy : $scope.currentDiscrepancy,
            rectification : $scope.currentRectification,
            independent_check_required : $scope.currentIndependentCheck,
            modification_report_required : $scope.currentMajorRepair,
            srd_required : $scope.currentSDR
        });
        
        $scope.resetForm();
    }
    
    $scope.deleteWorkCard = function(index) {
        $scope.workCards.splice(index, 1);
    }

});