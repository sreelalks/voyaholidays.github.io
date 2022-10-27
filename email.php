<?php
	
if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
	$mobile = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

$to = 'mailsreelalks@gmail.com';

$subject = 'From website- '.$name;
$headers  = "From: " . strip_tags($email) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$message = '<p><strong>Name :'.$name.'</strong><br> Mobile :'.$mobile.' <br> Subject :'.$subject.' <br>Message :'.$message.' </p>';

$send=mail($to, $subject, $message, $headers);
    if ($send) {
        $response = [
            'status' => 'success',
            'msg' => 'Successfull'
        ];
    } else {
        $response = [
            'status' => 'error',
            'msg' => 'Mail not send'
        ];
    }
    echo json_encode($response);
}
?>