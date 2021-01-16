const url = $('#url').val();
$(function () {

    $('.carousel').carousel({
        interval: 5000,
    });

    $('.user-photo').click(function(){
        $('#photo').click();
    });

    $('.delete').click(function(){
        if(!confirm("تأكيد عملية الحذف ?")){
            return false;
        }
    });

});

function readUrl(input){

    if (input.files && input.files[0]) {
        file = input.files[0];
        reader = new FileReader();

        console.log(file.type.toString());
        if ( file.type.toString() == 'image/png' || file.type.toString() == 'image/jgp' || file.type.toString() == 'image/jpeg' ){
            reader.readAsDataURL(file);
            reader.onload = function (e) {
                $('.user-photo').attr('src',e.target.result) ;
                // $('.thumb-reset').show();
                $('#type-error').hide();
            }
        }else {
            $('#photo').val(null);
            $('#type-error').slideToggle();
        }


    }
}

function changeLang(btn, e) {
    // e.preventDefault();
    window.location.replace(url+'/'+$(btn).val());
}