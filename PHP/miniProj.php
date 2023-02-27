<?php

// This is used to show whatever user enter in the fields
print_r($_POST);

$error = ""; $successMessage = "";

if (!$_POST["email"]){
    $error .= "An email address is required.<br>";
}

if (!$_POST["content"]){
    $error .= "The content is required.<br>";
}

if (!$_POST["subject"]){
    $error .= "The subject is required.<br>";
}

// This will only shows up when email is invalid 
if ($_POST['email'] && (filter_var($_POST["email"]), FILTER_VALIDATE_EMAIL) === false){
    $error .= "The email address is invalid.<br>";
}

if ($error != ""){

        $error = '<div class ="aleralert-danger" role="alert"><p><strong>There were error(s) in Your form: </strong></p>' + error +'</div>';

}else{
    $emailTo = "gon@mydoamin.com";

    $subject = $_POST['subject'];

    $content = $_POST['content'];

    $headers = "From: ".$_POST['email'];

    if (mail($email,$subject,$content,$headers)){
        $successMessage = '<div class ="aleralert-success" role="alert">Your message was sent, we\'ll get back to you ASAP !</strong></p>''</div>';
    }else{

        $error = '<div class ="aleralert-danger" role="alert"><p><strong>Your message couldn\'t be sent</strong></p>' + error +'</div>';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container">

        <h1>Get In Touch !</h1>
        <div id="error">
            <? echo $error.$successMessage; ?>
        </div>

        <form method="post">
            <fieldset class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="Enter Your email address.">
            </fieldset>


            <fieldset class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">

            </fieldset>

            <fieldset class="form-group">
                <lable for="content">what would you like to ask us? </label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </fieldset>

            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
    // following is used when we dont want to refersh the page when we clicked on the submit button.
    $("form").submit(function(e) {
        e.preventDefault();

        var error = "";

        if ($("#email").val() == "") {
            error += "The email field is required.<br>"
        }
        if ($("#subject").val() == "") {
            error += "The subject field is required.<br>"
        }

        if ($("#content").val() == "") {
            error += "The content field is required.<br>"
        }


        // Following will show the error message in red color with seperate box.
        if (error != "") {

            $("#error").html(
                '<div class ="alert alert-danger" role="alert"><p><strong>There were error(s) in Your form: </strong></p>' +
                error + '</div>');
        }

        // if the both field i.e. content and subject field are filled with some text then it gets submitted.
        else {
            $("form").unbind("submit").submit();
        }



    });
    </script>
</body>

</html>