<?php
require('assets/fpdf/fpdf.php'); 
include '../koneksi.php';
SESSION_START(); 
class pdf extends FPDF{
   function header(){
   //logo
   $this->Image('../assets/img/background-hp.png',10,6,15);
   $this->SetFont('Arial','B',16);
   $this->Cell(90,4,'Gadgetin.ID',0,1,'C');
   $this->Ln(5);
   $this->SetTextColor(0,0,0);
   $this->SetFont('Arial','B',13);
   $this->Cell(121,-4,'Tangerang - Banten,Indonesia',0,1,'C');
   $this->SetFont('Arial','BU',16);
   $this->Cell(0,30,'LAPORAN DATA PELANGGAN',0,0,'C');
   $this->Ln(18);
}
function footer(){
   $this->SetY(-15);
   $this->Ln(5);
   $this->SetFont('Arial','I',8);
   $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf= new PDF('L','mm','A4');
$pdf->aliasNbPages();
$pdf->AddPage();
$pdf->Cell(0,5,'',0,1,'C');
$pdf->SetFont('Times','B',10); 
$pdf->SetFillColor(88,191,216);
$pdf->Rect(10,38,278,6,'F');
$pdf->Cell(8,6,'No.',1,0,'C');
$pdf->Cell(50,6,'Nama Pelanggan',1,0,'C');
$pdf->Cell(40,6,'No. HP',1,0,'C');
$pdf->Cell(50,6,'Email',1,0,'C');
$pdf->Cell(30,6,'Kota',1,0,'C');
$pdf->Cell(100,6,'Alamat',1,1,'C');
$pdf->Cell(278,1,'',1,1,'C');
$pdf->SetFont('Times','',10);

$no =1;
$query = mysqli_query($koneksi,"SELECT pelanggan.id_pelanggan,pelanggan.nm_pelanggan,pelanggan.hp,pelanggan.email,pelanggan.alamat,pelanggan.id_ongkir,ongkir.kota from pelanggan join ongkir on pelanggan.id_ongkir=ongkir.id_ongkir order by nm_pelanggan ASC");
   while($data= mysqli_fetch_array($query)){
   $pdf->Cell(8,6,$no,1,0);
   $pdf->Cell(50,6,$data['nm_pelanggan'],1,0);
   $pdf->Cell(40,6,$data['hp'],1,0);
   $pdf->Cell(50,6,$data['email'],1,0);
   $pdf->Cell(30,6,$data['kota'],1,0);
   $pdf->Cell(100,6,$data['alamat'],1,1);
   $no++;
}
 
$pdf->Output('Laporan Data Pelanggan.pdf','I');
?>