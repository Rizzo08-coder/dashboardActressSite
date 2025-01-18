function checkAddShow(){
    $(document).ready(function () {
        var title = $("#title");
        var short_description = $("#short_description");
        var description = $("#description")
        var directed_by = $("#directed_by")
        var collaboration = $("#collaboration")
        var image = $("#inputImage").val();
        if(title.val()==="" || short_description==="" || description==="" || directed_by==="" || collaboration==="") {
            $("#alert-empty-field").removeClass('hidden');
        } else if (image === ""){
            $("#alert-empty-image").removeClass('hidden');
        } else if (!checkImage(image)){
            $("#alert-wrong-image").removeClass('hidden');
        }
        else{
            $("form[id='store_show']").submit();
        }
    });
}

function checkEditShow(){
    $(document).ready(function () {
        var title = $("#title");
        var short_description = $("#short_description");
        var description = $("#description")
        var directed_by = $("#directed_by")
        var collaboration = $("#collaboration")
        var image = $("#inputImage").val();
        if(title.val()==="" || short_description==="" || description==="" || directed_by==="" || collaboration==="") {
            $("#alert-empty-field").removeClass('hidden');
        } else{
            $("form[id='store_edit_show']").submit();
        }
    });
}

function hideAlert_empty_field(){
    $(document).ready(function (){
        $("#alert-empty-field").addClass('hidden');
    });
}

function hideAlert_empty_image(){
    $(document).ready(function (){
        $("#alert-empty-image").addClass('hidden');
    });
}

function hideAlert_wrong_image(){
    $(document).ready(function (){
        $("#alert-wrong-image").addClass('hidden');
    });
}

function checkImage(image){
    var validExtensions = ['jpg', 'jpeg', 'png', 'webp'];
    var ext = image.split('.').pop().toLowerCase();

    if ($.inArray(ext, validExtensions) === -1) {
        return false; // Invalid extension
    }
    return true;
}
