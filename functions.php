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



    // function requestForm($requisitionerId, $workOrderNum, $location, $space, $desc, $priority, $requestor, $requestedOn, $requestedCompletion) {
    //   $result = mysqli_query($this->dbh, "INSERT INTO request_form (requisitioner_id, work_order_num, location, space, description, priority, requestor, requested_on, requested_completion) VALUES ('$requisitionerId', '$workOrderNum', '$location', '$space', '$desc', '$priority', '$requestor', '$requestedOn', '$requestedCompletion')");
    //   return $result;
    // }
    
    function fetchRequestForm() {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl");
      return $result;
    }

    function requestForm($fileDestination, $requestedBy, $department, $requestedDate, $completionDate) {
      $result = mysqli_query($this->dbh, "INSERT INTO request_form_tbl (destination, requested_by, department, requested_date, completion_date, status) VALUES ('$fileDestination', '$requestedBy', '$department', '$requestedDate', '$completionDate', 'Pending')");
      return $result;
    }

    function approveRequest($requestId) {
      $result = mysqli_query($this->dbh, "UPDATE requests_tbl SET status = 'Approved' WHERE request_id = '$requestId'");
      return $result;
    }












    function addWork($userId, $department, $workToBeDone) {
      $result = mysqli_query($this->dbh, "INSERT INTO works_tbl (user_id, department, work_to_be_done) VALUES ('$userId', '$department', '$workToBeDone')");
      return $result;
    }
    function removeWork($userId) {
      $result = mysqli_query($this->dbh, "DELETE FROM works_tbl WHERE user_id = '$userId'");
      return $result;
    }
    function deleteWork($workId) {
      $result = mysqli_query($this->dbh, "DELETE FROM works_tbl WHERE work_id = '$workId'");
      return $result;
    }
    function fetchWorkUserId($userId) {
      $result = mysqli_query($this->dbh, "SELECT * FROM works_tbl WHERE user_id = '$userId'");
      return $result;
    }
    function fetchWorkInfo($userId) {
      $result = mysqli_query($this->dbh, "SELECT CONCAT(work_to_be_done, ',', quantity, ',', unit_cost) AS works, total_cost FROM works_tbl WHERE user_id = '$userId'");
      return $result;
    }
    function submitRequest($userId, $allWork, $firstName, $lastName, $department, $requestedDate) {
      $requestedBy = $firstName . ' ' . $lastName;
      $result = mysqli_query($this->dbh, "INSERT INTO requests_tbl (user_id, all_work, requested_by, department, requested_date, status) VALUES ('$userId', '$allWork', '$requestedBy', '$department', '$requestedDate', 'Pending')");
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