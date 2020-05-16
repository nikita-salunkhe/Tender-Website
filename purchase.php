<?php
session_start();
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','','project');
if(isset($_POST['submit'])){
  $tender_no=$_POST['tender_no'];
  $PO_no=$_POST['PO_no'];
  $ord_pri=$_POST['ord_pri'];
  $ord_date=$_POST['ord_date'];
  $deliy_date=$_POST['deliy_date'];
  $pre_insp=$_POST['pre_insp'];
  $security_deposite_amt=$_POST['security_deposite_amt'];
  $mode_deposite=$_POST['mode_deposite'];
  $performance_back_guarantee=$_POST['performance_back_guarantee'];
  $mode_pbg=$_POST['mode_pbg'];
  $query=$con->prepare("INSERT INTO `purchase`(`tender_no`,`PO_no`, `ord_pri`,`ord_date`,`deliy_date`, `pre_insp`, `security_deposite_amt`, `mode_deposite`,`performance_back_guarantee`,`mode_pbg`) VALUES (?,?,?,?,?,?,?,?,?,?)");
  $query->bind_param("ssssssssss",$tender_no,$PO_no,$ord_pri,$ord_date,$deliy_date,$pre_insp,$security_deposite_amt,$mode_deposite,$performance_back_guarantee,$mode_pbg);
  $query->execute();
  //$run= $query->get_result();
  if($query)
  echo '<script>alert("Registered purchase order")</script>';
  else {
      echo '<script>alert("not Registered purchase order")</script>';
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Purchase Order</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

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

<br>
<br>
<div class="row">
  <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 "></div>
     <div  class="col-sm-7 col-md-7 col-xs-7 col-lg-7 ">
       <div class="modal-content">
           <div class="modal-content">
             <div class="modal-body">

<form action="#" method="post" name="login" id="submit">
  <div class="form-group">
    <label for="tender_no">Tender No:</label>
    <input type="type" style="border: 0.9px solid black;color:black;"  name="tender_no"  placeholder="Tender No/Tender Id" class="form-control" >
  </div>
  <div class="form-group">
    <label for="PO_no">PO No.:</label>
    <input type="text" style="border: 0.9px solid black;color:black;"  name="PO_no"  placeholder="PO No." class="form-control" >
  </div>
  <div class="form-group">
    <label for="ord_pri">Order principles:</label>
    <input type="text" style="border: 0.9px solid black;color:black;"  name="ord_pri"  placeholder="Order principles" class="form-control" >
  </div>
  <div class="form-group">
    <label for="ord_date">Order Date:</label>
    <input type="date" style="border: 0.9px solid black;color:black;"  name="ord_date"  placeholder="Order Date" class="form-control" >
  </div>
  <div class="form-group">
    <label for="deliy_date">Delivery Date:</label>
    <input type="date" style="border: 0.9px solid black;color:black;"  name="deliy_date"  placeholder="Delivery Date" class="form-control" >
  </div>

<lable> Predispatch inspection:</lable>
<br>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="pre_insp" id="inlineRadio1" value="yes">
  <label class="form-check-label" for="inlineRadio1">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="pre_insp" id="inlineRadio2" value="no">
  <label class="form-check-label" for="inlineRadio2">No</label>
</div>
<br>
<br>

<div class="form-group">
  <label for="performance_back_guarantee">Performance Back Guarantee:</label>
  <input type="text" style="border: 0.9px solid black;color:black;"  name="performance_back_guarantee"  placeholder="Performance Back Guarantee" class="form-control" >
</div>

<div class="form-group">
<label for="security_deposite_amt">Security deposite amount:</label>
<input type="text" style="border: 0.9px solid black;color:black;"  name="security_deposite_amt"  placeholder="Security deposite amount" class="form-control" >
  </div>
<div class="row">
  <div class="col">
  <div class="form-group">
        <label for="mode_deposite">Mode of security deposite:</label>
        <br>
              <select  name="mode_deposite" style="border: 0.9px solid black;color:black; height:37px;" class="btn-btn" class= aria-describedby="searchDropdownDescription" id="mode" class="form-control">
                <option value="Select">Select</option>
                  <option value="National Electronic Fund Transfer">National Electronic Fund Transfer</option>
                  <option value="Credit Card">Credit Card</option>
                  <option value="Debit Card">Debit Card</option>
                  <option value="Demand Draft">Demand Draft</option>
                  <option value="Cash">Cash</option>
              </select>
            </div>
          </div>
          <div class="col">

  <div class="form-group">
  <label for="mode_pbg">Mode of PBG deposit:</label>
  <br>
            <select  name="mode_pbg" style="border: 0.9px solid black;color:black; height:37px;" class="btn-btn" class= aria-describedby="searchDropdownDescription" id="mode" class="form-control">
              <option value="Select">Select</option>
                <option value="National Electronic Fund Transfer">National Electronic Fund Transfer</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Demand Draft">Demand Draft</option>
                <option value="Cash">Cash</option>
            </select>
  </div>
</div>
</div>
 <br>
  <div class="form-group">
    <button class="btn btn-success" type="submit" style="border: 1px solid black;color:black;" name="submit">submit</button>
  </div>
  <br>
  <br>
</div>
</form>
</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</body>
</html>
