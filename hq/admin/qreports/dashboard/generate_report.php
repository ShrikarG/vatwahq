<?php
require '../fpdf/fpdf.php';
require '../../connect.php';
$db = new PDO('mysql:host=localhost; dbname=vatsimwa_hq','vatsimwa','ml+~Karw[4%h');
class myPDF extends FPDF{
    function header(){
        $this->Image('wa.png',10,5);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'VATSIM West Asia Division ',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'Division Quarterly Report',0,0,'C');
        $this->Ln(20);
    }
    
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8); 
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    function staffheaderTable() {
        $this->SetFont('Arial','B',14);
        $this->Cell(276,10,'vACC Staff',0,0,'C');
        $this->Ln(10);
        $this->SetFont('Times','B',12);
        $this->Cell(40,10,'VATSIM ID',1,0,'C');
        $this->Cell(50,10,'First Name',1,0,'C');
        $this->Cell(50,10,'Last Name',1,0,'C');
        $this->Cell(60,10,'Position',1,0,'C');
        $this->Cell(40,10,'Staff Callsign',1,0,'C');
        $this->Cell(40,10,'vACC',1,0,'C');
        $this->Ln();
        
    }
    
    function eventsheaderTable() {
        $this->Ln(15);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,10,'vACC Events',0,0,'C');
        $this->Ln(10);
        $this->SetFont('Times','B',12);
        $this->Cell(40,10,'Event Date',1,0,'C');
        $this->Cell(100,10,'Event Name',1,0,'C');
        $this->Cell(40,10,'vACC',1,0,'C');
        $this->Ln();
        
    }
    
     function atcheaderTable() {
        $this->Ln(15);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,10,'vACC ATC Students',0,0,'C');
        $this->Ln(10);
        $this->SetFont('Times','B',12);
        $this->Cell(40,10,'VATSIM ID',1,0,'C');
        $this->Cell(50,10,'First Name',1,0,'C');
        $this->Cell(50,10,'Last Name',1,0,'C');
        $this->Cell(40,10,'Rating',1,0,'C');
        $this->Cell(40,10,'vACC',1,0,'C');
        $this->Ln();
        
    }
    
    function viewStaffTable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query('Select * from qr_staff');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(40,10,$data->vatsimid,1,0,'L');
            $this->Cell(50,10,$data->fname,1,0,'L');
            $this->Cell(50,10,$data->lname,1,0,'L');
            $this->Cell(60,10,$data->position,1,0,'L');
            $this->Cell(40,10,$data->callsign,1,0,'L');
            $this->Cell(40,10,$data->vacc,1,0,'L');
            $this->Ln();
        }
    }
    function viewEventsTable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query("Select * from events where verify='1'");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(40,10,$data->event_date,1,0,'L');
            $this->Cell(100,10,$data->event_name,1,0,'L');
            $this->Cell(40,10,$data->vacc,1,0,'L');
            $this->Ln();
            }
        }
        
        function viewATCTable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query("Select * from atc_roster where verify='1'");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(40,10,$data->vatsimcid,1,0,'L');
            $this->Cell(50,10,$data->fname,1,0,'L');
            $this->Cell(50,10,$data->lname,1,0,'L');
            $this->Cell(40,10,$data->rating,1,0,'L');
            $this->Cell(40,10,$data->vacc,1,0,'L');
            $this->Ln();
            }
        }
        
        function auto() {
        $this->Ln(15);
        $this->SetFont('Arial','I',10);
        $this->Cell(276,10,'This is a Automated Generated Report via West Asia HQ.',0,0,'C');
        $this->Ln();
        }
        
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->staffheaderTable();
$pdf->viewStaffTable($db);
$pdf->eventsheaderTable();
$pdf->viewEventsTable($db);
$pdf->atcheaderTable();
$pdf->viewATCTable($db);
$pdf->auto();
$pdf->Output();

?>