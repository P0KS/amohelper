var amohelper = amohelper || {};
amohelper.common = {};

var AmoHelperApp = angular.module('AmoHelperApp', []);

amohelper.common.init = function(){
    $(".js-datepicker").datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        mask:true
    });
}
$(document).ready(function(){
   amohelper.common.init();
});