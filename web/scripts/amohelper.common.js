var amohelper = amohelper || {};
amohelper.common = {};

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