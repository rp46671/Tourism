<?php
session_start();

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/print.css">
    <style media="screen">

      table{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 10%;

}
body {
  margin: 0;
  padding: 0;
  background-color: #FAFAFA;
  font: 12pt "Tahoma";
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.page {
  width: 21cm;
  min-height: 29.7cm;
  padding: 2cm;
  margin: 1cm auto;
  border: 1px #D3D3D3 solid;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.subpage {
  padding: 1cm;
  border: 5px red solid;
  height: 256mm;
  outline: 2cm #FFEAEA solid;
}

@page {
  size: A4;
  margin: 0;
}

@media print {
  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}

td, th {
  border: 2px solid black;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.detail{
  color: black;
  font-size: 18px;
}
.detail label{
  margin: 20px;
}
.footer{
    margin-top: 18%;
}
.footer h4{
  text-align: center;

}

    </style>
  </head>
  <body>
    <div class="">
    <button type="button" onclick="printDiv('container')" name="button">Print</button>
    </div>
    <div id="container" class="container">
      <div class="logo">
        <h1>K & B Fossod </h1>
      </div>
      <hr>
      <hr>
      <?php if (isset($_SESSION['fname'])) {

        ?>


        <input type="print" name="">mghgash
<!-- 
   <div class="detail">
   <label for="">Name :<?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['lname']; ?> </label>
   &nbsp;<label for="">Email :<?php echo $_SESSION['email']; ?> </label>
   &nbsp; &nbsp;
   <label for="">Address :<?php echo $_SESSION['address']; ?></label>

   <br><br>
   <label for="">Country : <?php echo $_SESSION['country']; ?></label><label for="">State :<?php echo $_SESSION['state']; ?> </label>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
   <label for="">Zip :<?php echo $_SESSION['zip']; ?> </label>
   <br><br>
   <label for="">Payment Method : <?php echo $_SESSION['payment']; ?></label>
    </div> -->
  <?php  } ?>
      <table>

    <tr>
      <th>Product Name</th>
      <th>Qty.</th>
      <th>Price</th>
    </tr>
    <tr>
      <?php
      if(!empty($_SESSION["check"]))
      {
        $total = 0;
        foreach($_SESSION["check"] as $keys => $values)
        {
      ?>
      <td><?php echo $values["productName"]; ?></td>
      <td><?php echo $values["productQty"]; ?></td>
      <td><?php echo number_format($values["productQty"] * $values["productPrice"], 2);?></td>
    </tr>
    <?php
        $total = $total + ($values["productQty"] * $values["productPrice"]);
      }
    ?>
        <tr>
          <td>Total</td><td></td><td><?php echo number_format($total, 2); ?></td>
        </tr>
    <?php

    }
    ?>
    <?php
    if(!empty($_SESSION["shopping"]))
    {
      $total = 0;
      foreach($_SESSION["shopping"] as $keys => $values)
      {
    ?>
    <td><?php echo $values["product_name"]; ?></td>
    <td><?php echo $values["product_qty"]; ?></td>
    <td><?php echo number_format($values["product_qty"] * $values["product_price"], 2);?></td>
  </tr>
  <?php
      $total = $total + ($values["product_qty"] * $values["product_price"]);
    }
  ?>
      <tr>
        <td>Total</td><td></td><td><?php echo number_format($total, 2); ?></td>
      </tr>
  <?php

  }
  ?>
  </table>

<footer class="footer">
  <hr>
<h4>&copy All Rights Reseverd.</h5>
</footer>
    </div>
<script type="text/javascript">
function printDiv(container) {
   var printContents = document.getElementById(container).innerHTML;
   var originalContents = document.body.innerHTML;

   document.body.innerHTML = printContents;

   window.print();

   document.body.innerHTML = originalContents;
}
</script>
  </body>
</html>
