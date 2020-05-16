
<?php
session_start();
include_once("connection.php");
include_once("libs/fpdf.php");
$purchase_no=$_SESSION['purchase_order'];

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo1.jpg',3,1,60,40);
    $this->SetFont('Arial','B',16);
    // Move to the right
    $this->Cell(90);
    // Title

      $this->Cell(100,10,'QUATATION / PERFORMA INVOICE');
      $this->Ln(6);
      $this->SetFont('Arial','B',14);
      $this->Cell(90);
      $this->Cell(50,10,'Bill from:');

      $this->Ln(6);
      $this->SetFont('Arial','B',12);
      $this->Cell(90);
      $this->Cell(80,10,'401-402 ,EPI Center,old PUNE Mumbai Highway ,');
      $this->Ln(6);
      $this->Cell(90);
      $this->Cell(80,10,'Wakdewadi ,shivajinagar, pune ,410025');
    // Line break
    $this->Ln(30);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',11);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$display_heading = array('name'=> 'Name', 'email'=> 'Email','phn'=> 'Phone number','company_name'=> 'Company name','city'=> 'city','zip'=> 'zip CODE', 'Purchase_order'=> 'Purchase order','invoice_no'=> 'invoice no', 'invoice_date'=> 'invoice_date','invoice_amt'=> 'invoice amt','Payment_due_date'=> 'Payment_due_date');
$result = mysqli_query($conn, "SELECT  name, email, phn, company_name,city ,zip,Purchase_order,invoice_no, invoice_date,invoice_amt,Payment_due_date FROM invoice") or die("database error:". mysqli_error($conn));

//$header = mysqli_query($conn, "SHOW columns FROM invoice WHERE field != 'id'");
$header = mysqli_query($conn, "SHOW columns FROM invoice WHERE field != 'id'");
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();

foreach($result as $row) {
$pdf->SetFont('Arial','',10);
//$pdf->Ln();
if($row['Purchase_order']==$purchase_no)
{
  $pdf->SetFont('Arial','B',11);
  $pdf->Cell(37,8,'customer name',1);
  $pdf->cell(65,8,$row['name'],1);
  $pdf->Cell(37,8,'Purchase order',1);
  $pdf->cell(55,8,$row['Purchase_order'],1);

  $pdf->Ln();
  $pdf->Cell(37,16,'Bill to address',1);
  $pdf->cell(65,16,$row['city']."-".$row['zip'],1);
  $pdf->Cell(37,8,'Invoice Number',1);
  $pdf->cell(55,8,$row['invoice_no'],1);
  $pdf->ln();
  $pdf->cell(102);
  $pdf->Cell(37,8,'Invoice date',1);
  $pdf->cell(55,8,$row['invoice_date'],1);

  $pdf->Ln();
  $pdf->Cell(37,8,'Email ID',1);
  $pdf->cell(65,8,$row['email'],1);
  $pdf->Cell(37,8,'Invoice Amount',1);
  $pdf->cell(55,8,$row['invoice_amt'],1);

  $pdf->Ln();
  $pdf->Cell(37,8,'Phone number',1);
  $pdf->cell(65,8,$row['phn'],1);
  $pdf->Cell(37,8,'Payment due date',1);
  $pdf->cell(55,8,$row['Payment_due_date'],1);
  $pdf->Ln();
}
}
//$pdf->text(20,75,"BILL TO:");
/*$pdf->text(105,75,$display_heading['invoice_no']);
$pdf->text(105,83,$display_heading['invoice_date']);
$pdf->text(105,91,$display_heading['invoice_amt']);
$pdf->text(105,98,$display_heading['Purchase_order']);
$pdf->text(105,106,$display_heading['Payment_due_date']);*/

//}
/*foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
if($row['Purchase_order']==$find_by_purchase_order)
{
     //$pdf->text(135,55,"Name");
     $pdf->text(20,80,$row['name']);
     $pdf->text(20,85,$row['email']);
     $pdf->text(20,90,$row['phn']);
     $pdf->text(20,92,$row['company_name']);
     $pdf->text(20,95,$row['city']);
     $pdf->text(20,100,$row['zip']);
     $pdf->text(160,75,$row['invoice_no']);
     $pdf->text(160,83,$row['invoice_date']);
     $pdf->text(160,91,$row['invoice_amt']);
     $pdf->text(160,98,$row['Purchase_order']);
     $pdf->text(160,106,$row['Payment_due_date']);*/
/*foreach($row as $column)
{
  $pdf->Cell(35,10,$column,0);
}*/
$query2=$conn->prepare("SELECT * FROM `purchase` WHERE `PO_no`=?");
$query2->bind_param("s",$purchase_no);
$query2->execute();
$run2= $query2->get_result();
$res2=$run2->fetch_assoc();
$tn= $res2['tender_no'];


/*$query1=$conn->prepare("SELECT * FROM `products` WHERE `tender_no`=?");
$query1->bind_param("s",$tn);
$query1->execute();
$run1= $query1->get_result();
$row1=$run1->num_rows;


$pdf->cell(60,10,"Item Name",1);
$pdf->cell(40,10,"Item quantity",1);
$pdf->cell(50,10,"make",1);
$pdf->cell(44,10,"price ",1);
$pdf->ln();
while ($res1=$run1->fetch_assoc())
 {
   $pdf->cell(60,8,$res1['item'],1);
   $pdf->cell(40,8,$res1['item_qty'],1);+
   $pdf->cell(50,8,$res1['make'],1);
   $pdf->cell(44,8," ",1);
   $pdf->ln();
 }*/
 $pdf->cell(100);
 $pdf->cell(50,10,"Subtotal",1);
  $pdf->cell(44,10," ",1);
 $pdf->ln();
 $pdf->cell(100);
 $pdf->cell(50,10,"Discount",1);
  $pdf->cell(44,10," ",1);
 $pdf->ln();
 $pdf->cell(100);
 $pdf->cell(50,10,"Tax",1);
  $pdf->cell(44,10," ",1);
 $pdf->ln();
 $pdf->cell(100);
 $pdf->cell(50,10,"Total ",1);
  $pdf->cell(44,10," ",1);
 $pdf->ln();
 $pdf->cell(100);



$pdf->Output();
?>
