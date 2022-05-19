<?php

  session_start();

  include_once("functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object
  $errors = array();

  if (isset($_POST['register_btn'])) { // Kung ang login button tuplokon
    $privilegeLevel = '2';
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email']; // Kuhaon ang username gikan sa form
    $password = $_POST['password']; // Kuhaon ang password gikan sa form
    $confirmPassword = $_POST['confirm_password'];

    
    if (empty($firstname)) {
      array_push($errors, "First Name should not be empty!"); // Mag push og error kung empty ang username
    }
    if (empty($middlename)) {
      array_push($errors, "Middle Name should not be empty!"); // Mag push og error kung empty ang username
    }
    if (empty($lastname)) {
      array_push($errors, "Last name should not be empty!"); // Mag push og error kung empty ang username
    }
    if (empty($email)) {
      array_push($errors, "Email should not be empty!"); // Mag push og error kung empty ang username
    }
    if (empty($password)) {
      array_push($errors, "Password should not be empty!"); // Mag push og error kung empty ang password
    }
    if (empty($confirmPassword)) {
      array_push($errors, "Confirm Password should not be empty!"); // Mag push og error kung empty ang password
    }
    if ($password != $confirmPassword) {
      array_push($errors, "Password does not match!"); // Mag push og error kung empty ang password
    } else {
      $register = $functions->register($privilegeLevel, $firstname, $middlename, $lastname, $email, $password);
      if ($register) {
        header('Location: index.php');
      }
    } 
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('./includes/header.php') ?>
    <title>Register Page</title>
</head>
<style>
html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

</style>
<body>
  <main class="form-signin">
    <form action="register.php" method="post">
      <div class="mx-5">
        <img class="img-fluid" src="./assets/img/cmu_logo.png" alt="CMU Logo">
      </div>
      <h1 class="h3 my-4 fw-normal text-center">Register Account</h1>
      <?php include('errors.php'); ?>  
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
        <label for="firstname">First Name</label>
      </div>
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name">
        <label for="middlename">Middle Name</label>
      </div>
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
        <label for="lastname">Last Name</label>
      </div>
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        <label for="email">Email</label>
      </div>
      <div class="form-floating mb-1">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm Password">
        <label for="confirmPassword">Confirm Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-success" type="submit" name="register_btn">Register</button>
      <p class="text-center">Already had an account? <a href="index.php">Login Now!</a></p>
    </form>
  </main>
</body>
</html>