<?php
require 'class.simple_mail.php';

$to = "ShershnevAV@uniastrum.com";
$to2 = "lednevmv@uniastrum.com";
$to3 = "factoring@uniastrum.com";
$to4 = "shershnev@gmail.com";
$from = "info@unigarant.ru";

if(isset($_GET['callback'])) {
    $mailer = new SimpleMail();
    
    $message = "<p>Телефон: ".$_POST['phone']."</p>";

    $mailer
        ->setTo($to, $to)
        ->setTo($to2, $to2)
        ->setTo($to3, $to3)
	    ->setTo($to4, $to4)
        ->setSubject('Обратный звонок')
        ->setFrom($from, $from)
        ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
        ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
        ->setMessage($message);

    $send = $mailer->send();
    if ($send) {
        $return = array("success" => true);
    } else {
        $return = array("success" => false, "error" => $mailer->debug());
    }
    echo json_encode($return);
}

if(isset($_GET['request'])) {
    $mailer = new SimpleMail();
    
    $message = "<p>Имя: ".$_POST['name']."</p>";
    $message .= "<p>Контакт: ".$_POST['contact']."</p>";

    $mailer
        ->setTo($to, $to)
        ->setTo($to2, $to2)
        ->setTo($to3, $to3)
	    ->setTo($to4, $to4)       
        ->setSubject('Заявка на факторинг')
        ->setFrom($from, $from)
        ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
        ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
        ->setMessage($message);

    $send = $mailer->send();
    if ($send) {
        $return = array("success" => true);
    } else {
        $return = array("success" => false, "error" => $mailer->debug());
    }
    echo json_encode($return);
}


exit();