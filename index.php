<?php 
    
    session_start();//starting a session in client side

    $sessionID = session_id(); //storing session id

    setcookie("session_id",$sessionID,time()+1800,"/","localhost",false,true);//In here we are set the cookie as terminates after 30 minutes - HTTP only flag
    

?>


<!DOCTYPE html>
<html>
<head>
<title> CSRF_M.Salman Septianto </title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"> </script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="config.js"> </script>

<style>

body {
    
    background-color: black;
font-family: 'Raleway', sans-serif;
}

.middlePage {
	width: 1000px;
    height: 650px;
    position : center;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

p {
	color:#4b1b9b;
}

.spacing {
	padding-top:10px;
	padding-bottom:7px; }

.logo {
	color:#4b1b9b;

}

</style>

</head>
<body>
<center>
<div class="middlePage">
<div class="page-header">
    <img src="logo.png" width="150px"height="150px">
    <h1 class="logo">POLITEKNIK HARAPAN BERSAMA <br><small>Jl.Mataram No 32 Tegal </small> </h1>
</div> 

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"> <font size="10" color="blue"> LOG IN </font></h3>
    </div>

    <div class ="panel-body">
       

            <div class="center">
			
                <form class="form-horizontal" method="POST" action="server.php">
                    <input name="user_name" type="text" placeholder="Enter User Name" class="form-control input-md">
                    <div class="spacing"></div>
                    <input name="user_pswd" type="password" placeholder="Enter your password" class="form-control input-md">
                    <div class="spacing"><input type="hidden" id="csToken" name="CSR"/></div>
                    <input type="submit" name="sbmt" value="Log In" class="btn btn-info btn-sm pull-right">
                </form>
				<p><font size="3" color="red"><a href="">Created By </a>M.Salman Septianto </font></p>
				
            </div>
    </div>

</div>
</center>
    <?php 
        //if cookie is ok, request to the server and get CSRF token & store it inside hidden HTML DOM input tag ~ id=csToken
       if(isset($_COOKIE['session_id']))
            { 
                echo '<script> var token = loadDOC("POST","server.php","csToken");  </script>'; 
                   
                //echo "cookie set";     
            }
    ?>

    
                







</div>
</body>
</html>