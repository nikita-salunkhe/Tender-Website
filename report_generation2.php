<?php
$con=mysqli_connect('localhost','root','','business_growth');

if(isset($_POST['sort']))
{
 $from=$_POST['from'];
 $to=$_POST['to'];
 echo $from;
 echo $to;

 $query="SELECT enquiry.submission_date , enquiry.client_name  , enquiry.tender_id ,enquiry.tender_c,
 enquiry.amt_emd, enquiry.estimated_cost,enquiry.offer_no ,enquiry.offer_date, products.product_name, products.product_qty ,
 products.principal_rate, products.quoted_rate , products.value_of_quotation, products.make FROM enquiry INNER JOIN  products ON
 enquiry.tender_id= products.tender_id  WHERE `submission_date` BETWEEN '$from' AND '$to' ORDER BY `submission_date` ASC";
 $run=mysqli_query($con, $query);
 //products.product_name, products.product_qty , products.principal_rate, products.quoted_rate, FROM enquiry INNER JOIN  products ON
//  enquiry.tender_id= products.tender_id  WHERE `submission_date` BETWEEN '$from' AND '$to' ORDER BY 'submission_date' ASC";

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>report_generation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
          <li class="nav-item ">

          </li>
        </ul>

      </div>
    </nav>
    </div>
    </div>
  </header>
<body>
<br>
<br>
  <div class="row">
  <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1 "></div>
    <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10 ">
  <table class="table table-bordered table light">
    <thead>
      <tr>
          <th scope="col">TENDER ID</th>
            <th scope="col">CLIENT NAME</th>
        <th scope="col">SUBMISSION DATE</th>
        <th scope="col">TENDER C</th>
        <th scope="col">AMOUNT OF EMD</th>
        <th scope="col">ESTIMATED COST</th>
        <th scope="col">OFFER NUMBER</th>
        <th scope="col">OFFER DATE</th>
        <th scope="col">PRODUCT NAME</th>
        <th scope="col">PRODUCT QUANTITY</th>
        <th scope="col">PRINCIPLE RATE</th>
        <th scope="col">QUOATED RATE</th>
        <th scope="col">VALUE OF QUOTATION</th>
        <th scope="col">MAKE</th>
      </tr>
    </thead>
    <tbody>
      <?php
       $old="0000";
      while($row=mysqli_fetch_assoc($run))
         {    $new=$row['tender_id'];

               if($new!=$old)
               {
             ?>
            <tr>
             <td><?php echo "<label>".$row['tender_id']."</label>"."<br>";?></td>
             <td><?php echo "<label>".$row['client_name']."</label>"."<br>";?></td>
            <td><?php echo "<label>".$row['submission_date']."</label>"."<br>";?></td>
             <td><?php echo "<label>".$row['tender_c']."</label>"."<br>";?></td>
            <td><?php echo "<label>".$row['amt_emd']."</label>"."<br>";?></td>
            <td><?php echo "<label>".$row['estimated_cost']."</label>"."<br>";?></td>
            <td><?php echo "<label>".$row['offer_no']."</label>"."<br>";?></td>
            <td><?php echo "<label>".$row['offer_date']."</label>"."<br>";?></td>
            <td><?php
              $tender=$row['tender_id'];
              $query1="SELECT * from `products` WHERE `tender_id`='$tender'" ;
              $run1=mysqli_query($con, $query1);
                while($row1=mysqli_fetch_assoc($run1))
                {
               echo "<label>".$row1['product_name']."</label>"."<br>";
                }
              ?></td>
            <td><?php
              $tender=$row['tender_id'];
              $query1="SELECT * from `products` WHERE `tender_id`='$tender'" ;
              $run1=mysqli_query($con, $query1);
                while($row1=mysqli_fetch_assoc($run1))
                {
               echo "<label>".$row1['product_qty']."</label>"."<br>";
                }
              ?></td>
              <td><?php
                $tender=$row['tender_id'];
                $query1="SELECT * from `products` WHERE `tender_id`='$tender'" ;
                $run1=mysqli_query($con, $query1);
                  while($row1=mysqli_fetch_assoc($run1))
                  {
                 echo "<label>".$row1['principal_rate']."</label>"."<br>";
                  }
                ?></td>
                <td><?php
                  $tender=$row['tender_id'];
                  $query1="SELECT * from `products` WHERE `tender_id`='$tender'" ;
                  $run1=mysqli_query($con, $query1);
                    while($row1=mysqli_fetch_assoc($run1))
                    {
                   echo "<label>".$row1['quoted_rate']."</label>"."<br>";
                    }
                  ?></td>
                  <td><?php
                    $tender=$row['tender_id'];
                    $query1="SELECT * from `products` WHERE `tender_id`='$tender'" ;
                    $run1=mysqli_query($con, $query1);
                      while($row1=mysqli_fetch_assoc($run1))
                      {
                     echo "<label>".$row1['value_of_quotation']."</label>"."<br>";
                      }
                    ?></td>
                  <td><?php
                    $tender=$row['tender_id'];
                    $query1="SELECT * from `products` WHERE `tender_id`='$tender'" ;
                    $run1=mysqli_query($con, $query1);
                      while($row1=mysqli_fetch_assoc($run1))
                      {
                     echo "<label>".$row1['make']."</label>"."<br>";
                      }
              ?></td>

           </tr>
         <?php
          }
         $old=$new;
        }
       ?>
    </tbody>

  </table>
</div>
</div>
<div class="col-sm-1 col-md-1 col-xs-1 col-lg-1 "></div>
<br>
<br>
</body>
</html>
