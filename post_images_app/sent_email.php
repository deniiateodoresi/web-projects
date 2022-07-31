<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
         $to = "ateodoresidenisa@yahoo.com";
         $subject = "New account";
  
         $message = "Hello.\n \n";
         $message .= "Thank you for creating an account on our platform. We really hope you'll enjoy it. In order to be able to access it, there would be one more step. Press click on the link below to confirm your registration.\n";
         $message .= "http://localhost/web_php_no_js/email_link.php";
         $message .= "\n \n Truth Rose Team ^_^";
         $header = "From: TruthRose \r\n 
                  X-Mailer: PHP/'" . phpversion();
         $retval = mail($to, $subject, $message, $header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
      
   </body>
</html>