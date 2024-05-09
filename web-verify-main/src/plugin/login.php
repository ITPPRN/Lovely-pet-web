<div class="row">
  <div class="center-card">
    <div class="col-md-6 mx-auto">
      <div class="card " style="max-width: 400px; margin: 0 auto;">
        <div class="card-body text-center yellow-bg">
          <form action="./api/apiLogin.php" method="post">

            <label for="inputUsername" class="form-label">username</label>
            <center>
              <input type="text" name="userName" id="inputUsername" class="form-control" maxlength="24" style="width: 300px;">
            </center>
            <label for="inputPassword" class="form-label">Password</label>
            <center>
              <input type="password" name="passWord" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" maxlength="24" style="width: 300px;">
            </center>

            <span id="passwordHelpInline" class="form-text password-help-inline">
              Must be 8-24 characters long.
            </span>
            <div class="btn-container">
              <button class="custom-button">
                <span>Login</span>
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<center>@admin</center>