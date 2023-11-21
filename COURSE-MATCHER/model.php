<?php

$conn = mysqli_connect('localhost', 'w3rthimaya', 'w3rthimaya136', 'C354_w3rthimaya');

function username_password_valid($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM TRU_USER WHERE (Email = '$email' and Password = '$password')";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            return $email == $row['Email'] and $password == $row['Password'];
        }
    }
}

function signup_a_new_user($u, $p, $e)
{
    global $conn;
    $curr_date = date("Ymd");
    $sql = "INSERT INTO TRU_USER Values(NULL, '$u', '$p', '$e', $curr_date)";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function username_exists($u)
{
    global $conn;
    $sql = "SELECT * FROM TRU_USER WHERE (Username = '$u')";
    $res = mysqli_query($conn, $sql);
    return mysqli_num_rows($res) > 0;
}

function truEmailChecker($e)
{
    $enteredEmail = explode("@", $e);
    return $enteredEmail[1] == "mytru.ca";
}

function search_users($searchTerm)
{
    global $conn;
    $sql = "SELECT Username FROM TRU_USER WHERE (Username like '%$searchTerm%')";
    $res = mysqli_query($conn, $sql);
    $friends = [];
    $i = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $friends[$i] = $row;
        $i++;
    }
    return $friends;
}

function save_message($sender, $receiver, $message)
{
    global $conn;
    $curr_date = date("Ymd");
    $sql = "INSERT INTO Messenger Values(Null, '$sender', '$receiver', '$message', $curr_date, '0')";
    $res = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM Messenger WHERE (Receiver = '$receiver' and Message = '$message')";
    $res = mysqli_query($conn, $sql);
    $myArray = [];
    while ($row = mysqli_fetch_assoc($res))
        $myArray = $row;
    return $myArray;
}

function read_messages($receiver)
{
    global $conn;
    $sql = "SELECT * FROM Messenger WHERE (Receiver = '$receiver' and ReadorNot = '0')";
    $res = mysqli_query($conn, $sql);
    $myArray = [];
    while ($row = mysqli_fetch_assoc($res))
        $myArray = $row;
    $sql = "update Messenger set ReadorNot = '1' WHERE (Receiver = '$receiver' and ReadorNot = '0')";
    $res = mysqli_query($conn, $sql);
    return $myArray;
}

function insertCourse($course, $truId, $email)
{
    global $conn;
    $curr_date = date("Ymd");
    $sql = "INSERT INTO TRU_COURSES Values(Null, '$truId', '$course', '$email', $curr_date)";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function deleteCourse($id){
    global $conn;
    $sql = "DELETE FROM TRU_COURSES WHERE (Id = '$id')";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function getTableData($email)
{
    global $conn;
    $sql = "SELECT Id,TruId, Course, Email FROM TRU_COURSES WHERE (Email = '$email')";
    $res = mysqli_query($conn, $sql);
    $myArray = [];
    $i = 0;
    while ($row = mysqli_fetch_assoc($res)){
        $myArray[$i] = $row;
        $i++;
    }
    return $myArray;
}

function getCourses($course){
    global $conn;
    $sql = "SELECT TruId, Course, Email FROM TRU_COURSES WHERE (Course like '%$course%')";
    $res = mysqli_query($conn, $sql);
    $myArray = [];
    $i = 0;
    while ($row = mysqli_fetch_assoc($res)){
        $myArray[$i] = $row;
        $i++;
    }
    return $myArray;
}

function getMyCourses($email){
    global $conn;
    $sql = "SELECT Course FROM TRU_COURSES WHERE (Email = '$email')";
    $res = mysqli_query($conn, $sql);
    $myArray = [];
    $i = 0;
    while ($row = mysqli_fetch_assoc($res)){
        $myArray[$i] = $row;
        $i++;
    }
    return $myArray;
}

function getMatches($myCourses, $email){
    global $conn;
    $myMatches = [];
    $i = 0;
    foreach($myCourses as $course){
        $currCourse = $course['Course'];
        $sql = "SELECT TruId, Course, Email FROM TRU_COURSES WHERE (Course = '$currCourse' AND Email != '$email')";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)){
            $myMatches[$i] = $row;
            $i++;
        }
    }
    return $myMatches;
}


function updateUser($oldE,$u, $p, $e){
    global $conn;
    $sql = "UPDATE TRU_USER SET Username = '$u', Password = '$p', Email = '$e' WHERE Email = '$oldE'";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function deleteAccount($email){
    global $conn;
    $sql = "DELETE FROM TRU_USER WHERE Email ='$email' ";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM TRU_COURSES WHERE Email ='$email' ";
    $res = mysqli_query($conn, $sql);;
    return $res;
}


function feedback($name, $email, $message){
    global $conn;
    $curr_date = date("Ymd");
    $sql = "INSERT INTO TRU_FEEDBACK Values(Null, '$name', '$email', '$message', $curr_date)";
    $res = mysqli_query($conn, $sql);
    return $res;
}