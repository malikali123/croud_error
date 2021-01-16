$(function () {

    $('.user-photo').click(function () {
        $('#photo').click();
    });

    $('input').click(function () {
        $(this).select();
    });

    $('.delete').on('click', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');

        if (confirm("تأكيد عملية الحذف ?")) {

            swal("لأكمال الحذف أدخل الDelete Password", {
                content: "input",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "تراجع",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "تأكيد الحذف",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            }).then((value) => {

                if (value == "amaad1234") {
                    window.location.replace(url);
                    return false;
                }
                swal({
                    title: "البيانات المدخلة غير صحيحة",
                    text: "عفواً , لا يمكن إكمال هذا الاجراء",
                    timer: 2000,
                    showConfirmButton: false
                });
                // toastr.error('كلمة المرور غير صحيحة يرجي المحاولة لاحقاً .', '',
                //     {
                //         "showDuration": 1000,
                //         "closeButton": true,
                //         positionClass: 'toast-top-right',
                //         containerId: 'toast-top-right',
                //         "progressBar": true,

                //         // "showMethod": "slideDown", "hideMethod": 
                //         // "slideUp", timeOut: 3000
                //         // positionClass: 'toast-bottom-full-width', containerId: 'toast-bottom-full-width'
                //     }
                // );
                return false;

            });
        }
        // if (!confirm("تأكيد عملية الحذف ?")) {
        // return false;
        // }
    });

});

function readUrl(input) {

    if (input.files && input.files[0]) {
        file = input.files[0];
        reader = new FileReader();

        console.log(file.type.toString());
        if (file.type.toString() == 'image/png' || file.type.toString() == 'image/jgp' || file.type.toString() == 'image/jpeg') {
            reader.readAsDataURL(file);
            reader.onload = function (e) {
                $('.user-photo').attr('src', e.target.result);
                // $('.thumb-reset').show();
                $('#type-error').hide();
            }
        } else {
            $('#photo').val(null);
            $('#type-error').slideToggle();
        }


    }
}