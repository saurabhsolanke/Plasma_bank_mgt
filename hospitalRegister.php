<!doctype html>
<html lang="en">
  <head>
    <title>Hospital Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


    <!-- //php validations -->
    <?php
        if (isset($_POST['registerhospital'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $drname = $_POST['drname'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            if ($repassword!= $password) {
                header("location: hospitalRegister.php");
                echo "<h3>Passwords should match</h3>";
            }else {
                if ($name == "") {
                    header("location: hospitalRegister.php");
                    echo "<h3>Enter a name</h3>";

                }else {
                    if ($email == "") {
                        header("location: hospitalRegister.php");
                        echo "<h3>Enter a email</h3>";
                    
                    }else {
                        include "conn.php";
                        $regQuery = "INSERT INTO hospitalRegister (name , email , drname, password , address , phone) VALUES (' $name', '$email','$drname', '$password', '$address', '$phone')";
                        mysqli_query($conn,$regQuery);
                        // header("location:plasma.php"); 
                        echo "Hospital Registered Successfully, Login to proceed.";
                    }   
                }
            }


        }

    ?>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <li class="nav-item navbar-brand">
                <a class="navbar-brand" href="#">Hospital Register page</a>
            </li>
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="hospitalLogin.php">Login</a>
                </li>
            </ul>
            <!-- <li class="navbar-nav ml-auto">
                
                <a class="nav-link" href="logout.php">
                    <span class="material-icons">login</span>    
                    
                </a>
            </li> -->
                
    </nav>
      <div class="container">

          <form action="hospitalRegister.php" method="post">
              <div class="form-group">
                <label for="">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your Name">
              </div>

              <div class="form-group">
                <label for="">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
              </div>

              <div class="form-group">
                <label for="">Doctor Name </label>
                <input type="name" class="form-control" name="drname" placeholder="Enter Doctor's Name">
              </div>

              <div class="form-group">
                <label for="">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
              </div>
              
              <div class="form-group">
                <label for="">Re-enter Password:</label>
                <input type="password" class="form-control" name="repassword" placeholder="Enter Password again">
              </div>
              
              <div class="form-group">
                <label for="">Address:</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address">
              </div>
              
              <div class="form-group">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="phone no.">
              </div>
              <!--  -->
              <input type="submit" name="registerhospital" value="Register" class="btn btn-success">

          </form>
          <!-- <a href="plasmabankLogin.php">
                  <button class="btn btn-primary">LogIn</button>
          </a> -->

      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>