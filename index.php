<html>
<head>
<title>
Welcome
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Covid 19 Plasma Therapy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#"></a>
      </li>    
    </ul>
  </div>  
</nav>
<br>
</head>

<body>

    <style>
        .modal-header{
            color: black;
        }
        .modal-body{
            color: black;
        }
    </style>

    <div class="container p-3 my-3 bg-success text-white">
     <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-Success" data-toggle="modal" data-target="#myModal">
            <h3> What is Plasma Donation ?</h3>
                </button>

                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                            <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">What is Plasma Donation?</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    Because you fought the infection, your plasma now contains COVID-19 antibodies. These antibodies provided one way for your immune system to fight the virus when you were sick, so your plasma may be able to be used to help others fight off the disease.
                    </div>

                <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
            </div>
    </div>
    
    <div class="container p-3 my-3 border">
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <div class="text-center" style="width:200px">
                        <img class="rounded float-right" src="images/plasma.png" alt="Card image" style="width:100%">
                        <h2>Plasma Bank</h2>
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                                <a href="plasmabankLogin.php" class="btn btn-primary">Plasma bank Login</a>
                        </div>
                    </div>                
                </div>

                <div class="col">
                    <div class="text-center" style="width:200px">
                        <img class="rounded float-right" src="images/HOSPITAL.svg" alt="Card image" style="width:100%">
                        <h2>Hospital</h2>
                        <div class="card-body">
                        <h4 class="card-title"></h4>
                        <a href="hospitalLogin.php" class="btn btn-primary">Hospital Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>