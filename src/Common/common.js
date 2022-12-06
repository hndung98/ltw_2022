var currentRowNumber = 0;
var currentColNumber = 2;
var MAX_ROW_NUMBER = 10;
var MAX_COL_NUMBER = 5;
var oldWidth = document.documentElement.clientWidth;

////// Features
function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function validateEmail(email){
  return email.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
};


///// Init website
Init();


function Init() {
  console.log("Init");

  updateMenuActive();

  let uid = localStorage.getItem("uid");
  if (uid) {
    UpdateLogin(true);
  } else {
    UpdateLogin(false);
  }
}

function updateMenuActive() {
  let menus = ["home", "about", "cart"];
  let url = document.URL.split("/");
  if(url.findIndex((element) => element == "cart") > -1){
    console.log("CART_PAGE");
    LoadCart();
  };
  let i = url.findIndex((element) => menus.findIndex((e) => e == element) > -1);
  if (i > -1) {
    menus.forEach((element) => {
      let menuItemElement = document.getElementById("menu-item-" + element);
      // if(menuItemElement.classList.contains("active")){
      //   menuItemElement.classList.remove("active");
      // }
      if (element == url[i]) {
        menuItemElement.classList?.add("active");
      }
    });
  }
}

///// Button event
function CheckSignUp(){
  let usernameElement = document.getElementById("validationCustomUsername2");
  let passwordElement = document.getElementById("validationCustomPassword2");
  let phoneElement = document.getElementById("validationCustomPhone");
  let emailElement = document.getElementById("validationCustomEmail");
  let firstNameElement = document.getElementById("validationCustomFirstName");
  let lastNameElement = document.getElementById("validationCustomLastName");
  let gender = $('#validationCustomGender input:radio:checked').val();

  let username = usernameElement.value;
  let password = passwordElement.value;
  let phone = phoneElement.value;
  let email = emailElement.value;
  let firstName = firstNameElement.value;
  let lastName = lastNameElement.value;
  console.log("username: ", username);
  console.log("password: ", password);
  console.log("phone: ", phone);
  console.log("email: ", email);
  console.log("firstName: ", firstName);
  console.log("lastName: ", lastName);
  console.log("gender: ", gender);
  
  if (phone) {
    if (email) {
      if(!validateEmail(email)){
        emailElement.focus();
        showRedToast("Email không hợp lệ");
      }
      else if (firstName) {
        if (lastName) {
          if (username) {
            if (password) {
              SignUp(username, password, phone, email, firstName, lastName, gender);
            } else {
              passwordElement.focus();
            }
          } else {
            usernameElement.focus();
          }
        } else {
          lastNameElement.focus();
        }
      } else {
        firstNameElement.focus();
      }
    } else {
      emailElement.focus();
    }
  }
  else{
    phoneElement.focus();
  }
}

function SignUp(username, password, phone, email, firstName, lastName, gender) {
  $.ajax({
    type: "POST",
    url: "../Services/AppServices.php",
    data: {
      action: "SignUp",
      username: username,
      password: password,
      phone: phone,
      email: email,
      firstName: firstName,
      lastName: lastName,
      gender: gender,
    },
  }).done(function (res) {
    let data = JSON.parse(res);
    console.log("data: ", data);
    if (data.success) {
      $("#signUpStaticBackdrop").modal("hide");
      $("#signUpForm")[0].reset();
      showToast("Đăng ký thành công");
    }
    else{
      if(data.errors){
        let msg = '';
        if(data.errors.Username){
          msg += ' Tên đăng nhập';
        }
        if(data.errors.Email){
          msg += ' Email';
        }
        if(data.errors.Phone){
          msg += ' SĐT';
        }
        showRedToast(msg + ' đã tồn tại.');
      }
    }
  });
}

function CheckLogin(){
  let usernameElement = document.getElementById("validationCustomUsername");
  let passwordElement = document.getElementById("validationCustomPassword");

  let username = usernameElement.value;
  let password = passwordElement.value;
  console.log("username: ", username);
  console.log("password: ", password);
  if(username && password){
    Login(username, password);
  }
}

function Login(username, password) {
  // console.log("[url]", window.location.href);
  // console.log("[document.URL]", document.URL);
  // console.log("[Click Login]");
  $.ajax({
    type: "GET",
    url: "../Services/AppServices.php",
    data: { action: "Login", username: username, password: password },
  }).done(function (res) {
    let data = JSON.parse(res);
    console.log("data: ", data);
    if(data.success){
      $('#signInStaticBackdrop').modal('hide');
      $('#signInForm')[0].reset();
      localStorage.setItem("uid", data.user.id);
      localStorage.setItem("fname", data.user.fname);
      localStorage.setItem("lname", data.user.lname);
      localStorage.setItem("email", data.user.email);
      localStorage.setItem("phone", data.user.phone);
      UpdateLogin(true);
    }
  });
}

function Logout() {
  console.log("[Click Logout]");
  localStorage.removeItem("uid");
  UpdateLogin(false);
}

