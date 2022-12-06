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
    if ($_GET['action'] == 'DeleteUser') {
        deleteUserById();
    }
    if ($_GET['action'] == 'AddForm') {
        $_SESSION['update'] = false;
        $_SESSION['add'] = true;
        unset($_SESSION['info']['userID']);
        unset($_SESSION['info']['userName']);
        unset($_SESSION['info']['firstName']);
        unset($_SESSION['info']['lastName']);
        unset($_SESSION['info']['email']);
        unset($_SESSION['info']['phone']);
        unset($_SESSION['info']['userType']);
        unset($_SESSION['info']['password']);
    }
    if ($_GET['action'] == 'EditUser') {
        GetInfo();
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == "SignUp") {
        SignUp();
    }
    if ($_POST['action'] == "Purchase") {
        Purchase();
    }
    if ($_POST['action'] == "PurchaseTemp") {
        PurchaseTemp();
    }
}
if (isset($_POST['addUser'])) {
    addNewUserByAdmin();
}
if (isset($_POST['update'])) {
    UpdateUser();
}
function GetInfo()
{
    global $conn;

    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE UserId = $id ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['info']['userName'] = $row['Username'];
        $_SESSION['info']['firstName'] = $row['FirstName'];
        $_SESSION['info']['lastName'] = $row['LastName'];
        $_SESSION['info']['email'] = $row['Email'];
        $_SESSION['info']['phone'] = $row['Phone'];
        $_SESSION['info']['createdDate'] = $row['CreatedDateTime'];
        $_SESSION['info']['userType'] = $row['Usertype'];
        $_SESSION['info']['password'] = $row['password'];
        $_SESSION['info']['userID'] = $row['Userid'];
    }
    $_SESSION['add'] = false;
    $_SESSION['update'] = true;
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

function PurchaseTemp(){
    global $conn;
    $errors = array();
    $form_data = array();
    /* Validate the form on the server side */
    if (empty($_POST['tempName'])) {
        $errors['tempName'] = 'name cannot be blank';
    }
    if (empty($_POST['tempPhone'])) {
        $errors['tempPhone'] = 'name cannot be blank';
    }
    
    $tempName = $_POST['tempName'];
    $tempPhone = $_POST['tempPhone'];
    $totalPrice = $_POST['totalPrice'];
    $idList = json_decode($_POST['idList']);
    $numberList = json_decode($_POST['numberList']);
    $sql_query = 'INSERT INTO SalesHeader(UserId,Confirm,Pay,TotalPrice,TempName,TempPhone)
                    VALUES(0,0,0,'.$totalPrice.',"'.$tempName.'","'.$tempPhone.'");';
    $result = $conn->query($sql_query);

    if($result == true){
        $last_id = $conn->insert_id;
        $form_data['lastId'] = $last_id;

        for($i = 0; $i < count($idList); $i++){
            $sql_query = 'INSERT INTO SalesDetails(SalesHeaderId,ProductId,Quantity)
                            VALUES('.$last_id.','.$idList[$i].','.$numberList[$i].');';
            $conn->query($sql_query);
            $form_data["query".$i] = $sql_query;
        }

        $form_data['success'] = true;
        $form_data['msg'] = 'Data Was Posted Successfully';
    }

    //Return data
    echo json_encode($form_data);
}

function Purchase(){
    global $conn;
    $errors = array();
    $form_data = array();
    /* Validate the form on the server side */
    if (empty($_POST['uid'])) {
        $errors['uid'] = 'user id cannot be blank';
    }
    if (empty($_POST['tempName'])) {
        $errors['tempName'] = 'name cannot be blank';
    }
    if (empty($_POST['tempPhone'])) {
        $errors['tempPhone'] = 'name cannot be blank';
    }
    
    $uid = $_POST['uid'];
    $tempName = $_POST['tempName'];
    $tempPhone = $_POST['tempPhone'];
    $totalPrice = $_POST['totalPrice'];
    $idList = json_decode($_POST['idList']);
    $numberList = json_decode($_POST['numberList']);
    $sql_query = 'INSERT INTO SalesHeader(UserId,Confirm,Pay,TotalPrice,TempName,TempPhone)
                    VALUES('.$uid.',0,0,'.$totalPrice.',"'.$tempName.'","'.$tempPhone.'");';
    $result = $conn->query($sql_query);

    if($result == true){
        $last_id = $conn->insert_id;
        $form_data['lastId'] = $last_id;

        for($i = 0; $i < count($idList); $i++){
            $sql_query = 'INSERT INTO SalesDetails(SalesHeaderId,ProductId,Quantity)
                            VALUES('.$last_id.','.$idList[$i].','.$numberList[$i].');';
            $conn->query($sql_query);
            $form_data["query".$i] = $sql_query;
        }

        $form_data['success'] = true;
        $form_data['msg'] = 'Data Was Posted Successfully';
    }

    //Return data
    echo json_encode($form_data);
}


function UpdateUser()
{
    global $conn;
    $id = $_SESSION['info']['userID'];
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
    } elseif ($checkUsername == TRUE) {
        $_SESSION['message'] = 'User name already Exists, please try another user name... !';
        $_SESSION['messageType'] = 'danger';
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
        $sql = "UPDATE user SET Usertype=?, Username=?, Password=?, FirstName=?, LastName=?, Birthday=?, Gender=?, Email=?, Phone=? WHERE Userid = ?";
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
            $id
        );
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = 'User Account has been updated !';
            $_SESSION['messageType'] = 'success';
        } else {
            $_SESSION['message'] = 'Something went Wrong !';
            $_SESSION['messageType'] = 'danger';
        }
    }
    header("location: /assignment/dashboard/");
    $_SESSION['update'] = false;
}

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

function addNewUserByAdmin()
{
    global $conn;
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
    } elseif ($checkUsername == TRUE) {
        $_SESSION['message'] = 'User name already Exists, please try another user name... !';
        $_SESSION['messageType'] = 'danger';
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
    $_SESSION['add'] = false;
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