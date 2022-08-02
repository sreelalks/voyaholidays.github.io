<?php
 
if(isset($_POST['email'])) {
 
    $name = $_POST['name'];
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $out = array();
    
    $email_to = "mailsreelalks@gmail.com";
 
    $email_subject = "Website Contact Form:  $name";

 
    function died($error) {
 
        // your error code can go here
 
        //echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        //echo "These errors appear below.<br /><br />";
 
        //echo $error."<br /><br />";
 
        //echo "Please go back and fix these errors.<br /><br />";
        
        $out = array('status'=>'error','message'=>$error);
        echo json_encode($out);
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['phone'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
  
    $email_from = $_POST['email']; // required
 
    //$telephone = $_POST['phone']; // not required
 
    $comments = $_POST['phone']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 

  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.<br><br>";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."<br>";
 
    $email_message .= "Email: ".clean_string($email_from)."<br>";
 
    //$email_message .= "Telephone: ".clean_string($telephone)."<br>";
 
    $email_message .= "phone: ".clean_string($comments)."<br>";
 
     
 
     
 
// create email headers

    $headers   = array();
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=iso-8859-1";
    $headers[] = "From: $email_from";
   // $headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
    $headers[] = "Reply-To: $email_from";
    $headers[] = "Subject: {$email_subject}";
    $headers[] = "X-Mailer: PHP/".phpversion();

 
@mail($email_to, $email_subject, $email_message, implode("\r\n", $headers));  

$out = array('status'=>'success', 'message'=>'Thank you for contacting us. We will be in touch with you very soon.');
echo json_encode($out);
 
}
 
?>