<?php
function SignInDialog(){
    echo '
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Đăng nhập</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" id="signInForm">
              <div class="mb-3">
                <label for="validationCustomUsername" class="form-label">Email hoặc SĐT</label>
                <div class="input-group has-validation">
                  <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                    Username.
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="validationCustomPassword" class="form-label">Mật khẩu</label>
                <div class="input-group has-validation">
                  <input type="password" class="form-control" id="validationCustomPassword" aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                  Password.
                  </div>
                </div>
              </div>
              <div class="my-space-10px"></div>
              <div class="col-12 d-grid">
                <button class="btn btn-primary" type="button" onclick="CheckLogin()">Đăng nhập</button>
              </div>
              <div class="col-12 my-text-align-right">
                <button class="btn btn-link" type="button">Quên mật khẩu</button>
              </div>
              <div class="col-12 my-text-align-right">
                <button class="btn btn-link" type="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Đăng ký</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          </div>
        </div>
      </div>
    </div>
    ';
}

function SignUpDialog(){
  echo '
  <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel2">Đăng ký</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" id="signUpForm">

            <div class="mb-3">
              <label for="validationCustomPhone" class="form-label">SĐT</label>
              <div class="input-group has-validation">
              <input type="tel" class="form-control" id="validationCustomPhone" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                SĐT.
                </div>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="validationCustomEmail" class="form-label">Email</label>
              <div class="input-group has-validation">
                <input type="email" class="form-control" id="validationCustomEmail" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Email.
                </div>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="validationCustomFirstName" class="form-label">Họ</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomFirstName" aria-describedby="inputGroupPrepend" >
                <div class="invalid-feedback">
                  ...
                </div>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="validationCustomLastName" class="form-label">Tên</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomLastName" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  ...
                </div>
              </div>
            </div>
            
            <div class="my-space-10px"></div>
            <fieldset class="mb-3">
              <legend class="col-form-label pt-0">Giới tính</legend>
              <div id="validationCustomGender">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0" checked>
                  <label class="form-check-label" for="inlineRadio1">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
                  <label class="form-check-label" for="inlineRadio2">Nữ</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="2">
                  <label class="form-check-label" for="inlineRadio3">Khác</label>
                </div>
              </div>
            </fieldset>

            <div class="mb-3">
              <label for="validationCustomUsername2" class="form-label">Tên đăng nhập</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomUsername2" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Username.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="validationCustomPassword2" class="form-label">Mật khẩu</label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="validationCustomPassword2" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                Password.
                </div>
              </div>
            </div>
            
            <div class="my-space-10px"></div>
            <div class="col-12 d-grid">
              <button class="btn btn-primary" type="button" onclick="CheckSignUp()">Đăng ký</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">Đăng ký thành công</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        </div>
      </div>
    </div>
  </div>
  ';
}


function SuccessSignUpDialog(){
  echo '
  <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel3">Thông báo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel"></button>
        </div>
        <div class="modal-body">
          Đăng ký thành công!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
  ';
}
