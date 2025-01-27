
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="datepicker"]').datepicker({
        startView: 2,
        autoHide: true,
        date: new Date(2018, 7, 1),
        format: 'yyyy-mm-dd',
        language: 'tr-TR'
    });
    var textarea = document.querySelector( '#editor' );
    ClassicEditor
        .create( textarea, {
            toolbar: [ 'bold', 'italic', 'link' ],
            height: ['300']
        } )
        .then(function (editor) {
            $(textarea).data('editor',editor);
            editor.on('instanceReady',function () {
                editor.on('change',function (eventInfo, name, value, oldValue) {
                    console.log(eventInfo, name, value, oldValue)
                })
                console.log(editor)
            })

        })
        .catch( error => {
        console.log( error );
});



    $('#koby_table').DataTable({
        aoColumnDefs: [
            { 'bSortable': false, 'aTargets': [ 'nosort' ] }
        ]
    });

});


function icerikdurum(el,par) {
    if (el.checked) {
        $.ajax({
            type: "POST",
            url: "req/ajax.php" + par,
            async: true,
            data: {
                id: el.value,
                durum: '1'
            },
            dataType: "json",
            success: function (cevap) {
                if (cevap.hata) {
                    toastr.error(cevap.hata, 'Hata')
                } else {
                    toastr.success(cevap.ok, 'Başarılı')
                }
            }
        });
    } else {
        $.ajax({
            type: "POST",
            url: "req/ajax.php" + par,
            async: true,
            data: {
                id: el.value,
                durum: '0'
            },
            dataType: "json",
            success: function (cevap) {
                if (cevap.hata) {
                    //alert(cevap.hata);
                    toastr.error(cevap.hata, 'Hata')
                } else {
                    //alert(cevap.ok);
                    toastr.success(cevap.ok, 'Başarılı')
                }
            }
        });
    }
}


function rankChange(el,par){
    $.ajax({
        type: "POST",
        url:  "req/ajax.php"+par,
        async: true,
        data: {id:el.id, rank:el.value},
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                toastr.error(cevap.hata, 'Hata');
            }else{
                toastr.success(cevap.ok, 'Başarılı');
            }
        }
    });
}

function contentChange(el,par){
    $.ajax({
        type: "POST",
        url:  "req/ajax.php"+par,
        async: true,
        data: {id:el.id, content:el.value},
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                toastr.error(cevap.hata, 'Error');
            }else{
                toastr.success(cevap.ok, 'Ok');
            }
        }
    });
}

function userStatus(el){
    $.ajax({
        type: "POST",
        url: "req/ajax.php?do=watermarkStatus",
        async: true,
        data: {id:el.id, status:el.value},
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                toastr.error(cevap.hata, 'Error')
            }else{
                toastr.success(cevap.ok, 'Ok')
            }
        }
    });
}

function watermarkStatus(el){
    $.ajax({
        type: "POST",
        url: "req/ajax.php?do=watermarkStatus",
        async: true,
        data: {id:el.id, status:el.value},
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                toastr.error(cevap.hata, 'Error')
            }else{
                toastr.success(cevap.ok, 'Ok')
            }
        }
    });
}

function kobySingle (value,par,par_return) {
    swal({
        title: 'Vorsicht!!',
        text: "Sind Sie sicher das Sie fortfahren möchten?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Nein',
        confirmButtonText: 'Erfolgreich'
    }).then((result) => {
        if (result.value) {
        $.ajax({
            url: "req/ajax.php"+par,
            type: "POST",
            data : {deger:value},
            success: function(cevap){
                cevap = $.parseJSON(cevap);
                if (cevap.hata) {
                    swal({
                        title: "Error",
                        text: cevap.hata,
                        type: "error",
                        confirmButtonText: "Ok"
                    });
                }else{
                    swal({
                        title: "Success",
                        text: cevap.ok,
                        type: "success",
                        confirmButtonText: "Ok"
                    }).then(function () {
                            window.location.href = par_return;
                        }
                    );
                }
            }
        });
    }
});
}
    /*$.ajax({
        url: "req/ajax.php"+par,
        type: "POST",
        data : {deger:value},
        success: function(cevap){
            cevap = $.parseJSON(cevap);
            if (cevap.hata) {
                swal({
                    title: "Error",
                    text: cevap.hata,
                    type: "error",
                    animation: false,
                    customClass: 'animated fadeIn',
                    confirmButtonText: "Ok"
                });
            }else{
                swal({
                    title: "Success",
                    text: cevap.ok,
                    type: "success",
                    animation: false,
                    customClass: 'animated fadeIn',
                    confirmButtonText: "Ok"
                }).then(function () {
                        window.location.href = par_return;
                    }
                );
            }
        }
    });
    */


function kobySubmit (par,par_return) {
    swal({
        title: "Bitte warten Sie..",
        timer: 10000,
        showConfirmButton: false,
        onOpen: () => {
        swal.showLoading()
    }
    });
    $("#koby_form textarea" ).each(function () {
        var editor = $(this).data('editor');
        if(editor){
            console.log(editor);
            //editor.updateSourceElement();
            $(editor.element).val(editor.getData());
        }
    });
    var formData = new FormData($("#koby_form")[0]);
    $.ajax({
        url: "req/ajax.php"+par,
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        success: function(cevap){
            cevap = $.parseJSON(cevap);
            if (cevap.hata) {
                swal({
                    title: "Error",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Ok"
                });
            }else{
                swal({
                    title: "Success",
                    text: cevap.ok,
                    type: "success",
                    confirmButtonText: "Ok"
                }).then(function () {
                        window.location.href = par_return;
                    }
                );
            }
        }
    });
}

function socialRank(el){
    console.log("ID:" + el.id + "Sıra:" + el.value);
    $.ajax({
        type: "POST",
        url: "req/ajax.php?do=social&q=rankEdit",
        async: true,
        data: {id:el.id,rank:el.value},
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                toastr.error(cevap.hata, 'Error')
            }else{
                toastr.success(cevap.ok, 'Ok')
            }
        }
    });
}

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

