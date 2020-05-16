<?php
session_start();
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','','project');
if(isset($_POST['save']))
{
  $client_name=$_POST['name'];
  $client_mail=$_POST['email'];
  $client_phn=$_POST['phn'];
  $company_name=$_POST['company_name'];
  $city=$_POST['city'];
  $zip_code=$_POST['zip'];
  $purchase_order=$_POST['Purchase_order'];
  $_SESSION['purchase_order']=$purchase_order;
  $purchase_no=$_SESSION['purchase_order'];
  $invoice_number=$_POST['invoice_no'];
  $invoice_date=$_POST['invoice_date'];
  $invoice_amount=$_POST['invoice_no'];
  $payment_due_date=$_POST['Payment_due_date'];

  $query1="INSERT INTO `invoice`(`name`, `email`, `phn`, `company_name`, `city`, `zip`, `Purchase_order`, `invoice_no`, `invoice_date`, `invoice_amt`, `Payment_due_date`) VALUES ('$client_name','$client_mail','$client_phn','$company_name','$city','$zip_code','$purchase_no','$invoice_number','$invoice_date','$invoice_amount','$payment_due_date')";
  $run1=mysqli_query($con,$query1);
  if($run1){
  echo '<script>alert(" click on preview to check entered details")</script>';
}
  else {
     echo '<script>alert(" not Registered")</script>';
  }
}


//$purchase_no=$_SESSION['purchase_order'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>project</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="index.css">
</head>
<body>
  <header class="navbarResponsive">
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a style="color:white;" class="nav-link" href="main.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a style="color:white;" class="nav-link" href="enquiry.php">Enquiry</a>
          </li>
          <li class="nav-item">
            <a  style="color:white;" class="nav-link" href="tender.php">Tender</a>
          </li>
          <li class="nav-item">
            <a style="color:white;" class="nav-link" href="purchase.php">Purchase order</a>
          </li>
          <li class="nav-item">
            <a style="color:white;" class="nav-link" href="invoice.php">Invoice</a>
          </li>

        </ul>

        </form>
      </div>
    </nav>
</header>
<main>
<div class="container-fluid">
    <form action="#" method="post" name="login">
<div class="row">
  <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 "></div>
  <div  class="col-sm-8 col-md-8 col-xs-8 col-lg-8 ">
      <div class=" invoice_main ">
        <div class="modal-content">
            <div class="modal-body">

   <div class="row">
     <div class="col-sm-8 col-md-8 col-xs-8 col-lg-8 ">

         <div class="container-fluid padding">
           <div class="row padding">
               <div class="card">
                 <img class="card-img-middle" src="logo.jpg" height="170" width="300">
               </div>
           </div>
         </div>


     </div>
     <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 ">
    <div class="form-group">
    <h1><b>INVOICE</b></h1>
     <label>Bill From:</label>
      <label>Company Name:</label>
     <input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;" name="company_name" placeholder="Company Name">
   </div>
 <div class="form-group">
    <label>Purchase Order:</label>
   <input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;" name="Purchase_order" placeholder="Purchase Order">
</div>


</div>
</div>
</br>
</br>
<div class="row">
  <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 ">
<div class="form-group">
  <label for="Bill form">Bill To:</label>
   <label>Client Name:</label>
  <input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;"  name="name"class="form-control" placeholder="Client name">
</div>
<div class="form-group">
   <label>Client email:</label>
     <input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;"  name="email"class="form-control" placeholder="Client email">
</div>

<div class="form-group">
   <label>Mobile number:</label>
<input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;" name="phn" placeholder="Mobile Number">
</div>

<div class="form-group">
   <label>City:</label>
  <input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;" name="city" placeholder="City">
</div>

<div class="form-group">
   <label>Zip:</label>
  <input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;" name="zip" placeholder="Zip Code">
</div>
</div>

  <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 ">
<div class="form-group">
  <label >Invoice number:</label>
    <input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;" name="invoice_no" placeholder="Invoice Number">
</div>

<div class="form-group">
  <label >Invoice date:</label>
    <input class="form-control form-control-sm" type="date" style="border: 0.9px solid black;color:black;" name="invoice_date" placeholder="Invoice Date">
</div>
</div>

<div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 ">
<div class="form-group">
<label >Invoice amount:</label>
  <input class="form-control form-control-sm" type="text" style="border: 0.9px solid black;color:black;" name="invoice_amt" placeholder="Invoice Amount">
</div>

<div class="form-group">
<label >Payment due date:</label>
  <input class="form-control form-control-sm" type="date" style="border: 0.9px solid black;color:black;" name="Payment_due_date" placeholder="Payment due date">
</div>
</div>
</div>
</br>
</br>
<div class "row">
</div>

 <div class="row">
   <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 ">
   <div class="form-group">
   </div>
 </div>

 <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 ">
<h5> Total cost  of product: </h5>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Subtotal</span>
  </div>
     <input class="form-control form-control" name="subtotal" placeholder="">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Discount</span>
  </div>
  <input class="form-control form-control" name="discount" placeholder="">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Tax</span>
  </div>
  <input class="form-control form-control" type="text" name="tax" placeholder="">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Total</span>
  </div>
  <input class="form-control form-control" name="total" placeholder="">
</div>
</br>
</br>
<div class="form-group">
  <button type="submit" class="btn btn-success btn-lg" name="save">Save</button>
  <form action=" preview.php" method="post"  class="form-group">
   <a href="preview.php?preview=<?php echo $purchase_no; ?>" class="btn btn-primary btn-lg">preview</a>
  </form>
</div>

</div>
</div>
</div>
</div>

</div>
</div>

</div>

</form>
</div>
<!--preiview-->
<!--
<button type="button" class="btn btn-secondary btn-lg" data-target="#exampleModalCenter" data-toggle="modal" name="preview" id="preview">Preview</button>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">your invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class= "modal-body">
    <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 "></div>
      <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 ">
        <label>Bill From</label>

</div>
</div>
      </div>

      </div>
    </div>
  </div>
</div>-->
<!-- end of pop up-->
</main>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</html>
