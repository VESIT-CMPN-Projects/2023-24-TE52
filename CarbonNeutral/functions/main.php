<?php


use PHPMailer\PHPMailer\PHPMailer;

require('./vendor/autoload.php');
 function send_credentials($email, $username, $password) {
    
    // $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // $headers .= 'From: CarboNeutral' . "\r\n";
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'd078586a1c6622';
    $phpmailer->Password = '3cfb19e0e9c15d';
    $phpmailer->setFrom('no-reply@toggl.temp');
    $phpmailer->addAddress("$email");
    $phpmailer->Subject = "Your login credentials for CarboNeutral";
    $phpmailer->isHTML(true);

    

    $phpmailer->Body = "
    <head>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,900' rel='stylesheet'>
        <!-- CSS only -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                            <h1 class='text-center'>Your login credentials for CarboNeutral</h1>
                            <p class='text-center'>Your username is: $username</p>
                            <p class='text-center'>Your password is: $password</p>
                            <hr>
                            <p class='text-center'>Thank you for using CarboNeutral</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    ";

    if($phpmailer->send()) {
        echo "Mail was sent!";
        return true;
    } else {
        echo"Some issue occured<br/>";
        echo $phpmailer->ErrorInfo;
        return false;
    }
}
?>