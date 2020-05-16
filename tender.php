<?php
session_start();
$con=mysqli_connect('localhost','root','','project');
if(isset($_POST['submit']))
{
  $tender_id=$_POST['tender_id'];
  $offer_no=$_POST['offer_no'];
  $offer_date=$_POST['offer_date'];
  $query="UPDATE `enquiry` SET `offer_no`='$offer_no',`offer_date`='$offer_date' WHERE `tender_id`='$tender_id'";
  $run=mysqli_query($con,$query);
  //print_r($_POST);
  $number=count($_POST["product_name"]);
  echo $number;
  for($i=0;$i<$number;$i++)
   {
      $product_name=$_POST['product_name'][$i];
      $principal_rate=$_POST['principal_rate'][$i];
      $quoted_rate=$_POST['quoted_rate'][$i];
      $make=$_POST['make'][$i];
      $value_of_quotation=$_POST['value_of_quotation'][$i];
      $query1="UPDATE `products` SET `principal_rate`='$principal_rate',`quoted_rate`='$quoted_rate', `make`='$make',`value_of_quotation`='$value_of_quotation' WHERE `tender_id`='$tender_id' AND `product_name`='$product_name'";
      $run1=mysqli_query($con , $query1);
  }
  if ($run)
  echo '<script>alert("Updated your tender details")</script>';
  else
     echo '<script>alert(" not Updated your tender details")</script>';

  if ($run1)
  echo '<script>alert("Updated your PRODUCT details")</script>';
  else
     echo '<script>alert(" not Updated your PRODUCT details")</script>';
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Tender</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
  var i=0;
 $(document).on('click' , '.add2',function(){
   var html='';
   html+= '<tr>';
   html+='<td><input type="text" style="border: 0.5px solid gray;color:black;"  name="product_name[]" class="form-control product_name"/></td>';
   html+='<td><input type="text" style="border: 0.5px solid gray;color:black;"  name="principal_rate[]" class="form-control principal_qty"/></td>';
   html+='<td><input type="text" style="border: 0.5px solid gray;color:black;"  name="quoted_rate[]" class="form-control quoted_qty"/></td>';
    html+='<td><input type="text" style="border: 0.5px solid gray;color:black;"  name="make[]" class="form-control make"/></td>';
  html+='<td><input type="text" style="border: 0.5px solid gray;color:black;"  name="value_of_quotation[]" class="form-control value_of_quotation"/></td>';
   html+='<td><button type="button" name="remove2" class="btn btn-danger btn-sm remove2" style="border: 1px solid black;color:black;">-</button></td>';
   html+= '</tr>';
  $('#item_table').append(html);
  i++;
 });
 $(document).on('click', '.remove2',function(){
   $(this).closest('tr').remove();
 });
 $('#confirm').click(function(){
   $.ajax({
     url:"tender.php",
     method:"POST",
     data:$('#submit1').serialize(),
     success:function(data)
     {
       $('#submit1')[0].reset();
     }
   });
 });
});

</script>
</head>
<body>
  <header>
    <div class="container-fluid">
    <div class="navbarResponsive">

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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            list all
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
             <form action="report_generation2.php" method="post" name="login" id="sort">
              <a class="dropdown-item" ><div class="form-group">
               <label for="offern">From :</label>
               <input type="date"  name="from">

               <label for="offern">To...</label>
               <input type="date"  name="to">
              </div></a>
              <a class="dropdown-item" ><div class="form-group">
                <div class="row">
               <div class="col-sm-9 col-md-9 col-xs-9 col-lg-9">

             </div>
            <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 ">
              <input type="submit" name="sort" class="btn btn-primary btn-sm">
            </div>
            </div>
             </a>
           </form>
            </div>

          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="third.php" method="post">
        <input class="form-control mr-sm-2" type="text" name="find" placeholder="tender no./tender id">
        <button class="btn btn-outline-light my-2 my-sm-0" name="search" type="submit">Search</button>
        </form>
        </form>
      </div>
    </nav>
    </div>
    </div>
  </header>
   <br>
   <br>
   <div class="row">
     <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 "></div>
        <div  class="col-sm-7 col-md-7 col-xs-7 col-lg-7 ">
          <div class="modal-content">
              <div class="modal-content">
                <div class="modal-body">
    <form action="#" method="post" name="login" id="submit1">
    <div class="form-group">
      <label for="tender_id">Tender No./Tender Id:</label>
      <input type="text" style="border: 0.9px solid gray;color:black;" id="tender" name="tender_id"  placeholder="Tender No./Tender Id" class="form-control">
   </div>
  <div class="form-group">
    <div class="row">
      <div class="col">
        <div class="form-group">
         <label for="offer_no">Offer number :</label>
         <input type="text" style="border: 0.9px solid gray;color:black;" name="offer_no" placeholder="Offer Number" class="form-control" id="offer_no">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="offer">Offer date:</label>
          <input type="date" style="border: 0.9px solid gray;color:black;" name="offer_date"  placeholder="Offer date" class="form-control" id="offer_date">
      </div>
    </div>
    </div>
    </div>
  <div class="table-responsive">
         <table class="table table-bordered" id="item_table">
           <tr>
             <th scope="col">Product Name</th>
             <th scope="col">principal rate</th>
              <th scope="col">quoted rate</th>
             <th scope="col">Make</th>
             <th scope="col">value of quotation</th>
             <th scope="col"><button type="button" name="add2" class="btn btn-success btn-sm add2" style="border: 1px solid black;color:black;">+</button></th>
            </tr>
          </table>
      </div>
      <div class="row">
         <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10 "></div>
          <div class="col-sm-2 col-md-2 col-xs-2 col-lg- ">
            <input type="submit" name="submit" value="submit" style="border: 1px solid black;color:black;" class="btn btn-success btn-lg">
          </div>
          </div>
      </div>
  </form>
</div>
</div>
</div>
</div>
<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 "></div>
</div>
</body>
</html>
