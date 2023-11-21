<?php
include "model.php";

// Login Auth
$page = $_POST["page"];
if (empty($page)) {
    include('startpage.php');
    exit();
} else if ($page == "startpage") {
    $command = $_POST["command"];
    switch ($command) {
        case 'Login':
            if (username_password_valid($_POST['email'], $_POST['password'])) {
                session_start();
                $_SESSION["loggedIn"] = "YES";
                $_SESSION["email"] = $_POST['email'];
                $_SESSION["password"] = $_POST['password'];
                include('mainpage.php');
                exit();
            } else {
                $error_msg_username = '* Incorrect Email';
                $error_msg_password = '* Incorrect Password';
                $display_modal_window = 'signin';
                include('startpage.php');
                exit();
            }
        case 'Signup':
            if (username_exists($_POST['username'])) {
                $error_msg_username = '* Username Exist';
                $display_modal_window = 'signup';
                include('startpage.php');
                exit();
            } elseif (!truEmailChecker($_POST['email'])) {
                $error_msg_email = '* TRU EMAIL ONLY';
                $display_modal_window = 'signup';
                include('startpage.php');
                exit();
            } else {
                signup_a_new_user($_POST['username'], $_POST['password'], $_POST['email']);
                $error_msg_username = "";
                $error_msg_password = "";
                $display_modal_window = 'signin';
                include('startpage.php');
                exit();
            }
        case 'Delete':
            session_start();
            $email = $_SESSION["email"];
            if(deleteAccount($email)){
                include("startpage.php");
                exit();
            }else{
                echo "Failed To Delete";
                include("profile.php");
                exit();
            }
        case 'Update':
            session_start();
            if (username_exists($_POST['username'])) {
                $error_msg_username = '* Username Exist';
                $display_modal_window = 'signup';
                include('profile.php');
                exit();
            } elseif (!truEmailChecker($_POST['email'])) {
                $error_msg_email = '* TRU EMAIL ONLY';
                $display_modal_window = 'signup';
                include('profile.php');
                exit();
            } else {
                updateUser($_SESSION['email'],$_POST['username'], $_POST['password'], $_POST['email']);
                $error_msg_username = "";
                $error_msg_password = "";
                $display_modal_window = '';
                include('startpage.php');
                exit();
            }
    }
} else if ($page == "mainpage") {
    $command = $_POST["command"];
    session_start();
    switch ($command) {
        case 'logout':
            session_unset();
            session_destroy();
            include('startpage.php');
            exit();
        case 'addcourse':
            $email = $_SESSION["email"];
            if (insertCourse($_POST["course"], $_POST["truId"], "$email")) {
                echo "yes";
                exit();
            }
        case 'getMatches':
            $email = $_SESSION["email"];
            $tableArrayData = getMyCourses($email);
            //echo json_encode($tableArrayData);
            $myCourse = getMatches($tableArrayData, $email);
            echo json_encode($myCourse);
            exit();
        case 'viewCourses':
            $email = $_SESSION["email"];
            $tableArrayData = getTableData("$email");
            echo json_encode($tableArrayData);
            exit();
        case 'profilePage':
            $display_modal_window = 'signup';
            include("profile.php");
            exit();
        case 'deleteCourse':
            $email = $_SESSION["email"];
            $id = $_POST["id"];
            if(deleteCourse($id)){
                $tableArrayData = getTableData("$email");
                echo "yes";
                exit();
            }else{
                echo "Failed To Delete Cousrse...";
                exit();
            }
            
    }
}else if($page == "participantsPage"){
    $command = $_POST["command"];
    session_start();
    switch ($command) {
        case 'searchParticipants':
            $course = $_POST["course"];
            $courseTableData = getCourses($course);
            echo json_encode($courseTableData);
            exit();
        }
}else if($page == "feedbackPage"){
    $command = $_POST["command"];
    session_start();
    switch($command){
        case 'feedback':
	    $_SESSION["loggedIn"] = "YES";
            $email = $_POST["exampleInputEmail1"];
            $name = $_POST["exampleInputPassword1"];
            $message = $_POST["exampleFormControlTextarea1"];
            if(feedback($name, $email, $message)){
                include("mainpage.php");
                exit();
            }else{
                include("feedback.php");
                exit();
            }
            
    }
}
?>