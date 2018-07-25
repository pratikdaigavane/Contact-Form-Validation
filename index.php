<?php
$error = ""; $successMessage = "";

    if($_POST){
        
        if (!$_POST["email"]){
            $error .= "An email address is required.<br>";
        }
        if (!$_POST["content"]){
            $error .= "An content field is required.<br>";
        }
        if (!$_POST["subject"]){
            $error .= "An subject filed is required.<br>";
        }
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
  $error .= $_POST["email"] . "is not an valid email address";
} 
if ($error != ""){
    $error = '<div class="alert alert-danger" role="alert"> <p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
    }else{
        $emailTo = "me@mydomain.com";
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $headers = "From:" .$_POST['email'];
        if (mail($emailTo, $subject, $content, $headers)){
            $successMessage = '<div class="alert alert-success" role="alert">Your message was sent we\'ll get back to you ASAP!</div>';
        }else{
            $error = '<div class="alert alert-danger" role="alert"> <p><strong>Your message couldn\'t be sent - please try again later</strong></p></div>';
        }
    }
}

?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Get in touch</title>
  </head>
  <body>
    <div class="container">
    <h1>Get in touch!</h1>
    <div id="error" ><? echo $error.$successMessage; ?></div>
    <form method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address">
    <small class="text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" name="subject" id="subject" >
  </div>
 
  <div class="form-group">
    <label for="content">What would you like to ask us?</label>
    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
  </div>
  
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $("form").submit(function (e) {
      var error = "";
      if ($("#email").val() == ""){
        error += "The email field is Required.<br>";
      }
      if ($("#subject").val() == ""){
        error += "The subject field is Required.<br>";
      }
      if ($("#content").val() == ""){
        error += "The content field is Required.<br>";
      }
      if(error != ""){
        $("#error").html('<div class="alert alert-danger" role="alert"> <p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
        return false;
    }else{
        return true;
    }
  });



    </script>
    
  </body>
</html>
