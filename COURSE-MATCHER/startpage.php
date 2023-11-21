<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="./startpage.css" />
  <title>TRU COURSE MATCHER</title>
</head>

<body>

  <script>

    function show_signin() {
      document.getElementById('signin-box').style.display = 'block';
      document.getElementById("blanket").style.display = "block";
    }

    function show_signup() {
      document.getElementById('signup-box').style.display = 'block';
      document.getElementById("blanket").style.display = "block";
    }


    function hide_signin() {
      document.getElementById('signin-box').style.display = 'none';
      document.getElementById('signup-box').style.display = 'none';
      document.getElementById("blanket").style.display = "none";
    }

    window.addEventListener('load', function() {
      <?php
      if ($display_modal_window == 'signin') {
        echo 'show_signin();';
      } else if ($display_modal_window == 'signup') {
        echo 'show_signup();';
      }
      ?>
    });
  </script>

  <div id="container">

    <div class="d-grid gap-2 col-6 mx-auto" id="btn-container">
      <!-- Heading Title -->
      <h1 id="startpage-title">TRU COURSE MATCHER</h1>

      <!-- Buttons -->
      <button class="btn btn-dark " type="button" id="login-btn">Sign In</button>
      <button class="btn btn-dark" type="button" id="signup-btn">Register</button>
    </div>

    <!-- Blanket -->
    <div id="blanket"></div>
  </div>

  <!-- Modal Windows -->

  <div id='modal-login' class='modal-window' style="height:300px;">
    <h2 style='text-align:center'>Login</h2>
    <br>
    <form action="controller.php" method="post">
      <input type='hidden' name='page' value='startpage'>
      <input type='hidden' name='command' value='Login'>
      <label for="email">Email:</label>
      <input type="email" name="email" required><br>
      <label for="password">Password:</label>
      <input type="password" name="password" required><br>
      <button id='cancel-modal-login' type="reset" style='position:absolute; bottom:10px; right:10px'>Cancel</button>
      <button id='modal-submit' type="submit" style='position:absolute; bottom:10px; left:10px'>submit</button>
    </form>
  </div>

  <div id='modal-signup' class='modal-window' style="height:350px;">
    <h2 style='text-align:center'>Sign Up</h2>
    <br>
    <form action="controller.php" method="post">
      <input type='hidden' name='page' value='startpage'>
      <input type='hidden' name='command' value='Signup'>
      <label for="username">Username:</label>
      <input type="text" name="username" required><br>
      <label for="password">Password:</label>
      <input type="password" name="password" required><br>
      <label for="email">Email:</label>
      <input type="email" name="email" required><br>
      <button id='cancel-modal-signup' type="reset" style='position:absolute; bottom:10px; right:10px'>Cancel</button>
      <button id='modal-login' type="submit" style='position:absolute; bottom:10px; left:10px'>Submit</button>
    </form>
  </div>

  <!-- ERROR Modal Windows -->
  <div id='signin-box' class='modal-window' style="display:none; width:500px; height:350px;">
    <h2 style='text-align:center'>Login</h2>
    <br>
    <form action="controller.php" method="post">
      <input type='hidden' name='page' value='startpage'>
      <input type='hidden' name='command' value='Login'>
      <label for="email">Email:</label>
      <input type="email" name="email" required><?php if (!empty($error_msg_username)) echo $error_msg_username; ?><br>
      <label for="password">Password:</label>
      <input type="password" name="password" required><?php if (!empty($error_msg_password)) echo $error_msg_password; ?><br>
      <button id='cancel-login' type="reset" style='position:absolute; bottom:10px; right:10px' onclick="hide_signin();">Cancel</button>
      <button id='modal-new-submit' type="submit" style='position:absolute; bottom:10px; left:10px'>submit</button>
    </form>
  </div>

  <div id='signup-box' class='modal-window' style="display:none; width:500px; height:300px;">
    <h2 style='text-align:center'>Sign Up</h2>
    <br>
    <form action="controller.php" method="post">
      <input type='hidden' name='page' value='startpage'>
      <input type='hidden' name='command' value='Signup'>
      <label for="username">Username:</label>
      <input type="text" name="username" required><?php if (!empty($error_msg_username)) echo $error_msg_username; ?><br>
      <label for="password">Password:</label>
      <input type="password" name="password" required><br>
      <label for="email">Email:</label>
      <input type="email" name="email" required><?php if (!empty($error_msg_email)) echo $error_msg_email; ?><br>
      <button id='cancel-modal-signup' type="reset" style='position:absolute; bottom:10px; right:10px' onclick="hide_signin();">Cancel</button>
      <button id='modal-login' type="submit" style='position:absolute; bottom:10px; left:10px'>Submit</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="./startpage.js"></script>
</body>

</html>