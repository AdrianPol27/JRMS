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
  body {height: 100%;}
  body {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
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
      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm Password">
        <label for="confirmPassword">Confirm Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-success" type="submit" name="register_btn">Register</button>
    </form>
  </main>
</body>
</html>