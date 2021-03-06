<?php

  session_start();

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $month = $_POST['month'];

  if ($month == '1') {$month = 'January';}
  if ($month == '2') {$month = 'February';}
  if ($month == '3') {$month = 'March';}
  if ($month == '4') {$month = 'April';}
  if ($month == '5') {$month = 'May';}
  if ($month == '6') {$month = 'June';}
  if ($month == '7') {$month = 'July';}
  if ($month == '8') {$month = 'August';}
  if ($month == '9') {$month = 'September';}
  if ($month == '10') {$month = 'October';}
  if ($month == '11') {$month = 'November';}
  if ($month == '12') {$month = 'December';}
  
  require("../.././fpdf184/fpdf.php");

  $pdf = new FPDF();
  $cmuLogo = "cmu_logo.png";
  $pdf->AddPage('P','Legal');

  $pdf->SetFont('Times','',15);
  $pdf-> Image('../.././assets/img/' . $cmuLogo,10,8,30);
  $pdf->Text(43, 20, 'Republic of the Philippines');
  $pdf->SetFont('Times','B',13);
  $pdf->Text(43, 25, 'CENTRAL MINDANAO UNIVERSITY');
  $pdf->SetFont('Times','',15);
  $pdf->Text(43, 30, 'Musuan, Maramag, Bukidnon');

  
  $pdf->Line(10, 43, 200, 43);
  $pdf->SetFont('Times','B',13);
  $pdf->Text(10, 49, 'GENERAL SERVICES OFFICE');


  $pdf->SetFont('Times','B',13);
  $pdf->Cell(0,95,'REPORTS FOR THE MONTH OF MAY ' . $month,0,0,'C');
  $pdf->SetFillColor(192,192,192);
  $pdf->SetXY(10, 65);
  $pdf->SetFont('Arial','B',9);
  $pdf->Cell(20,10,"COLLEGE",1,0,'C',true);
  $pdf->Cell(30,10,"DEPARTMENT",1,0,'C',true);
  $pdf->Cell(40,10,"NAME.",1,0,'C',true);
  $pdf->Cell(60,10,"NATURE OF WORK TO BE DONE",1,0,'C',true);
  $pdf->Cell(30,10,"COMP DATE",1,0,'C',true);
  $pdf->Cell(15,10,"STATUS",1,1,'C',true);

  $fetchRequestByMonth = $functions->fetchRequestByMonth($month);
  while($row = mysqli_fetch_array($fetchRequestByMonth)) {
    $requestedBy = $row['requested_by'];
    $unit = $row['unit'];
    $unitHead = $row['unit_head'];
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

    $pdf->Cell(20,10,$college,1,0,'C');
    $pdf->Cell(30,10,$department,1,0,'C');
    $pdf->Cell(40,10,$requestedBy,1,0,'C');
    $pdf->Cell(60,10,$workToBeDone,1,0,'C');
    $pdf->Cell(30,10,$completionDate,1,0,'C');
    $pdf->Cell(15,10,$status,1,1,'C'); 

  }
  
  $pdf->Output();

?>