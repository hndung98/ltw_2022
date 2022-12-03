var currentRowNumber = 0;
var currentColNumber = 2;
var MAX_ROW_NUMBER = 10;
var MAX_COL_NUMBER = 5;
var oldWidth = document.documentElement.clientWidth;

Init();

// ResizeWindow();
// window.addEventListener('resize', ResizeWindow);

function Init(){
  console.log('Init');

  updateMenuActive();
  
  let username = localStorage.getItem("username");
  if(username){
    UpdateLogin(true);
  }
  else{
    UpdateLogin(false);
  }
}

function updateMenuActive(){
  let menus = ["home","product","about"];
  let url = document.URL.split("/");
  let i = url.findIndex((element) => menus.findIndex(e => e == element) > -1);
  console.log('i: ', i);
  if (i > -1){
    menus.forEach(element => {
      let menuItemElement = document.getElementById("menu-item-" + element);
      console.log('menuItemElement: ', menuItemElement);
      // if(menuItemElement.classList.contains("active")){
      //   menuItemElement.classList.remove("active");
      // }
      if(element == url[i]){
        menuItemElement.classList.add("active");
      }
    });
  }
}

function ResizeWindow(event) {
  let width = document.documentElement.clientWidth;
  console.log('clientWidth: ', width);

  if (width < 768){
    //xs
  }
  else if (width >= 768){
    //
  }
  else if (width >= 992){
    //
  }
  else if (width >= 1200){
    //
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
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: 'GetAllUser'},
  }).done(function (res) {
    console.log("GetAllUser Successful ");
    let data = JSON.parse(res);
    console.log('GetAllUser: ', data);
  });
}

function GetNewProducts(){
  $.ajax({
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: 'GetNewProducts'},
  }).done(function (res) {
    console.log("GetNewProducts Successful ");
    let data = JSON.parse(res);
    console.log('GetNewProducts: ', data);
  });
}

function GetUserInfo(){
  $.ajax({
    type: "POST",
    url: "../Services/AppServices.php",
    data: { action: 'GetUserInfo', username: "Dung", password: '123' },
  }).done(function (res) {
    console.log("GetUserInfo Successful ");
    let data = JSON.parse(res);
    console.log('GetUserInfo: ', data);
  });
}

function Login() {
  console.log("[url]", window.location.href);
  console.log("[document.URL]", document.URL);
  console.log("[Click Login]");
  $.ajax({
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: 'Login', username: "sa", password: "1"},
  }).done(function (res) {
    localStorage.setItem("username", "Dung");
    UpdateLogin(true);
    console.log('Login: ', res);
    
    // let data = JSON.parse(res);
    // if(data.success){
    // }
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
    document.getElementById("btn-signup").style.display = "none";
    document.getElementById("div-avatar").style.display = "inline";
  }
  else{    
    document.getElementById("div-avatar").style.display = "none";
    document.getElementById("btn-login").style.display = "inline";
    document.getElementById("btn-signup").style.display = "inline";
  }
}

function DeleteUser(userid){
  $.ajax({
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: 'DeleteUser', id: userid},
  }).done(function (res) {
    console.log("DeleteUser Successful ");
    let data = JSON.parse(res);
    console.log('DeleteUser: ', data);
  });
}

