<?php
include('connect.php');
//session_start();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Content-Type: text/html; charset=utf-8");

function login($conn) {
    $res = array();
    
    // not successfull connection
    if(!successfullConn($conn)) {
        // {loggedin: false; erro: ...}
        $res["loggedin"] = false;
        $res["error"] = $conn;
        return json_encode($res);
    }
    // successfull connection
    
    // get login information
    $JSONData = file_get_contents("php://input");
    $dataObject = json_decode($JSONData);

    $email = "";
    $pass = "";

    if(isset($dataObject->email))
    {
        $email = $dataObject->email;

    }

    if(isset($dataObject->password))
    {
        $pass = md5($dataObject->password);
    }
    
    // get data from database
    $sql = "SELECT * FROM users WHERE (((email='".$email."'))) AND (((password='".$pass."')))";
  
    $result = mysqli_query($conn, $sql);


    try{
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) == 1) {
                // {loggedin:true, username:...}
                $res["loggedin"] = true;
                $res["username"] = $row["nickname"];
                $res["role"] = $row["role"];
            } else {
                $res["loggedin"] = false;
                $res["erro"] = "More than one user on the table.";
            }
        } else {
            // {loggedin: false; erro: ...}
            $res["loggedin"] = false;
            $res["erro"] = mysqli_num_rows($result);
            $res["erro"] = "Wrong credentials.";
            //$res["erro"] = $sql;
        }
    } catch (TypeError $ex) { //Catches the error that occurs when the SQL is badly formatted, because of the parentesis
        $res["loggedin"] = false;
        $res["erro"] = $ex->getMessage();
    }

    
    return json_encode($res);
}

// connect to DB
$conn = connectDB();

echo login($conn);

mysqli_close($conn);
?>