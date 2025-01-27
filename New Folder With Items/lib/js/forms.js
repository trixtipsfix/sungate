
function userLogin() {
    var deger = $("form#userLogin").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Giriş yapılıyor lütfen bekleyin...",
        showConfirmButton: false
    });
    $.ajax({
        url:"userLogin",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){

            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
            }else{
                swal({
                    title: "Başarılı!",
                    text: cevap.ok,
                    type: "success",
                    showConfirmButton: false
                });
                setInterval(function(){
                    window.location.href = "/hesabim";
                }, 2000);
            }
        }
    });
}


function userRegister() {
    var deger = $("form#userRegisterForm").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Giriş yapılıyor lütfen bekleyin...",
        showConfirmButton: false
    });
    $.ajax({
        url:"userRegister",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){

            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
            }else{
                swal({
                    title: "Başarılı!",
                    text: cevap.ok,
                    type: "success",
                    showConfirmButton: false
                });
                setInterval(function(){
                    window.location.href = "/hesabim";
                }, 2000);
            }
        }
    });
}


/*

$.ekHizmetEkle = function(el) {
	$.ajax({
		type: "POST",
		url: "app/req/ajax.php?do=ek_hizmet_satin_al&id=" + el,
		dataType :"json",
		success:function(cevap){
			if(cevap.hata){
				swal({
					title: "Hata!",
					text: cevap.hata,
					type: "error",
					confirmButtonText: "Tamam"
				});
				//alert(cevap.hata);
			}else{
				//alert(cevap.ok);
                swal({
                        title: "Başarılı!",
                        text: cevap.ok,
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sepete Git",
                        cancelButtonText: "Alıverişe Devam et",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            window.location.href = "sepetim";
                        } else {
                            swal.close();
                            location.reload();
                        }
                    }
                );
			}
		}
	});
}
$(function(){
  // bind change event to select
  $('#dynamic_select').on('change', function () {
      var url = $(this).val(); // get selected value
      if (url) { // require a URL
          window.location = 'site-market/' + url; // redirect
      }
      return false;
  });
});
function blogyorumEkle() {
    var deger = $("form#blogyorumEkle").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Yorumunuz kaydediliyor...",
        showConfirmButton: false
    });

    $.ajax({
        url:"blogYorumEkle",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
                swal({
                    title: "Başarılı!",
                    text: cevap.ok,
                    type: "success",
                    confirmButtonText: "Tamam"
                });
                $("form#blogyorumEkle input").val("");
                $("form#blogyorumEkle textarea").val("");
            }
        }
    });
}
function talepOlustur() {
    var deger = $("form#yenitalepOlustur").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Yorumunuz kaydediliyor...",
        showConfirmButton: false
    });

    $.ajax({
        url:"yenitalepOlustur",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/destek-taleplerim";
				});
            }
        }
    });
}
function talepCevapla(id) {
    var deger = $("form#talepCevapYaz").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Mesajınız kaydediliyor...",
        showConfirmButton: false
    });

    $.ajax({
        url:"utalepCevap",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/destek-taleplerim/talep/"+id;
				});
            }
        }
    });
}
function profilEdit() {
    var deger = $("form#profilDuzenle").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Mesajınız kaydediliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"userEdit",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/bilgilerim";
				});
            }
        }
    });
}
function faturaEdit() {
    var deger = $("form#faturaDuzenle").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Mesajınız kaydediliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"faturaEdit",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/abrechnungs-informationen";
				});
            }
        }
    });
}
function odemeBildirim() {
    var deger = $("form#odeme_bildirimiForm").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Bildiriminiz iletiliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"odemeBildirim",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/siparislerim";
				});
            }
        }
    });
}
function iletisimBildirim() {
    var deger = $("form#iletisimFormu").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Bilgileriniz iletiliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"iletisimBildirim",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/";
				});
            }
        }
    });
}
function demoistekFormu() {
    var deger = $("form#demopanelFormu").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Bilgileriniz iletiliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"demoIstek",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/";
				});
            }
        }
    });
}


function biziSiziArayalimCl() {
    var deger = $("form#biziSiziArayalimFormu").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Bilgileriniz iletiliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"bizsiziArayalim",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
                swal({
                    title: "Başarılı!",
                    text: cevap.ok,
                    type: "success",
                    confirmButtonText: "Teşekkürler"
                },function(){
                    window.location.href = "/";
                });
            }
        }
    });
}

function hizliTeklifAl() {
    var deger = $("form#hızlıTeklifFormu").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Bilgileriniz iletiliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"hizliTeklif",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/";
				});
            }
        }
    });
}
function heaIletisim() {
    var deger = $("form#heacontactFormu").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Bilgileriniz iletiliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"heaIletisimFormu",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/";
				});
            }
        }
    });
}
function siparisHavTamamla() {
    var deger = $("form#siparisHavForm").serialize();
    swal({
        title: "Lütfen Bekleyin",
        text: "Mesajınız kaydediliyor...",
        showConfirmButton: false
    });
    $.ajax({
        url:"siparisHav",
        type:"post",
        data:deger,
        dataType :"json",
        success:function(cevap){
            if(cevap.hata){
                swal({
                    title: "Hata!",
                    text: cevap.hata,
                    type: "error",
                    confirmButtonText: "Tamam"
                });
                //alert(cevap.hata);
            }else{
                //alert(cevap.ok);
				swal({
					title: "Başarılı!",
					text: cevap.ok,
					type: "success",
					confirmButtonText: "Teşekkürler"
				},function(){
					window.location.href = "/siparislerim";
				});
            }
        }
    });
}



$.aboneOl = function(){
	var deger = $("form#aboneOl").serialize();
	$.ajax({
		url:"inc/ajax.php?q=abone_ol",
		type:"post",
		data:deger,
		dataType :"json",
		success:function(cevap){
			if(cevap.hata){
				alert(cevap.hata);
			}else{
				alert(cevap.basarili);
				$("form#aboneOl input").val("");
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
*/