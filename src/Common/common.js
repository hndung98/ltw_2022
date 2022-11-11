var currentRowNumber = 0;
var currentColNumber = 2;
var MAX_ROW_NUMBER = 10;
var MAX_COL_NUMBER = 5;

Init();

function Init(){
  let username = localStorage.getItem("username");
  if(username){
    UpdateLogin(true);
  }
  else{
    UpdateLogin(false);
  }
}

function Test() {
  let username = localStorage.getItem("username");
  if (username) {
    console.log("you are logged in: ", username);
  } else {
    console.warn("You are not logged in");
  }
}

function GetAllUser(){
  $.ajax({
    type: "POST",
    url: "Services/AppServices.php",
    data: { action: 'GetAllUser'},
  }).done(function (res) {
    //alert("Successful ");
    let data = JSON.parse(res);
    console.log('data: ', data);
  });
}

function GetUserInfo(){
  $.ajax({
    type: "POST",
    url: "Services/AppServices.php",
    data: { action: 'GetUserInfo', username: "Dung", password: '123' },
  }).done(function (res) {
    //alert("Successful ");
    let data = JSON.parse(res);
    console.log('data: ', data);
  });
}

function Login() {
  console.log("[Click Login]");
  $.ajax({
    type: "GET",
    url: "Services/AppServices.php",
    data: { action: 'Login', username: "sa", password: '123' },
  }).done(function (res) {
    //alert("Successful ");
    let data = JSON.parse(res);
    console.log('Login: ', data);
    if(data.success){
      localStorage.setItem("username", "Dung");
      UpdateLogin(true);
    }
  });
}

function Logout() {
  console.log("[Click Logout]");
  localStorage.removeItem("username");
  UpdateLogin(false);
}

$("#btn-login").click(function () {
    console.log('login clicked');
});

function UpdateLogin(isLogin){
  if(isLogin){
    document.getElementById("btn-login").style.display = "none";
    document.getElementById("div-avatar").style.display = "inline";
  }
  else{    
    document.getElementById("div-avatar").style.display = "none";
    document.getElementById("btn-login").style.display = "inline";
  }
}