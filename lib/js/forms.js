function userLogin(e) {
    var deger = $("form#userLogin").serialize();
    Swal.fire({
        title: 'bitte warten Sie...',
        html: 'Verarbeitung läuft ...',
        timer: 3000,
    }).then((result) => {

    });
    $.ajax({
        url:"userLogin",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                Swal.fire({
                    type: 'error',
                    title: 'Error!',
                    text: cevap.hata
                })
            }else{
                Swal.fire({
                    type: 'Success',
                    title: 'Erfolgreich!',
                    text: cevap.ok,
                    timer: 1000
                }).then(function() {
                    if(e){
                        window.location = "reservierung/2/"+e;
                    }else{
                        window.location = "account";
                    }
                });
            }
        }
    });
}

 

function userRegister() {
    var deger = $("form#userRegisterForm").serialize();
    Swal.fire({
        title: 'bitte warten Sie...',
        html: 'Verarbeitung läuft ...',
        timer: 3000,
    }).then((result) => {

    });
    $.ajax({
        url:"userRegister",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){

            if(cevap.hata){
                Swal.fire({
                    type: 'error',
                    title: 'Error!',
                    text: cevap.hata
                })
            }else{
                Swal.fire({
                    type: 'Success',
                    title: 'Erfolgreich!',
                    text: cevap.ok
                }).then(function() {
                    window.location = "account";
                });
            }
        }
    });
}
function profilEdit() {
    var deger = $("form#profilDuzenle").serialize();
    Swal.fire({
        title: 'bitte warten Sie...',
        html: 'Verarbeitung läuft ...',
        timer: 3000,
    }).then((result) => {

    });
    $.ajax({
        url:"userEdit",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){

            if(cevap.hata){
                Swal.fire({
                    type: 'error',
                    title: 'Error!',
                    text: cevap.hata
                })
            }else{
                Swal.fire({
                    type: 'Success',
                    title: 'Erfolgreich!',
                    text: cevap.ok
                }).then(function() {
                    window.location = "/mein-konto";
                });
            }
        }
    });
}

$('#dataModal').on('hidden.bs.modal', function () {
    $('#employee_detail').html('');
});
$('.view_data').click(function(){
    var employee_id = $(this).attr("id");
    $.ajax({
        url:"siparisDetayGetir",
        method:"post",
        data:{employee_id:employee_id},
        success:function(data){
            $('#employee_detail').html(data);
            $('#dataModal').modal("show");
        }
    });
});


function faturaEdit() {
    var deger = $("form#faturaDuzenle").serialize();
    Swal.fire({
        title: 'bitte warten Sie...',
        html: 'Verarbeitung läuft ...',
        timer: 3000,
    }).then((result) => {

    });
    $.ajax({
        url:"faturaEdit",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                Swal.fire({
                    type: 'error',
                    title: 'Error!',
                    text: cevap.hata
                })
            }else{
                Swal.fire({
                    type: 'Success',
                    title: 'Erfolgreich!',
                    text: cevap.ok
                }).then(function() {
                    window.location = "/abrechnungs-informationen";
                });
            }
        }
    });
}