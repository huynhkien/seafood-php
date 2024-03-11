<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
     $rg = $us->register($_POST);
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
     $check = $us->check_password($_POST);
 }

?>
<section class="forms-section">
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
      </button>
	  <?php
	  if(isset($check)){
		?>
	  <script>
		alert("Tài khoản hoặc mật khẩu không đúng");
	  </script>
	  <?php
	  }
	
	  ?>
      <form class="form form-login" method="post">
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="login-email">E-mail</label>
            <input id="login-email" type="email" name="email" required>
          </div>
          <div class="input-block">
            <label for="login-password">PassWord</label>
            <input id="login-password" type="password" name="password" required>
          </div>
        </fieldset>
        <button type="submit" name="login" class="btn-login">Login</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        Sign Up
        <span class="underline"></span>
      </button>
	  <?php
	  if(isset($rg)){
		?>
	  <script>
		alert("Đăng Ký tài khoản Thành Công");
	  </script>
	  <?php
	  }
	
	  ?>
      <form class="form form-signup" method="post">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-email">E-mail</label>
            <input id="signup-email" name="email" type="email" required>
          </div>
		  <div class="input-block">
            <label for="signup-name">Name</label>
            <input id="signup-name" name="username" type="text" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Password</label>
            <input id="signup-password" name="password" type="password" required>
          </div>
		  <div class="input-block">
            <label for="signup-address">Address</label>
            <input id="signup-address" name="address" type="text" required>
          </div>
		  <div class="input-block">
            <label for="signup-phone">Phone</label>
            <input id="signup-phone" name="phone" type="text" required>
          </div>
         
        </fieldset>
        <button type="submit" name="submit" class="btn-signup">Continue</button>
      </form>
    </div>
  </div>
</section>
<script>
	const switchers = [...document.querySelectorAll('.switcher')]

switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})
</script>