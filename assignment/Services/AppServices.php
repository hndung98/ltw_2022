<?php
if(isset($_GET['action'])){
    if ($_GET['action'] == 'Login') { Login(); }
}
if(isset($_POST['action'])){
    if ($_POST['action'] == "GetAllUser") { GetAllUser(); }
    if ($_POST['action'] == "GetUserInfo") { GetUserInfo(); }
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

function GetAllUser(){
    $form_data = array();
    $form_data['success'] = true;
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