<?php
        session_start();
        if (isset($_SESSION['email'])) {
            $uid = $_SESSION['user_id'];
?>

<!doctype html>
<html lang="en">
  <head>
    <title>!Amazon</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <li class="nav-item navbar-brand">
                <a class="navbar-brand" href="#">!Amazon</a>
            </li>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
            <li class="navbar-nav ml-auto">
                <a class="nav-link" href="logout.php">                    
                    <span class="material-icons">login</span>  
                </a>
            </li>
        </nav>
     
        <?php
                    include "conn.php";
                    $orderDetails = "select orders.order_id, orders.product_name, orders.product_price, orders.product_quantity, orders.order_status FROM orders inner join users on orders.customer_id = users.id where users.id = '$uid' ";
                    $result = mysqli_query($conn,$orderDetails);
                    //$orderDetailsAssoc = mysqli_fetch_assoc($rawData);
                    //var_dump($orderDetailsAssoc);
                    
                    if (mysqli_num_rows($result) == 0) {
                        echo "No Orders yet";
                    }else{
        ?>
        <div class="container table-responsive-md">
            <table class="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Order Status</th>
                    </tr>
                    </thead>
                    <tbody>
    
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['product_price']; ?></td>
                            <td><?php echo $row['product_quantity']; ?></td>
                            <td><?php echo $row['order_status']; ?></td> 
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
            </table>
        </div>
        <?php
            }
        ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
        }else {
            header("location:index.php");
        }
?>