<?php
$configs = include('./config.php');
$host = $configs['db_host'];
$username = $configs['db_username'];
$password = $configs['db_password'];
$dbname = $configs['db_name'];
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // echo '<script type="text/javascript">console.log("Connected failed")</script>';
}
// echo '<script type="text/javascript">console.log("Connected successfully")</script>';


include './common.php';

if(isset($_GET['action'])){
    if ($_GET['action'] == "GetAllUser") { GetAllUser(); }
    if ($_GET['action'] == 'GetNewProducts') { GetNewProducts(); }
    if ($_GET['action'] == 'GetAppInfo') { GetAppInfo(); }
    if ($_GET['action'] == 'Login') { Login(); }
}
if(isset($_POST['action'])){
    if ($_POST['action'] == "GetUserInfo") { GetUserInfo(); }
}

function GetAppInfo(){
    $form_data = array();
    $form_data['success'] = true;
    $form_data['AppName'] = 'BK Shop';
    $form_data['AppMail'] = 'BKShop@gmail';
    $form_data['AppPhone'] = '0986213444';
    //Return data
    echo json_encode($form_data);
}

function Login(){
    $errors = array();
    $form_data = array();
    /* Validate the form on the server side */
    if (empty($_GET['username'])) {
        $errors['username'] = 'username cannot be blank';
    }
    if (empty($_GET['password'])) {
        $errors['password'] = 'password cannot be blank';
    }

    /*  */
    if (!empty($errors)) { //If errors in validation
        $form_data['success'] = false;
        $form_data['errors']  = $errors;
    }
    else { //If not
        if ($_GET['username'] == 'sa' && $_GET['password'] == '123'){
            $form_data['success'] = true;
            $form_data['msg'] = 'Login successfully';
        }
        else{
            $form_data['success'] = false;
            $form_data['msg'] = 'Username or password invalid';
        }
    }

    //Return data
    echo json_encode($form_data);
}

function GetNewProducts(){
    $errors = array();
    $form_data = array();
    
    $data = array(
        new Suit("0", "Áo PSG sân nhà", "2022", "120 000 VNĐ", ""),
        new Suit("1", "Áo MU sân nhà", "2022", "120 000 VNĐ", ""),
        new Suit("2", "Áo Barca sân nhà", "2022", "120 000 VNĐ", ""),
        new Suit("3", "Áo Real sân nhà", "2022", "120 000 VNĐ", "")
    );
    /*  */
    if (!empty($errors)) { //If errors in validation
        $form_data['success'] = false;
        $form_data['errors']  = $errors;
    }
    else{
        $form_data['success'] = true;
        $form_data['data']  = $data;
    }

    //Return data
    echo json_encode($form_data);
}

function GetAllUser(){
    global $conn;
    $form_data = array();
    $form_data['success'] = true;

    $sql_query = "SELECT * FROM dbo.User;";
    $result = $conn->query($sql_query);
    $user_length = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $user_length++;
        }
    } else {
        // $user_length = -1
    }
    $form_data['user_length'] = $user_length;
    //Return data
    echo json_encode($form_data);
}
function GetUserInfo(){
    $errors = array();
    $form_data = array();
    /* Validate the form on the server side */
    if (empty($_POST['username'])) {
        $errors['username'] = 'username cannot be blank';
    }
    /* Validate the form on the server side */
    if (empty($_POST['password'])) {
        $errors['password'] = 'password cannot be blank';
    }
    
    if (!empty($errors)) { //If errors in validation
        $form_data['success'] = false;
        $form_data['errors']  = $errors;
    }
    else { //If not, process the form, and return true on success
        $form_data['success'] = true;
        $form_data['msg'] = 'Data Was Posted Successfully';
    }
    
    //Return data
    echo json_encode($form_data);
}
?>