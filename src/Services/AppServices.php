<?php

session_start();

$username = '';
$firstname = '';
$lastname = '';
$email = '';
$phone = '';
$created = '';
$userType = '';

$configs = include('config.php');
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

//include_once 'common.php';

function checkExistEmail($email, $conn)
{
    $sql = "SELECT Email from user WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function checkExistUserName($username, $conn)
{
    $sql = "SELECT Username from user WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['action'])) {
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
    if ($_GET['action'] == 'AddUser') {
        addNewUserByAdmin();
    }
    if ($_GET['action'] == 'DeleteUser') {
        deleteUserById();
    }
    if ($_GET['action'] == 'EditUser') {
        GetInfo();
    }
}
if (isset($_POST['action'])) {
    if ($_POST['action'] == "GetUserInfo") {
        GetUserInfo();
    }
}
if (isset($_POST['addUser'])) {
    $userType = $_POST['userType'];
    $userName = $_POST['name'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    if ($day < 10) $day = '0' . $day;
    if ($month < 10) $month = '0' . $month;
    $birthday = $year . '-' . $month . '-' . $day;
    $date = date('d-m-y h:i:s');
    $checkEmail = checkExistEmail($email, $conn);
    $checkUsername = checkExistUserName($userName, $conn);
    if (
        $userType == "" || $userName == "" || $email == "" || $phone == "" ||
        $password == "" || $birthday == "" || $gender == "" || $firstName == "" || $lastName == ""
    ) {
        $_SESSION['message'] = 'Input fields must not be empty !';
        $_SESSION['messageType'] = 'danger';
    } elseif (!checkdate(
        $month,
        $day,
        $year
    )) {
        $_SESSION['message'] = 'The date of birth is invalid. Please check that the day is valid for the month.';
        $_SESSION['messageType'] = 'danger';
    } elseif (strlen($userName) < 3) {
        $_SESSION['message'] = 'Username is too short, at least 3 Characters !';
        $_SESSION['messageType'] = 'danger';
        return $msg;
    } elseif ($checkUsername == TRUE) {
        $_SESSION['message'] = 'User name already Exists, please try another user name... !';
        $_SESSION['messageType'] = 'danger';
        return $msg;
    } elseif (filter_var($phone, FILTER_SANITIZE_NUMBER_INT) == FALSE) {
        $_SESSION['message'] = 'Enter only Number Characters for Mobile number field !';
        $_SESSION['messageType'] = 'danger';
    } elseif (strlen($password) < 5) {
        $_SESSION['message'] = 'Password at least 6 Characters !';
        $_SESSION['messageType'] = 'danger';
    } elseif (!preg_match(
        "#[0-9]+#",
        $password
    )) {
        $_SESSION['message'] = 'Your Password Must Contain At Least 1 Number !';
        $_SESSION['messageType'] = 'danger';
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $_SESSION['message'] = 'Your Password Must Contain At Least 1 Character !';
        $_SESSION['messageType'] = 'danger';
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $_SESSION['message'] = 'Invalid email address !';
        $_SESSION['messageType'] = 'danger';
    } elseif ($checkEmail == TRUE) {
        $_SESSION['message'] = 'Email already Exists, please try another Email... !';
        $_SESSION['messageType'] = 'danger';
    } else {
        $sql = "INSERT INTO user(Usertype, Username, Password, FirstName, LastName, Birthday, Gender, Email, Phone, CreatedDateTime) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            'ssssssssss',
            $userType,
            $userName,
            $password,
            $firstName,
            $lastName,
            $birthday,
            $gender,
            $email,
            $phone,
            $date
        );
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = 'You have Registered Successfully !';
            $_SESSION['messageType'] = 'success';
        } else {
            $_SESSION['message'] = 'Something went Wrong !';
            $_SESSION['messageType'] = 'danger';
        }
    }
    header("location: /assignment/dashboard/");
}
function GetInfo()
{
    global $conn;
    global $username;
    global $firstname;
    global $email;
    global $phone;
    global $created;
    global $userType;
    $form_data = array();

    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE UserId = $id ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['Username'];
        $firstname = $row['FirstName'];
        $lastname = $row['LastName'];
        $email = $row['Email'];
        $phone = $row['Phone'];
        $created = $row['CreatedDateTime'];
        $userType = $row['Usertype'];
    }
    $form_data['username'] = $username;
    $form_data['firstname'] = $firstname;
    $form_data['lastname'] = $lastname;
    $form_data['email'] = $email;
    $form_data['phone'] = $phone;
    $form_data['created'] = $created;
    $form_data['userType'] = $userType;
    echo json_encode($form_data);
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
        if ($_GET['username'] == 'sa' && $_GET['password'] == '123') {
            $form_data['success'] = true;
            $form_data['msg'] = 'Login successfully';
        } else {
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
        new Suit("0", "Áo PSG sân nhà", "2022", "120 000 VNĐ", ""),
        new Suit("1", "Áo MU sân nhà", "2022", "120 000 VNĐ", ""),
        new Suit("2", "Áo Barca sân nhà", "2022", "120 000 VNĐ", ""),
        new Suit("3", "Áo Real sân nhà", "2022", "120 000 VNĐ", "")
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

function GetAllUser()
{
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
function GetUserInfo()
{
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
    } else { //If not, process the form, and return true on success
        $form_data['success'] = true;
        $form_data['msg'] = 'Data Was Posted Successfully';
    }

    //Return data
    echo json_encode($form_data);
}

function addNewUserByAdmin()
{
    global $conn;
    $userType = $_GET['userType'];
    $userName = $_GET['userName'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $gender = $_GET['gender'];
    $password = $_GET['password'];
    $day = $_GET['day'];
    $month = $_GET['month'];
    $year = $_GET['year'];
    if ($day < 10) $day = '0' . $day;
    if ($month < 10) $month = '0' . $month;
    $birthday = $year . '-' . $month . '-' . $day;
    echo
    $birthday;
    $date = date('d-m-y h:i:s');
    $checkEmail = checkExistEmail($email, $conn);
    $checkUsername = checkExistUserName($userName, $conn);
    if (
        $userType == "" || $userName == "" || $email == "" || $phone == "" ||
        $password == "" || $birthday == "" || $gender == "" || $firstName == "" || $lastName == ""
    ) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Input fields must not be Empty !</div>';
        return $msg;
    } elseif (!checkdate(
        $month,
        $day,
        $year
    )) {
        $msg = 'The date of birth is invalid. Please check that the day is valid for the month.';
        return $msg;
    } elseif (strlen($userName) < 3) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Username is too short, at least 3 Characters !</div>';
        return $msg;
    } elseif ($checkUsername == TRUE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> User name already Exists, please try another user name... !</div>';
        return $msg;
    } elseif (filter_var($phone, FILTER_SANITIZE_NUMBER_INT) == FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Enter only Number Characters for Mobile number field !</div>';
        return $msg;
    } elseif (strlen($password) < 5) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Password at least 6 Characters !</div>';
        return $msg;
    } elseif (!preg_match(
        "#[0-9]+#",
        $password
    )) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Your Password Must Contain At Least 1 Number !</div>';
        return $msg;
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Your Password Must Contain At Least 1 Number !</div>';
        return $msg;
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Invalid email address !</div>';
        return $msg;
    } elseif ($checkEmail == TRUE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Email already Exists, please try another Email... !</div>';
        return $msg;
    } else {
        $sql = "INSERT INTO user(Usertype, Username, Password, FirstName, LastName, Birthday, Gender, Email, Phone, CreatedDateTime) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            'ssssssssss',
            $userType,
            $userName,
            $password,
            $firstName,
            $lastName,
            $birthday,
            $gender,
            $email,
            $phone,
            $date
        );
        $result = $stmt->execute();
        if ($result) {
            $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success !</strong> You have Registered Successfully !
    </div>';
            return $msg;
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> Something went Wrong !
    </div>';
            return $msg;
        }
    }
}

function deleteUserById()
{
    global $conn;
    $form_data = array();

    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE UserId = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $result = $stmt->execute();
    if ($result) {
        $form_data['message'] = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success !</strong> User account Deleted Successfully !
    </div>';
    } else {
        $form_data['message'] = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> Data not Deleted !
    </div>';
    }
    $_SESSION['message'] = "User account has been deleted";
    $_SESSION['messageType'] = "danger";
    echo json_encode($form_data);
}