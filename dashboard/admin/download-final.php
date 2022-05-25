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
    $jobOrderNumber = $row['job_order_number'];
    $department = $row['department'];
    $requestedDate = $row['requested_date'];
    $completionDate = $row['completion_date'];
    $workToBeDone = $row['work_to_be_done'];
    $qty = $row['quantity'];
    $unitCost = $row['unit_cost'];
    $totalCost = $row['total_cost'];
    $laborNeeded = $row['labor_needed'];
    $unitHead = $row['unit_head'];
    $unitHead = strtoupper($unitHead);

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

    $pdf->Cell(0,95,'JOB REQUEST',0,0,'C');

    $pdf->SetFont('Arial','',12);
    $pdf->SetFillColor(192,192,192);
    $pdf->SetXY(10, 63);
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

    $pdf->SetFont('Times','B',11.5);
    $pdf->Text(10, 93, 'RECOMMENDING APPROVAL:');

    $pdf->SetFont('Arial','',11.5);
    $pdf->Text(25, 103, 'ROY ROLAND E. AGUILAR');
    $pdf->Line(18, 105, 80, 105);
    $pdf->SetFont('Arial','',11.5);
    $pdf->Text(32, 110, 'OIC Director, GSO');

    $pdf->Text(130, 103, 'JESUS ANTONIO G. DERIJE');
    $pdf->Line(190, 105, 123, 105);
    $pdf->Text(138, 110, 'University President');

    $pdf->SetXY(10, 118);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(70,10,"NATURE OF WORK TO BE DONE",1,0,'C',true);
    $pdf->Cell(20,10,"QTY.",1,0,'C',true);
    $pdf->Cell(30,10,"UNIT COST",1,0,'C',true);
    $pdf->Cell(30,10,"TOTAL COST",1,0,'C',true);
    $pdf->Cell(40,10,"LABOR NEEDED",1,1,'C',true);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(70,60,$workToBeDone ,1,0,'C');
    $pdf->Cell(20,60,$qty,1,0,'C');
    $pdf->Cell(30,60,$unitCost,1,0,'C');
    $pdf->Cell(30,73,$totalCost,1,0,'C');
    $pdf->Cell(40,73,$laborNeeded,1,1,'C');
    $pdf->SetXY(10, 188);
    $pdf->Cell(120,13,"TOTAL",1,0,'R');

    $pdf->Text(10, 208, 'Estimated Cost of Labor and Materials:');
    $pdf->Text(120, 208, 'Estimated By:');

    $pdf->Text(15, 215, 'Amount:');
    $pdf->Line(33, 215, 80, 215);

    $pdf->Line(200, 215,120, 215);
    $pdf->Text(15, 223, 'OR No:');
    $pdf->Line(33, 223, 80, 223);

    $pdf->SetFont('Arial','',11.5);
    $pdf->Text(142, 213,$unitHead,'C');
    $pdf->Line(190, 105, 123, 105);
    $pdf->Text(150, 220, 'Unit Head');

    $pdf->SetXY(10, 230);
    $pdf->Cell(95,10,"ACTUAL LABOR COST",1,0,'C',true);
    $pdf->Cell(95,10,"MATERIALS NEEDED",1,1,'C',true);

    $pdf->Cell(15,10,"DATE",1,0,'C');
    $pdf->Cell(30,10,"NAME",1,0,'C');
    $pdf->Cell(15,10,"RATE",1,0,'C');
    $pdf->Cell(15,10,"HRS",1,0,'C');
    $pdf->Cell(20,10,"AMOUNT",1,0,'C');
    $pdf->Cell(15,10,"DATE",1,0,'C');
    $pdf->Cell(25,10,"MATERIALS",1,0,'C');
    $pdf->Cell(10,10,"QTY",1,0,'C');
    $pdf->Cell(25,10,"UNIT COST",1,0,'C');
    $pdf->Cell(20,10,"AMOUNT",1,1,'C');

    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(30,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(10,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,1,'C');

    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(30,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(10,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,1,'C');

    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(30,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(10,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,1,'C');

    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(30,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(10,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,1,'C');

    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(30,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,0,'C');
    $pdf->Cell(15,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(10,10,"",1,0,'C');
    $pdf->Cell(25,10,"",1,0,'C');
    $pdf->Cell(20,10,"",1,1,'C');

    $pdf->Text(15, 310, 'Noted By:');
    $pdf->Line(33, 310, 110, 310);

    $pdf->Text(115, 310, 'Date Received:');
    $pdf->Line(200, 310, 143, 310);

    $pdf->Text(15, 317, 'Job Order No:');
    $pdf->Text(43, 317, $jobOrderNumber);
    $pdf->Line(40, 317, 110, 317);

    $pdf->Text(115, 317, 'Date Completed:');
    $pdf->Line(200, 317, 145, 317);

    $pdf->Text(15, 324, 'Remarks:');
    $pdf->Line(33, 324, 200, 324);
    $pdf->Line(33, 331, 200, 331);

    $pdf->SetFont('Arial','',9);
    $pdf->Text(30, 338, 'Note : For outside jobs, payments must be made in the Cashier Office. Please accomplish three (3) copies.','C');
    $pdf->Line(15, 340, 200, 340);
    $pdf->Text(15, 345, 'CMU-F-4-GSO-001');
    $pdf->Text(95, 345, '01 December 2020');
    $pdf->Text(150, 345, 'Rev. 1');
    $pdf->Text(183, 345, 'Page 1 of 1');


    $pdf->Output();
  }
?>