<?php
session_start();
set_time_limit(0);
require_once '../config/db.php';
require_once '../config/func.php';
require_once '../req/class.upload.php';
$dizi = array();
$do = $_GET['do'];
$q = $_GET['q'];
$userID = $_SESSION['the_admin']['id'];

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'mail'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$adsoyad, $message, $subject)
{
    date_default_timezone_set('Europe/Istanbul');
    //Server settings
    $mail = new PHPMailer();
    $mail->CharSet = 'utf-8';
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->SMTPAutoTLS = true;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Host = 'mail.sungate24.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@sungate24.com';
    $mail->Password = '8_Radf65';
    $mail->Port = 587;
    $mail->setLanguage('tr');
    $mail->setFrom($mail->Username, 'Sungate24');
    $mail->IsHTML(true);
    $mail->addAddress($email,$adsoyad);
    $mail->Subject = $subject;
    $mail->msgHTML($message);
    if(!$mail->Send()) {
        $dizi["hata"] = '222';
        exit;
    } else {
        $dizi["ok"] = 'Ihre Registrierung ist erfolgreich. Bitte überprüfen Sie Ihre E-Mail-Adresse und Ihre Junk-Mailbox.';
        $_POST = array();
    }
}

if($do == 'email_test'){
    try {
        date_default_timezone_set('Europe/Istanbul');
        //Server settings
        $mail = new PHPMailer();
        $mail->CharSet = 'utf-8';
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->SMTPAutoTLS = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host = 'mail.sungate24.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@sungate24.com';
        $mail->Password = '8_Radf65';
        $mail->Port = 587;
        $mail->setLanguage('tr');
        $mail->setFrom($mail->Username, 'Sungate24');
        $mail->IsHTML(true);
        $mail->addAddress('orkncylr@gmail.com', 'Orkun');
        $mail->Subject = 'Konu Başlığı';
        $mail->msgHTML('
                <!DOCTYPE html>
                <html lang="de">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                </head>
                
                <body
                    style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; box-sizing: border-box; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 22px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important">
                
                
                
                    <style type="text/css">
                        body {
                            background-color: #FAFAFA;
                            width: 100% !important;
                            min-width: 100%;
                            -webkit-text-size-adjust: 100%;
                            -ms-text-size-adjust: 100%;
                            margin: 0;
                            padding: 0;
                            -moz-box-sizing: border-box;
                            -webkit-box-sizing: border-box;
                            box-sizing: border-box;
                        }
                
                        .ExternalClass {
                            width: 100%;
                        }
                
                        .ExternalClass {
                            line-height: 100%;
                        }
                
                        #backgroundTable {
                            margin: 0;
                            padding: 0;
                            width: 100% !important;
                            line-height: 100% !important;
                        }
                
                        img {
                            outline: none;
                            text-decoration: none;
                            -ms-interpolation-mode: bicubic;
                            width: auto;
                            max-width: 100%;
                            clear: both;
                            display: block;
                        }
                
                        body {
                            color: #1C232B;
                            font-family: Helvetica, Arial, sans-serif;
                            font-weight: normal;
                            padding: 0;
                            margin: 0;
                            text-align: left;
                            line-height: 1.3;
                        }
                
                        body {
                            font-size: 16px;
                            line-height: 1.3;
                        }
                
                        a:hover {
                            color: #1f54ed;
                        }
                
                        a:active {
                            color: #1f54ed;
                        }
                
                        a:visited {
                            color: #4E78F1;
                        }
                
                        h1 a:visited {
                            color: #4E78F1;
                        }
                
                        h2 a:visited {
                            color: #4E78F1;
                        }
                
                        h3 a:visited {
                            color: #4E78F1;
                        }
                
                        h4 a:visited {
                            color: #4E78F1;
                        }
                
                        h5 a:visited {
                            color: #4E78F1;
                        }
                
                        h6 a:visited {
                            color: #4E78F1;
                        }
                
                        table.button:hover table tr td a {
                            color: #FFFFFF;
                        }
                
                        table.button:active table tr td a {
                            color: #FFFFFF;
                        }
                
                        table.button table tr td a:visited {
                            color: #FFFFFF;
                        }
                
                        table.button.tiny:hover table tr td a {
                            color: #FFFFFF;
                        }
                
                        table.button.tiny:active table tr td a {
                            color: #FFFFFF;
                        }
                
                        table.button.tiny table tr td a:visited {
                            color: #FFFFFF;
                        }
                
                        table.button.small:hover table tr td a {
                            color: #FFFFFF;
                        }
                
                        table.button.small:active table tr td a {
                            color: #FFFFFF;
                        }
                
                        table.button.small table tr td a:visited {
                            color: #FFFFFF;
                        }
                
                        table.button.large:hover table tr td a {
                            color: #FFFFFF;
                        }
                
                        table.button.large:active table tr td a {
                            color: #FFFFFF;
                        }
                
                        table.button.large table tr td a:visited {
                            color: #FFFFFF;
                        }
                
                        table.button:hover table td {
                            background: #1f54ed;
                            color: #FFFFFF;
                        }
                
                        table.button:visited table td {
                            background: #1f54ed;
                            color: #FFFFFF;
                        }
                
                        table.button:active table td {
                            background: #1f54ed;
                            color: #FFFFFF;
                        }
                
                        table.button:hover table a {
                            border: 0 solid #1f54ed;
                        }
                
                        table.button:visited table a {
                            border: 0 solid #1f54ed;
                        }
                
                        table.button:active table a {
                            border: 0 solid #1f54ed;
                        }
                
                        table.button.secondary:hover table td {
                            background: #fefefe;
                            color: #FFFFFF;
                        }
                
                        table.button.secondary:hover table a {
                            border: 0 solid #fefefe;
                        }
                
                        table.button.secondary:hover table td a {
                            color: #FFFFFF;
                        }
                
                        table.button.secondary:active table td a {
                            color: #FFFFFF;
                        }
                
                        table.button.secondary table td a:visited {
                            color: #FFFFFF;
                        }
                
                        table.button.success:hover table td {
                            background: #009482;
                        }
                
                        table.button.success:hover table a {
                            border: 0 solid #009482;
                        }
                
                        table.button.alert:hover table td {
                            background: #ff6131;
                        }
                
                        table.button.alert:hover table a {
                            border: 0 solid #ff6131;
                        }
                
                        table.button.warning:hover table td {
                            background: #fcae1a;
                        }
                
                        table.button.warning:hover table a {
                            border: 0px solid #fcae1a;
                        }
                
                        .thumbnail:hover {
                            box-shadow: 0 0 6px 1px rgba(78, 120, 241, 0.5);
                        }
                
                        .thumbnail:focus {
                            box-shadow: 0 0 6px 1px rgba(78, 120, 241, 0.5);
                        }
                
                        body.outlook p {
                            display: inline !important;
                        }
                
                        body {
                            font-weight: normal;
                            font-size: 16px;
                            line-height: 22px;
                        }
                
                        @media only screen and (max-width: 596px) {
                            .small-float-center {
                                margin: 0 auto !important;
                                float: none !important;
                                text-align: center !important;
                            }
                
                            .small-text-center {
                                text-align: center !important;
                            }
                
                            .small-text-left {
                                text-align: left !important;
                            }
                
                            .small-text-right {
                                text-align: right !important;
                            }
                
                            .hide-for-large {
                                display: block !important;
                                width: auto !important;
                                overflow: visible !important;
                                max-height: none !important;
                                font-size: inherit !important;
                                line-height: inherit !important;
                            }
                
                            table.body table.container .hide-for-large {
                                display: table !important;
                                width: 100% !important;
                            }
                
                            table.body table.container .row.hide-for-large {
                                display: table !important;
                                width: 100% !important;
                            }
                
                            table.body table.container .callout-inner.hide-for-large {
                                display: table-cell !important;
                                width: 100% !important;
                            }
                
                            table.body table.container .show-for-large {
                                display: none !important;
                                width: 0;
                                mso-hide: all;
                                overflow: hidden;
                            }
                
                            table.body img {
                                width: auto;
                                height: auto;
                            }
                
                            table.body center {
                                min-width: 0 !important;
                            }
                
                            table.body .container {
                                width: 95% !important;
                            }
                
                            table.body .columns {
                                height: auto !important;
                                -moz-box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                box-sizing: border-box;
                                padding-left: 16px !important;
                                padding-right: 16px !important;
                            }
                
                            table.body .column {
                                height: auto !important;
                                -moz-box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                box-sizing: border-box;
                                padding-left: 16px !important;
                                padding-right: 16px !important;
                            }
                
                            table.body .columns .column {
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                            }
                
                            table.body .columns .columns {
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                            }
                
                            table.body .column .column {
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                            }
                
                            table.body .column .columns {
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                            }
                
                            table.body .collapse .columns {
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                            }
                
                            table.body .collapse .column {
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                            }
                
                            td.small-1 {
                                display: inline-block !important;
                                width: 8.333333% !important;
                            }
                
                            th.small-1 {
                                display: inline-block !important;
                                width: 8.333333% !important;
                            }
                
                            td.small-2 {
                                display: inline-block !important;
                                width: 16.666666% !important;
                            }
                
                            th.small-2 {
                                display: inline-block !important;
                                width: 16.666666% !important;
                            }
                
                            td.small-3 {
                                display: inline-block !important;
                                width: 25% !important;
                            }
                
                            th.small-3 {
                                display: inline-block !important;
                                width: 25% !important;
                            }
                
                            td.small-4 {
                                display: inline-block !important;
                                width: 33.333333% !important;
                            }
                
                            th.small-4 {
                                display: inline-block !important;
                                width: 33.333333% !important;
                            }
                
                            td.small-5 {
                                display: inline-block !important;
                                width: 41.666666% !important;
                            }
                
                            th.small-5 {
                                display: inline-block !important;
                                width: 41.666666% !important;
                            }
                
                            td.small-6 {
                                display: inline-block !important;
                                width: 50% !important;
                            }
                
                            th.small-6 {
                                display: inline-block !important;
                                width: 50% !important;
                            }
                
                            td.small-7 {
                                display: inline-block !important;
                                width: 58.333333% !important;
                            }
                
                            th.small-7 {
                                display: inline-block !important;
                                width: 58.333333% !important;
                            }
                
                            td.small-8 {
                                display: inline-block !important;
                                width: 66.666666% !important;
                            }
                
                            th.small-8 {
                                display: inline-block !important;
                                width: 66.666666% !important;
                            }
                
                            td.small-9 {
                                display: inline-block !important;
                                width: 75% !important;
                            }
                
                            th.small-9 {
                                display: inline-block !important;
                                width: 75% !important;
                            }
                
                            td.small-10 {
                                display: inline-block !important;
                                width: 83.333333% !important;
                            }
                
                            th.small-10 {
                                display: inline-block !important;
                                width: 83.333333% !important;
                            }
                
                            td.small-11 {
                                display: inline-block !important;
                                width: 91.666666% !important;
                            }
                
                            th.small-11 {
                                display: inline-block !important;
                                width: 91.666666% !important;
                            }
                
                            td.small-12 {
                                display: inline-block !important;
                                width: 100% !important;
                            }
                
                            th.small-12 {
                                display: inline-block !important;
                                width: 100% !important;
                            }
                
                            .columns td.small-12 {
                                display: block !important;
                                width: 100% !important;
                            }
                
                            .column td.small-12 {
                                display: block !important;
                                width: 100% !important;
                            }
                
                            .columns th.small-12 {
                                display: block !important;
                                width: 100% !important;
                            }
                
                            .column th.small-12 {
                                display: block !important;
                                width: 100% !important;
                            }
                
                            table.body td.small-offset-1 {
                                margin-left: 8.333333% !important;
                            }
                
                            table.body th.small-offset-1 {
                                margin-left: 8.333333% !important;
                            }
                
                            table.body td.small-offset-2 {
                                margin-left: 16.666666% !important;
                            }
                
                            table.body th.small-offset-2 {
                                margin-left: 16.666666% !important;
                            }
                
                            table.body td.small-offset-3 {
                                margin-left: 25% !important;
                            }
                
                            table.body th.small-offset-3 {
                                margin-left: 25% !important;
                            }
                
                            table.body td.small-offset-4 {
                                margin-left: 33.333333% !important;
                            }
                
                            table.body th.small-offset-4 {
                                margin-left: 33.333333% !important;
                            }
                
                            table.body td.small-offset-5 {
                                margin-left: 41.666666% !important;
                            }
                
                            table.body th.small-offset-5 {
                                margin-left: 41.666666% !important;
                            }
                
                            table.body td.small-offset-6 {
                                margin-left: 50% !important;
                            }
                
                            table.body th.small-offset-6 {
                                margin-left: 50% !important;
                            }
                
                            table.body td.small-offset-7 {
                                margin-left: 58.333333% !important;
                            }
                
                            table.body th.small-offset-7 {
                                margin-left: 58.333333% !important;
                            }
                
                            table.body td.small-offset-8 {
                                margin-left: 66.666666% !important;
                            }
                
                            table.body th.small-offset-8 {
                                margin-left: 66.666666% !important;
                            }
                
                            table.body td.small-offset-9 {
                                margin-left: 75% !important;
                            }
                
                            table.body th.small-offset-9 {
                                margin-left: 75% !important;
                            }
                
                            table.body td.small-offset-10 {
                                margin-left: 83.333333% !important;
                            }
                
                            table.body th.small-offset-10 {
                                margin-left: 83.333333% !important;
                            }
                
                            table.body td.small-offset-11 {
                                margin-left: 91.666666% !important;
                            }
                
                            table.body th.small-offset-11 {
                                margin-left: 91.666666% !important;
                            }
                
                            table.body table.columns td.expander {
                                display: none !important;
                            }
                
                            table.body table.columns th.expander {
                                display: none !important;
                            }
                
                            table.body .right-text-pad {
                                padding-left: 10px !important;
                            }
                
                            table.body .text-pad-right {
                                padding-left: 10px !important;
                            }
                
                            table.body .left-text-pad {
                                padding-right: 10px !important;
                            }
                
                            table.body .text-pad-left {
                                padding-right: 10px !important;
                            }
                
                            table.menu {
                                width: 100% !important;
                            }
                
                            table.menu td {
                                width: auto !important;
                                display: inline-block !important;
                            }
                
                            table.menu th {
                                width: auto !important;
                                display: inline-block !important;
                            }
                
                            table.menu.vertical td {
                                display: block !important;
                            }
                
                            table.menu.vertical th {
                                display: block !important;
                            }
                
                            table.menu.small-vertical td {
                                display: block !important;
                            }
                
                            table.menu.small-vertical th {
                                display: block !important;
                            }
                
                            table.menu[align="center"] {
                                width: auto !important;
                            }
                
                            table.button.small-expand {
                                width: 100% !important;
                            }
                
                            table.button.small-expanded {
                                width: 100% !important;
                            }
                
                            table.button.small-expand table {
                                width: 100%;
                            }
                
                            table.button.small-expanded table {
                                width: 100%;
                            }
                
                            table.button.small-expand table a {
                                text-align: center !important;
                                width: 100% !important;
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                            }
                
                            table.button.small-expanded table a {
                                text-align: center !important;
                                width: 100% !important;
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                            }
                
                            table.button.small-expand center {
                                min-width: 0;
                            }
                
                            table.button.small-expanded center {
                                min-width: 0;
                            }
                
                            table.body .container {
                                width: 100% !important;
                            }
                        }
                
                        @media only screen and (min-width: 732px) {
                            table.body table.milkyway-email-card {
                                width: 525px !important;
                            }
                
                            table.body table.emailer-footer {
                                width: 525px !important;
                            }
                        }
                
                        @media only screen and (max-width: 731px) {
                            table.body table.milkyway-email-card {
                                width: 320px !important;
                            }
                
                            table.body table.emailer-footer {
                                width: 320px !important;
                            }
                        }
                
                        @media only screen and (max-width: 320px) {
                            table.body table.milkyway-email-card {
                                width: 100% !important;
                                border-radius: 0;
                            }
                
                            table.body table.emailer-footer {
                                width: 100% !important;
                                border-radius: 0;
                            }
                        }
                
                        @media only screen and (max-width: 280px) {
                            table.body table.milkyway-email-card .milkyway-content {
                                width: 100% !important;
                            }
                        }
                
                        @media (min-width: 596px) {
                            .milkyway-header {
                                width: 11%;
                            }
                        }
                
                        @media (max-width: 596px) {
                            .milkyway-header {
                                width: 50%;
                            }
                
                            .emailer-footer .emailer-border-bottom {
                                border-bottom: 0.5px solid #E2E5E7;
                            }
                
                            .emailer-footer .make-you-smile {
                                margin-top: 24px;
                            }
                
                            .emailer-footer .make-you-smile .email-tag-line {
                                width: 80%;
                                position: relative;
                                left: 10%;
                            }
                
                            .emailer-footer .make-you-smile .universe-address {
                                margin-bottom: 10px !important;
                            }
                
                            .emailer-footer .make-you-smile .email-tag-line {
                                margin-bottom: 10px !important;
                            }
                
                            .have-questions-text {
                                width: 70%;
                            }
                
                            .hide-on-small {
                                display: none;
                            }
                
                            .product-card-stacked-row .thumbnail-image {
                                max-width: 32% !important;
                            }
                
                            .product-card-stacked-row .thumbnail-content p {
                                width: 64%;
                            }
                
                            .welcome-subcontent {
                                text-align: left;
                                margin: 20px 0 10px;
                            }
                
                            .milkyway-title {
                                padding: 16px;
                            }
                
                            .meta-data {
                                text-align: center;
                            }
                
                            .label {
                                text-align: center;
                            }
                
                            .welcome-email .wavey-background-subcontent {
                                width: calc(100% - 32px);
                            }
                        }
                
                        @media (min-width: 597px) {
                            .emailer-footer .show-on-mobile {
                                display: none;
                            }
                
                            .emailer-footer .emailer-border-bottom {
                                border-bottom: none;
                            }
                
                            .have-questions-text {
                                border-bottom: none;
                            }
                
                            .hide-on-large {
                                display: none;
                            }
                
                            .milkyway-title {
                                padding: 55px 55px 16px;
                            }
                        }
                
                        @media only screen and (max-width: 290px) {
                            table.container.your-tickets .tickets-container {
                                width: 100%;
                            }
                        }
                    </style>
                    
                    <table class="body" data-made-with-foundation=""
                        style="background: #FAFAFA; border-collapse: collapse; border-spacing: 0; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"
                        bgcolor="#FAFAFA">
                        <tbody>
                            <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                <td class="center" align="center" valign="top"
                                    style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word">
                                    <center style="min-width: 580px; width: 100%">
                                        <table class=" spacer  float-center" align="center"
                                            style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                            <tbody>
                                                <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                    <td height="20px"
                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                        align="left" valign="top">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="header-spacer spacer  float-center" align="center"
                                            style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 60px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                            <tbody>
                                                <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                    <td height="16px"
                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                        align="left" valign="top">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                
                                        <table class="header-spacer-bottom spacer  float-center" align="center"
                                            style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 30px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                            <tbody>
                                                <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                    <td height="16px"
                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                        align="left" valign="top">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                
                                        <table class="milkyway-email-card container float-center" align="center"
                                            style="background: #FFFFFF; border-collapse: collapse; border-radius: 6px; border-spacing: 0; box-shadow: 0 1px 8px 0 rgba(28,35,43,0.15); float: none; margin: 0 auto; overflow: hidden; padding: 0; text-align: center; vertical-align: top; width: 580px"
                                            bgcolor="#FFFFFF">
                                            <tbody>
                                                <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                        align="left" valign="top">
                
                                                        <table class="milkyway-content welcome-email container" align="center"
                                                            style="background: #FFFFFF; border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: inherit; vertical-align: top; width: 280px !important"
                                                            bgcolor="#FFFFFF">
                                                            <tbody>
                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                    align="left">
                                                                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                        align="left" valign="top">
                                                                        <table class=" spacer "
                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <td height="50px"
                                                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 50px; font-weight: normal; hyphens: auto; line-height: 50px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                        align="left" valign="top">&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                       
                
                                                                        <table class="milkyway-content row"
                                                                            style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 350px !important">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <th class=" small-12 large-12 columns first last"
                                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                        align="left">
                                                                                        <table
                                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                            <tbody>
                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                    align="left">
                                                                                                    <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                        align="left">
                                                                                                        <h1 class="welcome-header"
                                                                                                            style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 600; hyphens: none; line-height: 30px; margin: 0 0 24px; padding: 0; text-align: left; width: 100%; word-wrap: normal"
                                                                                                            align="left">Willkommen bei Sungate 24!</h1>
                                                                                                        <h2 class="welcome-subcontent"
                                                                                                            style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: center; width: 100%; word-wrap: normal"
                                                                                                            align="left">Ihr Experte für exklusive Reisen zu besten Preisen!</h2>
                                                                                                    </th>
                                                                                                    <th class="expander"
                                                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                        align="left"></th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                
                                                                        <table class=" spacer "
                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <td height="30px"
                                                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                        align="left" valign="top">&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="milkyway-content wrapper" align="center"
                                                                            style="border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: left; vertical-align: top; width: 280px !important">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <td class="wrapper-inner"
                                                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                        align="left" valign="top"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="milkyway-content row"
                                                                            style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <th class="milkyway-padding small-12 large-12 columns first last"
                                                                                        valign="middle"
                                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                        align="left">
                                                                                        <table
                                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                            <tbody>
                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                    align="left">
                                                                                                    <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                        align="left">
                                                                                                        <table
                                                                                                            class="cta-text primary radius expanded button"
                                                                                                            style="border-collapse: collapse; border-spacing: 0; font-size: 14px; font-weight: 400; line-height: 0; margin: 0 0 16px; padding: 0; text-align: left; vertical-align: top; width: 100% !important">
                                                                                                            <tbody>
                                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                    align="left">
                                                                                                                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                        align="left"
                                                                                                                        valign="top">
                                                                                                                        <table
                                                                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                            <tbody>
                                                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                                    align="left">
                                                                                                                                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; background: #00aeff; border: 2px none #4e78f1; border-collapse: collapse !important; border-radius: 6px; color: #FFFFFF; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                                        align="left"
                                                                                                                                        bgcolor="#4E78F1"
                                                                                                                                        valign="top">
                                                                                                                                        <a href="'.$site_adresi.'aktivasyon/'.$user_email.'/'.$active_code.'"
                                                                                                                                            style="border: 0 solid #4e78f1; border-radius: 6px; color: #FFFFFF; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.3; margin: 0; padding: 13px 0; text-align: center; text-decoration: none; width: 100%"
                                                                                                                                            target="_blank">
                                                                                                                                            <p class="text-center"
                                                                                                                                                style="color: white; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; letter-spacing: 1px; line-height: 1.3; margin: 0; padding: 0; text-align: center"
                                                                                                                                                align="center">
                                                                                                                                                Aktivieren!
                                                                                                                                            </p>
                                                                                                                                        </a>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </th>
                                                                                                    <th class="expander"
                                                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                        align="left"></th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                
                
                                                                        <table class=" spacer "
                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <td height="30px"
                                                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                        align="left" valign="top">&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="have-questions-wrapper  container" align="center"
                                                            style="background-color: #F5F5F5 !important; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100% !important"
                                                            bgcolor="#F5F5F5">
                                                            <tbody>
                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                    align="left">
                                                                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                        align="left" valign="top">
                                                                        <table class=" spacer "
                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <td height="24px"
                                                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                        align="left" valign="top">&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                
                                                                        <table class="milkyway-content row"
                                                                            style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <th class=" small-12 large-12 columns first last"
                                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                        align="left">
                                                                                        <table
                                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                            <tbody>
                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                    align="left">
                                                                                                    <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                        align="left">
                                                                                                        <img width="10"
                                                                                                            src="https://www.sungate24.com/lib/img/logo_sticky.png"
                                                                                                            style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 50%; outline: none; text-align: center; text-decoration: none; width: auto">
                                                                                                        <h3 style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 600; line-height: 26px; margin: 10px 10px 10px; padding: 0; text-align: center; word-wrap: normal"
                                                                                                            align="left">Sie haben eine Frage?</h3>
                
                
                
                                                                                                        <p class="help-center"
                                                                                                            style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 15px 0 10px; padding: 0; text-align: center"
                                                                                                            align="left"> <a
                                                                                                                href="https://www.sungate24.com/faq?ref=active_email"
                                                                                                                style="color: #4E78F1; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none"
                                                                                                                target="_blank">Hier finden Sie unsere Liste mit häufig gestellten Fragen.</a>
                                                                                                        </p>
                                                                                                    </th>
                                                                                                    <th class="expander"
                                                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                        align="left"></th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                
                                                                        <table class=" spacer "
                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <td height="24px"
                                                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                        align="left" valign="top">&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                
                
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class=" spacer  float-center" align="center"
                                            style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                            <tbody>
                                                <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                    <td height="20px"
                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                        align="left" valign="top">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="emailer-footer container float-center" align="center"
                                            style="background-color: transparent !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px"
                                            bgcolor="transparent">
                                            <tbody>
                                                <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                        align="left" valign="top">
                                                        <table class=" row"
                                                            style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%">
                                                            <tbody>
                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                    align="left">
                                                                    <th class=" small-12 large-4 columns first"
                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px 16px; text-align: left; width: 177.3333333333px"
                                                                        align="left">
                                                                        <table
                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                            <tbody>
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                    align="left">
                                                                                    <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                        align="left">
                                                                                    </th>
                                                                                    <th class="emailer-border-bottom small-12 large-11 columns first"
                                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%"
                                                                                        align="left">
                                                                                        <table
                                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                            <tbody>
                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                    align="left">
                                                                                                    <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                        align="left">
                
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                    <th class="show-for-large small-12 large-1 columns last"
                                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%"
                                                                                        align="left">
                                                                                        <table
                                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                            <tbody>
                
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        </th>
                                                    <th class=" small-12 large-4 columns"
                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px; text-align: left; width: 177.3333333333px"
                                                        align="left">
                                                        <table
                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                            <tbody>
                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                    align="left">
                                                                    <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                        align="left">
                                                                    </th>
                                                                    <th class="emailer-border-bottom small-12 large-11 columns first"
                                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%"
                                                                        align="left">
                                                                        <table
                                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                
                                                                            </p>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </th>
                                                    <th class="show-for-large small-12 large-1 columns last"
                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%"
                                                        align="left">
                                                        <table
                                                            style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                            <tbody>
                                                                <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                    align="left">
                                                                    <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                        align="left">
                
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </th>
                
                
                 
                                        <p class="help-email-address text-center"
                                            style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center"
                                            align="center">
                                            <span class="text-divider" style="margin-left: 10px; margin-right: 10px">
                                                ©
                                                '.date('Y').'
                                                <a href="https://www.sungate24.com/?ref=active_email"
                                                    style="color: #4E78F1; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none"
                                                    target="_blank">
                                                    sungate24.com
                                        </p>
                                        </th>
                                <th class="expander"
                                    style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                    align="left"></th>
                            </tr>
                        </tbody>
                    </table>
                    </th>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                
                    </center>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                
                
                </body>
                
                </html>
            ');
        if(!$mail->Send()) {
            echo 'Bir hata meydana geldi, sorun devam ederse müşteri temsilcimiz ile iletişime geçmekten çekinmeyin1.';
            exit;
        } else {
            echo 'Bilgiler kaydedildi, Ödemenizi yapabilirsiniz.';
            $_POST = array();
        }
    }
    catch (Exception $e) {
        echo 'Bir hata meydana geldi ve formu gönderemedik, lütfen sorun devam ederse bizimle telefon üzerinden iletişime geçiniz.';
        exit;
    }
}

