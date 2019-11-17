
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

$(function () {
    $('#datetimepicker5').datetimepicker({
        format: 'YYYY-MM-DD'
    });
 });
