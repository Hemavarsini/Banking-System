<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=No">
    <title>Banking System</title>
    <link rel="stylesheet" href="css/transaction.css">
    <link rel="stylesheet" href="css/history.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <style>
    .backing{
      background-image: url("images/banking.jpg");
      background-repeat:no-repeat;
      background-position: relative;
      height: 100%;
      background-size: cover;

    }
    </style>
</head>
<body>
  <?php
  include 'navbar.php';
  ?>
  <div class="backing">
  <h2> Customer Details to Transfer</h2>
  <div class="table_op">
      <table>
       <tr>
              <th>Account No</th>
              <th>Customer Name</th>
              <th>Email</th>
              <th>Branch</th>
              <th>Balance</th>
        </tr>
      <?php
          include('connection.php');
          $sql=mysqli_query($con,"Select * from customers");
          while($result=mysqli_fetch_assoc($sql))
          {
              $id=$result['CustomerID'];
          ?>
              <tr>
                      <td><?php echo $result['Account_No'];?></td>
                      <td><?php echo $result['Customer_Name'];?></td>
                      <td><?php echo $result['Email'];?></td>
                      <td><?php echo $result['Branch_Name'];?></td>
                      <td><?php echo $result['AvailableBalance'];?></td>
                      <td class="button"><a href="transfer.php?CustomerID=<?php echo $id ?>">Transfer</a></td>
                      <td class="button"><a href="transaction_history.php">History</a></td>
              </tr>
              <?php
          }
      ?>
     </table>
  </div>
  </div>
</div>
</body>
</html>