function ViewProductDetails(id) {
  console.log("log something: ", id);
  location.href = "/assignment/product/?pid=" + id;
}

function AddToCart(pid, name, price) {
  let cart_id = JSON.parse(localStorage.getItem("cart_id"));
  let cart_name = JSON.parse(localStorage.getItem("cart_name"));
  let cart_price = JSON.parse(localStorage.getItem("cart_price"));
  let cart_number = JSON.parse(localStorage.getItem("cart_number"));

  if (cart_id) {
    if (!cart_id.includes(pid)) {
      cart_id.push(pid);
      cart_name.push(name);
      cart_price.push(price);
      cart_number.push(1);
    } else {
      let index = cart_id.indexOf(pid);
      cart_number[index] = cart_number[index] + 1;
    }
  } else {
    cart_id = [];
    cart_name = [];
    cart_price = [];
    cart_number = [];
    cart_id.push(pid);
    cart_name.push(name);
    cart_price.push(price);
    cart_number.push(1);
  }

  localStorage.setItem("cart_id", JSON.stringify(cart_id));
  localStorage.setItem("cart_name", JSON.stringify(cart_name));
  localStorage.setItem("cart_price", JSON.stringify(cart_price));
  localStorage.setItem("cart_number", JSON.stringify(cart_number));

  cart_id = JSON.parse(localStorage.getItem("cart_id"));
  cart_name = JSON.parse(localStorage.getItem("cart_name"));
  cart_price = JSON.parse(localStorage.getItem("cart_price"));
  cart_number = JSON.parse(localStorage.getItem("cart_number"));
  console.log("cart_id: ", cart_id);
  console.log("cart_name: ", cart_name);
  console.log("cart_price: ", cart_price);
  console.log("cart_number: ", cart_number);
  showToast();
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

function CheckPurchaseInfo(){
  let nameElement = document.getElementById("validationCustomName");
  let phoneElement = document.getElementById("validationCustomPhoneNumber");
  let tempName = nameElement.value;
  let tempPhone = phoneElement.value;

  let idList = localStorage.getItem("cart_id");
  let numberList = localStorage.getItem("cart_number");
  console.log('idlist: ', idList);
  console.log('numberList: ', numberList);
  if (tempName && tempPhone){

    $.ajax({
      type: "POST",
      url: "../Services/AppServices.php",
      data: { action: "PurchaseTemp", tempName: tempName, tempPhone: tempPhone, totalPrice: getTotalPrice(), idList: idList, numberList: numberList },
    }).done(function (res) {
      let data = JSON.parse(res);
      console.log("data: ", data);
      if(data.success){
        $('#purchaseInfoStaticBackdrop').modal('hide');
        $('#purchaseInfoForm')[0].reset();
        showToast("Đã gửi yêu cầu đặt hàng");
        resetCart();
        setTimeout(function(){
          window.location.reload();
        },1000);
      }
    });
  }
  //
}

function PurchaseFromCart(){
  if(getTotalPrice() > 0){
    let uid = localStorage.getItem("uid");
    let lname = localStorage.getItem("lname");
    let phone = localStorage.getItem("phone");
    if (uid) { //Loged in case
      let idList = localStorage.getItem("cart_id");
      let numberList = localStorage.getItem("cart_number");  
      $.ajax({
        type: "POST",
        url: "../Services/AppServices.php",
        data: { action: "Purchase", uid: uid, tempName: lname, tempPhone: phone, totalPrice: getTotalPrice(), idList: idList, numberList: numberList },
      }).done(function (res) {
        let data = JSON.parse(res);
        console.log("data: ", data);
        if(data.success){
          showToast("Đã gửi yêu cầu đặt hàng");
          resetCart();
          setTimeout(function(){
            window.location.reload();
          },1000);
        }
      });
    } else { //Not Login
      $('#purchaseInfoStaticBackdrop').modal('toggle');
      // $('#purchaseInfoStaticBackdrop').modal('show');
      //$('#signInForm')[0].reset();    
    }
  }
  else{
    showRedToast("Giỏ hàng chưa có gì!");
  }
}

///// Update page
function UpdateLogin(isLogin) {
  if (isLogin) {
    document.getElementById("btn-login").style.display = "none";
    document.getElementById("div-avatar").style.display = "inline";
  } else {
    document.getElementById("btn-login").style.display = "inline";
    document.getElementById("div-avatar").style.display = "none";
  }
}

function LoadCart() {
  let cart_id = JSON.parse(localStorage.getItem("cart_id"));
  let cart_name = JSON.parse(localStorage.getItem("cart_name"));
  let cart_price = JSON.parse(localStorage.getItem("cart_price"));
  let cart_number = JSON.parse(localStorage.getItem("cart_number"));

  console.log("cart_id: ", cart_id);
  console.log("cart_number: ", cart_number);

  let rowLength = 0;
  let colLength = 5;
  
  if(cart_id){
    rowLength = cart_id.length;
  }

  let table = document.getElementById("table1");
  let totalPrice = 0;

  if(table){
    for(let rowIndex = 0; rowIndex < rowLength; rowIndex++){
      let row = table.insertRow(rowIndex+1);
      for (let i = 0; i < colLength; i++) {
        let currentCell = row.insertCell(i);
        currentCell.classList.add("align-middle");
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
        else if (i == 1) { // Tên SP
          let text = document.createElement("button");
          text.setAttribute("type", "button");
          text.classList.add("btn", "btn-outline-success");
          text.disabled = true;
          text.style.border = "none";
          text.innerHTML = "" + cart_name[rowIndex];
          currentCell.style.width = "50%";
          currentCell.appendChild(text);
        }
        else if (i == 2) { // Đơn giá
          let text = document.createElement("button");
          text.setAttribute("type", "button");
          text.classList.add("btn", "btn-outline-success");
          text.disabled = true;
          text.style.border = "none";
          text.innerHTML = "" + numberWithCommas(parseInt(cart_price[rowIndex].replaceAll(' ', '')));
          currentCell.style.width = "15%";
          currentCell.appendChild(text);
          currentCell.classList.add("my-text-align-right");
        }
        else if (i == 3) { // Số lượng
          let divElement = document.createElement("div");
          divElement.classList.add("form-outline");
  
          let inputElement = document.createElement("input");
          inputElement.setAttribute("type", "number");
          inputElement.classList.add("form-control", "my-text-align-center");
          inputElement.id = "typeNumber_" + rowIndex;
          inputElement.value = "" + cart_number[rowIndex];
          inputElement.min = "0";
          inputElement.max = "50";
          
          inputElement.addEventListener('change', (event) => {
            // console.log('event.target.value: ', event.target.value);
            let currentRowIndex = event.target.id.split('_')[1];
            let cart_number = JSON.parse(localStorage.getItem("cart_number"));
            let cart_price = JSON.parse(localStorage.getItem("cart_price"));
            cart_number[currentRowIndex] = event.target.value;
            localStorage.setItem("cart_number", JSON.stringify(cart_number));

            let totalRowElement = document.getElementById("totalPriceRow_" + currentRowIndex);
            totalRowElement.innerHTML = "" + numberWithCommas((parseInt(cart_price[currentRowIndex].replaceAll(' ', '')))*(parseInt(cart_number[currentRowIndex])));

            let totalPriceElement = document.getElementById("totalPrice");
            totalPriceElement.value = "Tổng hóa đơn (chưa tính ship): " + numberWithCommas(getTotalPrice()) + " đồng";
            // console.log('currentRowIndex: ', currentRowIndex);
            // const result = document.querySelector('.result');
            // result.textContent = `You like ${event.target.value}`;
          });
  
          divElement.appendChild(inputElement);
  
          currentCell.style.width = "10%";
          currentCell.appendChild(divElement);
        }
        else { // Thành tiền
          let text = document.createElement("button");
          text.setAttribute("type", "button");
          text.classList.add("btn", "btn-outline-success");
          text.id = "totalPriceRow_" + rowIndex;
          text.disabled = true;
          text.style.border = "none";
          let totalPriceRow = (parseInt(cart_price[rowIndex].replaceAll(' ', '')))*(parseInt(cart_number[rowIndex]));
          totalPrice += totalPriceRow;
          text.innerHTML = "" + numberWithCommas(totalPriceRow);
          currentCell.style.width = "15%";
          currentCell.classList.add("my-text-align-right");
          currentCell.appendChild(text);
        }
      }
    }
  }
  let totalPriceElement = document.getElementById("totalPrice");
  totalPriceElement.value = "Tổng hóa đơn (chưa tính ship): " + numberWithCommas(totalPrice) + " đồng";
}

function resetCart(){
  localStorage.removeItem("cart_id");
  localStorage.removeItem("cart_name");
  localStorage.removeItem("cart_price");
  localStorage.removeItem("cart_number");
}

function getTotalPrice(){
  cart_price = JSON.parse(localStorage.getItem("cart_price"));
  cart_number = JSON.parse(localStorage.getItem("cart_number"));
  let totalPrice = 0;
  if(cart_price){
    for(let i = 0; i < cart_price.length; i++){
      totalPrice += (parseInt(cart_price[i].replaceAll(' ', '')))*(parseInt(cart_number[i]));
    }
  }
  return totalPrice;
}

function showToast(msg=""){
  const toastLiveExample = document.getElementById('liveToast');
  if (msg != "") {
    const msgElement = document.getElementById("toast-msg");
    msgElement.innerHTML = msg;
  }
  const toast = new bootstrap.Toast(toastLiveExample)
  toast.show();
}

function showRedToast(msg){
  const toastLiveExample = document.getElementById('liveRedToast');
  const msgElement = document.getElementById('red-toast-msg');
  msgElement.innerHTML = msg;
  const toast = new bootstrap.Toast(toastLiveExample);
  toast.show();
}

////// TEST
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
