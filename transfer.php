<?php
include('connection.php');
$sid=$_GET['CustomerID'];
$run=mysqli_query($con,"SELECT * FROM `customers` WHERE `CustomerID`='$sid'");
$data=mysqli_fetch_assoc($run);

if(isset($_POST['submit']))
{
    $from = $_GET['CustomerID'];
    $too = $_POST['to'];
    $amnt = $_POST['amount'];

    $sql = "SELECT * from customers where CustomerID=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from customers where CustomerID=$too";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);

    if($amnt > $sql1['AvailableBalance']){
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';
        echo '</script>';
    }
    else {
        $newCredit = $sql1['AvailableBalance'] - $amnt;
        $sql = "UPDATE customers set AvailableBalance=$newCredit where CustomerID=$from";
        mysqli_query($con,$sql);


                $newCredit = $sql2['AvailableBalance'] + $amnt;
                $sql = "UPDATE customers set AvailableBalance=$newCredit where CustomerID=$too";
                mysqli_query($con,$sql);

                $sender = $sql1['Customer_Name'];
                $receiver = $sql2['Customer_Name'];
                $sql = "INSERT INTO transactions(`sender_name`, `reciever_name`, `amount_transfer`) VALUES ('$sender','$receiver','$amnt')";
                $tns=mysqli_query($con,$sql);
                if($tns){
                   echo "<script type='text/javascript'>
                            alert('Transaction Successful.');
                            window.location='index.php';
                        </script>";
                }
                $newCredit= 0;
                $amnt =0;
            }

        }
        ?>

        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=No">
            <title>Banking System</title>
            <link rel="stylesheet" href="css/fund_transfer.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
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

                <form method="post" name="tamount" class="tabletext" ><br/>
                <h2>Sender:</h2>
                <div>
                    <table class="table_op"  >
                        <tr>
                            <th>Account_No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Available Balance</th>
                        </tr>
                        <tr>
                            <td><?php echo $data['Account_No'] ?></td>
                            <td><?php echo $data['Customer_Name'] ?></td>
                            <td><?php echo $data['Email'] ?></td>
                            <td><?php echo $data['AvailableBalance'] ?></td>
                        </tr>
                    </table>
                </div>
                <br/><br/><br/>
                <h2>Receiver:</h2>
                <table>
                <tr>
                <th><label>Recipents</label></th>
                <td><select class=" table_op"   name="to" style="margin-bottom:5%; " required>
                    <option value="" disabled selected> </option>
                    <?php
                        $sid=$_GET['CustomerID'];
                        $sql = "SELECT * FROM customers where CustomerID!=$sid";
                        $query=mysqli_query($con,$sql);
                        if(!$query)
                        {
                            echo "Error ".$sql."<br/>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_array($query)) {
                    ?>
                        <option class="table_op" value="<?php echo $rows['CustomerID'];?>" >

                            <?php echo $rows['Customer_Name'] ;?>

                        </option>
                    <?php
                        }
                    ?>
                    </td></tr>
                </select> <br/><br/><br/>
                <tr>
                <th><label>Amount:</label></th>
                <td>
                    <input type="number" id="amm" class="form-control" name="amount" required  />  <br/><br/>
                </td>
                    </tr>
                    </table>

                <div class="sub" >
                    <button class="button" name="submit" type="submit" id="myBtn">Send Money</button>
                </div>
                </form>
          </div>
        </body>
        </html>
