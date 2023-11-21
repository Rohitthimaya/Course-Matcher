<?php 

if(isset($_GET['link'])){
  $_SESSION['link'] = $_GET['link'];
}else{
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="participants.css" />
    <title>PROFILE</title>
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<a href="mainpage.php?link=home">Go to Matches.</a>
    <div id="container">
    <h1>COURSE PARTICIPANTS</h1>
        <button type="button" class="btn btn-dark" id="searchParticipants">Search Participants</button>
        <input type="text" name="couserName" id="couserName" placeholder="Enter Course Name..." />
        <div id="participants"></div>
    </div>

    <script>
    $(document).ready(function() {

        // View Courses
        document.getElementById("searchParticipants").addEventListener("click", tr2_6_list_questions);

        function tr2_6_list_questions() {
            var url = "controller.php"; // test program for 'ListQuestions' from TRUQA
            var query = {
                page: "participantsPage",
                command: "searchParticipants",
                course: $("#couserName").val(),
            };
            // jQuery post
            $.post(url, query, function(data) {
                var rows = JSON.parse(data); // convert a JSON string to an object 
                //   the object will be a linear array of associative arrays
                var t = '<table class="table" id="courseTable">';
                t += '<tr>';
                for (let r in rows[0]) {
                    t += '<th scope="col">' + r + '</th>';
                }
                t += "</tr>"
                for (var i = 0; i < rows.length; i++) { // for each row
                    t += '<tr>';
                    for (var j in rows[i]) // for each property
                        t += '<td>' + rows[i][j] +
                        '</td>'; // the property value, not the property name 
                    t += '</tr>';
                }
                t += '</table>';
                $("#couserName").val('');
                document.getElementById("participants").innerHTML = t; // display the table into <div> of id='tr2-6-result-pane'
            });
        }

    });
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>
