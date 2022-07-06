<?php

  define('DB_SERVER','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME','jrms-new');

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

    function updateRequest($requestId, $jobOrderNumber, $unitHead, $quantity, $unitCost, $totalCost, $laborNeeded, $completionDate, $daysDone) {
      $result = mysqli_query($this->dbh, "UPDATE requests_tbl SET job_order_number = '$jobOrderNumber', unit_head = '$unitHead', quantity = '$quantity', unit_cost = '$unitCost', total_cost = '$totalCost', labor_needed = '$laborNeeded', completion_date = '$completionDate', status = 'Done', days_done = '$daysDone' WHERE request_id = '$requestId'");
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
    function fetchRequestByDate($fromDate, $toDate) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE requested_date BETWEEN '$fromDate' AND '$toDate'");
      return $result;
    }
    function fetchRequestByStatus($status) {
      $result = mysqli_query($this->dbh, "SELECT * FROM requests_tbl WHERE status = '$status'");
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







    function addRequest($userId, $unit, $unitHead, $college, $department, $requestedBy, $workToBeDone, $requestedDate, $month, $outside) {
      $result = mysqli_query($this->dbh, "INSERT INTO requests_tbl (user_id, unit, unit_head, college, department, requested_by, work_to_be_done, requested_date, requested_month, status, outside) VALUES ('$userId', '$unit', '$unitHead', '$college', '$department', '$requestedBy', '$workToBeDone', '$requestedDate', '$month', 'Pending', '$outside')");
      return $result;
    }
    function updateRequestUser($requestId, $unit, $unitHead, $college, $department, $requestedBy, $workToBeDone, $requestedDate, $month, $outside) {
      $result = mysqli_query($this->dbh, "UPDATE requests_tbl SET unit = '$unit', unit_head = '$unitHead', college = '$college', department = '$department', requested_by = '$requestedBy', work_to_be_done = '$workToBeDone', requested_date = '$requestedDate', requested_month = '$month', outside = '$outside' WHERE request_id = '$requestId'");
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

    function fetchUnits() {
      $result = mysqli_query($this->dbh, "SELECT * FROM units_tbl");
      return $result;
    }
    function addUnit($unitName, $unitHead) {
      $result = mysqli_query($this->dbh, "INSERT INTO units_tbl (unit_name, unit_head) VALUES ('$unitName', '$unitHead')");
      return $result;
    }
    function deleteUnit($unitId) {
      $result = mysqli_query($this->dbh, "DELETE FROM units_tbl WHERE unit_id = '$unitId'");
      return $result;
    }
    function updateUnit($unitId, $unitName, $unitHead) {
      $result = mysqli_query($this->dbh, "UPDATE units_tbl SET unit_name = '$unitName', unit_head = '$unitHead' WHERE unit_id = '$unitId'");
      return $result;
    }


    function fetchColleges() {
      $result = mysqli_query($this->dbh, "SELECT * FROM colleges_tbl");
      return $result;
    }
    function fetchDepartmentByCollegeName($collegeNameAbbr) {
      $result = mysqli_query($this->dbh, "SELECT * FROM department_tbl WHERE college_name = '$collegeNameAbbr'");
      return $result;
    }
    function addCollege($collegeName) {
      $result = mysqli_query($this->dbh, "INSERT INTO colleges_tbl (college_name) VALUES ('$collegeName')");
      return $result;
    }
    function deleteCollege($collegeId) {
      $result = mysqli_query($this->dbh, "DELETE FROM colleges_tbl WHERE college_id = '$collegeId'");
      return $result;
    }
    function updateCollege($collegeId, $collegeName) {
      $result = mysqli_query($this->dbh, "UPDATE colleges_tbl SET college_name = '$collegeName' WHERE college_id = '$collegeId'");
      return $result;
    }


    function addDepartment($departmentName, $collegeName) {
      $result = mysqli_query($this->dbh, "INSERT INTO department_tbl (department_name, college_name) VALUES ('$departmentName', '$collegeName')");
      return $result;
    }
    function fetchDepartment() {
      $result = mysqli_query($this->dbh, "SELECT * FROM department_tbl");
      return $result;
    }
    function deleteDepartment($departmentId) {
      $result = mysqli_query($this->dbh, "DELETE FROM department_tbl WHERE department_id = '$departmentId'");
      return $result;
    }
    function updateDepartment($departmentId, $departmentName) {
      $result = mysqli_query($this->dbh, "UPDATE department_tbl SET department_name = '$departmentName' WHERE department_id = '$departmentId'");
      return $result;
    }



    function fetchUsers() {
      $result = mysqli_query($this->dbh, "SELECT * FROM users_tbl WHERE privilege_level = 2");
      return $result;
    }
    function deleteUser($userId) {
      $result = mysqli_query($this->dbh, "DELETE FROM users_tbl WHERE user_id = '$usertId'");
      return $result;
    }
  }

?>