<html>
<head>
	<meta http-equiv="Content-Language" content="tr">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
	<title>�rnek ileti�im formu</title>
</head>
<body>
<fieldset style="width:400px;">
	<h3><a href="iletisim.php">�leti�im Formu</a></h3>
	<form method="post" action="iletisim.php?islem">
	<p><input type="text" name="isim" size="20" /> <label for="isim"> <b>Ad�n�z</b> </label></p>

	<p><input type="text" name="eposta" size="20" /> <label for="eposta"> <b>Eposta Adresiniz</b> </label></p>

	<p><input type="text" name="konu" size="20" /> <label for="konu"> <b>Konu</b> </label></p>
	<p><textarea rows="6" name="mesaj" cols="30"></textarea> <label for="mesaj"> <b>Mesaj�n�z</b> </label></p>

	<p><input type="reset" value="S�f�rla" /> <input type="submit" value="G�nder" /></p> 
<?php

if (isset($_GET['islem'])) {
	
	if ($_POST['eposta']<>'' && $_POST['isim']<>'' && $_POST['konu']<>'' && $_POST['mesaj']<>'') {

	require_once("class.phpmailer.php");

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "mail.londoneducation.net";
	$mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = true;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
	$mail->Username = "site@londoneducation.net";
	$mail->Password = "oPrt$538";
	$mail->From = "erdinc@bongotravel.net";
	$mail->Fromname = $_POST['isim'];
	$mail->AddAddress("site@londoneducation.net","London Education");
	$mail->Subject = $_POST['konu'] ." ". $_POST['eposta'];
	$mail->Body = $_POST['mesaj'];

	if(!$mail->Send())
	{
	   echo '<font color="#F62217"><b>G�nderim Hatas�: ' . $mail->ErrorInfo . '</b></font>';
	   exit;
	}
	echo '<font color="#41A317"><b>Mesaj ba�ar�yla g�nderildi.</b></font>';
	} else {
		 echo '<font color="#F62217"><b>T�m alanlar�n doldurulmas� zorunludur.</b></font>';
	}
}
?>
	</form>
</fieldset>
</body>
</html>
