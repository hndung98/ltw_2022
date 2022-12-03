<?php
$configs = include('./Services/config.php');
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
?>

<?php

if (isset($_POST['delete'])) {
    $id = $_POST['deleteID'];
    $sql = "DELETE FROM user WHERE UserId = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $remove);
    $result = $stmt->execute();
    if ($result) {
        $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success !</strong> User account Deleted Successfully !
    </div>';
        return $msg;
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> Data not Deleted !
    </div>';
        return $msg;
    }
}

function checkExistEmail($email)
{
    global $conn;
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

function checkExistUserName($username)
{
    global $conn;
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

function addNewUserByAdmin($data)
{
    global $conn;
    $userType = $data['userType'];
    $userName = $data['userName'];
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $email = $data['email'];
    $phone = $data['phone'];
    $gender = $data['gender'];
    $password = $data['password'];
    $day = $data['day'];
    $month = $data['month'];
    $year = $data['year'];
    if ($day < 10) $day = '0' . $day;
    if ($month < 10) $month = '0' . $month;
    $birthday = $year . '-' . $month . '-' . $day;
    echo
    $birthday;
    $date = date('d-m-y h:i:s');
    $checkEmail = checkExistEmail($email);
    $checkUsername = checkExistUserName($userName);
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

function deleteUserById($remove)
{
    global $conn;
    $sql = "DELETE FROM user WHERE UserId = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $remove);
    $result = $stmt->execute();
    if ($result) {
        $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success !</strong> User account Deleted Successfully !
    </div>';
        return $msg;
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> Data not Deleted !
    </div>';
        return $msg;
    }
}

function GetAllUser()
{
    global $conn;
    $form_data = array();
    $form_data['success'] = true;

    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_length = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $userid = $row['UserId'];
            $username = $row['Username'];
            $lastname = $row['LastName'];
            $email = $row['Email'];
            $phone = $row['Phone'];
            $created = $row['CreatedDateTime'];
            $userType = $row['Usertype'];

            $form_data['userid'][$user_length] = $userid;
            $form_data['username'][$user_length] = $username;
            $form_data['lastname'][$user_length] = $lastname;
            $form_data['email'][$user_length] = $email;
            $form_data['phone'][$user_length] = $phone;
            $form_data['created'][$user_length] = $created;
            $form_data['usertype'][$user_length] = $userType;
            $user_length++;
        }
    } else {
        // $user_length = -1
    }
    $form_data['user_length'] = $user_length;
    //Return data
    echo json_encode($form_data);
}
?>