<?php
session_start();
$purchase_no=$_SESSION['purchase_order'];
$con=mysqli_connect('localhost','root','','project');
$query=$con->prepare("SELECT * FROM `invoice` WHERE `Purchase_order`=?");
$query->bind_param("s",$purchase_no);
$query->execute();
$run= $query->get_result();
$res=$run->fetch_assoc();

$query2=$con->prepare("SELECT * FROM `purchase` WHERE `PO_no`=?");
$query2->bind_param("s",$purchase_no);
$query2->execute();
$run2= $query2->get_result();
$res2=$run2->fetch_assoc();
$tn= $res2['tender_no'];
//echo $tn;


/*$query1=$con->prepare("SELECT * FROM `products` WHERE `tender_no`=?");
$query1->bind_param("s",$tn);
$query1->execute();
$run1= $query1->get_result();
$row1=$run1->num_rows;*/
?>
<!DOCTYPE html>
<html>
<head>
  <title>project</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
<div class="container-fluid">

<div class="row">
  <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 "></div>
  <div  class="col-sm-8 col-md-8 col-xs-8 col-lg-8 ">
  </br>
  <div class="row">
  <div class="col-sm-8 col-md-9 col-xs-9 col-lg-9 "></div>
  <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 ">
  <div class="form-group">
    <form action="generate_pdf.php" method="post" name="login">
      <button type="submit" id="pdf" name="pdf" class="btn btn-primary btn-lg"><i class="fa fa-pdf" aria-hidden="true"></i>generate pdf</button>

  </form>
  </div>
  </div>
  </div>
      <div class=" invoice_main ">

        <div class="modal-content">
            <div class="modal-body">

   <div class="row">
     <div class="col-sm-5 col-md-5 col-xs-5 col-lg-5 ">

       <div class="container-fluid padding">
         <div class="row padding">
             <div class="card">
               <img class= "card-img-middle" src="logo.jpg" height="150">
             </div>
         </div>
       </div>
     </div>
      <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1 "></div>
     <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 ">
      <h4><b>QUATATION / PERFORMA INVOICE</b></h4>
       <div class="form-group">
       <?php echo "<h5><label> Bill From:  ".$res['company_name']."  Pvt. Ltd</label></h5>";?>
       <p>401-402 ,EPI Center,old PUNE Mumbai Highway ,</p>
         <p> Wakdewadi ,shivajinagar, pune ,410025</p>
       </div>
     </div>
   </div>
 <hr>

<div class="row">
   <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 ">
<table class="table table-bordered">
 <tbody>
     <tr>
       <th scope="row"><label>Customer: </label></th>
       <th><?php echo "<label>".$res['name']."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label> Bill to address:</label></th>
       <th><?php echo "<label>".$res['city']." -".$res['zip']."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label>Email ID:</label></th>
       <th><?php echo "<label>".$res['email']."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label>phone number:</label></th>
       <th><?php echo "<label>".$res['phn']."</label>";?></th>
     </tr>
</tbody>
</table>
</div>
<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 ">
<table class="table table-bordered">
<tbody>
     <tr>
       <th scope="row"><label>purchase order:</label></th>
       <th><?php echo "<label>".$purchase_no."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label> Invoice Number:</label></th>
       <th><?php echo "<label>".$res['invoice_no']."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label> Invoice date :</label></th>
       <th><?php echo "<label>".$res['invoice_date']."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label>Invoice amount  :</label></th>
       <th><?php echo "<label>".$res['invoice_amt']."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label>payment due date:</label></th>
       <th><?php echo "<label>".$res['Payment_due_date']."</label>";?></th>
     </tr>
</tbody>
</table>
</div>
</div>

<!--<div class= "row">
  <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 ">
<table class="table table-bordered table light">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Item Qty</th>
      <th scope="col">Make</th>
      <th scope="col">price</th>
    </tr>
  </thead>
  <tbody>
    <?php

      while ($res1=$run1->fetch_assoc())
       {
         ?>
    <tr>
           <td><?php echo "<label>".$res1['item']."</label>"."<br>";?></td>
           <td><?php echo "<label>".$res1['item_qty']."</label>"."<br>";?></td>
           <td><?php echo "<label>".$res1['make']."</label>"."<br>";?></td>
           <td>

           </td>
      </tr>
       <?php
      }
     ?>
    <br>
  </tbody>
</table>
</div>
</div>-->
<?php

//$total=$subtotal+$tax-$discount;
 ?>
 <div class="row">
 <div class="col-sm-7 col-md-7 col-xs-7 col-lg-7 "></div>
 <div class="col-sm-5 col-md-5 col-xs-5 col-lg-5 ">
<h5> Total cost  of product: </h5>
<table class="table table-bordered">
<tbody>
     <tr>
       <th scope="row"><label>Subtotal:</label></th>
       <th><?php echo "<label>"."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label> tax:</label></th>
       <th><?php echo "<label>"."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label> discount :</label></th>
       <th><?php echo "<label>"."</label>";?></th>
     </tr>
     <tr>
       <th scope="row"><label>Total  :</label></th>
       <th><?php echo "<label>"."</label>";?></th>
     </tr>

</tbody>
</table>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</body>
</html>
