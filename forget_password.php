
<?php
require_once("connection.php");
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "<div class='alert alert-info'> email is invalid please try correct email
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            </div>";
            }
        $name="Eventwala.com"; // Name
        $subject = "Reset Your Password";// subject of email
        $body = "<html>
                  <body>
                    <h3>This email from eventwala</h3>
                    <div style='background-color:gray;font-size: 18px;'>
                    <p>link for update password : locolhost/eventwala.com/update_password.php
                     Right Now</p>
                    </div>
                  </body>
               </html>"; // body of email
        require_once("PHPMailer/PHPMailer.php");
        require_once("PHPMailer/SMTP.php");
        require_once("PHPMailer/Exception.php");

        /* email varification area */
        $sql_email=" SELECT `user_id`, `user_email` FROM `user_reg` WHERE user_email='$email'";
        $email_query=mysqli_query($conn,$sql_email);
        $email_count=mysqli_num_rows($email_query);
        if($email_count>0){
            /* email sending process */
                    $mail = new PHPMailer();
                    //SMTP Settings
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "mail.eventwala@gmail.com"; //Enter you email address
                    $mail->Password = '7266050283@v'; //Enter you email password
                    $mail->Port = 465;
                    $mail->SMTPSecure = "ssl";

                    //Email Settings
                    $mail->isHTML(true);
                    $mail->setFrom($email, $name);
                    $mail->addAddress($email); // Enter  client  email address
                    $mail->Subject = ("$email ($subject)");
                    $mail->Body = $body;

                    if ($mail->send()) {
                        $email_response="<div class='alert alert-success' style='font-size:18px;'>
                            <p>Message has been send successfully <br>
                            Kindally check your email</p></div>";
                    } 
                    else {
                        $email_response="<div class='alert alert-danger' style='font-size:18px;'>
                            <p>Message has NOT been send <br>
                            Kindally check your email</p>
                            <p> {$mail->ErrorInfo} </p></div>";
                         }
        }
                        /* email sending process end */
                


                    else{
                        $error="<div class='alert alert-danger' style='font-size:18px;'>
                        <p>This email look like does not exist <br>
                        Kindally enter your  registerd email</p></div>";
                    }

                /* end of email varification */

    }
         

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="bg-light">
    <div class="container-fluid d-flex justify-content-center">

        <div class="card mt-5">
            <div class="card-header">
                <h3 class="text-center text-primary"> Forget your password? </h3>
            </div>
            <div class="card-body">
                <?php if(isset($email_response)) echo $email_response;?>
                <?php if(isset($error)) echo $error ;?>
                <?php if(isset($email_error)) echo $email_error; ?>
                <div class="text-muted text-center" style="font-size: 18px;">
                   <p> Fill out your email address, and we’ll send you <br>
                    instructions to reset your password.</P>
                </div>
                <br>
                <form action="" method="POST">
                    <div class="form-group ">
                        <label for="email" class=""><h5>Email Address</h5></label>
                        <div class="input-group mb-3 " >
                            <div class="input-group-prepend ">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control form-control-lg" id="email" placeholder="e.g. eventwala@gmail.com" name="email"
                                required>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-lg  btn-outline-primary btn-block" name="submit" style="font-size: 19px;">Email Me </button>
                </form>
            </div>
            <div class="card-footer text-center"><small class=""> You should know our privacy Policy<a href="#"> Read Now</a></small></div>
        </div>


    </div>

</body>

</html>