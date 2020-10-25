<?php
    session_start();
    if (isset($_SESSION['adminID'])) {
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
                    <label for="" class="nav-link">Admin Panel</label>
                </li>
            </ul>
            <li class="navbar-nav ml-auto">
                
                <a class="nav-link" href="logout.php">
                    <span class="material-icons">login</span>    
                    
                </a>
            </li>
                
        </nav>
        <div class="container" style="margin-top:1rem;">
            
            <form action="adminPanel.php" method="get">
                <div class="form-group">

                    <input type="text" name="searchQuery" class="form-control">
                
                </div>
                <div class="form-group">

                    <input type="submit" name="search" value="Search" class="btn btn-success">

                </div>

            </form>
        </div>
        <?php
            include "conn.php";
            if ($conn->connect_error) {
                echo "Connection Error:". $conn->connect_error;
            }else {
                //echo "Connection Success";
                if (isset($_GET['search'])) {
                    $searchQuery = $_GET['searchQuery'];
                    //echo "SerachResult: ". $searchQuery;
                    $query = "SELECT orders.order_id, users.id, users.name, orders.product_name, orders.order_status
                                FROM orders
                                LEFT JOIN users ON orders.customer_id = users.id ";
                    
                    // if ($searchQuery == "") {
                    
                    // } else {
                    // $query = "";  
                    // }

                    //$query = "select * from users where name like '%$searchQuery%'";
                    $searchResult = mysqli_query($conn,$query);
                
                    
                    if (mysqli_num_rows($searchResult) == 0) {
                    echo "Empty Set";
                    } else {
              
        ?>

        <div class="container  table-responsive-md">

            <table class="table">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Order Status</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($searchResult)) {
                            
                       
                    ?>
                    <tr>
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["order_id"];?></td>
                        <td><?php echo $row["name"];?></td>
                        <td><?php echo $row["product_name"];?></td>
                        <td><?php echo $row["order_status"];?></td>
                        <td>
                            <a href="orderStatus.php?button_value=shipped&order_id=<?php echo $row['order_id']; ?>">
                                <button class="btn btn-warning" <?php if($row['order_status'] == 'shipped' || $row['order_status'] == 'delivered'){echo "disabled";}?>>Shipped</button>
                            </a>
                            <a href="orderStatus.php?button_value=delivered&order_id=<?php echo $row['order_id'];?>">
                                <button class="btn btn-primary" <?php if($row['order_status'] == 'delivered'){echo "disabled";}?>>Delivered</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    
                        }
                    ?>
                    
                </tbody>
            </table>

        </div>


        <?php
                    }
                        
                }
            
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