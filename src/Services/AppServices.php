<?php
$configs = include_once('./config.php');
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

if (isset($_GET['action'])) {
    if ($_GET['action'] == "GetProductsByIds") {
        GetProductsByIds();
    }
    if ($_GET['action'] == "GetAllUser") {
        GetAllUser();
    }
    if ($_GET['action'] == 'GetNewProducts') {
        GetNewProducts();
    }
    if ($_GET['action'] == 'GetAppInfo') {
        GetAppInfo();
    }
    if ($_GET['action'] == 'Login') {
        Login();
    }
}
if (isset($_POST['action'])) {
    if ($_POST['action'] == "SignUp") {
        SignUp();
    }
}

function GetAppInfo()
{
    $form_data = array();
    $form_data['success'] = true;
    $form_data['AppName'] = 'BK Shop';
    $form_data['AppMail'] = 'BKShop@gmail';
    $form_data['AppPhone'] = '0986213444';
    //Return data
    echo json_encode($form_data);
}

function Login()
{
    global $conn;

    $valid = false;

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
    } else { //If not
        $username = $_GET['username'];
        $password = $_GET['password'];

        $sql_query = 'SELECT * FROM User WHERE Username = "'. $username . '" AND Password = "'.$password.'" AND IsActive = 1;';
        
        $result = $conn->query($sql_query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($row['Password'] == $password){
                    $valid = true;
                    $form_data['success'] = true;
                    $form_data['user'] = new UserInfo($row['UserId'], $row['FirstName'], $row['LastName'], $row['Phone'], $row['Email']);
                }
            }
        } else {
        }

        if ($valid == false) {
            $form_data['success'] = false;
            $form_data['msg'] = 'Username or password invalid';
        }
    }

    //Return data
    echo json_encode($form_data);
}

function GetNewProducts()
{
    $errors = array();
    $form_data = array();

    $data = array(
        new Suit("0", "Áo PSG sân nhà", "2022", "120 000", ""),
        new Suit("1", "Áo MU sân nhà", "2022", "120 000", ""),
        new Suit("2", "Áo Barca sân nhà", "2022", "120 000", ""),
        new Suit("3", "Áo Real sân nhà", "2022", "120 000", "")
    );
    /*  */
    if (!empty($errors)) { //If errors in validation
        $form_data['success'] = false;
        $form_data['errors']  = $errors;
    } else {
        $form_data['success'] = true;
        $form_data['data']  = $data;
    }

    //Return data
    echo json_encode($form_data);
}

function GetProductsByIds()
{
    global $conn;
    $errors = array();
    $form_data = array();

    $data = array();

    $idList = $_GET['idList'];
    $idListCond = "";

    if ($idList != null) {
        foreach ($idList as $value) {
            if ($idListCond == "") {
                $idListCond = '(' . $value;
            } else {
                $idListCond = $idListCond . ', ' . $value;
            }
        }
        $idListCond = $idListCond . ')';
    }

    if ($idListCond != "") {
        $sql_query = 'SELECT * FROM product WHERE ProductId IN ' . $idListCond . ';';

        $result = $conn->query($sql_query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($data, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], $row['Image1']));
            }
        } else {
            // $user_length = -1
        }
    } else {
        $errors['idList'] = 'idList cannot be blank';
    }
    
    if (!empty($errors)) { //If errors in validation
        $form_data['success'] = false;
        $form_data['errors']  = $errors;
    } else {
        $form_data['success'] = true;
        $form_data['data']  = $data;
    }

    //Return data
    echo json_encode($form_data);
}

function GetAllUser()
{
    global $conn;
    $form_data = array();
    $form_data['success'] = true;

    $sql_query = "SELECT * FROM user;";
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


function SignUp()
{
    global $conn;
    $errors = array();
    $form_data = array();
    /* Validate the form on the server side */
    if (empty($_POST['username'])) {
        $errors['username'] = 'username cannot be blank';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'password cannot be blank';
    }
    if (empty($_POST['phone'])) {
        $errors['phone'] = 'phone cannot be blank';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'email cannot be blank';
    }
    if (empty($_POST['firstName'])) {
        $errors['firstName'] = 'firstName cannot be blank';
    }
    if (empty($_POST['lastName'])) {
        $errors['lastName'] = 'lastName cannot be blank';
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    //check username
    $sql_query = 'SELECT * FROM User WHERE Username = "'. $username . '";';
    $result = $conn->query($sql_query);
    if ($result->num_rows > 0) {
        $errors['Username'] = 'Username exists';
    }
    //check phone
    $sql_query = 'SELECT * FROM User WHERE Phone = "'. $phone . '";';
    $result = $conn->query($sql_query);
    if ($result->num_rows > 0) {
        $errors['Phone'] = 'Phone exists';
    }
    //check email
    $sql_query = 'SELECT * FROM User WHERE Email = "'. $email . '";';
    $result = $conn->query($sql_query);
    if ($result->num_rows > 0) {
        $errors['Email'] = 'Email exists';
    }

    //register
    if (!empty($errors)) { //If errors in validation
        $form_data['success'] = false;
        $form_data['errors']  = $errors;
    } else { //If not, process the form, and return true on success
        $sql_query = 'INSERT INTO User(Usertype,Username,Password,FirstName,LastName,Birthday,Gender,Email,Phone,IsActive)
        VALUES (1,"'.$username.'","'.$password.'","'.$firstName.'","'.$lastName.'",NULL,'.$gender.',"'.$email.'","'.$phone.'",0)';
        $result = $conn->query($sql_query);
        if ($result->num_rows > 0) {
            $errors['Email'] = 'Email exists';
        }

        $form_data['success'] = true;
        $form_data['msg'] = 'Data Was Posted Successfully';
    }

    //Return data
    echo json_encode($form_data);
}
