<?php

  session_start();

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $month = $_POST['month'];

  if ($month == '1') {
    $txtm = 'January';
  }
  if ($month == '2') {
    $txtm = 'February';
  }
  if ($month == '3') {
    $txtm = 'March';
  }
  if ($month == '4') {
    $txtm = 'April';
  }
  if ($month == '5') {
    $txtm = 'May';
  }
  if ($month == '6') {
    $txtm = 'June';
  }
  if ($month == '7') {
    $txtm = 'July';
  }
  if ($month == '8') {
    $txtm = 'August';
  }
  if ($month == '9') {
    $txtm = 'September';
  }
  if ($month == '10') {
    $txtm = 'October';
  }
  if ($month == '11') {
    $txtm = 'November';
  }
  if ($month == '12') {
    $txtm = 'December';
  }
  require("../.././fpdf184/fpdf.php");
  $pdf = new FPDF();

  $fetchRequestByMonth = $functions->fetchRequestByMonth($month);
  while($row = mysqli_fetch_array($fetchRequestByMonth)) {
    $requestedBy = $row['requested_by'];
    $college = $row['college'];
    $department = $row['department'];
    $requestedDate = $row['requested_date'];
    $completionDate = $row['completion_date'];
    $workToBeDone = $row['work_to_be_done'];
    $qty = $row['quantity'];
    $unitCost = $row['unit_cost'];
    $totalCost = $row['total_cost'];
    $laborNeeded = $row['labor_needed'];
    $status = $row['status'];

    $pdf->AddPage('P','Legal');

    $pdf->SetFont('Times','B',13);
    $pdf->Cell(0,20,'Month of ' . $txtm,0,0,'C');


    $pdf->SetFillColor(192,192,192);

    $pdf->SetXY(10, 30);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,10,"COLLEGE",1,0,'C',true);
    $pdf->Cell(30,10,"DEPARTMENT",1,0,'C',true);
    $pdf->Cell(20,10,"NAME.",1,0,'C',true);
    $pdf->Cell(70,10,"NATURE OF WORK TO BE DONE",1,0,'C',true);
    $pdf->Cell(40,10,"STATUS",1,1,'C',true);
    $pdf->Cell(30,10,$college,1,0,'C');
    $pdf->Cell(30,10,$department,1,0,'C');
    $pdf->Cell(20,10,$requestedBy,1,0,'C');
    $pdf->Cell(70,10,$workToBeDone,1,0,'C');
    $pdf->Cell(40,10,$status,1,1,'C'); 

    $pdf->Output();
  }
?>