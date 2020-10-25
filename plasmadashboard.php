<?php
        session_start();
        if (isset($_SESSION['email'])) {
            $sessionMail = $_SESSION['email'];
            include "conn.php";
            $fetchIdquery = "SELECT * FROM plasma_banks WHERE email = '$sessionMail'";
            $fetchIdRaw = mysqli_query($conn,$fetchIdquery);
            $row = mysqli_fetch_assoc($fetchIdRaw);
            $rowId = $row['id'];
            $_SESSION['userId'] = $rowId;
?>

<!doctype html>
<html lang="en">
    <head>
        <title>plasma bank home</title>
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
                <a class="navbar-brand" href="#"><?php 
            echo $row['name']; 
            ?></a>
            </li>
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="donor.php">Add a Donor</a>
                </li>
            </ul>
            <li class="navbar-nav ml-auto">
                
                <a class="nav-link" href="logout.php">
                    <span class="material-icons">login</span>    
                    
                </a>
            </li>
                
        </nav>


            <div class="container">
            <?php 
            echo $row['name']; 
            ?></div>

        <?php
                    include "conn.php";
                    $donor = "SELECT * FROM users WHERE type = 'donor';";
                    $result = mysqli_query($conn,$donor);
                    //$orderDetailsAssoc = mysqli_fetch_assoc($rawData);
                    //var_dump($orderDetailsAssoc);
                    
                    if (mysqli_num_rows($result) == 0) {
                        echo "No Donor yet";
                    }else {
                       
                   
        ?>
        <div class="container table-responsive-md">

            <table class="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>patient ID</th>
                        <th> Name</th>
                        <th>email</th>
                        <th>age</th>
                        <th>gender</th>
                    </tr>
                    </thead>
                    <tbody>
    
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                        
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            
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