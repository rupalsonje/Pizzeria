<head>
    <title>Pizzeria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
      #form{
        width:700px;
        height:450px;
        background-color:#bedbbb;
      }
      .card{
        height:250px;
      }
      .pizza{
        width:100px;
        margin:0 auto -15px;
        display:block;
        position:relative;
      }
    </style>
</head>
<body class="bg-light text-dark">
<nav class="navbar p-3 mb-2  navbar-expand-lg bg-white text-dark text-decoration-none" >
        <a class="navbar-brand pl-3" href="#">
            Rupal
            <!-- <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="" loading="lazy"> -->
        </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse pr-5 navbar-collapse navbar-nav justify-content-end" id="navbarNavAltMarkup">
    <a class="nav-link px-3 text-md-left active text-dark " href="#">Home <span class="sr-only">(current)</span></a>
    <a class="nav-link px-3 text-md-left text-dark " href="#">Features</a>
    <a class="nav-link px-3 text-md-left text-dark " href="#">Pricing</a>
    <div class="px-3">
      <a href="add.php" class="btn btn-info px-4 text-md-left">Add a Pizza</a>
    </div>
  </div>
</nav>
