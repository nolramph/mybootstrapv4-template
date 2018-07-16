<?php

require_once('../initialize.php'); 

global $db;

// Check for empty fields
if($_SERVER['REQUEST_METHOD'] == 'POST'){

function post_captcha($user_response) {
    $fields_string = '';
    $fields = array(
        'secret' => '6LdSrVkUAAAAAITiOLXzRIqNg6-12PtAbucCYoOE',
        'response' => $user_response,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    );
    foreach($fields as $key=>$value)
    $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
}

$res = post_captcha($_POST['g-recaptcha-response']);
if (!$res['success']) {
    // What happens when the CAPTCHA wasn't checked
    echo json_encode( array("success"=>false,"message" =>  "Please verify reCaptcha!", "res" => $res));
    
} else {
    // If CAPTCHA is successfully completed...

   if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $message = strip_tags(htmlspecialchars($_POST['message']));


    $sql = "INSERT INTO request_quote_records ";
    $sql .= "(name, email, phone_number, message) ";
    $sql .= "VALUES (";
    $sql .= "'" . $name . "',";
    $sql .= "'" . $email_address . "',";
    $sql .= "'" . $phone . "',";
    $sql .= "'" . $message . "')";

    $result = mysqli_query($db, $sql);

    if($result){
        // Create the email and send the message
        $to = 'mytestinguae@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        $email_subject = "Request a Quote From:  $name ";
        $email_body = "<html><body> <h2>Request a Quote Inquiry</h2> <div style='color:#212529;width:50;'>";
        $email_body .= " <strong style='color:#4dadf7;'>Client Name:</strong>";
        $email_body .= " $name <br><br>";
        $email_body .= "<strong style='color:#4dadf7;'>Email:</strong>";
        $email_body .= " $email_address <br><br>"; 
        $email_body .= "<strong style='color:#4dadf7;'>Contact Number:</strong>";
        $email_body .= " $phone <br><br>";
        $email_body .= "<strong style='color:#4dadf7;'>Message:</strong>";
        $email_body .= " <br><br> $message <br><br> </div>";
        $email_body .= "<hr style='margin-right: 50%'><i>This is an automatic message. Please don't reply!</i></body></html>";
      
        //"You have received a Request a quote inquiry.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
        
        $headers = "From: noreply@profilesrhf.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email_address"; 
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  
        mail($to,$email_subject,$email_body,$headers);
        // What happens when the CAPTCHA wasn't checked
        echo json_encode( array("success"=>true, "message" =>  "Your message has been sent."));

        return true;     

       
    }else{
        echo mysqli_error($db);
        db_close($db);
    }
}
     
}else{
    header('Location: http://www.profilesrhf.com/');
}

 
?>  