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

    function signIn($username, $password) {
      $result = mysqli_query($this->dbh, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
      return $result;
    }

    function fetchRequestFormUserId($requestedBy) {
      $result = mysqli_query($this->dbh, "SELECT * FROM request_form_tbl WHERE requested_by = '$requestedBy'");
      return $result;
    }
    function cancelRequest($requestId) {
      $result = mysqli_query($this->dbh, "DELETE FROM requests_tbl WHERE request_id = '$requestId'");
      return $result;
    }



    function fetchRequestForm() {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl");
      return $result;
    }

    function onProcessRequest($requestId) {
      $result = mysqli_query($this->dbh, "UPDATE requests_tbl SET status = 'On-Process' WHERE request_id = '$requestId'");
      return $result;
    }

    function updateRequest($requestId, $quantity, $unitCost, $totalCost, $laborNeeded, $completionDate) {
      $result = mysqli_query($this->dbh, "UPDATE requests_tbl SET quantity = '$quantity', unit_cost = '$unitCost', total_cost = '$totalCost', labor_needed = '$laborNeeded', completion_date = '$completionDate', status = 'Done' WHERE request_id = '$requestId'");
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

    function fetchRequestPending($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'Pending'");
      return $result;
    }

    function fetchRequestOnProcess($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'On-Process'");
      return $result;
    }

    function fetchRequestDone($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = 'Done'");
      return $result;
    }








    function addRequest($userId, $college, $department, $requestedBy, $workToBeDone, $requestedDate) {
      $result = mysqli_query($this->dbh, "INSERT INTO requests_tbl (user_id, college, department, requested_by, work_to_be_done, labor_needed, requested_date, status) VALUES ('$userId', '$college', '$department', '$requestedBy', '$workToBeDone', 'TBA', '$requestedDate', 'Pending')");
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
  }

?>