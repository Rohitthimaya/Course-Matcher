<?php 

if(!isset($_SESSION["loggedIn"])){
  include("startpage.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="startpage.css" />
    <title>PROFILE</title>
</head>

<body>    
    <div id="container">
        <!-- TP MODAL -->
        <h1 style="text-align: center; margin-bottom: 10px;">UPDATE PROFILE</h1>
        <a href="mainpage.php?link=home" style="text-align: center; padding: 100px;" id="matches">Go to Matches.</a>
        <div class="d-flex align-items-center justify-content-center" id="box" style="height: 500px; width: 500px;box-shadow: 5px 10px 8px black; margin: 0 auto; background-color: #fff;">
            <form action="controller.php" method="post">
                    <input type='hidden' name='page' value='startpage'>
                    <input type='hidden' name='command' value='Update'>
                    <label for="username">Username:</label>
                    <input type="text" name="username" required><?php if (!empty($error_msg_username)) echo $error_msg_username; ?><br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required><br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" required><?php if (!empty($error_msg_email)) echo $error_msg_email; ?><br>
                    <button id='deleteAccountErr' class="btn btn-secondary" type="button"  onclick="hide_signin();">Delete Account</button>
                    <button id='modal-login' type="submit" class="btn btn-primary">Submit</button><br>
                    
                </form>

                <form action="controller.php" method="post" id="deleteForm">
                    <input type='hidden' name='page' value='startpage'>
                    <input type='hidden' name='command' value='Delete'>
                </form>
</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>

        function show_signup() {
            $("#update-modal").modal("show");
            //document.getElementById('signup-box').style.display = 'block';
            $('#update-modal').modal({
            backdrop: 'static',
            keyboard: false,  // to prevent closing with Esc button (if you want this too)
            show: true
            })
        }


        function hide_signin() {
            document.getElementById("deleteForm").submit();
        }

        window.addEventListener('load', function() {
            <?php
            if ($display_modal_window == 'signup') {
                echo 'show_signup();';
            }
            ?>
        });

        
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>