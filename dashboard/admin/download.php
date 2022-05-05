<?php

  session_start();

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

  $requestId = $_GET['request_id'];

  require("../.././fpdf184/fpdf.php");
  $pdf = new FPDF();

  $fetchRequestRequestId = $functions->fetchRequestRequestId($requestId);
  while($row = mysqli_fetch_array($fetchRequestRequestId)) {
    $requestedBy = $row['requested_by'];
    $department = $row['department'];
    $requestedDate = $row['requested_date'];
    $completionDate = $row['completion_date'];

    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);

    $pdf->SetFillColor(192,192,192);
    $pdf->Cell(47,10,"Requested By",1,0,'R',true);
    $pdf->Cell(48,10,$requestedBy,1,0);

    $pdf->SetFillColor(192,192,192);
    $pdf->Cell(47,10,"Date",1,0,'R',true);
    $pdf->Cell(48,10,$requestedDate,1,1);

    $pdf->SetFillColor(192,192,192);
    $pdf->Cell(47,10,"Department",1,0,'R',true);
    $pdf->Cell(48,10,$department,1,0);
    $pdf->SetFillColor(192,192,192);
    $pdf->Cell(47,10,"Completion Date",1,0,'R',true);
    $pdf->Cell(48,10,$completionDate,1,0);



    $pdf->Output();
  }
?>