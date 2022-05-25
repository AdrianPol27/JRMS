<?php

  define('DB_SERVER','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME','jrms');

  $errors = array();
  $errorSuccess = array();
  $errorInfo = array();

  class Functions {

    // DATABASE CONNECTION
    function __construct() {
      $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      $this->dbh = $conn;
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $_SESSION['conn'] = $conn;
    } 

    function signIn($email, $password) {
      $result = mysqli_query($this->dbh, "SELECT * FROM users_tbl WHERE email = '$email' AND password = '$password'");
      return $result;
    }
    function register($privilegeLevel, $firstname, $middlename, $lastname, $email, $password) {
      $result = mysqli_query($this->dbh, "INSERT INTO users_tbl (privilege_level, first_name, middle_name, last_name, email, password) VALUES ('$privilegeLevel','$firstname','$middlename','$lastname','$email','$password')");
      return $result;
    }
    function cancelRequest($requestId) {
      $result = mysqli_query($this->dbh, "DELETE FROM requests_tbl WHERE request_id = '$requestId'");
      return $result;
    }
    function cancelRequestAdmin($requestId) {
      $result = mysqli_query($this->dbh, "UPDATE requests_tbl SET status = 'Cancelled' WHERE request_id = '$requestId'");
      return $result;
    }

    function fetchRequestForm() {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl ORDER BY request_id ASC");
      return $result;
    }
    function fetchRequest() {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl");
      return $result;
    }

    function onProcessRequest($requestId) {
      $result = mysqli_query($this->dbh, "UPDATE requests_tbl SET status = 'On-Process' WHERE request_id = '$requestId'");
      return $result;
    }

    function updateRequest($requestId, $unitHead, $quantity, $unitCost, $totalCost, $laborNeeded, $completionDate) {
      $result = mysqli_query($this->dbh, "UPDATE requests_tbl SET unit_head = '$unitHead', quantity = '$quantity', unit_cost = '$unitCost', total_cost = '$totalCost', labor_needed = '$laborNeeded', completion_date = '$completionDate', status = 'Done' WHERE request_id = '$requestId'");
      return $result;
    }

    function fetchRequestPendingByUserId($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'Pending' AND user_id = '$userId'");
      return $result;
    }

    function fetchRequestOnProcessByUserId($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'On-Process' AND user_id = '$userId'");
      return $result;
    }

    function fetchRequestDoneByUserId($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'Done' AND user_id = '$userId'");
      return $result;
    }
    function fetchRequestCancelledByUserId($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'Cancelled' AND user_id = '$userId'");
      return $result;
    }
    function fetchRequestByMonth($month) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE requested_month = '$month'");
      return $result;
    }

    function fetchRequestPending() {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'Pending'");
      return $result;
    }

    function fetchRequestOnProcess() {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'On-Process'");
      return $result;
    }

    function fetchRequestDone() {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'Done'");
      return $result;
    }
    function fetchRequestCancelled() {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'Cancelled'");
      return $result;
    }







    function addRequest($userId, $unit, $college, $department, $requestedBy, $workToBeDone, $requestedDate, $month) {
      $result = mysqli_query($this->dbh, "INSERT INTO requests_tbl (user_id, unit, college, department, requested_by, work_to_be_done, labor_needed, requested_date, requested_month, status) VALUES ('$userId', '$unit', '$college', '$department', '$requestedBy', '$workToBeDone', '0', '$requestedDate', '$month', 'Pending')");
      return $result;
    }
    function fetchRequestUserId($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE user_id = '$userId'");
      return $result;
    }
    function fetchRequestRequestId($requestId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE request_id = '$requestId'");
      return $result;
    }
    function fetchFeedbackByName($name) {
      $result = mysqli_query($this->dbh, "SELECT * FROM feedbacks_tbl WHERE fullname = '$name'");
      return $result;
    }



    function addFeedback($requestId, $fullname, $feedback) {
      $result = mysqli_query($this->dbh, "INSERT INTO feedbacks_tbl (request_id, fullname, feedback) VALUES ('$requestId', '$fullname', '$feedback')");
      return $result;
    }

    function fetchFeedbacks() {
      $result = mysqli_query($this->dbh, "SELECT * FROM feedbacks_tbl");
      return $result;
    }
    
    function fetchFeedbackByRequestId($requestId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM feedbacks_tbl WHERE request_id = '$requestId'");
      return $result;
    }

  }

?>