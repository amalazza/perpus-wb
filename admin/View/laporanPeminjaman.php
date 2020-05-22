<?php
require('inc/fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
//$pdf->Image('images/php.png',1,1,2,2);

$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Perpustakaan Wira Buana',0,'L');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(28,0.5,"LAPORAN PEMINJAMAN",0,5,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(2.5, 0.8, 'No Peminjaman', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama Anggota', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Buku', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Peminjaman', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Batas Pengembalian', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Pengembalian', 1, 1, 'C');
$pdf->SetFont('Arial','',9);


foreach ($this->oPinjam as $oPinjam){
	$pdf->Cell(2.5, 0.8, $oPinjam->no_peminjaman, 1, 0,'C');
	$pdf->Cell(6, 0.8, $oPinjam->no_anggota ." - " .$oPinjam->nama, 1, 0,'C');
	$pdf->Cell(6, 0.8, $oPinjam->no_katalog ." - " .$oPinjam->judul,1, 0, 'C');
	$pdf->Cell(4, 0.8, $oPinjam->tanggal_pinjam,1, 0, 'C');
	$pdf->Cell(4, 0.8, $oPinjam->batas_kembali,1, 0, 'C');
	$pdf->Cell(4, 0.8, $oPinjam->tanggal_kembali,1, 1, 'C');
}

$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Approve",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"ADMIN PERPUSTAKAAN WIRA BUANA",0,10,'C');

$pdf->Output("laporan_buku.pdf","I");

?>