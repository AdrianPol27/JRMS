<?php

  session_start();

  include_once("functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object
  $errors = array();

  if (isset($_POST['login_btn'])) { // Kung ang login button tuplokon
    $username = $_POST['username']; // Kuhaon ang username gikan sa form
    $password = $_POST['password']; // Kuhaon ang password gikan sa form

    $signIn = $functions->signIn($username, $password); // i excecute ang function nga naa sa functions.php daw i select tanan ang username og password sulod sa users table
    $row = mysqli_fetch_assoc($signIn);

    if (empty($username)) {
      array_push($errors, "Username should not be empty!"); // Mag push og error kung empty ang username
    }
    if (empty($password)) {
      array_push($errors, "Password should not be empty!"); // Mag push og error kung empty ang password
    } elseif (mysqli_num_rows($signIn) === 1) {
      if ($username == $row['username'] && $password == $row['password']) {
        if ($row['privilege_level'] == 1) {
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['first_name'] = $row['first_name'];
          $_SESSION['middle_name'] = $row['middle_name'];
          $_SESSION['last_name'] = $row['last_name'];
          header('Location: ./dashboard/admin/index.php');
        } else {
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['first_name'] = $row['first_name'];
          $_SESSION['middle_name'] = $row['middle_name'];
          $_SESSION['last_name'] = $row['last_name'];
          header('Location: ./dashboard/user/index.php');
        }
      } else {
        array_push($errors, "Incorrect email or password!");
      } 
    } else {
      array_push($errors, "No account yet!");
    } 
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('./includes/header.php') ?>
    <title>Login Page</title>
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
    <form action="index.php" method="post">
      <div class="mx-5">
        <img class="img-fluid" src="./assets/img/cmu_logo.png" alt="CMU Logo">
      </div>
      <h1 class="h3 my-4 fw-normal text-center">Please sign in</h1>
      <?php include('errors.php'); ?>  
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        <label for="username">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-success" type="submit" name="login_btn">Sign in</button>
      <p>Don't have an account? <a href="register.php">Register Now!</a></p>
    </form>
  </main>
</body>
</html>