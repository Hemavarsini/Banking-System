<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=No">
    <title>Banking System</title>
    <link rel="stylesheet" href="css/history.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <style>
    .backing{
      background-image: url("images/banking.jpg");
      background-repeat:no-repeat;
      background-position: relative;
      height:100%;
      background-size: cover;
      }
    </style>
</head>
<body>
  <body>
    <?php
    include 'navbar.php';
    ?>
    <div class="backing">
    <h2>Transaction History</h2>
    <div class="table_op">
        <table>
	       <tr>
                <th>Sender</th>
                <th>Reciever</th>
                <th>Amount</th>
	        </tr>
        <?php
            include('connection.php');
            $sql=mysqli_query($con,"Select * from transactions");
            while($result=mysqli_fetch_assoc($sql))
            {
            ?>
                <tr>
                        <td><?php echo $result['sender_name'];?></td>
                        <td><?php echo $result['reciever_name'];?></td>
                        <td><?php echo $result['amount_transfer'];?></td>
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
