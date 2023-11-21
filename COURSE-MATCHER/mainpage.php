<?php 
if(isset($_GET['link'])){
  $_SESSION['link'] = $_GET['link'];
}else if(!isset($_SESSION["loggedIn"])){
  include("startpage.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="mainpage.css" />
  <title>Main Page</title>
</head>

<body>
  <script src="./mainpage.js" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <div id="main-container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./images/TRU_Logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top" />
          TRU COURSE MATCHER
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-controls="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapse">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item" id="getMatchesBtn">
              <button class="nav-link">GET MATCHES</button>
            </li>
            <li class="nav-item" id="signOutBtn">
              <button class="nav-link" href="">SIGN OUT</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Sidebar  -->
    <div class="row" id="main-section">
      <div class="col col-lg-2" id="sidebar">
        <ul class="nav flex-column">
          <li class="nav-item">
            <button class="nav-link"><a href="./course.php?link=home">Courses</a></button>
          </li>
          <li class="nav-item">
            <button class="nav-link" id="getMatchesLink">Matches</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" id="getProfilePageBtn">Update profile</button>
          </li>
          <li class="nav-item">
            <button class="nav-link"><a href="./participants.php?link=home">Participants</a></button>
          </li>
          <li class="nav-item">
            <!-- <button class="nav-link" id="generateBtn" type="button" data-bs-toggle="modal" data-bs-target="#messageModal">Generate Message</button> -->
            <button class="nav-link" id="generateBtn">Generate Message</button>
          </li>
        </ul>
      </div>
      <div class="col" id="title-section">
        <!-- <h1>You Dont Have Any Matches Yet...</h1> -->
        <h1>MATCHES</h1>
        <div id="matchesTable"></div>
      </div>
    </div>

    <!-- Footer -->
    <!-- <div class="card text-center">
      <div class="card-header">
        Copyright &copy; 2023
      </div>
      <div class="card-body">
        <h5 class="card-title">TRU COURSE MATCHER</h5>
        <p class="card-text"><i>I Believe in connecting students, because friends matter...</i></p>
        <a href="./feedback.php" class="btn btn-dark">Reach Out Founder</a>
      </div>
    </div> -->
    </div>

    <!-- Sign Out Form -->
    <form action="controller.php" method="post" id="signOutForm">
      <input type="hidden" name="page" value="mainpage" />
      <input type="hidden" name="command" value="logout" />
    </form>

    <form action="controller.php" method="post" id="getProfilePageForm">
      <input type="hidden" name="page" value="mainpage" />
      <input type="hidden" name="command" value="profilePage" />
    </form>

    <!--  Messages Modal -->

    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MESSAGE</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modalContent">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="card bg-dark text-white text-center" style="height: 50vh;">
      <img src="./images/TRU_Logo.png" class="card-img" style="height: 500px;" alt="...">
      <div class="card-img-overlay">
        <h5 class="card-title">TRU COURSE MATCHER</h5>
        <p class="card-text"><i>I Believe in connecting students, because friends matter...</i></p>
        <a href="./feedback.php?link=home" class="btn btn-primary" style="margin-bottom: 10px">Reach Out Founder</a>
        <p class="card-text">Copyright &copy; 2023</p>
      </div>
    </div>

  <script>
    window.addEventListener("load", tr2_6_list_questions);

    document.getElementById("getMatchesBtn").addEventListener("click", tr2_6_list_questions);
    document.getElementById("getMatchesLink").addEventListener("click", tr2_6_list_questions);

    document.getElementById("getProfilePageBtn").addEventListener("click", function() {
      document.getElementById("getProfilePageForm").submit();
    });

    // Generate messages....
    document.getElementById("generateBtn").addEventListener("click", function() {
      $("#messageModal").modal("show");
      $("#modalContent").html(`<p>Dear [Friend],<br>
      My name is [Your Preferred Name], and I have was recently using TRU COURSE MATCHER website and was fortunate to match with you,
      I want to introduce myself to you and take this opportunity to express how excited I am to be studying with you in the same course. 
      Please feel free to contact me if you would like to get in touch. I'm looking forward to getting to know you and studying together.<br>
      Yours faithfully,<br>
      [Your Preferred Name]</p>`)
    })

    function tr2_6_list_questions() {
      var url = "controller.php"; // test program for 'ListQuestions' from TRUQA
      var query = {
        page: "mainpage",
        command: "getMatches",
      };
      // jQuery post
      $.post(url, query, function(data) {
        alert("Getting Matches...")
        if (data.length > 2) {
          var rows = JSON.parse(data); // convert a JSON string to an object
          //   the object will be a linear array of associative arrays
          var t = '<table class="table" id="courseTable">';
          t += "<tr>";
          for (let r in rows[0]) {
            t += '<th scope="col">' + r + "</th>";
          }
          t += "</tr>";

          for (var i = 0; i < rows.length; i++) {
            // for each row
            t += "<tr>";
            for (var j in rows[i]) // for each property
              t += "<td>" + rows[i][j] + "</td>"; // the property value, not the property name
            t += "</tr>";
          }
          t += "</table>";
          document.getElementById("matchesTable").innerHTML = t; // display the table into <div> of id='tr2-6-result-pane'
        } else {
          document.getElementById("matchesTable").innerHTML = "<br><br><h1>You Don't Have Matches Yet</h1><br><h2>Add Courses!</h2>";
        }
      });
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
</body>

</html>