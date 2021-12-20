<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARA-CONNOR21-2.0</title>
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
          <form action="../services/login.php" method="POST" style="width: 23rem;">
            <h1>Welcome to MyRestaurant App</h1></br></br>
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
              <input type="email" placeholder="ej. pepito@gmail.com" id="login_username" class="form-control form-control-lg" name="username" required>
              <label class="form-label" for="form2Example18">Email address</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" placeholder="Password" id="login_password" class="form-control form-control-lg" name="password" required>
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <input type="submit" name="Log in" value="Login" id="login_btn_enviar" class="btn btn-info btn-lg btn-block"></br></br>
            </div>
            
          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="../media/login-back.jpeg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
    <!-- <center>
        <div class="container">
            <h1>Welcome to MyRestaurant App</h1>
            <form action="../services/login.php" method="POST"class="login-form shadow1">
                <label for="username">Correo:</label></br></br>
                <input type="email" placeholder="ej. pepito@gmail.com" id="login_username" class="login-input_username" name="username"></br></br>
                <label for="password">Contraseña:</label></br></br>
                <input type="password" placeholder="Password" id="login_password" class="login-input_password" name="password"></br></br>
                <input type="submit" name="Log in" value="Log in" id="login_btn_enviar" class="login-btn_enviar"></br></br>
            </form>
        </div>
    </center> -->
</body>
</html>