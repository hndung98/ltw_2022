var currentRowNumber = 0;
var currentColNumber = 2;
var MAX_ROW_NUMBER = 10;
var MAX_COL_NUMBER = 5;
var oldWidth = document.documentElement.clientWidth;

Init();

// ResizeWindow();
// window.addEventListener('resize', ResizeWindow);

function Init() {
  console.log("Init");

  updateMenuActive();

  let username = localStorage.getItem("username");
  if (username) {
    UpdateLogin(true);
  } else {
    UpdateLogin(false);
  }
}

function updateMenuActive() {
  let menus = ["home", "product", "about"];
  let url = document.URL.split("/");
  let i = url.findIndex((element) => menus.findIndex((e) => e == element) > -1);
  console.log("i: ", i);
  if (i > -1) {
    menus.forEach((element) => {
      let menuItemElement = document.getElementById("menu-item-" + element);
      console.log("menuItemElement: ", menuItemElement);
      // if(menuItemElement.classList.contains("active")){
      //   menuItemElement.classList.remove("active");
      // }
      if (element == url[i]) {
        menuItemElement.classList?.add("active");
      }
    });
  }
}

function ResizeWindow(event) {
  let width = document.documentElement.clientWidth;
  console.log("clientWidth: ", width);

  if (width < 768) {
    //xs
  } else if (width >= 768) {
    //
  } else if (width >= 992) {
    //
  } else if (width >= 1200) {
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

function GetAllUser() {
  $.ajax({
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: "GetAllUser" },
  }).done(function (res) {
    console.log("GetAllUser Successful ");
    let data = JSON.parse(res);
    console.log("GetAllUser: ", data);
  });
}

function GetNewProducts() {
  $.ajax({
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: "GetNewProducts" },
  }).done(function (res) {
    console.log("GetNewProducts Successful ");
    let data = JSON.parse(res);
    console.log("GetNewProducts: ", data);
  });
}

function GetProductsByIds() {
  let cart_id = JSON.parse(localStorage.getItem("cart_id"));

  $.ajax({
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: "GetProductsByIds", idList: cart_id },
  }).done(function (res) {
    console.log("GetProductsByIds Successful ");
    let data = JSON.parse(res);
    console.log("GetProductsByIds: ", data);
  });
}

function GetUserInfo() {
  $.ajax({
    type: "POST",
    url: "../Services/AppServices.php",
    data: { action: "GetUserInfo", username: "Dung", password: "123" },
  }).done(function (res) {
    console.log("GetUserInfo Successful ");
    let data = JSON.parse(res);
    console.log("GetUserInfo: ", data);
  });
}

function Login() {
  console.log("[url]", window.location.href);
  console.log("[document.URL]", document.URL);
  console.log("[Click Login]");
  $.ajax({
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: "Login", username: "sa", password: "1" },
  }).done(function (res) {
    localStorage.setItem("username", "Dung");
    UpdateLogin(true);
    console.log("Login: ", res);

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
  console.log("login clicked");
});

function UpdateLogin(isLogin) {
  if (isLogin) {
    document.getElementById("btn-login").style.display = "none";
    document.getElementById("btn-signup").style.display = "none";
    document.getElementById("div-avatar").style.display = "inline";
  } else {
    document.getElementById("div-avatar").style.display = "none";
    document.getElementById("btn-login").style.display = "inline";
    document.getElementById("btn-signup").style.display = "inline";
  }
}

function ViewProductDetails(id) {
  console.log("log something: ", id);
  location.href = "/assignment/product/?pid=" + id;
}

function AddToCart(pid) {
  let cart_id = JSON.parse(localStorage.getItem("cart_id"));
  let cart_number = JSON.parse(localStorage.getItem("cart_number"));

  if (cart_id) {
    if (!cart_id.includes(pid)) {
      cart_id.push(pid);
      cart_number.push(1);
    } else {
      let index = cart_id.indexOf(pid);
      cart_number[index] = cart_number[index] + 1;
    }
  } else {
    cart_id = [];
    cart_number = [];
    cart_id.push(pid);
    cart_number.push(1);
  }

  localStorage.setItem("cart_id", JSON.stringify(cart_id));
  localStorage.setItem("cart_number", JSON.stringify(cart_number));

  cart_id = JSON.parse(localStorage.getItem("cart_id"));
  cart_number = JSON.parse(localStorage.getItem("cart_number"));
  console.log("cart_id: ", cart_id);
  console.log("cart_number: ", cart_number);
}

function logCart() {
  let cart_id = JSON.parse(localStorage.getItem("cart_id"));
  let cart_number = JSON.parse(localStorage.getItem("cart_number"));

  console.log("cart_id: ", cart_id);
  console.log("cart_number: ", cart_number);

  let rowLength = 0;
  let colLength = 3;
  
  if(cart_id){
    rowLength = cart_id.length;
  }

  let table = document.getElementById("table1");

  for(let rowIndex = 0; rowIndex < rowLength; rowIndex++){
    let row = table.insertRow(rowIndex+1);
    for (let i = 0; i < colLength; i++) {
      let currentCell = row.insertCell(i);
      if(i == 0){
        let text = document.createElement("button");
        text.setAttribute("type", "button");
        text.innerHTML = (rowIndex+1).toString();
        text.classList.add("btn","btn-outline-success");
        text.disabled = true;
        text.style.border = "none";
        currentCell.style.textAlign= "center"; 
        currentCell.style.width = "10%";
        currentCell.appendChild(text);
      }
      else if(i == 1){
        let text = document.createElement("button");
        text.setAttribute("type", "button");
        text.classList.add("btn","btn-outline-success");
        text.disabled = true;
        text.style.border = "none";
        text.innerHTML = cart_id[rowIndex];
        currentCell.style.width = "60%";
        currentCell.appendChild(text);
      }
      else{
        let buttonMinus = document.createElement("button");
        buttonMinus.setAttribute("type", "button");
        buttonMinus.innerHTML = "-";
        buttonMinus.classList.add("btn","btn-outline-warning");
        buttonMinus.style.width = "30%";
        
        let buttonQuantity = document.createElement("button");
        buttonQuantity.setAttribute("type", "button");
        buttonQuantity.innerHTML = cart_number[rowIndex];
        buttonQuantity.classList.add("btn","btn-outline-success");
        buttonQuantity.style.width = "30%";
        buttonQuantity.disabled = true;
        buttonQuantity.style.border = "none";
        
        let buttonAdd = document.createElement("button");
        buttonAdd.setAttribute("type", "button");
        buttonAdd.innerHTML = "+";
        buttonAdd.classList.add("btn","btn-outline-success");
        buttonAdd.style.width = "30%";

        currentCell.style.width = "30%";
        currentCell.appendChild(buttonMinus);
        currentCell.appendChild(buttonQuantity);
        currentCell.appendChild(buttonAdd);
      }


    }
  }
}
