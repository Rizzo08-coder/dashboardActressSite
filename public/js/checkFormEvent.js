function checkAddEvent(){
    $(document).ready(function () {
        var place = $("#place");
        var data = $("#datepicker-actions")
        var hour = $("#hour")
        if(place.val()==="" || data.val()==="" || hour.val()==="") {
            $("#alert-empty-field").removeClass('hidden');
        } else{
            $("form[id='store_event']").submit();
        }
    });
}

function hideAlert_empty_field(){
    $(document).ready(function (){
        $("#alert-empty-field").addClass('hidden');
    });
}