if ($do == 'hotel'){
    if($_POST){

        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $hotel_category_id = p('hotel_category_id');
            $accommodation_type_id = p('accommodation_type_id');
            $hotel_type_id = p('hotel_type_id');
            $hotel_theme_id = p('hotel_theme_id');
            $province = p('province');
            $state = p('state');
            $district = p('district');
            $neighborhood = p('neighborhood');
            $address = p('address');
            $location_latitude = p('location_latitude');
            $location_longitude = p('location_longitude');
            $status = p('status');
            $stars = p('stars');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $rand;
                        if ($upload->image_src_x > 900 || $upload->image_src_x < 900 || $upload->image_src_y > 600 || $upload->image_src_y < 600){
                            $upload->image_resize = true;
                            $upload->image_y = 600;
                            $upload->image_x = 900;
                        }
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/hotel/");
                        if ($upload->processed){
                            $picture = $rand.'.'.$upload->image_src_type;
                        }
                    }
                }

                $insert = $db->query("INSERT INTO the_hotel SET
                        hotel_category_id = '$hotel_category_id',
                        accommodation_type_id = '$accommodation_type_id',
                        hotel_type_id = '$hotel_type_id',
                        hotel_theme_id = '$hotel_theme_id',
                        name = '$name',
                        stars = '$stars',
                        slug = '$slug',
                        picture = '$picture',
                        province = '$province',
                        state = '$state',
                        district = '$district',
                        neighborhood = '$neighborhood',
                        content = '$content',
                        location_latitude = '$location_latitude',
                        location_longitude = '$location_longitude',
                        address = '$address', 
                        created_at = now(), created_user = '$userID', status = '$status'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $hotel_id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = $hotel_id");
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $hotel_category_id = p('hotel_category_id');
            $accommodation_type_id = p('accommodation_type_id');
            $hotel_type_id = p('hotel_type_id');
            $hotel_theme_id = p('hotel_theme_id');
            $province = p('province');
            $state = p('state');
            $district = p('district');
            $neighborhood = p('neighborhood');
            $address = p('address');
            $location_latitude = p('location_latitude');
            $location_longitude = p('location_longitude');
            $status = p('status');
            $stars = p('stars');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $slug.'_'.$rand;
                        if ($upload->image_src_x > 900 || $upload->image_src_x < 900 || $upload->image_src_y > 600 || $upload->image_src_y < 600){
                            $upload->image_resize = true;
                            $upload->image_y = 600;
                            $upload->image_x = 900;
                        }
                        $upload->image_convert = jpg;
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/hotel/");
                        if ($upload->processed){
                            $picture = $slug.'_'.$rand.'.jpg';
                            unlink("../../data/hotel/".$view->picture);
                        }
                    }
                }else{
                    $picture = $view->picture;
                }

                $insert = $db->query("UPDATE the_hotel SET
                        hotel_category_id = '$hotel_category_id',
                        accommodation_type_id = '$accommodation_type_id',
                        hotel_type_id = '$hotel_type_id',
                        hotel_theme_id = '$hotel_theme_id',
                        name = '$name',
                        stars = '$stars',
                        slug = '$slug',
                        picture = '$picture',
                        province = '$province',
                        state = '$state',
                        district = '$district',
                        neighborhood = '$neighborhood',
                        content = '$content',
                        location_latitude = '$location_latitude',
                        location_longitude = '$location_longitude',
                        address = '$address', 
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status' 
                        WHERE hotel_id = '$hotel_id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel  WHERE hotel_id = '$ID'");
            if ($delete){
                unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        if($q == 'pic-add'){
            $hotel_id = g('id');
            $status = p('status');
            $view = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$hotel_id'");
            $min_width= 300;
            $min_height= 300;
            $max_width= 900;
            $max_height= 700;

            if(!empty($_FILES['pictures']['name'])){
                $toplam = count($_FILES['pictures']['name']);
                for ($i=0; $i < $toplam; $i++) {
                    $resimler_y[$i]['name'] = $_FILES['pictures']['name'][$i];
                    $resimler_y[$i]['type'] = $_FILES['pictures']['type'][$i];
                    $resimler_y[$i]['tmp_name'] = $_FILES['pictures']['tmp_name'][$i];
                    $resimler_y[$i]['error'] = $_FILES['pictures']['error'][$i];
                    $resimler_y[$i]['size'] = $_FILES['pictures']['size'][$i];
                }
                for($i=0; $i<$toplam; $i++){
                    $upload = new Upload($resimler_y[$i]);
                    if ($upload->uploaded)
                    {
                        $rand = uniqid(true);
                        $upload->image_convert = jpg;
                        $upload->file_new_name_body =  $view->slug.'_'.'min_'.$rand;
                        if ($upload->image_src_x > $min_width || $upload->image_src_x < $min_width || $upload->image_src_y > $min_height || $upload->image_src_y < $min_height){
                            $upload->image_resize = true;
                            $upload->image_ratio_crop = true;
                            $upload->image_x = $min_width;
                            $upload->image_y = $min_height;
                        }
                        $upload->Process('../../data/hotel/pictures/');
                        if ($upload->processed) {
                            $kucukresim = $view->slug.'_'.'min_'.$rand.'.'.'jpg';
                        }

                        $upload->file_new_name_body = $view->slug.'_'.$rand;
                        if ($upload->image_src_x > $max_width){
                            $upload->image_resize = true;
                            $upload->image_ratio_y = true;
                            $upload->image_x = $max_width;
                        }
                        /*
                        if($watermark_durum){
                            $upload->image_watermark_position = 'C';
                            $upload->image_watermark = '../'.$watermark_logo;
                        }
                        */
                        $upload->allowed = array('image/*');
                        $upload->image_convert = jpg;
                        $upload->Process('../../data/hotel/pictures/');
                        if ($upload->processed)
                        {
                            $resim = $view->slug.'_'.$rand.'.'.'jpg';
                            $name = $view->name;
                            $slug = $view->slug;

                            $insert = $db->query("INSERT INTO the_hotel_picture SET
                                hotel_id = '$hotel_id',
                                big_picture = '$resim',
                                mini_picture = '$kucukresim',
                                name = '$name',
                                slug = '$slug',
                                rank = '$i',
                                created_at = now(), 
                                created_user = '$userID', 
                                status = '$status'");
                            if(!$insert){
                                $dizi["hata"] = '654Bir hata meydana geldi.'.$db->debug();
                            }
                        }
                    }
                }
                $dizi["ok"] =  'Bilder hinzugefügt, sie werden weitergeleitet.';
            }
        }
        if($q == 'pic-content'){
            $picID = p('id');
            $aciklama = p('content');
            $update = $db->query("UPDATE the_hotel_picture SET content = '$aciklama' WHERE picture_id = '$picID'");
            if ($update){
                $dizi["ok"] = 'Erläuterung aktualisiert.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        if($q == 'pic-rank'){
            $picID = p('id');
            $sira = p('rank');
            $update = $db->query("UPDATE the_hotel_picture SET rank = '$sira' WHERE picture_id = '$picID'");
            if ($update){
                $dizi["ok"] = 'Platzierung aktualisiert.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        if($q == 'pic-delete'){
            $picID = g('id');
            $bul = $db->get_row("SELECT * FROM the_hotel_picture WHERE picture_id = '$picID'");
            if($bul){
                unlink('../../data/hotel/pictures/'.$bul->mini_picture);
                unlink('../../data/hotel/pictures/'.$bul->big_picture);
                $sil = $db->query("DELETE FROM the_hotel_picture  WHERE picture_id = '$picID'");
                if ($sil){
                    $dizi["ok"] = 'Resim temizlendi.';
                }else{
                    $dizi["hata"] = 'Bir hata meydana geldi.';
                    //$dizi['Ein Fehler ist aufgetretten;
                    ////$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }

        echo json_encode($dizi);
    }
}



if ($do == 'hotel_comment'){
    if($_POST){

        if($q == 'user_add'){
            $userID = '1';
            $name = p('name_review');
            $email = p('email_review');
            $content = p('content');
            $rating_review = p('rating_review');
            $hotel_id = p('hotel_id');
            $hotel_category_id = p('hotel_category_id'); 

            if(!$name || !$email || !$content || !$rating_review){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
 
                $insert = $db->query("INSERT INTO the_hotel_comment SET
                        hotel_id = '$hotel_id',
                        user_id = '$userID',
                        rating_review = '$rating_review',
                        name = '$name',
                        email = '$email',
                        content = '$content',
                        created_at = now(), created_user = '$userID', status = '0'");

                if($insert){
                    $dizi["ok"] = 'Ihr Kommentar wurde erfolgreich gespeichert und wird veröffentlicht, nachdem Sie ihn genehmigt haben. Vielen Dank für deine Zeit.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }

         if($q == 'comment-status'){
            $ID = p('id');
            $durum = p('durum');
            $update = $db->query("UPDATE the_hotel_comment SET status = '$durum' WHERE id = '$ID'");
            if ($update){
                $dizi["ok"] = 'Durum güncellendi.';
            }else{
                $dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }


        if($q == 'comment-change'){
            $picID = p('id');
            $aciklama = p('content');
            $update = $db->query("UPDATE the_hotel_comment SET content = '$aciklama' WHERE id = '$picID'");
            if ($update){
                $dizi["ok"] = 'Erläuterung aktualisiert.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
         
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel_comment WHERE id = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel_comment  WHERE id = '$ID'");
            if ($delete){
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        } 

        echo json_encode($dizi);
    }
}

if ($do == 'tour'){
    if($_POST){

        if($q == 'add'){
            $hotel_id = p('hotel_id');
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $tour_category_id = p('tour_category_id');
            $province = p('province');
            $state = p('state');
            $district = p('district');
            $neighborhood = p('neighborhood');
            $address = p('address');
            $location_latitude = p('location_latitude');
            $location_longitude = p('location_longitude');
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $rand;
                        if ($upload->image_src_x > 880 || $upload->image_src_x < 880 || $upload->image_src_y > 533 || $upload->image_src_y < 533){
                            $upload->image_resize = true;
                            $upload->image_y = 533;
                            $upload->image_x = 880;
                        }
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/tour/");
                        if ($upload->processed){
                            $picture = $rand.'.'.$upload->image_src_type;
                        }
                    }
                }

                $insert = $db->query("INSERT INTO the_tour SET
                        tour_category_id = '$tour_category_id',
                        hotel_id = '$hotel_id',
                        name = '$name',
                        slug = '$slug',
                        picture = '$picture',
                        province = '$province',
                        state = '$state',
                        district = '$district',
                        neighborhood = '$neighborhood',
                        content = '$content',
                        location_latitude = '$location_latitude',
                        location_longitude = '$location_longitude',
                        address = '$address', 
                        created_at = now(), created_user = '$userID', status = '$status'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $tour_id = g('id');
            $view = $db->get_row("SELECT * FROM the_tour WHERE tour_id = $tour_id");
            $hotel_id = p('hotel_id');
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $tour_category_id = p('tour_category_id');
            $province = p('province');
            $state = p('state');
            $district = p('district');
            $neighborhood = p('neighborhood');
            $address = p('address');
            $location_latitude = p('location_latitude');
            $location_longitude = p('location_longitude');
            $status = p('status');
            $stars = p('stars');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $slug.'_'.$rand;
                        if ($upload->image_src_x > 880 || $upload->image_src_x < 880 || $upload->image_src_y > 533 || $upload->image_src_y < 533){
                            $upload->image_resize = true;
                            $upload->image_y = 533;
                            $upload->image_x = 880;
                        }
                        $upload->image_convert = jpg;
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/tour/");
                        if ($upload->processed){
                            $picture = $slug.'_'.$rand.'.jpg';
                            unlink("../../data/tour/".$view->picture);
                        }
                    }
                }else{
                    $picture = $view->picture;
                }

                $insert = $db->query("UPDATE the_tour SET
                        tour_category_id = '$tour_category_id',
                        hotel_id = '$hotel_id',
                        name = '$name',
                        slug = '$slug',
                        picture = '$picture',
                        province = '$province',
                        state = '$state',
                        district = '$district',
                        neighborhood = '$neighborhood',
                        content = '$content',
                        location_latitude = '$location_latitude',
                        location_longitude = '$location_longitude',
                        address = '$address', 
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status' 
                        WHERE tour_id = '$tour_id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$ID'");
            $delete = $db->query("DELETE FROM the_tour  WHERE tour_id = '$ID'");
            if ($delete){
                unlink("../../data/tour/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        if($q == 'date-add'){
            $tour_id = p('tour_id');
            $description = p('description');
            $person_price = p('person_price');
            $child_price = p('child_price');
            $tour_limit = p('tour_limit');
            $price_tour = p('price_tour');
            $price_discount = p('price_discount');
            $tour_start_date = p('tour_start_date');
            $tour_finish_date = p('tour_finish_date');
            $status = p('status');

            if(!$tour_id){
                $dizi['hata'] = 'Lütfen bir tur belirtiniz.';
            }else{

                $insert = $db->query("INSERT INTO the_tour_date SET
                        tour_id = '$tour_id',
                        description = '$description',
                        tour_start_date = '$tour_start_date',
                        tour_finish_date = '$tour_finish_date', 
                        tour_limit = '$tour_limit',
                        price_tour = '$price_tour',
                        person_price = '$person_price',
                        child_price = '$child_price',
                        price_discount = '$price_discount',
                        created_at = now(), created_user = '$userID', status = '$status'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'date-edit'){
            $date_id = g('id');
            $tour_id = p('tour_id');
            $description = p('description');
            $person_price = p('person_price');
            $child_price = p('child_price');
            $tour_limit = p('tour_limit');
            $price_tour = p('price_tour');
            $price_discount = p('price_discount');
            $tour_start_date = p('tour_start_date');
            $tour_finish_date = p('tour_finish_date');
            $status = p('status');

            if(!$tour_id){
                $dizi['hata'] = 'Lütfen bir tur belirtiniz.';
            }else{

                $insert = $db->query("UPDATE the_tour_date SET
                        tour_id = '$tour_id',
                        description = '$description',
                        tour_start_date = '$tour_start_date',
                        tour_finish_date = '$tour_finish_date', 
                        tour_limit = '$tour_limit',
                        price_tour = '$price_tour',
                        person_price = '$person_price',
                        child_price = '$child_price',
                        price_discount = '$price_discount',
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status' WHERE date_id = '$date_id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'pic-add'){
            $tour_id = g('id');
            $status = p('status');
            $view = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id'");
            $min_width= 300;
            $min_height= 300;
            $max_width= 900;
            $max_height= 700;

            if(!empty($_FILES['pictures']['name'])){
                $toplam = count($_FILES['pictures']['name']);
                for ($i=0; $i < $toplam; $i++) {
                    $resimler_y[$i]['name'] = $_FILES['pictures']['name'][$i];
                    $resimler_y[$i]['type'] = $_FILES['pictures']['type'][$i];
                    $resimler_y[$i]['tmp_name'] = $_FILES['pictures']['tmp_name'][$i];
                    $resimler_y[$i]['error'] = $_FILES['pictures']['error'][$i];
                    $resimler_y[$i]['size'] = $_FILES['pictures']['size'][$i];
                }
                for($i=0; $i<$toplam; $i++){
                    $upload = new Upload($resimler_y[$i]);
                    if ($upload->uploaded)
                    {
                        $rand = uniqid(true);
                        $upload->image_convert = jpg;
                        $upload->file_new_name_body =  $view->slug.'_'.'min_'.$rand;
                        if ($upload->image_src_x > $min_width || $upload->image_src_x < $min_width || $upload->image_src_y > $min_height || $upload->image_src_y < $min_height){
                            $upload->image_resize = true;
                            $upload->image_ratio_crop = true;
                            $upload->image_x = $min_width;
                            $upload->image_y = $min_height;
                        }
                        $upload->Process('../../data/tour/pictures/');
                        if ($upload->processed) {
                            $kucukresim = $view->slug.'_'.'min_'.$rand.'.'.'jpg';
                        }

                        $upload->file_new_name_body = $view->slug.'_'.$rand;
                        if ($upload->image_src_x > $max_width){
                            $upload->image_resize = true;
                            $upload->image_ratio_y = true;
                            $upload->image_x = $max_width;
                        }
                        /*
                        if($watermark_durum){
                            $upload->image_watermark_position = 'C';
                            $upload->image_watermark = '../'.$watermark_logo;
                        }
                        */
                        $upload->allowed = array('image/*');
                        $upload->image_convert = jpg;
                        $upload->Process('../../data/tour/pictures/');
                        if ($upload->processed)
                        {
                            $resim = $view->slug.'_'.$rand.'.'.'jpg';
                            $name = $view->name;
                            $slug = $view->slug;

                            $insert = $db->query("INSERT INTO the_tour_picture SET
                                tour_id = '$tour_id',
                                big_picture = '$resim',
                                mini_picture = '$kucukresim',
                                name = '$name',
                                slug = '$slug',
                                rank = '$i',
                                created_at = now(), 
                                created_user = '$userID', 
                                status = '$status'");
                            if(!$insert){
                                $dizi["hata"] = '654Bir hata meydana geldi.'.$db->debug();
                            }
                        }
                    }
                }
                $dizi["ok"] =  'Bilder hinzugefügt, sie werden weitergeleitet.';
            }
        }
        if($q == 'pic-content'){
            $picID = p('id');
            $aciklama = p('content');
            $update = $db->query("UPDATE the_tour_picture SET content = '$aciklama' WHERE picture_id = '$picID'");
            if ($update){
                $dizi["ok"] = 'Erläuterung aktualisiert.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        if($q == 'pic-rank'){
            $picID = p('id');
            $sira = p('rank');
            $update = $db->query("UPDATE the_tour_picture SET rank = '$sira' WHERE picture_id = '$picID'");
            if ($update){
                $dizi["ok"] = 'Platzierung aktualisiert.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        if($q == 'pic-delete'){
            $picID = g('id');
            $bul = $db->get_row("SELECT * FROM the_tour_picture WHERE picture_id = '$picID'");
            if($bul){
                unlink('../../data/tour/pictures/'.$bul->mini_picture);
                unlink('../../data/tour/pictures/'.$bul->big_picture);
                $sil = $db->query("DELETE FROM the_tour_picture  WHERE picture_id = '$picID'");
                if ($sil){
                    $dizi["ok"] = 'Resim temizlendi.';
                }else{
                    $dizi["hata"] = 'Bir hata meydana geldi.';
                    //$dizi['Ein Fehler ist aufgetretten;
                    ////$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }

        echo json_encode($dizi);
    }
}
if ($do == 'tour-categories'){
    if($_POST){

        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO the_tour_category SET
                        name = '$name',
                        slug = '$slug',
                        created_at = now(), 
                        created_user = '$userID', 
                        status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM the_tour_category WHERE category_id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE the_tour_category SET
                        name = '$name',
                        slug = '$slug',
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status'
                        WHERE category_id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_tour_category WHERE category_id = '$ID'");
            $delete = $db->query("DELETE FROM the_tour_category  WHERE category_id = '$ID'");
            if ($delete){
                //unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }


        echo json_encode($dizi);
    }
}
if ($do == 'hotel-features-group'){
    if($_POST){

        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $description= p('description');
            $rank = p('rank');
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO the_hotel_room_features_group SET
                        name = '$name',
                        slug = '$slug',
                        description = '$description',
                        rank = '$rank', 
                        created_at = now(), created_user = '$userID', status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel_room_features_group WHERE features_gid = $id");
            $name = p('name');
            $slug = sef_link($name);
            $description= p('description');
            $rank = p('rank');
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE the_hotel_room_features_group SET
                        name = '$name',
                        slug = '$slug',
                        description = '$description',
                        rank = '$rank', 
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status'
                        WHERE features_gid = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel_room_features_group WHERE features_gid = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel_room_features_group  WHERE features_gid = '$ID'");
            if ($delete){
                //unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }


        echo json_encode($dizi);
    }
}
if ($do == 'hotel-features'){
    if($_POST){

        if($q == 'add'){
            $feature_group_id = p('feature_group_id');
            $name = p('name');
            $slug = sef_link($name);
            $description= p('description');
            $rank = p('rank');
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO the_hotel_room_features SET
                        feature_group_id = '$feature_group_id',
                        name = '$name',
                        slug = '$slug',
                        rank = '$rank', 
                        created_at = now(), created_user = '$userID', status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel_room_features WHERE features_id = $id");
            $name = p('name');
            $feature_group_id = p('feature_group_id');
            $slug = sef_link($name);
            $description= p('description');
            $rank = p('rank');
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE the_hotel_room_features SET
                        feature_group_id = '$feature_group_id',
                        name = '$name',
                        slug = '$slug',
                        rank = '$rank', 
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status'
                        WHERE features_id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel_room_features WHERE features_id = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel_room_features  WHERE features_id = '$ID'");
            if ($delete){
                //unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }


        echo json_encode($dizi);
    }
}
if ($do == 'hotel-categories'){
    if($_POST){

        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO the_hotel_category SET
                        name = '$name',
                        slug = '$slug',
                        created_at = now(), 
                        created_user = '$userID', 
                        status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel_category WHERE category_id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE the_hotel_category SET
                        name = '$name',
                        slug = '$slug',
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status'
                        WHERE category_id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel_category WHERE category_id = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel_category  WHERE category_id = '$ID'");
            if ($delete){
                //unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }


        echo json_encode($dizi);
    }
}
if ($do == 'hotel-accommodations'){
    if($_POST){

        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO the_hotel_accommodation SET
                        name = '$name',
                        slug = '$slug',
                        created_at = now(), 
                        created_user = '$userID', 
                        status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel_accommodation WHERE accommodation_id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE the_hotel_accommodation SET
                        name = '$name',
                        slug = '$slug',
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status'
                        WHERE accommodation_id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel_accommodation WHERE accommodation_id = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel_accommodation  WHERE accommodation_id = '$ID'");
            if ($delete){
                //unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }


        echo json_encode($dizi);
    }
}
if ($do == 'hotel-themes'){
    if($_POST){

        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO the_hotel_theme SET
                        name = '$name',
                        slug = '$slug',
                        created_at = now(), 
                        created_user = '$userID', 
                        status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel_theme WHERE theme_id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE the_hotel_theme SET
                        name = '$name',
                        slug = '$slug',
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status'
                        WHERE theme_id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel_theme WHERE theme_id = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel_theme  WHERE theme_id = '$ID'");
            if ($delete){
                //unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }


        echo json_encode($dizi);
    }
}
if ($do == 'hotel-types'){
    if($_POST){

        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO the_hotel_type SET
                        name = '$name',
                        slug = '$slug',
                        created_at = now(), created_user = '$userID', status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel_type WHERE type_id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE the_hotel_type SET
                        name = '$name',
                        slug = '$slug',
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status'
                        WHERE type_id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel_type WHERE type_id = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel_type  WHERE type_id = '$ID'");
            if ($delete){
                //unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }


        echo json_encode($dizi);
    }
}
if ($do == 'hotel-room'){
    if($_POST){
        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $hotel_id = p('hotel_id');
            $room_size = p('room_size');
            $beds_number = p('beds_number');
            $person_price = p('person_price');
            $child_price = p('child_price');
            $status = p('status');
            $stars = p('stars');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $rand;
                        if ($upload->image_src_x > 900 || $upload->image_src_x < 900 || $upload->image_src_y > 600 || $upload->image_src_y < 600){
                            $upload->image_resize = true;
                            $upload->image_y = 600;
                            $upload->image_x = 900;
                        }
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/hotel/room/");
                        if ($upload->processed){
                            $picture = $rand.'.'.$upload->image_src_type;
                        }
                    }
                }

                $insert = $db->query("INSERT INTO the_hotel_room SET
                            hotel_id = '$hotel_id',
                            name = '$name',
                            slug = '$slug',
                            content = '$content',
                            picture = '$picture',
                            person_price = '$person_price',
                            child_price = '$child_price',
                            room_size = '$room_size',
                            beds_number = '$beds_number',
                            created_at = now(), created_user = '$userID', status = '$status'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $room_id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel_room WHERE room_id = '$room_id'");

            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $hotel_id = p('hotel_id');
            $room_size = p('room_size');
            $beds_number = p('beds_number');
            $person_price = p('person_price');
            $child_price = p('child_price');
            $status = p('status');
            $stars = p('stars');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $slug.'_'.$rand;
                        if ($upload->image_src_x > 900 || $upload->image_src_x < 900 || $upload->image_src_y > 600 || $upload->image_src_y < 600){
                            $upload->image_resize = true;
                            $upload->image_y = 600;
                            $upload->image_x = 900;
                        }
                        $upload->image_convert = jpg;
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/hotel/room/");
                        if ($upload->processed){
                            $picture = $slug.'_'.$rand.'.jpg';
                            unlink("../../data/hotel/room/".$view->picture);
                        }
                    }
                }else{
                    $picture = $view->picture;
                }

                $insert = $db->query("UPDATE the_hotel_room SET
                            hotel_id = '$hotel_id',
                            name = '$name',
                            slug = '$slug',
                            content = '$content',
                            picture = '$picture',
                            person_price = '$person_price',
                            child_price = '$child_price',
                            room_size = '$room_size',
                            beds_number = '$beds_number',
                            updated_at = now(), 
                            updated_user = '$userID', 
                            status = '$status' 
                            WHERE room_id = '$room_id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_hotel_room WHERE room_id = '$ID'");
            $delete = $db->query("DELETE FROM the_hotel_room  WHERE room_id = '$ID'");

            if ($delete){
                unlink("../../data/hotel/room/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        if($q == 'features-add'){

            $room_id = g('id');
            $view = $db->get_row("SELECT * FROM the_hotel_room WHERE room_id = '$room_id'");
            $name = p('name');
            $ozellik_liste = $_POST['features'];

            if(!$room_id AND !$name){
                $dizi['hata'] = 'Lütfen önce bir oda belirleyiniz.';
            }else{

                foreach ($ozellik_liste as $ozellik_id => $deger) {
                    if ($deger){
                        $info = $db->query("INSERT INTO the_hotel_room_features_relationship SET
                                hotel_id = '$view->hotel_id',
                                room_id = '$room_id',
                                features_id = '$ozellik_id'");
                        if($info){
                            $dizi["ok"] = 'Erfolgreich aktualisiert.';
                        }else{
                            $dizi["hata"] = 'Bir hata meydana geldi.111'.$db->debug();
                        }
                    }else{
                        $info = $db->query("DELETE FROM the_hotel_room_features_relationship WHERE room_id = '$room_id' AND features_id = '$ozellik_id'");
                        if($info){
                            $dizi["ok"] = 'Erfolgreich aktualisiert.';
                        }else{
                            $dizi["ok"] = 'Erfolgreich aktualisiert.';
                        }
                    }
                }

            }
        }

        echo json_encode($dizi);
    }
}
if ($do == 'province'){
    if($_POST){

        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO il SET
                        il_adi = '$name',
                        slug = '$slug',
                        created_at = now(), 
                        created_user = '$userID', 
                        status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM il WHERE id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE il SET
                        il_adi = '$name',
                        slug = '$slug',
                        updated_at = now(), 
                        updated_user = '$userID', 
                        status = '$status'
                        WHERE id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM il WHERE id = '$ID'");
            $delete = $db->query("DELETE FROM il  WHERE id = '$ID'");
            if ($delete){
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }

        echo json_encode($dizi);
    }
}
if ($do == 'state'){
    if($_POST){

        if($q == 'add'){
            $il_id = p('il_id');
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO ilce SET
                            il_id = '$il_id',
                            ilce_adi = '$name',
                            slug = '$slug',
                            created_at = now(), 
                            created_user = '$userID', 
                            status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $il_id = p('il_id');
            $id = g('id');
            $view = $db->get_row("SELECT * FROM ilce WHERE id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name || !$il_id){
                $dizi['hata'] = 'Lütfen bir başlık ve il seçiniz.';
            }else{
                $insert = $db->query("UPDATE ilce SET
                            il_id = '$il_id',
                            ilce_adi = '$name',
                            slug = '$slug',
                            updated_at = now(), 
                            updated_user = '$userID', 
                            status = '$status'
                            WHERE id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM ilce WHERE id = '$ID'");
            $delete = $db->query("DELETE FROM ilce  WHERE id = '$ID'");
            if ($delete){
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }

        echo json_encode($dizi);
    }
}
if ($do == 'district'){
    if($_POST){
        if($q == 'add'){
            $il_id = p('il_id');
            $ilce_id = p('ilce_id');
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name || !$il_id || !$ilce_id){
                $dizi['hata'] = 'Lütfen bir başlık, il ve ilçe seçiniz.';
            }else{
                $insert = $db->query("INSERT INTO semt SET
                                il_id = '$il_id',
                                ilce_id = '$ilce_id',
                                semt_adi = '$name',
                                slug = '$slug',
                                created_at = now(), 
                                created_user = '$userID', 
                                status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $il_id = p('il_id');
            $ilce_id = p('ilce_id');
            $id = g('id');
            $view = $db->get_row("SELECT * FROM semt WHERE id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name || !$il_id || !$ilce_id){
                $dizi['hata'] = 'Lütfen bir başlık, il ve ilçe seçiniz.';
            }else{
                $insert = $db->query("UPDATE semt SET
                                il_id = '$il_id',
                                ilce_id = '$ilce_id',
                                semt_adi = '$name',
                                slug = '$slug',
                                updated_at = now(), 
                                updated_user = '$userID', 
                                status = '$status'
                                WHERE id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM semt WHERE id = '$ID'");
            $delete = $db->query("DELETE FROM semt  WHERE id = '$ID'");
            if ($delete){
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        echo json_encode($dizi);
    }
}
if ($do == 'neighborhood'){
    if($_POST){
        if($q == 'add'){
            $il_id = p('il_id');
            $ilce_id = p('ilce_id');
            $semt_id = p('semt_id');
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name || !$il_id || !$ilce_id){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel, Ort, Landkreis, Gegend';
            }else{
                $insert = $db->query("INSERT INTO mahalle SET
                                il_id = '$il_id',
                                ilce_id = '$ilce_id',
                                semt_id = '$semt_id',
                                mahalle_adi = '$name',
                                slug = '$slug',
                                created_at = now(), 
                                created_user = '$userID', 
                                status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $il_id = p('il_id');
            $ilce_id = p('ilce_id');
            $semt_id = p('semt_id');
            $id = g('id');
            $view = $db->get_row("SELECT * FROM mahalle WHERE id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name || !$il_id || !$ilce_id || !$semt_id){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel, Ort, Landkreis, Gegend';
            }else{
                $insert = $db->query("UPDATE mahalle SET
                                il_id = '$il_id',
                                ilce_id = '$ilce_id',
                                semt_id = '$semt_id',
                                mahalle_adi = '$name',
                                slug = '$slug',
                                updated_at = now(), 
                                updated_user = '$userID', 
                                status = '$status'
                                WHERE id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM mahalle WHERE id = '$ID'");
            $delete = $db->query("DELETE FROM mahalle  WHERE id = '$ID'");
            if ($delete){
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        echo json_encode($dizi);
    }
}
if ($do == 'page'){
    if($_POST){
        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $rand;
                        if ($upload->image_src_x > 900 || $upload->image_src_x < 900 || $upload->image_src_y > 600 || $upload->image_src_y < 600){
                            $upload->image_resize = true;
                            $upload->image_y = 600;
                            $upload->image_x = 900;
                        }
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/page/");
                        if ($upload->processed){
                            $picture = $rand.'.'.$upload->image_src_type;
                        }
                    }
                }

                $insert = $db->query("INSERT INTO the_page SET
                            name = '$name',
                            slug = '$slug',
                            picture = '$picture',
                            content = '$content', 
                            created_at = now(), created_user = '$userID', status = '$status'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $page_id = g('id');
            $view = $db->get_row("SELECT * FROM the_page WHERE page_id = $page_id");
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $status = p('status');
            $stars = p('stars');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $slug.'_'.$rand;
                        if ($upload->image_src_x > 900 || $upload->image_src_x < 900 || $upload->image_src_y > 600 || $upload->image_src_y < 600){
                            $upload->image_resize = true;
                            $upload->image_y = 600;
                            $upload->image_x = 900;
                        }
                        $upload->image_convert = jpg;
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/page/");
                        if ($upload->processed){
                            $picture = $slug.'_'.$rand.'.jpg';
                            unlink("../../data/page/".$view->picture);
                        }
                    }
                }else{
                    $picture = $view->picture;
                }

                $insert = $db->query("UPDATE the_page SET
                            name = '$name',
                            slug = '$slug',
                            picture = '$picture',
                            content = '$content', 
                            updated_at = now(), 
                            updated_user = '$userID', 
                            status = '$status' 
                            WHERE page_id = '$page_id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_page WHERE page_id = '$ID'");
            $delete = $db->query("DELETE FROM the_page  WHERE page_id = '$ID'");
            if ($delete){
                unlink("../../data/page/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        echo json_encode($dizi);
    }
}
if ($do == 'blog'){
    if($_POST){
        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $blog_category_id = p('blog_category_id');
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $rand;
                        if ($upload->image_src_x > 900 || $upload->image_src_x < 900 || $upload->image_src_y > 600 || $upload->image_src_y < 600){
                            $upload->image_resize = true;
                            $upload->image_y = 600;
                            $upload->image_x = 900;
                        }
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/blog/");
                        if ($upload->processed){
                            $picture = $rand.'.'.$upload->image_src_type;
                        }
                    }
                }

                $insert = $db->query("INSERT INTO the_blog SET
                                blog_category_id = '$blog_category_id',
                                name = '$name',
                                slug = '$slug',
                                picture = '$picture',
                                content = '$content', 
                                created_at = now(), created_user = '$userID', status = '$status'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $blog_id = g('id');
            $view = $db->get_row("SELECT * FROM the_blog WHERE blog_id = $blog_id");
            $name = p('name');
            $slug = sef_link($name);
            $content = p('content');
            $blog_category_id = p('blog_category_id');
            $status = p('status');
            $stars = p('stars');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                if(!empty($_FILES["picture"]["name"])){
                    $upload = new Upload($_FILES["picture"]);
                    if ($upload->uploaded){
                        $rand = uniqid(true);
                        $upload->file_new_name_body = $slug.'_'.$rand;
                        if ($upload->image_src_x > 900 || $upload->image_src_x < 900 || $upload->image_src_y > 600 || $upload->image_src_y < 600){
                            $upload->image_resize = true;
                            $upload->image_y = 600;
                            $upload->image_x = 900;
                        }
                        $upload->image_convert = jpg;
                        $upload->allowed = array('image/*');
                        $upload->Process("../../data/blog/");
                        if ($upload->processed){
                            $picture = $slug.'_'.$rand.'.jpg';
                            unlink("../../data/blog/".$view->picture);
                        }
                    }
                }else{
                    $picture = $view->picture;
                }

                $insert = $db->query("UPDATE the_blog SET
                                blog_category_id = '$blog_category_id',
                                name = '$name',
                                slug = '$slug',
                                picture = '$picture',
                                content = '$content', 
                                updated_at = now(), 
                                updated_user = '$userID', 
                                status = '$status' 
                                WHERE blog_id = '$blog_id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_blog WHERE blog_id = '$ID'");
            $delete = $db->query("DELETE FROM the_blog  WHERE blog_id = '$ID'");
            if ($delete){
                unlink("../../data/blog/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        echo json_encode($dizi);
    }
}
if ($do == 'blog-categories'){
    if($_POST){
        if($q == 'add'){
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("INSERT INTO the_blog_category SET
                            name = '$name',
                            slug = '$slug',
                            created_at = now(), 
                            created_user = '$userID', 
                            status = '$status'");
                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $id = g('id');
            $view = $db->get_row("SELECT * FROM the_blog_category WHERE category_id = $id");
            $name = p('name');
            $slug = sef_link($name);
            $status = p('status');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{
                $insert = $db->query("UPDATE the_blog_category SET
                            name = '$name',
                            slug = '$slug',
                            updated_at = now(), 
                            updated_user = '$userID', 
                            status = '$status'
                            WHERE category_id = '$id'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM the_blog_category WHERE category_id = '$ID'");
            $delete = $db->query("DELETE FROM the_blog_category  WHERE category_id = '$ID'");
            if ($delete){
                //unlink("../../data/hotel/".$bul->picture);
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        echo json_encode($dizi);
    }
}
if ($do == 'il-ilce'){
    if($_GET){
        if($q == 'secim'){
            if (isset($_GET['il'])) {

                $il = (int)$_GET['il'];
                $secili = (int)$_GET['ilce'];
                if ($il > 0) {
                    $dk = $db->get_results("SELECT `id`,`ilce_adi` FROM `ilce` WHERE `il_id`='$il' ORDER BY `id` ASC");

                    if ($secili > 0) {
                        $list = '{"selected":"' . $secili . '",';
                    } else {
                        $list = '{"0":"Seçiniz",';
                    }
                    foreach ($dk as $ilr ) {
                        $list .= '"' . $ilr->id . '":"' . $ilr->ilce_adi . '",';
                    }
                    $list = substr($list, 0, -1);
                    $list .= "}";
                    echo $list;
                }
            } else if (isset($_GET['ilce'])) {
                $ilce = (int)$_GET['ilce'];
                $secili = (int)$_GET['semt'];
                if ($ilce > 0) {
                    $dk = $db->get_results("SELECT `id`,`semt_adi` FROM `semt` WHERE `ilce_id`='$ilce' ORDER BY `id` ASC");
                    if ($secili > 0) {
                        $list = '{"selected":"' . $secili . '",';
                    } else {
                        $list = '{"0":"Seçiniz",';
                    }
                    foreach ($dk as $ilr ) {
                        $list .= '"' . $ilr->id . '":"' . $ilr->semt_adi . '",';
                    }
                    $list = substr($list, 0, -1);
                    $list .= "}";
                    echo $list;
                }
            } else if (isset($_GET['semt'])) {
                $semt = (int)$_GET['semt'];
                $secili = (int)$_GET['mahalle'];

                if ($semt > 0) {
                    $dk = $db->get_results("SELECT `id`,`mahalle_adi` FROM `mahalle` WHERE `semt_id`='$semt' ORDER BY `ordernum` DESC, id ASC");

                    if ($secili > 0) {
                        $list = '{"selected":"' . $secili . '",';
                    } else {
                        $list = '{"0":"Seçiniz",';
                    }

                    foreach ($dk as $ilr ) {
                        $list .= '"' . $ilr->id . '":"' . $ilr->mahalle_adi . '",';
                    }
                    $list = substr($list, 0, -1);
                    $list .= "}";
                    echo $list;
                }
            }
        }
    }
}
if ($do == 'site-logo') {
    if ($_POST) {
        $site_images = $db->get_row("SELECT * FROM site_settings WHERE id = 1");
        unlink("../../data/genel/".$site_images->site_logo);
        $update = $db->query("UPDATE site_settings SET
                  site_logo = '',
                  updatet_at = now()
                  WHERE id = 1");

        if ($update){
            $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
        }else{
            $dizi["hata"] = 'Ein Fehler ist aufgetretten';
            //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
        }
        echo json_encode($dizi);
    }
}
if ($do == 'site-footer-logo') {
    if ($_POST) {
        $site_images = $db->get_row("SELECT * FROM site_settings WHERE id = 1");
        unlink("../../data/genel/".$site_images->site_footer_logo);
        $update = $db->query("UPDATE site_settings SET
                  site_footer_logo = '',
                  updatet_at = now()
                  WHERE id = 1");

        if ($update){
            $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
        }else{
            $dizi["hata"] = 'Ein Fehler ist aufgetretten';
            //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
        }
        echo json_encode($dizi);
    }
}
if ($do == 'site-watermark-logo') {
    if ($_POST) {
        $site_images = $db->get_row("SELECT * FROM site_settings WHERE id = 1");
        unlink("../../data/genel/".$site_images->site_watermatik_logo);
        $update = $db->query("UPDATE site_settings SET
                      site_watermatik_logo = '',
                      updatet_at = now()
                      WHERE id = 1");

        if ($update){
            $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
        }else{
            $dizi["hata"] = 'Ein Fehler ist aufgetretten';
            //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
        }
        echo json_encode($dizi);
    }
}
if ($do == 'watermarkStatus'){
    if($_POST){
        $status = p('status');

        $site_images = $db->get_row("SELECT * FROM site_settings WHERE id = 1");
        if($site_images->site_watermatik_logo){
            $update = $db->query("UPDATE site_settings SET site_watermatik_active = '$status', updatet_at = now() WHERE id = 1");
            if ($update){
                $dizi["ok"] = 'Erfolgreich aktualisiert.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }else{
            $dizi["hata"] = 'Yüklü bir watermark görseli bulunmadığı için aktif hale getirilmedi.';
        }
    }
    echo json_encode($dizi);
}
if ($do == 'site-images'){
    if($_POST){

        $site_images = $db->get_row("SELECT * FROM site_settings WHERE id = 1");

        if(!empty($_FILES["site_logo"]["name"])){
            $upload = new Upload($_FILES["site_logo"]);
            if ($upload->uploaded){
                $rand = uniqid(true);
                $upload->file_new_name_body = $rand;
                if ($upload->image_src_x > $site_images->site_logo_width || $upload->image_src_x < $site_images->site_logo_width || $upload->image_src_y > $site_images->site_logo_height || $upload->image_src_y < $site_images->site_logo_height ){
                    $upload->image_resize = true;
                    $upload->image_y = $site_images->site_logo_height;
                    $upload->image_x = $site_images->site_logo_width;
                }
                $upload->allowed = array('image/*'); // sadece resimler kabul edilsin
                $upload->Process("../../data/genel/");
                if ($upload->processed){
                    $site_logo = $rand.'.'.$upload->image_src_type;
                    if($site_images->site_logo){
                        unlink("../../data/genel/".$site_images->site_logo);
                    }
                }
            }
        }else{
            $site_logo = $site_images->site_logo;
        }

        if(!empty($_FILES["site_footer_logo"]["name"])){
            $upload = new Upload($_FILES["site_footer_logo"]);
            if ($upload->uploaded){
                $rand = uniqid(true);
                $upload->file_new_name_body = $rand;
                if ($upload->image_src_x > $site_images->site_flogo_width || $upload->image_src_x < $site_images->site_flogo_width || $upload->image_src_y > $site_images->site_flogo_height || $upload->image_src_y < $site_images->site_flogo_height ){
                    $upload->image_resize = true;
                    $upload->image_y = $site_images->site_flogo_height;
                    $upload->image_x = $site_images->site_flogo_width;
                }
                $upload->allowed = array('image/*'); // sadece resimler kabul edilsin
                $upload->Process("../../data/genel/");
                if ($upload->processed){
                    $site_footer_logo = $rand.'.'.$upload->image_src_type;
                    if($site_images->site_footer_logo){
                        unlink("../../data/genel/".$site_images->site_footer_logo);
                    }
                }
            }
        }else{
            $site_footer_logo = $site_images->site_footer_logo;
        }

        if(!empty($_FILES["site_watermatik_logo"]["name"])){
            $upload = new Upload($_FILES["site_watermatik_logo"]);
            if ($upload->uploaded){
                $rand = uniqid(true);
                $upload->file_new_name_body = $rand;
                if ($upload->image_src_x > 600 || $upload->image_src_x < 600 || $upload->image_src_y > 600 || $upload->image_src_y < 600 ){
                    $upload->image_resize = true;
                    $upload->image_y = 600;
                    $upload->image_x = 600;
                }
                $upload->allowed = array('image/*'); // sadece resimler kabul edilsin
                $upload->Process("../../data/genel/");
                if ($upload->processed){
                    $site_watermatik_logo = $rand.'.'.$upload->image_src_type;
                    if($site_images->site_watermatik_logo){
                        unlink("../../data/genel/".$site_images->site_watermatik_logo);
                    }
                }
            }
        }else{
            $site_watermatik_logo = $site_images->site_watermatik_logo;
        }

        $update = $db->query("UPDATE site_settings SET
                  site_logo = '$site_logo',
                  site_footer_logo = '$site_footer_logo',
                  site_watermatik_logo = '$site_watermatik_logo',
                  updatet_at = now()
                  WHERE id = 1");

        if ($update){
            $dizi["ok"] = 'Erfolgreich aktualisiert.';
        }else{
            $dizi["hata"] = 'Ein Fehler ist aufgetretten';
            //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
        }

        echo json_encode($dizi);
    }
}
if ($do == 'social'){
    if($_POST){
        if($q == 'add'){
            $name = p('name');
            $icon = p('icon');
            $link = p('link');
            $rank = p('rank');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                $insert = $db->query("INSERT INTO social_networks SET
                        name = '$name',
                        link = '$link',
                        icon = '$icon',
                        rank = '$rank', created_at = now()");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich hinzugefügt';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'edit'){
            $rowID = g('id');
            $name = p('name');
            $icon = p('icon');
            $link = p('link');
            $rank = p('rank');

            if(!$name){
                $dizi['hata'] = 'Bitte wählen Sie einen Titel.';
                //$dizi['hata'] = 'Lütfen bir başlık belirtiniz.';
            }else{

                $insert = $db->query("UPDATE social_networks SET
                        name = '$name',
                        link = '$link',
                        icon = '$icon',
                        rank = '$rank', updated_at = now() WHERE id = '$rowID'");

                if($insert){
                    $dizi["ok"] = 'Erfolgreich aktualisiert.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'delete'){
            $rowID = p('id');

            if(!$rowID){
                $dizi['hata'] = 'Lütfen bir kayıt seçiniz.';
            }else{
                $insert = $db->query("DELETE FROM social_networks WHERE id = '$rowID'");
                if($insert){
                    $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        if($q == 'rankEdit'){
            $rowID = p('id');
            $rank = p('rank');

            if(!$rowID){
                $dizi['hata'] = 'Lütfen bir kayıt seçiniz.';
            }else{

                $insert = $db->query("UPDATE social_networks SET rank = '$rank', updated_at = now() WHERE id = '$rowID'");

                if($insert){
                    $dizi["ok"] = 'Platzierung aktualisiert';
                }else{
                    $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                    //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
                }
            }
        }
        echo json_encode($dizi);
    }
}
if ($do == 'google_settings'){
    if($_POST){

        $site_google_meta = p('site_google_meta');
        $site_google_analytics = p('site_google_analytics');
        $site_google_recaptcha = p('site_google_recaptcha');
        $site_google_map_api = p('site_google_map_api');
        $smtp_username = p('smtp_username');
        $smtp_password = p('smtp_password');

        $update = $db->query("UPDATE site_google_settings SET
                  site_google_meta = '$site_google_meta',
                  site_google_analytics = '$site_google_analytics',
                  site_google_recaptcha = '$site_google_recaptcha',
                  site_google_map_api = '$site_google_map_api',
                  updatet_at = now()
                  WHERE id = 1");

        if ($update){
            $dizi["ok"] = 'Erfolgreich aktualisiert.';
        }else{
            $dizi["hata"] = 'Ein Fehler ist aufgetretten';
            //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
        }
        echo json_encode($dizi);
    }
}
if ($do == 'smtp'){
    if($_POST){

        $smtp_title = p('smtp_title');
        $smtp_server = p('smtp_server');
        $smtp_port = p('smtp_port');
        $smtp_protocol = p('smtp_protocol');
        $smtp_username = p('smtp_username');
        $smtp_password = p('smtp_password');

        $update = $db->query("UPDATE smtp_settings SET
                  smtp_title = '$smtp_title',
                  smtp_server = '$smtp_server',
                  smtp_port = '$smtp_port',
                  smtp_protocol = '$smtp_protocol',
                  smtp_username = '$smtp_username',
                  smtp_password = '$smtp_password'
                  WHERE id = 1");

        if ($update){
            $dizi["ok"] = 'Erfolgreich aktualisiert.';
        }else{
            $dizi["hata"] = 'Ein Fehler ist aufgetretten';
            //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
        }
        echo json_encode($dizi);
    }
}
if ($do == 'admin') {
    if ($_POST) {

        if($q == 'admin_login'){
            $user_email = p('email');
            $user_password = p('password');
            $password = sha1(md5($user_password));
            $user = $db->get_row("SELECT * FROM users WHERE email = '$user_email' AND password = '$password'");
            if($user){
                echo "ok";
                session_start();
                $uyeBilgileri = array(
                    "id" => $user->id
                );
                $_SESSION["the_admin"] = $uyeBilgileri;

                $update = $db->query("UPDATE users SET lastlogin_at = now() WHERE id = '$user->id' ");
            }else{
                echo "Die eingegebenen Daten sind falsch. Überprüfen Sie diese bitte und versuchen Sie es erneut.";
            }
        }

    }
}
if ($do == 'rezervasyon') {
    if ($_POST) {

        if($q == 'one'){

            $rez_type = p('rez_type');
            $tour_id = p('tour_id');
            $tour_dates = p('tour_dates');
            $person_size = p('person_size');
            $child_size = p('child_size');
            if(!$rez_type || !$tour_id || !$tour_dates ||  !$person_size){
                $dizi["hata"] = 'Bei der Erstellung einer Reservierung ist ein Fehler aufgetretten. Bitte aktualisieren Sie die Seite und versuchen Sie es erneut.';
            }else{
                //$_SESSION["sepet"]["rez_type"] = $rez_type;

                $paketID = p('tour_id');
                $paketbul = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$paketID'");
                $_SESSION["sepet"]["rezervasyonNumarasi"] = $sesSiparisNo;
                $sifrele = sha1(base64_encode(md5(base64_encode($simdikiZaman))));
                if(empty($sesSiparisNo)){
                    $siparisNo =  date('Y').date('m').substr($sifrele, 1, 7);
                    $_SESSION["sepet"]["rezervasyonNumarasi"] = $siparisNo;
                }else{
                    $siparisNo =  $sesSiparisNo;
                }

                $arrayName = array(
                    "rez_type" => $rez_type,
                    "tour_id" => $tour_id,
                    "tour_dates" => $tour_dates,
                    "person_size" => $person_size,
                    "child_size" => $child_size
                );

                $_SESSION["sepet"]["rezervasyon"][$tour_id] = $arrayName;

                $dizi["ok"] = 'ok';
            }


            /*



            $_SESSION["sepet"]["domain"] = $domain;

            $icerik = p('icerik');
            $grafik = p('grafik');
            $vipdestek = p('vipdestek');
            $digerhizmetler = p('digerhizmetler');
            $aciklama = '';
            if(!$new_domain_name && !$domain_name){
                $dizi["hata"] = 'Lütfen mevcut yada yeni domain adresinizi belirtiniz.';
            }else{

                $arrayName = array(
                    "id" => $paketID,
                    "tip" => $tip,
                    "name" => $paketbul->name,
                    "aciklama" => $aciklama,
                    "fiyat" => $toplam_rakam
                );

                $_SESSION["sepet"]["urunler"][$paketID] = $arrayName;
                $sepet__urunler = $_SESSION["sepet"]["urunler"];

                $paket_toplam_tutar = 0.0;
                foreach ($sepet__urunler as $urun) {
                    $paket_toplam_tutar += $urun["fiyat"];
                }

                $_SESSION["sepet"]["paket_toplam_tutar"] = $paket_toplam_tutar;
                $dizi["ok"] = 'Paket sepetinize eklendi.';
            }
            */
        }

        if($q == 'two'){
            $dizi["ok"] = 'devam';
        }

        if($q == 'end'){
            $havalimani = p('havalimani');
            $owner_gender = p('owner_gender');
            $owner_email = p('owner_email');
            $owner_firstname = p('owner_firstname');
            $owner_lastname = p('owner_lastname');
            $owner_city = p('owner_city');
            $owner_state = p('owner_state');
            $owner_address = p('owner_address');
            $owner_telephone = p('owner_telephone');
            $owner_postal_code = p('owner_postal_code');

            if(!$owner_firstname || !$owner_lastname || !$owner_email || !$owner_telephone){
                $dizi["hata"] = 'Bitte füllen Sie die Pflichtfelder aus';
                //$dizi["hata"] = 'Lütfen zorunlu alanları doldurunuz.';
            }else{

                if(!isset($_SESSION['uye'])){
                    // üyelik yok ise
                    @$uyelikDurum = '';
                    @$misafir = '';
                    if($uyelik == 'on'){$misafir = 1;}else{$misafir = 0;}
                    // böyle bir mail adresi veritabanında var mı ?
                    $emailKontrol = $db->get_var("SELECT COUNT(*) FROM users WHERE email = '$owner_email'");
                    if($emailKontrol){
                        $uyelikDurum = 1;
                        $emailKontrol = $db->get_row("SELECT * FROM users WHERE email = '$owner_email'");
                        $lastUser = $emailKontrol->id;
                    }else{
                        $uyelikDurum = 0;
                        $uyelik = $db->query("INSERT INTO users SET
                                gender = '$owner_gender',
                                firstname = '$owner_firstname',
                                lastname = '$owner_lastname',
                                email = '$owner_email',
                                city = '$owner_city',
                                state = '$owner_state',
                                address = '$owner_address',
                                postal_code = '$postal_code',
                                telephone = '$owner_telephone',
                                created_user = '$lastUser',
                                ugroup = '0',
                                created_at = now(), 
                                status = '0'");
                        $lastUser = $db->insert_id;
                    }

                    $rezervasyonNo = $_SESSION["sepet"]["rezervasyonNumarasi"];
                    $sepetim__urunler = isset($_SESSION['sepet']['rezervasyon']) ? $_SESSION['sepet']['rezervasyon'] : array();
                    foreach ($sepetim__urunler as $sepetim__urun) {
                        $rez_type = $sepetim__urun['rez_type'];
                        $tour_id = $sepetim__urun['tour_id'];
                        $tour_dates = $sepetim__urun['tour_dates'];
                        $person_size = $sepetim__urun['person_size'];
                        $child_size = $sepetim__urun['child_size'];


                        //$paketbul = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id'");
                        $tarihbul = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tour_id' AND date_id = $tour_dates");

                        $yetiskinFiyat = $tarihbul->person_price * $person_size;
                        $CocukFiyat = $tarihbul->child_price * $child_size;
                        $fiyat = $yetiskinFiyat + $CocukFiyat;
                    }

                    $siparisInsert = $db->query("INSERT INTO reservations SET
                            havalimani = '$havalimani',
                            rezervation_number = '$rezervasyonNo',
                            rezervation_type = '$rez_type',
                            user_id = '$lastUser',
                            tour_id = '$tour_id',
                            tour_dates = '$tour_dates',
                            person_size = '$person_size',
                            child_size = '$child_size',
                            total_price = '$fiyat',
                            created_at = now(),
                            status = 0");

                    if($siparisInsert){
                        $gender = $_POST['gender'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $passport_no = $_POST['passport_no'];
                        $passport_date = $_POST['passport_date'];
                        $day = $_POST['day'];
                        $mounth = $_POST['mounth'];
                        $year = $_POST['year'];

                        for($i=0; $i<count($gender); $i++){
                            $rezuserinsert .= $db->query("INSERT INTO reservations_users SET
                                    rezervation_number = '$rezervasyonNo',
                                    gender = '$gender[$i]',
                                    firstname = '$firstname[$i]',
                                    lastname = '$lastname[$i]',
                                    birthday = '$day[$i].$mounth[$i].$year[$i]',
                                    passport_no = '$passport_no[$i]',
                                    passport_date = '$passport_date[$i]'");
                        }

                        if($rezuserinsert){
                            $dizi["ok"] = 'başarılı.';
                        }else{
                            $dizi["hata"] = '3hata222.';
                        }
                    }else{
                        $dizi["hata"] = '3ha111ta.';
                    }


                }else{
                    $lastUser = $_SESSION['uye']['hzu_userid'];
                    $rezervasyonNo = $_SESSION["sepet"]["rezervasyonNumarasi"];
                    $sepetim__urunler = isset($_SESSION['sepet']['rezervasyon']) ? $_SESSION['sepet']['rezervasyon'] : array();
                    foreach ($sepetim__urunler as $sepetim__urun) {
                        $rez_type = $sepetim__urun['rez_type'];
                        $tour_id = $sepetim__urun['tour_id'];
                        $tour_dates = $sepetim__urun['tour_dates'];
                        $person_size = $sepetim__urun['person_size'];
                        $child_size = $sepetim__urun['child_size'];


                        //$paketbul = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id'");
                        $tarihbul = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tour_id' AND date_id = $tour_dates");

                        $yetiskinFiyat = $tarihbul->person_price * $person_size;
                        $CocukFiyat = $tarihbul->child_price * $child_size;
                        $fiyat = $yetiskinFiyat + $CocukFiyat;
                    }

                    $siparisInsert = $db->query("INSERT INTO reservations SET
                        havalimani = '$havalimani',
                        rezervation_number = '$rezervasyonNo',
                        rezervation_type = '$rez_type',
                        user_id = '$lastUser',
                        tour_id = '$tour_id',
                        tour_dates = '$tour_dates',
                        person_size = '$person_size',
                        child_size = '$child_size',
                        total_price = '$fiyat',
                        created_at = now(),
                        status = 0");

                    if($siparisInsert){
                        $gender = $_POST['gender'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $passport_no = $_POST['passport_no'];
                        $passport_date = $_POST['passport_date'];
                        $day = $_POST['day'];
                        $mounth = $_POST['mounth'];
                        $year = $_POST['year'];

                        for($i=0; $i<count($gender); $i++){
                            $rezuserinsert .= $db->query("INSERT INTO reservations_users SET
                                    rezervation_number = '$rezervasyonNo',
                                    gender = '$gender[$i]',
                                    firstname = '$firstname[$i]',
                                    lastname = '$lastname[$i]',
                                    birthday = '$day[$i].$mounth[$i].$year[$i]',
                                    passport_no = '$passport_no[$i]',
                                    passport_date = '$passport_date[$i]'");
                        }

                        if($rezuserinsert){
                            $dizi["ok"] = 'başarılı.';
                        }else{
                            $dizi["hata"] = '3323hata.';
                        }
                    }else{
                        $dizi["hata"] = '3122hata.';
                    }
                }
            }
            /*






            $rezervasyonNo = $_SESSION["sepet"]["rezervasyonNumarasi"];
            $sepetim__urunler = isset($_SESSION['sepet']['rezervasyon']) ? $_SESSION['sepet']['rezervasyon'] : array();
            foreach ($sepetim__urunler as $sepetim__urun) {
                $rez_type = $sepetim__urun['rez_type'];
                $tour_id = $sepetim__urun['tour_id'];
                $tour_dates = $sepetim__urun['tour_dates'];
                $person_size = $sepetim__urun['person_size'];
                $child_size = $sepetim__urun['child_size'];


                $paketbul = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id'");
                $tarihbul = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tour_id' AND date_id = $tour_dates");

                $yetiskinFiyat = $tarihbul->person_price * $person_size;
                $CocukFiyat = $tarihbul->child_price * $child_size;
                $fiyat = $yetiskinFiyat + $CocukFiyat;
            }

            for($i=0; $i<count($gender); $i++){

                echo $ad[$i].$soyad[$i].$tip[$i].'<br />';

            }
            */
        }
        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM reservations WHERE id = '$ID'");
            $delete = $db->query("DELETE FROM reservations_users  WHERE rezervation_number = '$bul->rezervation_number'");
            $delete = $db->query("DELETE FROM reservations  WHERE id = '$ID'");
            if ($delete){
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        echo json_encode($dizi);
    }
}
if ($do == 'otel-rezervasyon') {
    if ($_POST) {

        if($q == 'one'){

            $rez_type = p('rez_type');
            $hotel_id = p('hotel_id');
            $room_id = p('room_id');
            $dates = p('dates');
            $person_size = p('person_size');
            $child_size = p('child_size');
            if(!$rez_type || !$person_size){
                $dizi["hata"] = 'Bei der Erstellung einer Reservierung ist ein Fehler aufgetretten. Bitte aktualisieren Sie die Seite und versuchen Sie es erneut.';
            }else if(!$dates){
                $dizi["hata"] = 'Bitte geben Sie das Datum an.';
            }else{
                //$_SESSION["sepet"]["rez_type"] = $rez_type;
                $datesExplode = explode(" > ",$dates);
                $start_date = $datesExplode[0];
                $end_date = $datesExplode[1];
                $paketID = p('hotel_id');
                $paketbul = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$paketID'");
                $_SESSION["sepet"]["rezervasyonNumarasi"] = $sesSiparisNo;
                $sifrele = sha1(base64_encode(md5(base64_encode($simdikiZaman))));
                if(empty($sesSiparisNo)){
                    $siparisNo =  date('Y').date('m').substr($sifrele, 1, 7);
                    $_SESSION["sepet"]["rezervasyonNumarasi"] = $siparisNo;
                }else{
                    $siparisNo =  $sesSiparisNo;
                }

                $arrayName = array(
                    "rez_type" => $rez_type,
                    "hotel_id" => $hotel_id,
                    "room_id" => $room_id,
                    "dates" => $dates,
                    "start_date" => $start_date,
                    "end_date" => $end_date,
                    "person_size" => $person_size,
                    "child_size" => $child_size
                );

                $_SESSION["sepet"]["rezervasyon"][$tour_id] = $arrayName;

                $dizi["ok"] = 'ok';
            }


            /*



            $_SESSION["sepet"]["domain"] = $domain;

            $icerik = p('icerik');
            $grafik = p('grafik');
            $vipdestek = p('vipdestek');
            $digerhizmetler = p('digerhizmetler');
            $aciklama = '';
            if(!$new_domain_name && !$domain_name){
                $dizi["hata"] = 'Lütfen mevcut yada yeni domain adresinizi belirtiniz.';
            }else{

                $arrayName = array(
                    "id" => $paketID,
                    "tip" => $tip,
                    "name" => $paketbul->name,
                    "aciklama" => $aciklama,
                    "fiyat" => $toplam_rakam
                );

                $_SESSION["sepet"]["urunler"][$paketID] = $arrayName;
                $sepet__urunler = $_SESSION["sepet"]["urunler"];

                $paket_toplam_tutar = 0.0;
                foreach ($sepet__urunler as $urun) {
                    $paket_toplam_tutar += $urun["fiyat"];
                }

                $_SESSION["sepet"]["paket_toplam_tutar"] = $paket_toplam_tutar;
                $dizi["ok"] = 'Paket sepetinize eklendi.';
            }
            */
        }

        if($q == 'two'){
            $dizi["ok"] = 'devam';
        }

        if($q == 'end'){
            $havalimani = p('havalimani');
            $owner_gender = p('owner_gender');
            $owner_email = p('owner_email');
            $owner_firstname = p('owner_firstname');
            $owner_lastname = p('owner_lastname');
            $owner_city = p('owner_city');
            $owner_state = p('owner_state');
            $owner_address = p('owner_address');
            $owner_telephone = p('owner_telephone');
            $owner_postal_code = p('owner_postal_code');
            $sozlesme = p('sozlesme');

            if(!$owner_firstname || !$owner_lastname || !$owner_email || !$owner_telephone){
                $dizi["hata"] = 'Bitte füllen Sie die Pflichtfelder aus';
                //$dizi["hata"] = 'Lütfen zorunlu alanları doldurunuz.';
            }else if(!$sozlesme){
                $dizi["hata"] = 'Sie können die Buchung nicht fortsetzen, ohne die Vereinbarung zu akzeptieren. Bitte lesen Sie die Vereinbarung und bestätigen Sie.';
            }else{

                // üyelik yok ise
                if(!isset($_SESSION['uye'])){
                    @$uyelikDurum = '';
                    @$misafir = '';
                    if($uyelik == 'on'){$misafir = 1;}else{$misafir = 0;}

                    // böyle bir mail adresi veritabanında var mı ?
                    $emailKontrol = $db->get_var("SELECT COUNT(*) FROM users WHERE email = '$owner_email'");
                    if($emailKontrol){
                        $uyelikDurum = 1;
                        $emailKontrol = $db->get_row("SELECT * FROM users WHERE email = '$owner_email'");
                        $lastUserID = $emailKontrol->id;
                        $dizi["hata"] = 'Diese E-Mail-Adresse wird bereits verwendet, bitte melden Sie sich an.';
                    }else{
                        $ownerPassword = sifreUret(10);
                        $ownerPasswordDB = sha1(md5($ownerPassword));
                        $ownerName = $owner_firstname.' '.$owner_lastname;
                        $uyelikDurum = 0;
                        $active_code = sha1(md5($simdikiZaman));
                        $uyelik = $db->query("INSERT INTO users SET
                                    active_kod = '$active_code',
                                    gender = '$owner_gender',
                                    firstname = '$owner_firstname',
                                    lastname = '$owner_lastname',
                                    fatura_unvan = '$ownerName',
                                    fatura_telefon = '$owner_telephone',
                                    password = '$ownerPasswordDB',
                                    fatura_adresi = '$owner_address',
                                    email = '$owner_email',
                                    city = '$owner_city',
                                    state = '$owner_state',
                                    address = '$owner_address',
                                    postal_code = '$postal_code',
                                    telephone = '$owner_telephone',
                                    ugroup = '0',
                                    created_at = now(), 
                                    status = '0'");

                        $lastUserID = $db->insert_id;

                    }
                        $emailKontrol = $db->get_row("SELECT * FROM users WHERE id = '$lastUserID'");

                        $ownerEmail = $owner_email;
                        $mail_icerik = '<!DOCTYPE html>
                                        <html lang="de">
                                    <head>
                                        <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                    </head>
                                    
                                    <body
                                        style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; box-sizing: border-box; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 22px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important">
                                    
                                    
                                    
                                        <style type="text/css">
                                            body {
                                                background-color: #FAFAFA;
                                                width: 100% !important;
                                                min-width: 100%;
                                                -webkit-text-size-adjust: 100%;
                                                -ms-text-size-adjust: 100%;
                                                margin: 0;
                                                padding: 0;
                                                -moz-box-sizing: border-box;
                                                -webkit-box-sizing: border-box;
                                                box-sizing: border-box;
                                            }
                                    
                                            .ExternalClass {
                                                width: 100%;
                                            }
                                    
                                            .ExternalClass {
                                                line-height: 100%;
                                            }
                                    
                                            #backgroundTable {
                                                margin: 0;
                                                padding: 0;
                                                width: 100% !important;
                                                line-height: 100% !important;
                                            }
                                    
                                            img {
                                                outline: none;
                                                text-decoration: none;
                                                -ms-interpolation-mode: bicubic;
                                                width: auto;
                                                max-width: 100%;
                                                clear: both;
                                                display: block;
                                            }
                                    
                                            body {
                                                color: #1C232B;
                                                font-family: Helvetica, Arial, sans-serif;
                                                font-weight: normal;
                                                padding: 0;
                                                margin: 0;
                                                text-align: left;
                                                line-height: 1.3;
                                            }
                                    
                                            body {
                                                font-size: 16px;
                                                line-height: 1.3;
                                            }
                                    
                                            a:hover {
                                                color: #1f54ed;
                                            }
                                    
                                            a:active {
                                                color: #1f54ed;
                                            }
                                    
                                            a:visited {
                                                color: #4E78F1;
                                            }
                                    
                                            h1 a:visited {
                                                color: #4E78F1;
                                            }
                                    
                                            h2 a:visited {
                                                color: #4E78F1;
                                            }
                                    
                                            h3 a:visited {
                                                color: #4E78F1;
                                            }
                                    
                                            h4 a:visited {
                                                color: #4E78F1;
                                            }
                                    
                                            h5 a:visited {
                                                color: #4E78F1;
                                            }
                                    
                                            h6 a:visited {
                                                color: #4E78F1;
                                            }
                                    
                                            table.button:hover table tr td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button:active table tr td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button table tr td a:visited {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.tiny:hover table tr td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.tiny:active table tr td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.tiny table tr td a:visited {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.small:hover table tr td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.small:active table tr td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.small table tr td a:visited {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.large:hover table tr td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.large:active table tr td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.large table tr td a:visited {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button:hover table td {
                                                background: #1f54ed;
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button:visited table td {
                                                background: #1f54ed;
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button:active table td {
                                                background: #1f54ed;
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button:hover table a {
                                                border: 0 solid #1f54ed;
                                            }
                                    
                                            table.button:visited table a {
                                                border: 0 solid #1f54ed;
                                            }
                                    
                                            table.button:active table a {
                                                border: 0 solid #1f54ed;
                                            }
                                    
                                            table.button.secondary:hover table td {
                                                background: #fefefe;
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.secondary:hover table a {
                                                border: 0 solid #fefefe;
                                            }
                                    
                                            table.button.secondary:hover table td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.secondary:active table td a {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.secondary table td a:visited {
                                                color: #FFFFFF;
                                            }
                                    
                                            table.button.success:hover table td {
                                                background: #009482;
                                            }
                                    
                                            table.button.success:hover table a {
                                                border: 0 solid #009482;
                                            }
                                    
                                            table.button.alert:hover table td {
                                                background: #ff6131;
                                            }
                                    
                                            table.button.alert:hover table a {
                                                border: 0 solid #ff6131;
                                            }
                                    
                                            table.button.warning:hover table td {
                                                background: #fcae1a;
                                            }
                                    
                                            table.button.warning:hover table a {
                                                border: 0px solid #fcae1a;
                                            }
                                    
                                            .thumbnail:hover {
                                                box-shadow: 0 0 6px 1px rgba(78, 120, 241, 0.5);
                                            }
                                    
                                            .thumbnail:focus {
                                                box-shadow: 0 0 6px 1px rgba(78, 120, 241, 0.5);
                                            }
                                    
                                            body.outlook p {
                                                display: inline !important;
                                            }
                                    
                                            body {
                                                font-weight: normal;
                                                font-size: 16px;
                                                line-height: 22px;
                                            }
                                    
                                            @media only screen and (max-width: 596px) {
                                                .small-float-center {
                                                    margin: 0 auto !important;
                                                    float: none !important;
                                                    text-align: center !important;
                                                }
                                    
                                                .small-text-center {
                                                    text-align: center !important;
                                                }
                                    
                                                .small-text-left {
                                                    text-align: left !important;
                                                }
                                    
                                                .small-text-right {
                                                    text-align: right !important;
                                                }
                                    
                                                .hide-for-large {
                                                    display: block !important;
                                                    width: auto !important;
                                                    overflow: visible !important;
                                                    max-height: none !important;
                                                    font-size: inherit !important;
                                                    line-height: inherit !important;
                                                }
                                    
                                                table.body table.container .hide-for-large {
                                                    display: table !important;
                                                    width: 100% !important;
                                                }
                                    
                                                table.body table.container .row.hide-for-large {
                                                    display: table !important;
                                                    width: 100% !important;
                                                }
                                    
                                                table.body table.container .callout-inner.hide-for-large {
                                                    display: table-cell !important;
                                                    width: 100% !important;
                                                }
                                    
                                                table.body table.container .show-for-large {
                                                    display: none !important;
                                                    width: 0;
                                                    mso-hide: all;
                                                    overflow: hidden;
                                                }
                                    
                                                table.body img {
                                                    width: auto;
                                                    height: auto;
                                                }
                                    
                                                table.body center {
                                                    min-width: 0 !important;
                                                }
                                    
                                                table.body .container {
                                                    width: 95% !important;
                                                }
                                    
                                                table.body .columns {
                                                    height: auto !important;
                                                    -moz-box-sizing: border-box;
                                                    -webkit-box-sizing: border-box;
                                                    box-sizing: border-box;
                                                    padding-left: 16px !important;
                                                    padding-right: 16px !important;
                                                }
                                    
                                                table.body .column {
                                                    height: auto !important;
                                                    -moz-box-sizing: border-box;
                                                    -webkit-box-sizing: border-box;
                                                    box-sizing: border-box;
                                                    padding-left: 16px !important;
                                                    padding-right: 16px !important;
                                                }
                                    
                                                table.body .columns .column {
                                                    padding-left: 0 !important;
                                                    padding-right: 0 !important;
                                                }
                                    
                                                table.body .columns .columns {
                                                    padding-left: 0 !important;
                                                    padding-right: 0 !important;
                                                }
                                    
                                                table.body .column .column {
                                                    padding-left: 0 !important;
                                                    padding-right: 0 !important;
                                                }
                                    
                                                table.body .column .columns {
                                                    padding-left: 0 !important;
                                                    padding-right: 0 !important;
                                                }
                                    
                                                table.body .collapse .columns {
                                                    padding-left: 0 !important;
                                                    padding-right: 0 !important;
                                                }
                                    
                                                table.body .collapse .column {
                                                    padding-left: 0 !important;
                                                    padding-right: 0 !important;
                                                }
                                    
                                                td.small-1 {
                                                    display: inline-block !important;
                                                    width: 8.333333% !important;
                                                }
                                    
                                                th.small-1 {
                                                    display: inline-block !important;
                                                    width: 8.333333% !important;
                                                }
                                    
                                                td.small-2 {
                                                    display: inline-block !important;
                                                    width: 16.666666% !important;
                                                }
                                    
                                                th.small-2 {
                                                    display: inline-block !important;
                                                    width: 16.666666% !important;
                                                }
                                    
                                                td.small-3 {
                                                    display: inline-block !important;
                                                    width: 25% !important;
                                                }
                                    
                                                th.small-3 {
                                                    display: inline-block !important;
                                                    width: 25% !important;
                                                }
                                    
                                                td.small-4 {
                                                    display: inline-block !important;
                                                    width: 33.333333% !important;
                                                }
                                    
                                                th.small-4 {
                                                    display: inline-block !important;
                                                    width: 33.333333% !important;
                                                }
                                    
                                                td.small-5 {
                                                    display: inline-block !important;
                                                    width: 41.666666% !important;
                                                }
                                    
                                                th.small-5 {
                                                    display: inline-block !important;
                                                    width: 41.666666% !important;
                                                }
                                    
                                                td.small-6 {
                                                    display: inline-block !important;
                                                    width: 50% !important;
                                                }
                                    
                                                th.small-6 {
                                                    display: inline-block !important;
                                                    width: 50% !important;
                                                }
                                    
                                                td.small-7 {
                                                    display: inline-block !important;
                                                    width: 58.333333% !important;
                                                }
                                    
                                                th.small-7 {
                                                    display: inline-block !important;
                                                    width: 58.333333% !important;
                                                }
                                    
                                                td.small-8 {
                                                    display: inline-block !important;
                                                    width: 66.666666% !important;
                                                }
                                    
                                                th.small-8 {
                                                    display: inline-block !important;
                                                    width: 66.666666% !important;
                                                }
                                    
                                                td.small-9 {
                                                    display: inline-block !important;
                                                    width: 75% !important;
                                                }
                                    
                                                th.small-9 {
                                                    display: inline-block !important;
                                                    width: 75% !important;
                                                }
                                    
                                                td.small-10 {
                                                    display: inline-block !important;
                                                    width: 83.333333% !important;
                                                }
                                    
                                                th.small-10 {
                                                    display: inline-block !important;
                                                    width: 83.333333% !important;
                                                }
                                    
                                                td.small-11 {
                                                    display: inline-block !important;
                                                    width: 91.666666% !important;
                                                }
                                    
                                                th.small-11 {
                                                    display: inline-block !important;
                                                    width: 91.666666% !important;
                                                }
                                    
                                                td.small-12 {
                                                    display: inline-block !important;
                                                    width: 100% !important;
                                                }
                                    
                                                th.small-12 {
                                                    display: inline-block !important;
                                                    width: 100% !important;
                                                }
                                    
                                                .columns td.small-12 {
                                                    display: block !important;
                                                    width: 100% !important;
                                                }
                                    
                                                .column td.small-12 {
                                                    display: block !important;
                                                    width: 100% !important;
                                                }
                                    
                                                .columns th.small-12 {
                                                    display: block !important;
                                                    width: 100% !important;
                                                }
                                    
                                                .column th.small-12 {
                                                    display: block !important;
                                                    width: 100% !important;
                                                }
                                    
                                                table.body td.small-offset-1 {
                                                    margin-left: 8.333333% !important;
                                                }
                                    
                                                table.body th.small-offset-1 {
                                                    margin-left: 8.333333% !important;
                                                }
                                    
                                                table.body td.small-offset-2 {
                                                    margin-left: 16.666666% !important;
                                                }
                                    
                                                table.body th.small-offset-2 {
                                                    margin-left: 16.666666% !important;
                                                }
                                    
                                                table.body td.small-offset-3 {
                                                    margin-left: 25% !important;
                                                }
                                    
                                                table.body th.small-offset-3 {
                                                    margin-left: 25% !important;
                                                }
                                    
                                                table.body td.small-offset-4 {
                                                    margin-left: 33.333333% !important;
                                                }
                                    
                                                table.body th.small-offset-4 {
                                                    margin-left: 33.333333% !important;
                                                }
                                    
                                                table.body td.small-offset-5 {
                                                    margin-left: 41.666666% !important;
                                                }
                                    
                                                table.body th.small-offset-5 {
                                                    margin-left: 41.666666% !important;
                                                }
                                    
                                                table.body td.small-offset-6 {
                                                    margin-left: 50% !important;
                                                }
                                    
                                                table.body th.small-offset-6 {
                                                    margin-left: 50% !important;
                                                }
                                    
                                                table.body td.small-offset-7 {
                                                    margin-left: 58.333333% !important;
                                                }
                                    
                                                table.body th.small-offset-7 {
                                                    margin-left: 58.333333% !important;
                                                }
                                    
                                                table.body td.small-offset-8 {
                                                    margin-left: 66.666666% !important;
                                                }
                                    
                                                table.body th.small-offset-8 {
                                                    margin-left: 66.666666% !important;
                                                }
                                    
                                                table.body td.small-offset-9 {
                                                    margin-left: 75% !important;
                                                }
                                    
                                                table.body th.small-offset-9 {
                                                    margin-left: 75% !important;
                                                }
                                    
                                                table.body td.small-offset-10 {
                                                    margin-left: 83.333333% !important;
                                                }
                                    
                                                table.body th.small-offset-10 {
                                                    margin-left: 83.333333% !important;
                                                }
                                    
                                                table.body td.small-offset-11 {
                                                    margin-left: 91.666666% !important;
                                                }
                                    
                                                table.body th.small-offset-11 {
                                                    margin-left: 91.666666% !important;
                                                }
                                    
                                                table.body table.columns td.expander {
                                                    display: none !important;
                                                }
                                    
                                                table.body table.columns th.expander {
                                                    display: none !important;
                                                }
                                    
                                                table.body .right-text-pad {
                                                    padding-left: 10px !important;
                                                }
                                    
                                                table.body .text-pad-right {
                                                    padding-left: 10px !important;
                                                }
                                    
                                                table.body .left-text-pad {
                                                    padding-right: 10px !important;
                                                }
                                    
                                                table.body .text-pad-left {
                                                    padding-right: 10px !important;
                                                }
                                    
                                                table.menu {
                                                    width: 100% !important;
                                                }
                                    
                                                table.menu td {
                                                    width: auto !important;
                                                    display: inline-block !important;
                                                }
                                    
                                                table.menu th {
                                                    width: auto !important;
                                                    display: inline-block !important;
                                                }
                                    
                                                table.menu.vertical td {
                                                    display: block !important;
                                                }
                                    
                                                table.menu.vertical th {
                                                    display: block !important;
                                                }
                                    
                                                table.menu.small-vertical td {
                                                    display: block !important;
                                                }
                                    
                                                table.menu.small-vertical th {
                                                    display: block !important;
                                                }
                                    
                                                table.menu[align="center"] {
                                                    width: auto !important;
                                                }
                                    
                                                table.button.small-expand {
                                                    width: 100% !important;
                                                }
                                    
                                                table.button.small-expanded {
                                                    width: 100% !important;
                                                }
                                    
                                                table.button.small-expand table {
                                                    width: 100%;
                                                }
                                    
                                                table.button.small-expanded table {
                                                    width: 100%;
                                                }
                                    
                                                table.button.small-expand table a {
                                                    text-align: center !important;
                                                    width: 100% !important;
                                                    padding-left: 0 !important;
                                                    padding-right: 0 !important;
                                                }
                                    
                                                table.button.small-expanded table a {
                                                    text-align: center !important;
                                                    width: 100% !important;
                                                    padding-left: 0 !important;
                                                    padding-right: 0 !important;
                                                }
                                    
                                                table.button.small-expand center {
                                                    min-width: 0;
                                                }
                                    
                                                table.button.small-expanded center {
                                                    min-width: 0;
                                                }
                                    
                                                table.body .container {
                                                    width: 100% !important;
                                                }
                                            }
                                    
                                            @media only screen and (min-width: 732px) {
                                                table.body table.milkyway-email-card {
                                                    width: 525px !important;
                                                }
                                    
                                                table.body table.emailer-footer {
                                                    width: 525px !important;
                                                }
                                            }
                                    
                                            @media only screen and (max-width: 731px) {
                                                table.body table.milkyway-email-card {
                                                    width: 320px !important;
                                                }
                                    
                                                table.body table.emailer-footer {
                                                    width: 320px !important;
                                                }
                                            }
                                    
                                            @media only screen and (max-width: 320px) {
                                                table.body table.milkyway-email-card {
                                                    width: 100% !important;
                                                    border-radius: 0;
                                                }
                                    
                                                table.body table.emailer-footer {
                                                    width: 100% !important;
                                                    border-radius: 0;
                                                }
                                            }
                                    
                                            @media only screen and (max-width: 280px) {
                                                table.body table.milkyway-email-card .milkyway-content {
                                                    width: 100% !important;
                                                }
                                            }
                                    
                                            @media (min-width: 596px) {
                                                .milkyway-header {
                                                    width: 11%;
                                                }
                                            }
                                    
                                            @media (max-width: 596px) {
                                                .milkyway-header {
                                                    width: 50%;
                                                }
                                    
                                                .emailer-footer .emailer-border-bottom {
                                                    border-bottom: 0.5px solid #E2E5E7;
                                                }
                                    
                                                .emailer-footer .make-you-smile {
                                                    margin-top: 24px;
                                                }
                                    
                                                .emailer-footer .make-you-smile .email-tag-line {
                                                    width: 80%;
                                                    position: relative;
                                                    left: 10%;
                                                }
                                    
                                                .emailer-footer .make-you-smile .universe-address {
                                                    margin-bottom: 10px !important;
                                                }
                                    
                                                .emailer-footer .make-you-smile .email-tag-line {
                                                    margin-bottom: 10px !important;
                                                }
                                    
                                                .have-questions-text {
                                                    width: 70%;
                                                }
                                    
                                                .hide-on-small {
                                                    display: none;
                                                }
                                    
                                                .product-card-stacked-row .thumbnail-image {
                                                    max-width: 32% !important;
                                                }
                                    
                                                .product-card-stacked-row .thumbnail-content p {
                                                    width: 64%;
                                                }
                                    
                                                .welcome-subcontent {
                                                    text-align: left;
                                                    margin: 20px 0 10px;
                                                }
                                    
                                                .milkyway-title {
                                                    padding: 16px;
                                                }
                                    
                                                .meta-data {
                                                    text-align: center;
                                                }
                                    
                                                .label {
                                                    text-align: center;
                                                }
                                    
                                                .welcome-email .wavey-background-subcontent {
                                                    width: calc(100% - 32px);
                                                }
                                            }
                                    
                                            @media (min-width: 597px) {
                                                .emailer-footer .show-on-mobile {
                                                    display: none;
                                                }
                                    
                                                .emailer-footer .emailer-border-bottom {
                                                    border-bottom: none;
                                                }
                                    
                                                .have-questions-text {
                                                    border-bottom: none;
                                                }
                                    
                                                .hide-on-large {
                                                    display: none;
                                                }
                                    
                                                .milkyway-title {
                                                    padding: 55px 55px 16px;
                                                }
                                            }
                                    
                                            @media only screen and (max-width: 290px) {
                                                table.container.your-tickets .tickets-container {
                                                    width: 100%;
                                                }
                                            }
                                        </style>
                                        
                                        <table class="body" data-made-with-foundation=""
                                            style="background: #FAFAFA; border-collapse: collapse; border-spacing: 0; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"
                                            bgcolor="#FAFAFA">
                                            <tbody>
                                                <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                    <td class="center" align="center" valign="top"
                                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word">
                                                        <center style="min-width: 580px; width: 100%">
                                                            <table class=" spacer  float-center" align="center"
                                                                style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                        <td height="20px"
                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                            align="left" valign="top">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="header-spacer spacer  float-center" align="center"
                                                                style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 60px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                        <td height="16px"
                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                            align="left" valign="top">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                    
                                                            <table class="header-spacer-bottom spacer  float-center" align="center"
                                                                style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 30px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                        <td height="16px"
                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                            align="left" valign="top">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                    
                                                            <table class="milkyway-email-card container float-center" align="center"
                                                                style="background: #FFFFFF; border-collapse: collapse; border-radius: 6px; border-spacing: 0; box-shadow: 0 1px 8px 0 rgba(28,35,43,0.15); float: none; margin: 0 auto; overflow: hidden; padding: 0; text-align: center; vertical-align: top; width: 580px"
                                                                bgcolor="#FFFFFF">
                                                                <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                            align="left" valign="top">
                                    
                                                                            <table class="milkyway-content welcome-email container" align="center"
                                                                                style="background: #FFFFFF; border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: inherit; vertical-align: top; width: 280px !important"
                                                                                bgcolor="#FFFFFF">
                                                                                <tbody>
                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                        align="left">
                                                                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                            align="left" valign="top">
                                                                                            <table class=" spacer "
                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <td height="50px"
                                                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 50px; font-weight: normal; hyphens: auto; line-height: 50px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                            align="left" valign="top">&nbsp;</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            
                                    
                                                                                            <table class="milkyway-content row"
                                                                                                style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 350px !important">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <th class=" small-12 large-12 columns first last"
                                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                            align="left">
                                                                                                            <table
                                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                <tbody>
                                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                        align="left">
                                                                                                                        <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                            align="left">
                                                                                                                            <h1 class="welcome-header"
                                                                                                                                style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 600; hyphens: none; line-height: 30px; margin: 0 0 24px; padding: 0; text-align: left; width: 100%; word-wrap: normal"
                                                                                                                                align="left">Willkommen bei Sungate 24!</h1>
                                                                                                                            <h2 class="welcome-subcontent"
                                                                                                                                style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: center; width: 100%; word-wrap: normal"
                                                                                                                                align="left">Aufgrund
                                                                                                                                Ihrer
                                                                                                                                Reservierung
                                                                                                                                wird
                                                                                                                                Ihre
                                                                                                                                Mitgliedschaft
                                                                                                                                automatisch
                                                                                                                                vom
                                                                                                                                System
                                                                                                                                erstellt.
                                                                </h2>

                                                                                                                            <h2 class="welcome-subcontent"
                                                                                                                                    style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: center; width: 100%; word-wrap: normal"
                                                                                                                                    align="left">
                                                                                                                                    

                                                                                                                                    Ihre
                                                                                                                                    Mitgliedschaftsinformationen
                                                                                                                                    lauten
                                                                                                                                    wie
                                                                                                                                    folgt: <br>

                                                                                                                                    Ihre
                                                                                                                                    E-Mail
                                                                                                                                    Adresse: <strong>'.$ownerEmail.'</strong> <br>

                                                                                                                                    Passwort: <strong> '.$ownerPassword.' </strong> <br>

                                                                                                                                </h2>
                                                                                                                        </th>
                                                                                                                        <th class="expander"
                                                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                            align="left"></th>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                    
                                                                                            <table class=" spacer "
                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <td height="30px"
                                                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                            align="left" valign="top">&nbsp;</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <table class="milkyway-content wrapper" align="center"
                                                                                                style="border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <td class="wrapper-inner"
                                                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                            align="left" valign="top"></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <table class="milkyway-content row"
                                                                                                style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <th class="milkyway-padding small-12 large-12 columns first last"
                                                                                                            valign="middle"
                                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                            align="left">
                                                                                                            <table
                                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                <tbody>
                                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                        align="left">
                                                                                                                        <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                            align="left">
                                                                                                                            <table
                                                                                                                                class="cta-text primary radius expanded button"
                                                                                                                                style="border-collapse: collapse; border-spacing: 0; font-size: 14px; font-weight: 400; line-height: 0; margin: 0 0 16px; padding: 0; text-align: left; vertical-align: top; width: 100% !important">
                                                                                                                                <tbody>
                                                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                                        align="left">
                                                                                                                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                                            align="left"
                                                                                                                                            valign="top">
                                                                                                                                            <table
                                                                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                                                <tbody>
                                                                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                                                        align="left">
                                                                                                                                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; background: #00aeff; border: 2px none #4e78f1; border-collapse: collapse !important; border-radius: 6px; color: #FFFFFF; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                                                            align="left"
                                                                                                                                                            bgcolor="#4E78F1"
                                                                                                                                                            valign="top">
                                                                                                                                                            <a href="https://www.sungate24.com/act/'.$ownerEmail.'/'.$active_code.'" style="border: 0 solid #4e78f1; border-radius: 6px; color: #FFFFFF; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.3; margin: 0; padding: 13px 0; text-align: center; text-decoration: none; width: 100%" target="_blank"><p class="text-center"
                                                                                                                                                                    style="color: white; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; letter-spacing: 1px; line-height: 1.3; margin: 0; padding: 0; text-align: center"
                                                                                                                                                                    align="center">
                                                                                                                                                                    Aktivieren!
                                                                                                                                                                </p>
                                                                                                                                                            </a>
                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table>
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </th>
                                                                                                                        <th class="expander"
                                                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                            align="left"></th>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                    
                                    
                                                                                            <table class=" spacer "
                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <td height="30px"
                                                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                            align="left" valign="top">&nbsp;</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table class="have-questions-wrapper  container" align="center"
                                                                                style="background-color: #F5F5F5 !important; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100% !important"
                                                                                bgcolor="#F5F5F5">
                                                                                <tbody>
                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                        align="left">
                                                                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                            align="left" valign="top">
                                                                                            <table class=" spacer "
                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <td height="24px"
                                                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                            align="left" valign="top">&nbsp;</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                    
                                                                                            <table class="milkyway-content row"
                                                                                                style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <th class=" small-12 large-12 columns first last"
                                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                            align="left">
                                                                                                            <table
                                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                <tbody>
                                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                        align="left">
                                                                                                                        <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                            align="left">
                                                                                                                            <img width="10"
                                                                                                                                src="https://www.sungate24.com/lib/img/logo_sticky.png"
                                                                                                                                style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 50%; outline: none; text-align: center; text-decoration: none; width: auto">
                                                                                                                            <h3 style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 600; line-height: 26px; margin: 10px 10px 10px; padding: 0; text-align: center; word-wrap: normal"
                                                                                                                                align="left">Sie haben eine Frage?</h3>
                                    
                                    
                                    
                                                                                                                            <p class="help-center"
                                                                                                                                style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 15px 0 10px; padding: 0; text-align: center"
                                                                                                                                align="left"> <a
                                                                                                                                    href="https://www.sungate24.com/faq?ref=active_email"
                                                                                                                                    style="color: #4E78F1; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none"
                                                                                                                                    target="_blank">Hier finden Sie unsere Liste mit häufig gestellten Fragen.</a>
                                                                                                                            </p>
                                                                                                                        </th>
                                                                                                                        <th class="expander"
                                                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                            align="left"></th>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                    
                                                                                            <table class=" spacer "
                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <td height="24px"
                                                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                            align="left" valign="top">&nbsp;</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                    
                                    
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class=" spacer  float-center" align="center"
                                                                style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                        <td height="20px"
                                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                            align="left" valign="top">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="emailer-footer container float-center" align="center"
                                                                style="background-color: transparent !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px"
                                                                bgcolor="transparent">
                                                                <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                            align="left" valign="top">
                                                                            <table class=" row"
                                                                                style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%">
                                                                                <tbody>
                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                        align="left">
                                                                                        <th class=" small-12 large-4 columns first"
                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px 16px; text-align: left; width: 177.3333333333px"
                                                                                            align="left">
                                                                                            <table
                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                <tbody>
                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                        align="left">
                                                                                                        <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                            align="left">
                                                                                                        </th>
                                                                                                        <th class="emailer-border-bottom small-12 large-11 columns first"
                                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%"
                                                                                                            align="left">
                                                                                                            <table
                                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                <tbody>
                                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                        align="left">
                                                                                                                        <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                            align="left">
                                    
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </th>
                                                                                                        <th class="show-for-large small-12 large-1 columns last"
                                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%"
                                                                                                            align="left">
                                                                                                            <table
                                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                <tbody>
                                    
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </th>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            </th>
                                                                        <th class=" small-12 large-4 columns"
                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px; text-align: left; width: 177.3333333333px"
                                                                            align="left">
                                                                            <table
                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                <tbody>
                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                        align="left">
                                                                                        <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                            align="left">
                                                                                        </th>
                                                                                        <th class="emailer-border-bottom small-12 large-11 columns first"
                                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%"
                                                                                            align="left">
                                                                                            <table
                                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                    
                                                                                                </p>
                                                                                        </th>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </th>
                                                                        <th class="show-for-large small-12 large-1 columns last"
                                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%"
                                                                            align="left">
                                                                            <table
                                                                                style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                <tbody>
                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                        align="left">
                                                                                        <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                            align="left">
                                    
                                                                                        </th>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </th>
                                    
                                    
                                        
                                                            <p class="help-email-address text-center"
                                                                style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center"
                                                                align="center">
                                                                <span class="text-divider" style="margin-left: 10px; margin-right: 10px">
                                                                    ©
                                                                    '.date('Y').'
                                                                    <a href="https://www.sungate24.com/?ref=active_email"
                                                                        style="color: #4E78F1; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none"
                                                                        target="_blank">
                                                                        sungate24.com
                                                            </p>
                                                            </th>
                                                    <th class="expander"
                                                        style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                        align="left"></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </th>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                    
                                        </center>
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                    
                                    
                                    </body>
                                    
                                    </html>';
                                    $subject = 'Mitgliedschaftsaktivierung';
                        
                    

                        $rezervasyonNo = $_SESSION["sepet"]["rezervasyonNumarasi"];
                        $sepetim__urunler = isset($_SESSION['sepet']['rezervasyon']) ? $_SESSION['sepet']['rezervasyon'] : array();
                        foreach ($sepetim__urunler as $sepetim__urun) {
                        $hotel_id = $sepetim__urun['hotel_id'];
                        $room_id = $sepetim__urun['room_id'];
                        $dates = $sepetim__urun['dates'];

                        $start_date = $sepetim__urun['start_date'];
                        $end_date = $sepetim__urun['end_date'];

                        $person_size = $sepetim__urun['person_size'];
                        $child_size = $sepetim__urun['child_size'];

                        $paketbul = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$hotel_id'");
                        $odaBul = $db->get_row("SELECT * FROM the_hotel_room WHERE room_id = '$room_id'");

                        $yetiskinFiyat = $odaBul->person_price * $person_size;
                        $CocukFiyat = $odaBul->child_price * $child_size;
                        $fiyat = $yetiskinFiyat + $CocukFiyat;
                    }

                    $tarih1 = strtotime($start_date);
                    $tarih2 = strtotime($end_date);
                    $gunSayisi =  ($tarih2 - $tarih1) / (60*60*24);
                    $fiyat = $fiyat * $gunSayisi;

                    $siparisInsert = $db->query("INSERT INTO reservations SET
                            havalimani = '$havalimani',
                            rezervation_number = '$rezervasyonNo',
                            rezervation_type = 'hotel',
                            user_id = '$lastUserID',
                            hotel_id = '$hotel_id',
                            room_id = '$room_id',
                            hotel_dates = '$dates',
                            start_date = '$start_date',
                            end_date = '$end_date',
                            person_size = '$person_size',
                            child_size = '$child_size',
                            created_user = '$lastUserID',
                            total_price = '$fiyat',
                            created_at = now(),
                            status = 0");

                    if($siparisInsert){
                        $gender = $_POST['gender'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $passport_no = $_POST['passport_no'];
                        $passport_date = $_POST['passport_date'];
                        $day = $_POST['day'];
                        $mounth = $_POST['mounth'];
                        $year = $_POST['year'];

                        for($i=0; $i<count($gender); $i++){
                            $rezuserinsert .= $db->query("INSERT INTO reservations_users SET
                                        rezervation_number = '$rezervasyonNo',
                                        gender = '$gender[$i]',
                                        firstname = '$firstname[$i]',
                                        lastname = '$lastname[$i]',
                                        birthday = '$day[$i].$mounth[$i].$year[$i]',
                                        passport_no = '$passport_no[$i]',
                                        passport_date = '$passport_date[$i]'");
                        }

                        $otelAdi = $paketbul->name;
                        $rezervasyonLink = 'https://www.sungate24.com/resretail/'.$rezervasyonNo;
                        if($rezuserinsert){
                            sendMail($ownerEmail,$ownerName, $mail_icerik, $subject);
                            try {
                                date_default_timezone_set('Europe/Istanbul');
                                //Server settings
                                $mail = new PHPMailer();
                                $mail->CharSet = 'utf-8';
                                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                                $mail->isSMTP();                                      // Set mailer to use SMTP
                                $mail->SMTPAutoTLS = true;
                                $mail->SMTPOptions = array(
                                    'ssl' => array(
                                        'verify_peer' => false,
                                        'verify_peer_name' => false,
                                        'allow_self_signed' => true
                                    )
                                );
                                $mail->Host = 'mail.sungate24.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'no-reply@sungate24.com';
                                $mail->Password = '8_Radf65';
                                $mail->Port = 587;
                                $mail->setLanguage('tr');
                                $mail->setFrom($mail->Username, 'Sungate24');
                                $mail->IsHTML(true);
                                $mail->addAddress($owner_email, $ownerName);
                                $mail->Subject = 'Reservierung abgeschlossen.';
                                $mail->msgHTML('
                                        <!DOCTYPE html>
                                        <html lang="de">
                                        <head>
                                            <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
                                            <meta charset="UTF-8">
                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                            <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                        </head>
                                        
                                        <body
                                            style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; box-sizing: border-box; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 22px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important">
                                        
                                        
                                        
                                            <style type="text/css">
                                                body {
                                                    background-color: #FAFAFA;
                                                    width: 100% !important;
                                                    min-width: 100%;
                                                    -webkit-text-size-adjust: 100%;
                                                    -ms-text-size-adjust: 100%;
                                                    margin: 0;
                                                    padding: 0;
                                                    -moz-box-sizing: border-box;
                                                    -webkit-box-sizing: border-box;
                                                    box-sizing: border-box;
                                                }
                                        
                                                .ExternalClass {
                                                    width: 100%;
                                                }
                                        
                                                .ExternalClass {
                                                    line-height: 100%;
                                                }
                                        
                                                #backgroundTable {
                                                    margin: 0;
                                                    padding: 0;
                                                    width: 100% !important;
                                                    line-height: 100% !important;
                                                }
                                        
                                                img {
                                                    outline: none;
                                                    text-decoration: none;
                                                    -ms-interpolation-mode: bicubic;
                                                    width: auto;
                                                    max-width: 100%;
                                                    clear: both;
                                                    display: block;
                                                }
                                        
                                                body {
                                                    color: #1C232B;
                                                    font-family: Helvetica, Arial, sans-serif;
                                                    font-weight: normal;
                                                    padding: 0;
                                                    margin: 0;
                                                    text-align: left;
                                                    line-height: 1.3;
                                                }
                                        
                                                body {
                                                    font-size: 16px;
                                                    line-height: 1.3;
                                                }
                                        
                                                a:hover {
                                                    color: #1f54ed;
                                                }
                                        
                                                a:active {
                                                    color: #1f54ed;
                                                }
                                        
                                                a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h1 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h2 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h3 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h4 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h5 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h6 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                table.button:hover table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:active table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button table tr td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.tiny:hover table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.tiny:active table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.tiny table tr td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.small:hover table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.small:active table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.small table tr td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.large:hover table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.large:active table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.large table tr td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:hover table td {
                                                    background: #1f54ed;
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:visited table td {
                                                    background: #1f54ed;
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:active table td {
                                                    background: #1f54ed;
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:hover table a {
                                                    border: 0 solid #1f54ed;
                                                }
                                        
                                                table.button:visited table a {
                                                    border: 0 solid #1f54ed;
                                                }
                                        
                                                table.button:active table a {
                                                    border: 0 solid #1f54ed;
                                                }
                                        
                                                table.button.secondary:hover table td {
                                                    background: #fefefe;
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.secondary:hover table a {
                                                    border: 0 solid #fefefe;
                                                }
                                        
                                                table.button.secondary:hover table td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.secondary:active table td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.secondary table td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.success:hover table td {
                                                    background: #009482;
                                                }
                                        
                                                table.button.success:hover table a {
                                                    border: 0 solid #009482;
                                                }
                                        
                                                table.button.alert:hover table td {
                                                    background: #ff6131;
                                                }
                                        
                                                table.button.alert:hover table a {
                                                    border: 0 solid #ff6131;
                                                }
                                        
                                                table.button.warning:hover table td {
                                                    background: #fcae1a;
                                                }
                                        
                                                table.button.warning:hover table a {
                                                    border: 0px solid #fcae1a;
                                                }
                                        
                                                .thumbnail:hover {
                                                    box-shadow: 0 0 6px 1px rgba(78, 120, 241, 0.5);
                                                }
                                        
                                                .thumbnail:focus {
                                                    box-shadow: 0 0 6px 1px rgba(78, 120, 241, 0.5);
                                                }
                                        
                                                body.outlook p {
                                                    display: inline !important;
                                                }
                                        
                                                body {
                                                    font-weight: normal;
                                                    font-size: 16px;
                                                    line-height: 22px;
                                                }
                                        
                                                @media only screen and (max-width: 596px) {
                                                    .small-float-center {
                                                        margin: 0 auto !important;
                                                        float: none !important;
                                                        text-align: center !important;
                                                    }
                                        
                                                    .small-text-center {
                                                        text-align: center !important;
                                                    }
                                        
                                                    .small-text-left {
                                                        text-align: left !important;
                                                    }
                                        
                                                    .small-text-right {
                                                        text-align: right !important;
                                                    }
                                        
                                                    .hide-for-large {
                                                        display: block !important;
                                                        width: auto !important;
                                                        overflow: visible !important;
                                                        max-height: none !important;
                                                        font-size: inherit !important;
                                                        line-height: inherit !important;
                                                    }
                                        
                                                    table.body table.container .hide-for-large {
                                                        display: table !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.body table.container .row.hide-for-large {
                                                        display: table !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.body table.container .callout-inner.hide-for-large {
                                                        display: table-cell !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.body table.container .show-for-large {
                                                        display: none !important;
                                                        width: 0;
                                                        mso-hide: all;
                                                        overflow: hidden;
                                                    }
                                        
                                                    table.body img {
                                                        width: auto;
                                                        height: auto;
                                                    }
                                        
                                                    table.body center {
                                                        min-width: 0 !important;
                                                    }
                                        
                                                    table.body .container {
                                                        width: 95% !important;
                                                    }
                                        
                                                    table.body .columns {
                                                        height: auto !important;
                                                        -moz-box-sizing: border-box;
                                                        -webkit-box-sizing: border-box;
                                                        box-sizing: border-box;
                                                        padding-left: 16px !important;
                                                        padding-right: 16px !important;
                                                    }
                                        
                                                    table.body .column {
                                                        height: auto !important;
                                                        -moz-box-sizing: border-box;
                                                        -webkit-box-sizing: border-box;
                                                        box-sizing: border-box;
                                                        padding-left: 16px !important;
                                                        padding-right: 16px !important;
                                                    }
                                        
                                                    table.body .columns .column {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .columns .columns {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .column .column {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .column .columns {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .collapse .columns {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .collapse .column {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    td.small-1 {
                                                        display: inline-block !important;
                                                        width: 8.333333% !important;
                                                    }
                                        
                                                    th.small-1 {
                                                        display: inline-block !important;
                                                        width: 8.333333% !important;
                                                    }
                                        
                                                    td.small-2 {
                                                        display: inline-block !important;
                                                        width: 16.666666% !important;
                                                    }
                                        
                                                    th.small-2 {
                                                        display: inline-block !important;
                                                        width: 16.666666% !important;
                                                    }
                                        
                                                    td.small-3 {
                                                        display: inline-block !important;
                                                        width: 25% !important;
                                                    }
                                        
                                                    th.small-3 {
                                                        display: inline-block !important;
                                                        width: 25% !important;
                                                    }
                                        
                                                    td.small-4 {
                                                        display: inline-block !important;
                                                        width: 33.333333% !important;
                                                    }
                                        
                                                    th.small-4 {
                                                        display: inline-block !important;
                                                        width: 33.333333% !important;
                                                    }
                                        
                                                    td.small-5 {
                                                        display: inline-block !important;
                                                        width: 41.666666% !important;
                                                    }
                                        
                                                    th.small-5 {
                                                        display: inline-block !important;
                                                        width: 41.666666% !important;
                                                    }
                                        
                                                    td.small-6 {
                                                        display: inline-block !important;
                                                        width: 50% !important;
                                                    }
                                        
                                                    th.small-6 {
                                                        display: inline-block !important;
                                                        width: 50% !important;
                                                    }
                                        
                                                    td.small-7 {
                                                        display: inline-block !important;
                                                        width: 58.333333% !important;
                                                    }
                                        
                                                    th.small-7 {
                                                        display: inline-block !important;
                                                        width: 58.333333% !important;
                                                    }
                                        
                                                    td.small-8 {
                                                        display: inline-block !important;
                                                        width: 66.666666% !important;
                                                    }
                                        
                                                    th.small-8 {
                                                        display: inline-block !important;
                                                        width: 66.666666% !important;
                                                    }
                                        
                                                    td.small-9 {
                                                        display: inline-block !important;
                                                        width: 75% !important;
                                                    }
                                        
                                                    th.small-9 {
                                                        display: inline-block !important;
                                                        width: 75% !important;
                                                    }
                                        
                                                    td.small-10 {
                                                        display: inline-block !important;
                                                        width: 83.333333% !important;
                                                    }
                                        
                                                    th.small-10 {
                                                        display: inline-block !important;
                                                        width: 83.333333% !important;
                                                    }
                                        
                                                    td.small-11 {
                                                        display: inline-block !important;
                                                        width: 91.666666% !important;
                                                    }
                                        
                                                    th.small-11 {
                                                        display: inline-block !important;
                                                        width: 91.666666% !important;
                                                    }
                                        
                                                    td.small-12 {
                                                        display: inline-block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    th.small-12 {
                                                        display: inline-block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    .columns td.small-12 {
                                                        display: block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    .column td.small-12 {
                                                        display: block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    .columns th.small-12 {
                                                        display: block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    .column th.small-12 {
                                                        display: block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.body td.small-offset-1 {
                                                        margin-left: 8.333333% !important;
                                                    }
                                        
                                                    table.body th.small-offset-1 {
                                                        margin-left: 8.333333% !important;
                                                    }
                                        
                                                    table.body td.small-offset-2 {
                                                        margin-left: 16.666666% !important;
                                                    }
                                        
                                                    table.body th.small-offset-2 {
                                                        margin-left: 16.666666% !important;
                                                    }
                                        
                                                    table.body td.small-offset-3 {
                                                        margin-left: 25% !important;
                                                    }
                                        
                                                    table.body th.small-offset-3 {
                                                        margin-left: 25% !important;
                                                    }
                                        
                                                    table.body td.small-offset-4 {
                                                        margin-left: 33.333333% !important;
                                                    }
                                        
                                                    table.body th.small-offset-4 {
                                                        margin-left: 33.333333% !important;
                                                    }
                                        
                                                    table.body td.small-offset-5 {
                                                        margin-left: 41.666666% !important;
                                                    }
                                        
                                                    table.body th.small-offset-5 {
                                                        margin-left: 41.666666% !important;
                                                    }
                                        
                                                    table.body td.small-offset-6 {
                                                        margin-left: 50% !important;
                                                    }
                                        
                                                    table.body th.small-offset-6 {
                                                        margin-left: 50% !important;
                                                    }
                                        
                                                    table.body td.small-offset-7 {
                                                        margin-left: 58.333333% !important;
                                                    }
                                        
                                                    table.body th.small-offset-7 {
                                                        margin-left: 58.333333% !important;
                                                    }
                                        
                                                    table.body td.small-offset-8 {
                                                        margin-left: 66.666666% !important;
                                                    }
                                        
                                                    table.body th.small-offset-8 {
                                                        margin-left: 66.666666% !important;
                                                    }
                                        
                                                    table.body td.small-offset-9 {
                                                        margin-left: 75% !important;
                                                    }
                                        
                                                    table.body th.small-offset-9 {
                                                        margin-left: 75% !important;
                                                    }
                                        
                                                    table.body td.small-offset-10 {
                                                        margin-left: 83.333333% !important;
                                                    }
                                        
                                                    table.body th.small-offset-10 {
                                                        margin-left: 83.333333% !important;
                                                    }
                                        
                                                    table.body td.small-offset-11 {
                                                        margin-left: 91.666666% !important;
                                                    }
                                        
                                                    table.body th.small-offset-11 {
                                                        margin-left: 91.666666% !important;
                                                    }
                                        
                                                    table.body table.columns td.expander {
                                                        display: none !important;
                                                    }
                                        
                                                    table.body table.columns th.expander {
                                                        display: none !important;
                                                    }
                                        
                                                    table.body .right-text-pad {
                                                        padding-left: 10px !important;
                                                    }
                                        
                                                    table.body .text-pad-right {
                                                        padding-left: 10px !important;
                                                    }
                                        
                                                    table.body .left-text-pad {
                                                        padding-right: 10px !important;
                                                    }
                                        
                                                    table.body .text-pad-left {
                                                        padding-right: 10px !important;
                                                    }
                                        
                                                    table.menu {
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.menu td {
                                                        width: auto !important;
                                                        display: inline-block !important;
                                                    }
                                        
                                                    table.menu th {
                                                        width: auto !important;
                                                        display: inline-block !important;
                                                    }
                                        
                                                    table.menu.vertical td {
                                                        display: block !important;
                                                    }
                                        
                                                    table.menu.vertical th {
                                                        display: block !important;
                                                    }
                                        
                                                    table.menu.small-vertical td {
                                                        display: block !important;
                                                    }
                                        
                                                    table.menu.small-vertical th {
                                                        display: block !important;
                                                    }
                                        
                                                    table.menu[align="center"] {
                                                        width: auto !important;
                                                    }
                                        
                                                    table.button.small-expand {
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.button.small-expanded {
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.button.small-expand table {
                                                        width: 100%;
                                                    }
                                        
                                                    table.button.small-expanded table {
                                                        width: 100%;
                                                    }
                                        
                                                    table.button.small-expand table a {
                                                        text-align: center !important;
                                                        width: 100% !important;
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.button.small-expanded table a {
                                                        text-align: center !important;
                                                        width: 100% !important;
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.button.small-expand center {
                                                        min-width: 0;
                                                    }
                                        
                                                    table.button.small-expanded center {
                                                        min-width: 0;
                                                    }
                                        
                                                    table.body .container {
                                                        width: 100% !important;
                                                    }
                                                }
                                        
                                                @media only screen and (min-width: 732px) {
                                                    table.body table.milkyway-email-card {
                                                        width: 525px !important;
                                                    }
                                        
                                                    table.body table.emailer-footer {
                                                        width: 525px !important;
                                                    }
                                                }
                                        
                                                @media only screen and (max-width: 731px) {
                                                    table.body table.milkyway-email-card {
                                                        width: 320px !important;
                                                    }
                                        
                                                    table.body table.emailer-footer {
                                                        width: 320px !important;
                                                    }
                                                }
                                        
                                                @media only screen and (max-width: 320px) {
                                                    table.body table.milkyway-email-card {
                                                        width: 100% !important;
                                                        border-radius: 0;
                                                    }
                                        
                                                    table.body table.emailer-footer {
                                                        width: 100% !important;
                                                        border-radius: 0;
                                                    }
                                                }
                                        
                                                @media only screen and (max-width: 280px) {
                                                    table.body table.milkyway-email-card .milkyway-content {
                                                        width: 100% !important;
                                                    }
                                                }
                                        
                                                @media (min-width: 596px) {
                                                    .milkyway-header {
                                                        width: 11%;
                                                    }
                                                }
                                        
                                                @media (max-width: 596px) {
                                                    .milkyway-header {
                                                        width: 50%;
                                                    }
                                        
                                                    .emailer-footer .emailer-border-bottom {
                                                        border-bottom: 0.5px solid #E2E5E7;
                                                    }
                                        
                                                    .emailer-footer .make-you-smile {
                                                        margin-top: 24px;
                                                    }
                                        
                                                    .emailer-footer .make-you-smile .email-tag-line {
                                                        width: 80%;
                                                        position: relative;
                                                        left: 10%;
                                                    }
                                        
                                                    .emailer-footer .make-you-smile .universe-address {
                                                        margin-bottom: 10px !important;
                                                    }
                                        
                                                    .emailer-footer .make-you-smile .email-tag-line {
                                                        margin-bottom: 10px !important;
                                                    }
                                        
                                                    .have-questions-text {
                                                        width: 70%;
                                                    }
                                        
                                                    .hide-on-small {
                                                        display: none;
                                                    }
                                        
                                                    .product-card-stacked-row .thumbnail-image {
                                                        max-width: 32% !important;
                                                    }
                                        
                                                    .product-card-stacked-row .thumbnail-content p {
                                                        width: 64%;
                                                    }
                                        
                                                    .welcome-subcontent {
                                                        text-align: left;
                                                        margin: 20px 0 10px;
                                                    }
                                        
                                                    .milkyway-title {
                                                        padding: 16px;
                                                    }
                                        
                                                    .meta-data {
                                                        text-align: center;
                                                    }
                                        
                                                    .label {
                                                        text-align: center;
                                                    }
                                        
                                                    .welcome-email .wavey-background-subcontent {
                                                        width: calc(100% - 32px);
                                                    }
                                                }
                                        
                                                @media (min-width: 597px) {
                                                    .emailer-footer .show-on-mobile {
                                                        display: none;
                                                    }
                                        
                                                    .emailer-footer .emailer-border-bottom {
                                                        border-bottom: none;
                                                    }
                                        
                                                    .have-questions-text {
                                                        border-bottom: none;
                                                    }
                                        
                                                    .hide-on-large {
                                                        display: none;
                                                    }
                                        
                                                    .milkyway-title {
                                                        padding: 55px 55px 16px;
                                                    }
                                                }
                                        
                                                @media only screen and (max-width: 290px) {
                                                    table.container.your-tickets .tickets-container {
                                                        width: 100%;
                                                    }
                                                }
                                            </style>
                                            
                                            <table class="body" data-made-with-foundation=""
                                                style="background: #FAFAFA; border-collapse: collapse; border-spacing: 0; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"
                                                bgcolor="#FAFAFA">
                                                <tbody>
                                                    <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                        <td class="center" align="center" valign="top"
                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word">
                                                            <center style="min-width: 580px; width: 100%">
                                                                <table class=" spacer  float-center" align="center"
                                                                    style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td height="20px"
                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class="header-spacer spacer  float-center" align="center"
                                                                    style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 60px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td height="16px"
                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                        
                                                                <table class="header-spacer-bottom spacer  float-center" align="center"
                                                                    style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 30px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td height="16px"
                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                        
                                                                <table class="milkyway-email-card container float-center" align="center"
                                                                    style="background: #FFFFFF; border-collapse: collapse; border-radius: 6px; border-spacing: 0; box-shadow: 0 1px 8px 0 rgba(28,35,43,0.15); float: none; margin: 0 auto; overflow: hidden; padding: 0; text-align: center; vertical-align: top; width: 580px"
                                                                    bgcolor="#FFFFFF">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">
                                        
                                                                                <table class="milkyway-content welcome-email container" align="center"
                                                                                    style="background: #FFFFFF; border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: inherit; vertical-align: top; width: 280px !important"
                                                                                    bgcolor="#FFFFFF">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                align="left" valign="top">
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="50px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 50px; font-weight: normal; hyphens: auto; line-height: 50px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                               
                                        
                                                                                                <table class="milkyway-content row"
                                                                                                    style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 350px !important">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <th class=" small-12 large-12 columns first last"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                            align="left">
                                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                                align="left">
                                                                                                                                <h1 class="welcome-header"
                                                                                                                                    style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 600; hyphens: none; line-height: 30px; margin: 0 0 24px; padding: 0; text-align: left; width: 100%; word-wrap: normal"
                                                                                                                                    align="left">Reservierung abgeschlossen.</h1>
                                                                                                                                <h2 class="welcome-subcontent"
                                                                                                                                    style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: center; width: 100%; word-wrap: normal"
                                                                                                                                    align="left">Ihre Reservierung im '.$otelAdi.' Hotel wurde zwischen dem '.$start_date.' - '.$end_date.' Datum erfolgreich reserviert.  </h2>
                                                                                                                                <h2 class="welcome-subcontent"
                                                                                                                                    style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 10px 0 0 0; padding: 0; text-align: center; width: 100%; word-wrap: normal"
                                                                                                                                    align="left"> Um Ihre Reservierungsdetails anzuzeigen, klicken Sie <a style="color: #333; font-weight:500;" href="'.$rezervasyonLink.'">hier</a> oder verwenden Sie die Schaltfläche unten.</h2>
                                                                                                                            </th>
                                                                                                                            <th class="expander"
                                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                                align="left"></th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                        
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="30px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                                <table class="milkyway-content wrapper" align="center"
                                                                                                    style="border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td class="wrapper-inner"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                                <table class="milkyway-content row"
                                                                                                    style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <th class="milkyway-padding small-12 large-12 columns first last"
                                                                                                                valign="middle"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                            align="left">
                                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                                align="left">
                                                                                                                                <table
                                                                                                                                    class="cta-text primary radius expanded button"
                                                                                                                                    style="border-collapse: collapse; border-spacing: 0; font-size: 14px; font-weight: 400; line-height: 0; margin: 0 0 16px; padding: 0; text-align: left; vertical-align: top; width: 100% !important">
                                                                                                                                    <tbody>
                                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                                            align="left">
                                                                                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                                                align="left"
                                                                                                                                                valign="top">
                                                                                                                                                <table
                                                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                                                    <tbody>
                                                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                                                            align="left">
                                                                                                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; background: #00aeff; border: 2px none #4e78f1; border-collapse: collapse !important; border-radius: 6px; color: #FFFFFF; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                                                                align="left"
                                                                                                                                                                bgcolor="#4E78F1"
                                                                                                                                                                valign="top">
                                                                                                                                                                <a href="'.$rezervasyonLink.'" style="border: 0 solid #4e78f1; border-radius: 6px; color: #FFFFFF; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.3; margin: 0; padding: 13px 0; text-align: center; text-decoration: none; width: 100%" target="_blank"><p class="text-center"
                                                                                                                                                                        style="color: white; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; letter-spacing: 1px; line-height: 1.3; margin: 0; padding: 0; text-align: center"
                                                                                                                                                                        align="center">
                                                                                                                                                                        Reservierung anzeigen
                                                                                                                                                                    </p>
                                                                                                                                                                </a>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                    </tbody>
                                                                                                                                                </table>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </th>
                                                                                                                            <th class="expander"
                                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                                align="left"></th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                        
                                        
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="30px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <table class="have-questions-wrapper  container" align="center"
                                                                                    style="background-color: #F5F5F5 !important; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100% !important"
                                                                                    bgcolor="#F5F5F5">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                align="left" valign="top">
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="24px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                        
                                                                                                <table class="milkyway-content row"
                                                                                                    style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <th class=" small-12 large-12 columns first last"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                            align="left">
                                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                                align="left">
                                                                                                                                <img width="10"
                                                                                                                                    src="https://www.sungate24.com/lib/img/logo_sticky.png"
                                                                                                                                    style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 50%; outline: none; text-align: center; text-decoration: none; width: auto">
                                                                                                                                <h3 style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 600; line-height: 26px; margin: 10px 10px 10px; padding: 0; text-align: center; word-wrap: normal"
                                                                                                                                    align="left">Sie haben eine Frage?</h3>
                                        
                                        
                                        
                                                                                                                                <p class="help-center"
                                                                                                                                    style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 15px 0 10px; padding: 0; text-align: center"
                                                                                                                                    align="left"> <a
                                                                                                                                        href="https://www.sungate24.com/faq?ref=active_email"
                                                                                                                                        style="color: #4E78F1; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none"
                                                                                                                                        target="_blank">Hier finden Sie unsere Liste mit häufig gestellten Fragen.</a>
                                                                                                                                </p>
                                                                                                                            </th>
                                                                                                                            <th class="expander"
                                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                                align="left"></th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                        
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="24px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                        
                                        
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class=" spacer  float-center" align="center"
                                                                    style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td height="20px"
                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class="emailer-footer container float-center" align="center"
                                                                    style="background-color: transparent !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px"
                                                                    bgcolor="transparent">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">
                                                                                <table class=" row"
                                                                                    style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <th class=" small-12 large-4 columns first"
                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px 16px; text-align: left; width: 177.3333333333px"
                                                                                                align="left">
                                                                                                <table
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                align="left">
                                                                                                            </th>
                                                                                                            <th class="emailer-border-bottom small-12 large-11 columns first"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                            align="left">
                                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                                align="left">
                                        
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                            <th class="show-for-large small-12 large-1 columns last"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                        
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                </th>
                                                                            <th class=" small-12 large-4 columns"
                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px; text-align: left; width: 177.3333333333px"
                                                                                align="left">
                                                                                <table
                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                align="left">
                                                                                            </th>
                                                                                            <th class="emailer-border-bottom small-12 large-11 columns first"
                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%"
                                                                                                align="left">
                                                                                                <table
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                        
                                                                                                    </p>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                            <th class="show-for-large small-12 large-1 columns last"
                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%"
                                                                                align="left">
                                                                                <table
                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                align="left">
                                        
                                                                                            </th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                </th>
                                        
                                        
                                         
                                                                <p class="help-email-address text-center"
                                                                    style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center"
                                                                    align="center">
                                                                    <span class="text-divider" style="margin-left: 10px; margin-right: 10px">
                                                                        ©
                                                                        '.date('Y').'
                                                                        <a href="https://www.sungate24.com/?ref=active_email"
                                                                            style="color: #4E78F1; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none"
                                                                            target="_blank">
                                                                            sungate24.com
                                                                </p>
                                                                </th>
                                                        <th class="expander"
                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                            align="left"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </th>
                                            </tr>
                                            </tbody>
                                            </table>
                                            </td>
                                            </tr>
                                            </tbody>
                                            </table>
                                        
                                            </center>
                                            </td>
                                            </tr>
                                            </tbody>
                                            </table>
                                        
                                        
                                        </body>
                                        
                                        </html>
                                    ');
                                if(!$mail->Send()) {
                                    $dizi["hata"] = 'Wenn ein Fehler aufgetreten ist, wenden Sie sich an unseren Kundendienst, falls das Problem weiterhin besteht.';
                                    exit;
                                } else {
                                    unset($_SESSION["sepet"]);
                                    $dizi["ok"] = 'Ihre Registrierung ist erfolgreich. Bitte überprüfen Sie Ihre E-Mail-Adresse und Ihre Junk-Mailbox.';
                                    
                                    $_POST = array();
                                    
                                }
                            }
                            catch (Exception $e) {
                                $dizi["hata"] = 'Wenn ein Fehler aufgetreten ist, wenden Sie sich an unseren Kundendienst, falls das Problem weiterhin besteht.';
                                exit;
                            }
                        }else{
                            $dizi["hata"] = '3h222ata.';
                        }
                    }else{
                        $dizi["hata"] = 'Bir hata'.$lastUser.'meydana geldi.'.$db->debug();
                    }

                }else{
                    $lastUser = $_SESSION['uye']['hzu_userid'];
                    $rezervasyonNo = $_SESSION["sepet"]["rezervasyonNumarasi"];
                    $sepetim__urunler = isset($_SESSION['sepet']['rezervasyon']) ? $_SESSION['sepet']['rezervasyon'] : array();
                    foreach ($sepetim__urunler as $sepetim__urun) {
                        $hotel_id = $sepetim__urun['hotel_id'];
                        $room_id = $sepetim__urun['room_id'];
                        $dates = $sepetim__urun['dates'];
                        $person_size = $sepetim__urun['person_size'];
                        $child_size = $sepetim__urun['child_size'];
                        $start_date = $sepetim__urun['start_date'];
                        $end_date = $sepetim__urun['end_date'];

                        $paketbul = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$hotel_id'");
                        $odaBul = $db->get_row("SELECT * FROM the_hotel_room WHERE room_id = '$room_id'");

                        $yetiskinFiyat = $odaBul->person_price * $person_size;
                        $CocukFiyat = $odaBul->child_price * $child_size;
                        $fiyat = $yetiskinFiyat + $CocukFiyat;
                    }
                    $tarih1 = strtotime($start_date);
                    $tarih2 = strtotime($end_date);
                    $gunSayisi =  ($tarih2 - $tarih1) / (60*60*24);
                    $fiyat = $fiyat * $gunSayisi;

                    $siparisInsert = $db->query("INSERT INTO reservations SET
                            havalimani = '$havalimani',
                            rezervation_number = '$rezervasyonNo',
                            rezervation_type = 'hotel',
                            user_id = '$lastUser',
                            hotel_id = '$hotel_id',
                            room_id = '$room_id',  
                            hotel_dates = '$dates',
                            start_date = '$start_date',
                            end_date = '$end_date',
                            person_size = '$person_size',
                            child_size = '$child_size',
                            created_user = '$lastUser',
                            total_price = '$fiyat',
                            created_at = now(),
                            status = 0");

                    if($siparisInsert){
                        $gender = $_POST['gender'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $passport_no = $_POST['passport_no'];
                        $passport_date = $_POST['passport_date'];
                        $day = $_POST['day'];
                        $mounth = $_POST['mounth'];
                        $year = $_POST['year'];

                        if(!$gender || !$firstname || !$lastname || !$passport_no){
                            $dizi["hata"] = 'Bitte füllen Sie alle Felder aus..';
                        }else{
                            for($i=0; $i<count($gender); $i++){
                                $birthday = $year[$i].'-'.$mounth[$i].'-'.$day[$i];
                                $rezuserinsert .= $db->query("INSERT INTO reservations_users SET
                                        rezervation_number = '$rezervasyonNo',
                                        gender = '$gender[$i]',
                                        firstname = '$firstname[$i]',
                                        lastname = '$lastname[$i]',
                                        birthday = '$birthday',
                                        passport_no = '$passport_no[$i]',
                                        passport_date = '$passport_date[$i]'");
                            }
                            $otelAdi = $paketbul->name;

                            $rezervasyonLink = 'https://www.sungate24.com/resretail/'.$rezervasyonNo;

                            if($rezuserinsert){
                                $dizi["hata"] = '3h2222222ata.';
                            }else{
                                $dizi["hata"] = '3h222ata.';
                            }
                        }
                    }else{
                        $dizi["hata"] = '23hata.';
                    }

                }
            }
            /*






            $rezervasyonNo = $_SESSION["sepet"]["rezervasyonNumarasi"];
            $sepetim__urunler = isset($_SESSION['sepet']['rezervasyon']) ? $_SESSION['sepet']['rezervasyon'] : array();
            foreach ($sepetim__urunler as $sepetim__urun) {
                $rez_type = $sepetim__urun['rez_type'];
                $tour_id = $sepetim__urun['tour_id'];
                $tour_dates = $sepetim__urun['tour_dates'];
                $person_size = $sepetim__urun['person_size'];
                $child_size = $sepetim__urun['child_size'];


                $paketbul = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id'");
                $tarihbul = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tour_id' AND date_id = $tour_dates");

                $yetiskinFiyat = $tarihbul->person_price * $person_size;
                $CocukFiyat = $tarihbul->child_price * $child_size;
                $fiyat = $yetiskinFiyat + $CocukFiyat;
            }

            for($i=0; $i<count($gender); $i++){

                echo $ad[$i].$soyad[$i].$tip[$i].'<br />';

            }
            */
        }

        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM reservations WHERE id = '$ID'");
            $delete = $db->query("DELETE FROM reservations_users  WHERE rezervation_number = '$bul->rezervation_number'");
            $delete = $db->query("DELETE FROM reservations  WHERE id = '$ID'");
            if ($delete){
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }

        echo json_encode($dizi);
    }
}
if ($do == 'user') {
    if ($_POST) {

        if($q == 'fatura_edit'){
            $userID = $_SESSION['uye']['hzu_userid'];
            $fatura_unvan = p('fatura_unvan');
            $fatura_telefon = p('telefon');
            $fatura_il = p('il_id');
            $fatura_ilce = p('ilce_id');
            $fatura_postakodu = p('posta_kodu');
            $fatura_adres = p('fatura_adresi');
            $fatura_vergi = p('fatura_vergi');

            $user = $db->get_row("SELECT * FROM users WHERE id = '$userID'");
            if($user){
                $update = $db->query("UPDATE users SET
						fatura_vergi = '$fatura_vergi',
						fatura_unvan = '$fatura_unvan',
						fatura_telefon = '$fatura_telefon',
						fatura_adresi = '$fatura_adres' WHERE id = '$userID'");
                if($update){
                    $dizi['ok'] = 'Ihre Informationen wurden erfolgreich aktualisiert.';
                }else{
                    $dizi['hata'] = 'Ein Fehler ist aufgetreten und Ihre Informationen konnten nicht aktualisiert werden.';
                }
            }else{
                $dizi['hata'] = 'Ein Fehler ist aufgetreten und Ihre Informationen konnten nicht aktualisiert werden.';
            }

            /*

            $user = $db->get_row("SELECT * FROM users WHERE email = '$user_email' AND password = '$password'");
            if($user){
                $uyeBilgileri = array(
                    "hzu_userid" => $user->id,
                    "hzu_name" => $user->adsoyad,
                    "hzu_eposta" => $user->email,
                    "hzu_usertype" => $user->user_type
                );
                $_SESSION["uye"] = $uyeBilgileri;
                $dizi['ok'] = 'Giriş başarılı, yönlendiriliyorsunuz.';
            }else{
                $dizi['hata'] = 'Girilen bilgiler yanlış lütfen kontrol edip tekrar deneyin.';
            }
            */
        }

        if($q == 'edit'){
            $userID = $_SESSION['uye']['hzu_userid'];
            $firstname = p('firstname');
            $lastname = p('lastname');
            $user_name = sef_link($user_adsoyad);
            $user_email = p('email');
            $user_phone = p('phone');
            $user_sifre = p('sifre');
            $gender = p('gender');

            $user = $db->get_row("SELECT * FROM users WHERE id = '$userID'");
            if($user){
                if($user_sifre){
                    $passwordduz = $user_sifre;
                    $password = sha1(md5($user_sifre));
                }else{
                    $passwordduz = $user->password_temiz;
                    $password = $user->password;
                }
                $update = $db->query("UPDATE users SET
						firstname = '$firstname',
						lastname = '$lastname',
                        gender = '$gender',
                        email = '$user_email',
                        telephone = '$user_phone' WHERE id = '$userID'");
                if($update){
                    $upUser = $db->get_row("SELECT * FROM users WHERE id = '$userID'");
                    $uyeBilgileri = array(
                        "hzu_userid" => $upUser->id,
                        "hzu_name" => $upUser->adsoyad,
                        "hzu_eposta" => $upUser->email,
                        "hzu_usertype" => $upUser->user_type
                    );
                    $_SESSION["uye"] = $uyeBilgileri;

                    $dizi['ok'] = 'Ihre Informationen wurden erfolgreich aktualisiert.';
                }else{
                    $dizi['hata'] = 'Ein Fehler ist aufgetreten und Ihre Informationen konnten nicht aktualisiert werden.';
                }
            }else{
                $dizi['hata'] = 'Ein Fehler ist aufgetreten und Ihre Informationen konnten nicht aktualisiert werden.';
            }

            /*

            $user = $db->get_row("SELECT * FROM users WHERE email = '$user_email' AND password = '$password'");
            if($user){
                $uyeBilgileri = array(
                    "hzu_userid" => $user->id,
                    "hzu_name" => $user->adsoyad,
                    "hzu_eposta" => $user->email,
                    "hzu_usertype" => $user->user_type
                );
                $_SESSION["uye"] = $uyeBilgileri;
                $dizi['ok'] = 'Giriş başarılı, yönlendiriliyorsunuz.';
            }else{
                $dizi['hata'] = 'Girilen bilgiler yanlış lütfen kontrol edip tekrar deneyin.';
            }
            */
        }

        if($q == 'login'){
            $user_email = trim($_POST['email']);
            $user_password = trim($_POST['password']);
            $password = sha1(md5($user_password));
            $user = $db->get_row("SELECT * FROM users WHERE email = '$user_email' AND password = '$password'");
            if($user){
                $userAdSoyad = $user->firstname.' '.$user->lastname;
                $uyeBilgileri = array(
                    "hzu_userid" => $user->id,
                    "hzu_name" => $userAdSoyad,
                    "hzu_eposta" => $user->email
                );
                $_SESSION["uye"] = $uyeBilgileri;
                $dizi['ok'] = 'Anmeldung erfolgreich, Weiterleitung.';
            }else{
                $dizi['hata'] = 'Bitte überprüfen Sie die eingegebenen Informationen falsch und versuchen Sie es erneut.';
            }
        }

        if($q == 'register'){
            $firstname = p('firstname');
            $lastname = p('lastname');
            $user_username = sef_link($user_name);
            $user_email = p('eposta');
            $user_password = p('password');
            $user_phone = p('phone');
            $user_sozlesme = p('sozlesme');
            $user_google = p('g-recaptcha-response');

            if(!$firstname || !$lastname || !$user_email || !$user_password) {
                $dizi["hata"] = 'Bitte füllen Sie alle Felder aus';
            }elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$user_email)) {
                $dizi["hata"] = 'Die E-Mail-Adresse ist falsch. Bitte geben Sie eine korrekte E-Mail-Adresse ein, da Sie sonst keine Informationen über die Site erhalten und sich nicht beim System anmelden können.';
            }else{
                $sorgu = $db->get_var("SELECT COUNT(*) FROM users WHERE email='$user_email'");
                if ( $sorgu > 0) {
                    $dizi["hata"] = 'Diese E-Mail-Adresse wird bereits von einem anderen Benutzer verwendet. Wenn Sie Ihr Passwort vergessen haben, senden Sie eine Reset-Nachricht.';
                } else {

                    $active_code = sha1(md5($simdikiZaman));
                    $user_password2 = sha1(md5($user_password));
                    $userInsert = $db->query("INSERT INTO users SET
	                          firstname = '$firstname',
	                          lastname = '$lastname',
	                          password = '$user_password2',
	                          email = '$user_email',
	                          active_kod = '$active_code',
                              ugroup = 0,
	                          created_at = now(),
                              status = 0");
                    if($userInsert){

                        $user = $db->get_row("SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password2'");
                        $userAdSoyad = $user->firstname.' '.$user->lastname;
                        $uyeBilgileri = array(
                            "hzu_userid" => $user->id,
                            "hzu_name" => $userAdSoyad,
                            "hzu_eposta" => $user->email
                        );
                        $_SESSION["uye"] = $uyeBilgileri;

                        try {
                            date_default_timezone_set('Europe/Istanbul');
                            //Server settings
                            $mail = new PHPMailer();
                            $mail->CharSet = 'utf-8';
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->SMTPAutoTLS = true;
                            $mail->SMTPOptions = array(
                                'ssl' => array(
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                )
                            );
                            $mail->Host = 'mail.sungate24.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'no-reply@sungate24.com';
                            $mail->Password = '8_Radf65';
                            $mail->Port = 587;
                            $mail->setLanguage('tr');
                            $mail->setFrom($mail->Username, 'Sungate24');
                            $mail->IsHTML(true);
                            $mail->addAddress($user->email, $userAdSoyad);
                            $mail->Subject = 'Mitgliedschaftsaktivierung';
                            $mail->msgHTML('
                                        <!DOCTYPE html>
                                        <html lang="de">
                                        <head>
                                            <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
                                            <meta charset="UTF-8">
                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                            <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                        </head>
                                        
                                        <body
                                            style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; box-sizing: border-box; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 22px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important">
                                        
                                        
                                        
                                            <style type="text/css">
                                                body {
                                                    background-color: #FAFAFA;
                                                    width: 100% !important;
                                                    min-width: 100%;
                                                    -webkit-text-size-adjust: 100%;
                                                    -ms-text-size-adjust: 100%;
                                                    margin: 0;
                                                    padding: 0;
                                                    -moz-box-sizing: border-box;
                                                    -webkit-box-sizing: border-box;
                                                    box-sizing: border-box;
                                                }
                                        
                                                .ExternalClass {
                                                    width: 100%;
                                                }
                                        
                                                .ExternalClass {
                                                    line-height: 100%;
                                                }
                                        
                                                #backgroundTable {
                                                    margin: 0;
                                                    padding: 0;
                                                    width: 100% !important;
                                                    line-height: 100% !important;
                                                }
                                        
                                                img {
                                                    outline: none;
                                                    text-decoration: none;
                                                    -ms-interpolation-mode: bicubic;
                                                    width: auto;
                                                    max-width: 100%;
                                                    clear: both;
                                                    display: block;
                                                }
                                        
                                                body {
                                                    color: #1C232B;
                                                    font-family: Helvetica, Arial, sans-serif;
                                                    font-weight: normal;
                                                    padding: 0;
                                                    margin: 0;
                                                    text-align: left;
                                                    line-height: 1.3;
                                                }
                                        
                                                body {
                                                    font-size: 16px;
                                                    line-height: 1.3;
                                                }
                                        
                                                a:hover {
                                                    color: #1f54ed;
                                                }
                                        
                                                a:active {
                                                    color: #1f54ed;
                                                }
                                        
                                                a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h1 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h2 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h3 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h4 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h5 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                h6 a:visited {
                                                    color: #4E78F1;
                                                }
                                        
                                                table.button:hover table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:active table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button table tr td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.tiny:hover table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.tiny:active table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.tiny table tr td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.small:hover table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.small:active table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.small table tr td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.large:hover table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.large:active table tr td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.large table tr td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:hover table td {
                                                    background: #1f54ed;
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:visited table td {
                                                    background: #1f54ed;
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:active table td {
                                                    background: #1f54ed;
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button:hover table a {
                                                    border: 0 solid #1f54ed;
                                                }
                                        
                                                table.button:visited table a {
                                                    border: 0 solid #1f54ed;
                                                }
                                        
                                                table.button:active table a {
                                                    border: 0 solid #1f54ed;
                                                }
                                        
                                                table.button.secondary:hover table td {
                                                    background: #fefefe;
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.secondary:hover table a {
                                                    border: 0 solid #fefefe;
                                                }
                                        
                                                table.button.secondary:hover table td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.secondary:active table td a {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.secondary table td a:visited {
                                                    color: #FFFFFF;
                                                }
                                        
                                                table.button.success:hover table td {
                                                    background: #009482;
                                                }
                                        
                                                table.button.success:hover table a {
                                                    border: 0 solid #009482;
                                                }
                                        
                                                table.button.alert:hover table td {
                                                    background: #ff6131;
                                                }
                                        
                                                table.button.alert:hover table a {
                                                    border: 0 solid #ff6131;
                                                }
                                        
                                                table.button.warning:hover table td {
                                                    background: #fcae1a;
                                                }
                                        
                                                table.button.warning:hover table a {
                                                    border: 0px solid #fcae1a;
                                                }
                                        
                                                .thumbnail:hover {
                                                    box-shadow: 0 0 6px 1px rgba(78, 120, 241, 0.5);
                                                }
                                        
                                                .thumbnail:focus {
                                                    box-shadow: 0 0 6px 1px rgba(78, 120, 241, 0.5);
                                                }
                                        
                                                body.outlook p {
                                                    display: inline !important;
                                                }
                                        
                                                body {
                                                    font-weight: normal;
                                                    font-size: 16px;
                                                    line-height: 22px;
                                                }
                                        
                                                @media only screen and (max-width: 596px) {
                                                    .small-float-center {
                                                        margin: 0 auto !important;
                                                        float: none !important;
                                                        text-align: center !important;
                                                    }
                                        
                                                    .small-text-center {
                                                        text-align: center !important;
                                                    }
                                        
                                                    .small-text-left {
                                                        text-align: left !important;
                                                    }
                                        
                                                    .small-text-right {
                                                        text-align: right !important;
                                                    }
                                        
                                                    .hide-for-large {
                                                        display: block !important;
                                                        width: auto !important;
                                                        overflow: visible !important;
                                                        max-height: none !important;
                                                        font-size: inherit !important;
                                                        line-height: inherit !important;
                                                    }
                                        
                                                    table.body table.container .hide-for-large {
                                                        display: table !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.body table.container .row.hide-for-large {
                                                        display: table !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.body table.container .callout-inner.hide-for-large {
                                                        display: table-cell !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.body table.container .show-for-large {
                                                        display: none !important;
                                                        width: 0;
                                                        mso-hide: all;
                                                        overflow: hidden;
                                                    }
                                        
                                                    table.body img {
                                                        width: auto;
                                                        height: auto;
                                                    }
                                        
                                                    table.body center {
                                                        min-width: 0 !important;
                                                    }
                                        
                                                    table.body .container {
                                                        width: 95% !important;
                                                    }
                                        
                                                    table.body .columns {
                                                        height: auto !important;
                                                        -moz-box-sizing: border-box;
                                                        -webkit-box-sizing: border-box;
                                                        box-sizing: border-box;
                                                        padding-left: 16px !important;
                                                        padding-right: 16px !important;
                                                    }
                                        
                                                    table.body .column {
                                                        height: auto !important;
                                                        -moz-box-sizing: border-box;
                                                        -webkit-box-sizing: border-box;
                                                        box-sizing: border-box;
                                                        padding-left: 16px !important;
                                                        padding-right: 16px !important;
                                                    }
                                        
                                                    table.body .columns .column {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .columns .columns {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .column .column {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .column .columns {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .collapse .columns {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.body .collapse .column {
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    td.small-1 {
                                                        display: inline-block !important;
                                                        width: 8.333333% !important;
                                                    }
                                        
                                                    th.small-1 {
                                                        display: inline-block !important;
                                                        width: 8.333333% !important;
                                                    }
                                        
                                                    td.small-2 {
                                                        display: inline-block !important;
                                                        width: 16.666666% !important;
                                                    }
                                        
                                                    th.small-2 {
                                                        display: inline-block !important;
                                                        width: 16.666666% !important;
                                                    }
                                        
                                                    td.small-3 {
                                                        display: inline-block !important;
                                                        width: 25% !important;
                                                    }
                                        
                                                    th.small-3 {
                                                        display: inline-block !important;
                                                        width: 25% !important;
                                                    }
                                        
                                                    td.small-4 {
                                                        display: inline-block !important;
                                                        width: 33.333333% !important;
                                                    }
                                        
                                                    th.small-4 {
                                                        display: inline-block !important;
                                                        width: 33.333333% !important;
                                                    }
                                        
                                                    td.small-5 {
                                                        display: inline-block !important;
                                                        width: 41.666666% !important;
                                                    }
                                        
                                                    th.small-5 {
                                                        display: inline-block !important;
                                                        width: 41.666666% !important;
                                                    }
                                        
                                                    td.small-6 {
                                                        display: inline-block !important;
                                                        width: 50% !important;
                                                    }
                                        
                                                    th.small-6 {
                                                        display: inline-block !important;
                                                        width: 50% !important;
                                                    }
                                        
                                                    td.small-7 {
                                                        display: inline-block !important;
                                                        width: 58.333333% !important;
                                                    }
                                        
                                                    th.small-7 {
                                                        display: inline-block !important;
                                                        width: 58.333333% !important;
                                                    }
                                        
                                                    td.small-8 {
                                                        display: inline-block !important;
                                                        width: 66.666666% !important;
                                                    }
                                        
                                                    th.small-8 {
                                                        display: inline-block !important;
                                                        width: 66.666666% !important;
                                                    }
                                        
                                                    td.small-9 {
                                                        display: inline-block !important;
                                                        width: 75% !important;
                                                    }
                                        
                                                    th.small-9 {
                                                        display: inline-block !important;
                                                        width: 75% !important;
                                                    }
                                        
                                                    td.small-10 {
                                                        display: inline-block !important;
                                                        width: 83.333333% !important;
                                                    }
                                        
                                                    th.small-10 {
                                                        display: inline-block !important;
                                                        width: 83.333333% !important;
                                                    }
                                        
                                                    td.small-11 {
                                                        display: inline-block !important;
                                                        width: 91.666666% !important;
                                                    }
                                        
                                                    th.small-11 {
                                                        display: inline-block !important;
                                                        width: 91.666666% !important;
                                                    }
                                        
                                                    td.small-12 {
                                                        display: inline-block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    th.small-12 {
                                                        display: inline-block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    .columns td.small-12 {
                                                        display: block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    .column td.small-12 {
                                                        display: block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    .columns th.small-12 {
                                                        display: block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    .column th.small-12 {
                                                        display: block !important;
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.body td.small-offset-1 {
                                                        margin-left: 8.333333% !important;
                                                    }
                                        
                                                    table.body th.small-offset-1 {
                                                        margin-left: 8.333333% !important;
                                                    }
                                        
                                                    table.body td.small-offset-2 {
                                                        margin-left: 16.666666% !important;
                                                    }
                                        
                                                    table.body th.small-offset-2 {
                                                        margin-left: 16.666666% !important;
                                                    }
                                        
                                                    table.body td.small-offset-3 {
                                                        margin-left: 25% !important;
                                                    }
                                        
                                                    table.body th.small-offset-3 {
                                                        margin-left: 25% !important;
                                                    }
                                        
                                                    table.body td.small-offset-4 {
                                                        margin-left: 33.333333% !important;
                                                    }
                                        
                                                    table.body th.small-offset-4 {
                                                        margin-left: 33.333333% !important;
                                                    }
                                        
                                                    table.body td.small-offset-5 {
                                                        margin-left: 41.666666% !important;
                                                    }
                                        
                                                    table.body th.small-offset-5 {
                                                        margin-left: 41.666666% !important;
                                                    }
                                        
                                                    table.body td.small-offset-6 {
                                                        margin-left: 50% !important;
                                                    }
                                        
                                                    table.body th.small-offset-6 {
                                                        margin-left: 50% !important;
                                                    }
                                        
                                                    table.body td.small-offset-7 {
                                                        margin-left: 58.333333% !important;
                                                    }
                                        
                                                    table.body th.small-offset-7 {
                                                        margin-left: 58.333333% !important;
                                                    }
                                        
                                                    table.body td.small-offset-8 {
                                                        margin-left: 66.666666% !important;
                                                    }
                                        
                                                    table.body th.small-offset-8 {
                                                        margin-left: 66.666666% !important;
                                                    }
                                        
                                                    table.body td.small-offset-9 {
                                                        margin-left: 75% !important;
                                                    }
                                        
                                                    table.body th.small-offset-9 {
                                                        margin-left: 75% !important;
                                                    }
                                        
                                                    table.body td.small-offset-10 {
                                                        margin-left: 83.333333% !important;
                                                    }
                                        
                                                    table.body th.small-offset-10 {
                                                        margin-left: 83.333333% !important;
                                                    }
                                        
                                                    table.body td.small-offset-11 {
                                                        margin-left: 91.666666% !important;
                                                    }
                                        
                                                    table.body th.small-offset-11 {
                                                        margin-left: 91.666666% !important;
                                                    }
                                        
                                                    table.body table.columns td.expander {
                                                        display: none !important;
                                                    }
                                        
                                                    table.body table.columns th.expander {
                                                        display: none !important;
                                                    }
                                        
                                                    table.body .right-text-pad {
                                                        padding-left: 10px !important;
                                                    }
                                        
                                                    table.body .text-pad-right {
                                                        padding-left: 10px !important;
                                                    }
                                        
                                                    table.body .left-text-pad {
                                                        padding-right: 10px !important;
                                                    }
                                        
                                                    table.body .text-pad-left {
                                                        padding-right: 10px !important;
                                                    }
                                        
                                                    table.menu {
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.menu td {
                                                        width: auto !important;
                                                        display: inline-block !important;
                                                    }
                                        
                                                    table.menu th {
                                                        width: auto !important;
                                                        display: inline-block !important;
                                                    }
                                        
                                                    table.menu.vertical td {
                                                        display: block !important;
                                                    }
                                        
                                                    table.menu.vertical th {
                                                        display: block !important;
                                                    }
                                        
                                                    table.menu.small-vertical td {
                                                        display: block !important;
                                                    }
                                        
                                                    table.menu.small-vertical th {
                                                        display: block !important;
                                                    }
                                        
                                                    table.menu[align="center"] {
                                                        width: auto !important;
                                                    }
                                        
                                                    table.button.small-expand {
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.button.small-expanded {
                                                        width: 100% !important;
                                                    }
                                        
                                                    table.button.small-expand table {
                                                        width: 100%;
                                                    }
                                        
                                                    table.button.small-expanded table {
                                                        width: 100%;
                                                    }
                                        
                                                    table.button.small-expand table a {
                                                        text-align: center !important;
                                                        width: 100% !important;
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.button.small-expanded table a {
                                                        text-align: center !important;
                                                        width: 100% !important;
                                                        padding-left: 0 !important;
                                                        padding-right: 0 !important;
                                                    }
                                        
                                                    table.button.small-expand center {
                                                        min-width: 0;
                                                    }
                                        
                                                    table.button.small-expanded center {
                                                        min-width: 0;
                                                    }
                                        
                                                    table.body .container {
                                                        width: 100% !important;
                                                    }
                                                }
                                        
                                                @media only screen and (min-width: 732px) {
                                                    table.body table.milkyway-email-card {
                                                        width: 525px !important;
                                                    }
                                        
                                                    table.body table.emailer-footer {
                                                        width: 525px !important;
                                                    }
                                                }
                                        
                                                @media only screen and (max-width: 731px) {
                                                    table.body table.milkyway-email-card {
                                                        width: 320px !important;
                                                    }
                                        
                                                    table.body table.emailer-footer {
                                                        width: 320px !important;
                                                    }
                                                }
                                        
                                                @media only screen and (max-width: 320px) {
                                                    table.body table.milkyway-email-card {
                                                        width: 100% !important;
                                                        border-radius: 0;
                                                    }
                                        
                                                    table.body table.emailer-footer {
                                                        width: 100% !important;
                                                        border-radius: 0;
                                                    }
                                                }
                                        
                                                @media only screen and (max-width: 280px) {
                                                    table.body table.milkyway-email-card .milkyway-content {
                                                        width: 100% !important;
                                                    }
                                                }
                                        
                                                @media (min-width: 596px) {
                                                    .milkyway-header {
                                                        width: 11%;
                                                    }
                                                }
                                        
                                                @media (max-width: 596px) {
                                                    .milkyway-header {
                                                        width: 50%;
                                                    }
                                        
                                                    .emailer-footer .emailer-border-bottom {
                                                        border-bottom: 0.5px solid #E2E5E7;
                                                    }
                                        
                                                    .emailer-footer .make-you-smile {
                                                        margin-top: 24px;
                                                    }
                                        
                                                    .emailer-footer .make-you-smile .email-tag-line {
                                                        width: 80%;
                                                        position: relative;
                                                        left: 10%;
                                                    }
                                        
                                                    .emailer-footer .make-you-smile .universe-address {
                                                        margin-bottom: 10px !important;
                                                    }
                                        
                                                    .emailer-footer .make-you-smile .email-tag-line {
                                                        margin-bottom: 10px !important;
                                                    }
                                        
                                                    .have-questions-text {
                                                        width: 70%;
                                                    }
                                        
                                                    .hide-on-small {
                                                        display: none;
                                                    }
                                        
                                                    .product-card-stacked-row .thumbnail-image {
                                                        max-width: 32% !important;
                                                    }
                                        
                                                    .product-card-stacked-row .thumbnail-content p {
                                                        width: 64%;
                                                    }
                                        
                                                    .welcome-subcontent {
                                                        text-align: left;
                                                        margin: 20px 0 10px;
                                                    }
                                        
                                                    .milkyway-title {
                                                        padding: 16px;
                                                    }
                                        
                                                    .meta-data {
                                                        text-align: center;
                                                    }
                                        
                                                    .label {
                                                        text-align: center;
                                                    }
                                        
                                                    .welcome-email .wavey-background-subcontent {
                                                        width: calc(100% - 32px);
                                                    }
                                                }
                                        
                                                @media (min-width: 597px) {
                                                    .emailer-footer .show-on-mobile {
                                                        display: none;
                                                    }
                                        
                                                    .emailer-footer .emailer-border-bottom {
                                                        border-bottom: none;
                                                    }
                                        
                                                    .have-questions-text {
                                                        border-bottom: none;
                                                    }
                                        
                                                    .hide-on-large {
                                                        display: none;
                                                    }
                                        
                                                    .milkyway-title {
                                                        padding: 55px 55px 16px;
                                                    }
                                                }
                                        
                                                @media only screen and (max-width: 290px) {
                                                    table.container.your-tickets .tickets-container {
                                                        width: 100%;
                                                    }
                                                }
                                            </style>
                                            
                                            <table class="body" data-made-with-foundation=""
                                                style="background: #FAFAFA; border-collapse: collapse; border-spacing: 0; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"
                                                bgcolor="#FAFAFA">
                                                <tbody>
                                                    <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                        <td class="center" align="center" valign="top"
                                                            style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word">
                                                            <center style="min-width: 580px; width: 100%">
                                                                <table class=" spacer  float-center" align="center"
                                                                    style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td height="20px"
                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class="header-spacer spacer  float-center" align="center"
                                                                    style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 60px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td height="16px"
                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                        
                                                                <table class="header-spacer-bottom spacer  float-center" align="center"
                                                                    style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 30px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td height="16px"
                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                        
                                                                <table class="milkyway-email-card container float-center" align="center"
                                                                    style="background: #FFFFFF; border-collapse: collapse; border-radius: 6px; border-spacing: 0; box-shadow: 0 1px 8px 0 rgba(28,35,43,0.15); float: none; margin: 0 auto; overflow: hidden; padding: 0; text-align: center; vertical-align: top; width: 580px"
                                                                    bgcolor="#FFFFFF">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">
                                        
                                                                                <table class="milkyway-content welcome-email container" align="center"
                                                                                    style="background: #FFFFFF; border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: inherit; vertical-align: top; width: 280px !important"
                                                                                    bgcolor="#FFFFFF">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                align="left" valign="top">
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="50px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 50px; font-weight: normal; hyphens: auto; line-height: 50px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                               
                                        
                                                                                                <table class="milkyway-content row"
                                                                                                    style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 350px !important">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <th class=" small-12 large-12 columns first last"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                            align="left">
                                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                                align="left">
                                                                                                                                <h1 class="welcome-header"
                                                                                                                                    style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 600; hyphens: none; line-height: 30px; margin: 0 0 24px; padding: 0; text-align: left; width: 100%; word-wrap: normal"
                                                                                                                                    align="left">Willkommen bei Sungate 24!</h1>
                                                                                                                                <h2 class="welcome-subcontent"
                                                                                                                                    style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: center; width: 100%; word-wrap: normal"
                                                                                                                                    align="left">Ihr Experte für exklusive Reisen zu besten Preisen!</h2>
                                                                                                                            </th>
                                                                                                                            <th class="expander"
                                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                                align="left"></th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                        
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="30px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                                <table class="milkyway-content wrapper" align="center"
                                                                                                    style="border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td class="wrapper-inner"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                                <table class="milkyway-content row"
                                                                                                    style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <th class="milkyway-padding small-12 large-12 columns first last"
                                                                                                                valign="middle"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                            align="left">
                                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                                align="left">
                                                                                                                                <table
                                                                                                                                    class="cta-text primary radius expanded button"
                                                                                                                                    style="border-collapse: collapse; border-spacing: 0; font-size: 14px; font-weight: 400; line-height: 0; margin: 0 0 16px; padding: 0; text-align: left; vertical-align: top; width: 100% !important">
                                                                                                                                    <tbody>
                                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                                            align="left">
                                                                                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                                                align="left"
                                                                                                                                                valign="top">
                                                                                                                                                <table
                                                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                                                    <tbody>
                                                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                                                            align="left">
                                                                                                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; background: #00aeff; border: 2px none #4e78f1; border-collapse: collapse !important; border-radius: 6px; color: #FFFFFF; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                                                                align="left"
                                                                                                                                                                bgcolor="#4E78F1"
                                                                                                                                                                valign="top">
                                                                                                                                                                <a href="https://www.sungate24.com/act/'.$user->email.'/'.$active_code.'" style="border: 0 solid #4e78f1; border-radius: 6px; color: #FFFFFF; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.3; margin: 0; padding: 13px 0; text-align: center; text-decoration: none; width: 100%" target="_blank"><p class="text-center"
                                                                                                                                                                        style="color: white; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; letter-spacing: 1px; line-height: 1.3; margin: 0; padding: 0; text-align: center"
                                                                                                                                                                        align="center">
                                                                                                                                                                        Aktivieren!
                                                                                                                                                                    </p>
                                                                                                                                                                </a>
                                                                                                                                                            </td>
                                                                                                                                                        </tr>
                                                                                                                                                    </tbody>
                                                                                                                                                </table>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </th>
                                                                                                                            <th class="expander"
                                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                                align="left"></th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                        
                                        
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="30px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <table class="have-questions-wrapper  container" align="center"
                                                                                    style="background-color: #F5F5F5 !important; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100% !important"
                                                                                    bgcolor="#F5F5F5">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                align="left" valign="top">
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="24px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                        
                                                                                                <table class="milkyway-content row"
                                                                                                    style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <th class=" small-12 large-12 columns first last"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                            align="left">
                                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                                align="left">
                                                                                                                                <img width="10"
                                                                                                                                    src="https://www.sungate24.com/lib/img/logo_sticky.png"
                                                                                                                                    style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 50%; outline: none; text-align: center; text-decoration: none; width: auto">
                                                                                                                                <h3 style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 600; line-height: 26px; margin: 10px 10px 10px; padding: 0; text-align: center; word-wrap: normal"
                                                                                                                                    align="left">Sie haben eine Frage?</h3>
                                        
                                        
                                        
                                                                                                                                <p class="help-center"
                                                                                                                                    style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 15px 0 10px; padding: 0; text-align: center"
                                                                                                                                    align="left"> <a
                                                                                                                                        href="https://www.sungate24.com/faq?ref=active_email"
                                                                                                                                        style="color: #4E78F1; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none"
                                                                                                                                        target="_blank">Hier finden Sie unsere Liste mit häufig gestellten Fragen.</a>
                                                                                                                                </p>
                                                                                                                            </th>
                                                                                                                            <th class="expander"
                                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                                                                                                align="left"></th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                        
                                                                                                <table class=" spacer "
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <td height="24px"
                                                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                                                align="left" valign="top">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                        
                                        
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class=" spacer  float-center" align="center"
                                                                    style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td height="20px"
                                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class="emailer-footer container float-center" align="center"
                                                                    style="background-color: transparent !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px"
                                                                    bgcolor="transparent">
                                                                    <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word"
                                                                                align="left" valign="top">
                                                                                <table class=" row"
                                                                                    style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <th class=" small-12 large-4 columns first"
                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px 16px; text-align: left; width: 177.3333333333px"
                                                                                                align="left">
                                                                                                <table
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                            align="left">
                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                align="left">
                                                                                                            </th>
                                                                                                            <th class="emailer-border-bottom small-12 large-11 columns first"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                                                            align="left">
                                                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                                                align="left">
                                        
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                            <th class="show-for-large small-12 large-1 columns last"
                                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%"
                                                                                                                align="left">
                                                                                                                <table
                                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                                                    <tbody>
                                        
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                </th>
                                                                            <th class=" small-12 large-4 columns"
                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px; text-align: left; width: 177.3333333333px"
                                                                                align="left">
                                                                                <table
                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                align="left">
                                                                                            </th>
                                                                                            <th class="emailer-border-bottom small-12 large-11 columns first"
                                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%"
                                                                                                align="left">
                                                                                                <table
                                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                        
                                                                                                    </p>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                            <th class="show-for-large small-12 large-1 columns last"
                                                                                style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%"
                                                                                align="left">
                                                                                <table
                                                                                    style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
                                                                                    <tbody>
                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top"
                                                                                            align="left">
                                                                                            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left"
                                                                                                align="left">
                                        
                                                                                            </th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                </th>
                                        
                                        
                                         
                                                                <p class="help-email-address text-center"
                                                                    style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center"
                                                                    align="center">
                                                                    <span class="text-divider" style="margin-left: 10px; margin-right: 10px">
                                                                        ©
                                                                        '.date('Y').'
                                                                        <a href="https://www.sungate24.com/?ref=active_email"
                                                                            style="color: #4E78F1; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none"
                                                                            target="_blank">
                                                                            sungate24.com
                                                                </p>
                                                                </th>
                                                        <th class="expander"
                                                            style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0"
                                                            align="left"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </th>
                                            </tr>
                                            </tbody>
                                            </table>
                                            </td>
                                            </tr>
                                            </tbody>
                                            </table>
                                        
                                            </center>
                                            </td>
                                            </tr>
                                            </tbody>
                                            </table>
                                        
                                        
                                        </body>
                                        
                                        </html>
                                    ');
                            if(!$mail->Send()) {
                                $dizi["hata"] = 'Wenn ein Fehler aufgetreten ist, wenden Sie sich an unseren Kundendienst, falls das Problem weiterhin besteht.';
                                exit;
                            } else {
                                $dizi["ok"] = 'Ihre Registrierung ist erfolgreich. Bitte überprüfen Sie Ihre E-Mail-Adresse und Ihre Junk-Mailbox.';
                                $_POST = array();
                            }
                        }
                        catch (Exception $e) {
                            $dizi["hata"] = 'Wenn ein Fehler aufgetreten ist, wenden Sie sich an unseren Kundendienst, falls das Problem weiterhin besteht.';
                            exit;
                        }

                    }else{
                        $dizi["hata"] = 'Wenn ein Fehler aufgetreten ist, wenden Sie sich an unseren Kundendienst, falls das Problem weiterhin besteht.';
                    }
                }
            }
        }

        if($q == 'delete'){
            $ID = p('deger');
            $bul = $db->get_row("SELECT * FROM users WHERE id = '$ID'");
            $delete = $db->query("DELETE FROM users  WHERE id = '$ID'");
            if ($delete){
                $dizi["ok"] = 'Die Inhalte wurden erfolgreich gelöscht.';
            }else{
                $dizi["hata"] = 'Ein Fehler ist aufgetretten';
                //$dizi["hata"] = 'Bir hata meydana geldi.'.$db->debug();
            }
        }
        echo json_encode($dizi);
    }
}
?>
