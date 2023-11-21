<?php 

if(isset($_GET['link'])){
  $_SESSION['link'] = $_GET['link'];
}else{
  include("startpage.php");
  exit();
}

?>

<?php 
session_start();
$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>FEEDBACK</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <a href="mainpage.php?link=home">Go to Matches.</a>
    <h1>FEEDBACK</h1>
    <form action="controller.php" method="post">
        <input type='hidden' name='page' value='feedbackPage'>
        <input type='hidden' name='command' value='feedback'>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="exampleInputEmail1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $email  ?>" value="<?php echo $email  ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" name="exampleInputPassword1" class="form-control" id="exampleInputPassword1" placeholder="Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">MESSAGE</label>
            <textarea class="form-control" name="exampleFormControlTextarea1" id="exampleFormControlTextarea1" rows="3" placeholder="Please Be Respectful..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
</body>
</html>