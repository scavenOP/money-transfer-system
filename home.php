
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <style>
    body{
      
      background-image: url("cute-pink-piggy-bank-yellow-background-165832621.jpg");
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      background-size: cover;
    }
    .heading{
      padding:auto 40px;
    }
  </style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        
        
        
      </ul>
      
    </div>
  </div>
</nav>
<style>
  .bg-light {
    --bs-bg-opacity: 0.2;
  }
  .navbar-light .navbar-nav .nav-link {
    color: rgba(0,0,0,1);
  }
  .buttons{
    margin-top: 16%;
    display:flex;
    justify-content: space-evenly;
    
  }
  .mark{
    margin-top:20%;
    margin-left:70%;
    background-color: rgba(0,0,0,0);
  }
  
</style>
<center><h1><u>WELCOME TO BASIC BANKING SYSTEM</u></h1></center>
<div class="buttons">
<a href="customer.php" class="btn btn-primary">Customers</a>

<a href="transfer.php" class="btn btn-primary">Transfer Amount</a>
<button id="bgnBtn" class="btn btn-primary" onclick="promptMe()">Tranfer Details</button>
</div>
<script>
  function promptMe(){
    var pass = prompt("Please provide the password to view all transaction deatils.");
    if (pass == "niladri") {
      window.location.href = "transaction_details.php";
      
    }
}
</script>
  <div class="mark">
    <center>Made By Niladri Samanta</center>
  </div>
</body>
</html>