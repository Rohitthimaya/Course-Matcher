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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="coursepage.css" />
    <title>COURSES</title>
</head>

<body style="width: 80%; margin: 0 auto;">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <h1 style="text-align: center">YOUR COURSES</h1>
    <a href="mainpage.php?link=home">Go to Matches.</a>
    <div style="text-align: center">
        <button type="button" class="btn btn-dark" id="viewCourse">
            VIEW COURSES
        </button>
        <button type="button" class="btn btn-dark" id="addCourse">
            ADD COURSE
        </button>
        <input type="text" name="couserName" id="couserName" placeholder="Enter Course Name..." />
        <input type="text" name="truId" id="truId" placeholder="Enter TRU ID" /><br />
        <div id="courseSection"></div>
    </div>

    <script>
    $(document).ready(function() {

        // View Courses
        document.getElementById("viewCourse").addEventListener("click", tr2_6_list_questions);

        function tr2_6_list_questions() {
            var url = "controller.php"; // test program for 'ListQuestions' from TRUQA
            var query = {
                page: "mainpage",
                command: "viewCourses",
                course: $("#couserName").val(),
                truId: $("#truId").val()
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
                    t += '<td> <button type="button" data-q-id=' + rows[i]['Id'] + '> X </button></td>';
                    t += '</tr>';
                }
                t += '</table>';
                document.getElementById("courseSection").innerHTML =
                    t; // display the table into <div> of id='tr2-6-result-pane'

                $("#courseSection table button[data-q-id]").click(
                    function() { // 'click' event registration for the above 'Delete' buttons, using the attribute selection
                          let url = "controller.php"; // test program for 'ListQuestions' from TRUQA
                        let query = {
                            page: "mainpage",
                            command: "deleteCourse",
                            id: $(this).attr('data-q-id'),
                        };
                        $.post(url, query, function(data) {
                            if(data == "yes"){
                                tr2_6_list_questions();
                            }
                        });
                    });
            });
        }

        // Add Course...
        $("#addCourse").click(function() {
            if($("#couserName").val() == "" || $("#truId").val() == ""){
                alert("Please, Enter Coures name and Tru ID to proceed.")
            }else{
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $("#couserName").val('');
                    $("#truId").val('');
                    if(this.responseText == "yes"){
                        alert("Sucessfully Added, Click on view course to view...")
                    }else{
                        alert("Unsuccessful Attempt")
                    }
                        
                }
            };

            xhttp.open("POST", "controller.php");
            xhttp.setRequestHeader(
                "Content-type",
                "application/x-www-form-urlencoded"
            );
            var query = "";
            query += "page=mainpage";
            query += "&command=addcourse";
            query += "&course=" + $("#couserName").val();
            query += "&truId=" + $("#truId").val();
            xhttp.send(query);
        }
        });

    });
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>