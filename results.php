<?php 
/*
setcookie("don",$_REQUEST['don']);
setcookie("btype",$_REQUEST['btype']);
setcookie("otype",$_REQUEST['otype']);
setcookie("city",$_REQUEST['city']);
*/
include('config.php');


?>

<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Find a donors or reciepents</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Page CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}
.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}


.navbar a {
  float: right;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #355FAA;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
.avatar {
  vertical-align: middle;
  width: 80px;
  height: 80px;
  border-radius: 50%;
   margin: 9px;
}





body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}
		header {
			background-color: #990000;
			color: #fff;
			padding: 20px;
			text-align: left;
			font-size: 30px;
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 2px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
		}
		nav {
			background-color: #333;
			overflow: hidden;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
		}
		nav a {
			float: left;
			color: #fff;
			text-align: center;
			padding: 14px 20px;
			text-decoration: none;
			font-size: 18px;
			font-weight: bold;
			transition: background-color 0.3s ease;
		}
		nav a:hover {
			background-color: #ddd;
			color: #333;
		}



</style>
  </head>
  
<body>
<header>
		<img src="5.jpg" class="logo" alt="photo" width="100" height="100">
		Search

	</header>
	<nav>
		<a href="Home.html" class="activee" >Home</a>
		<a href="search.html">Search</a>
		<a href="Registration.html">Registration</a>
		<a href="Contact.html">contact</a>
	</nav>
  

<div class="container">
  <div class="row">


  <div class="col-md-8">
          <form id="form_nt">
          <div id="nt-list">
          </div>
        </form>
        </div>
      </div>
  </div>
      <?php 
if(isset($_POST['submit']))
{
$status=1;
$bloodgroup=$_POST['city'];
$type=$_POST['don'];
$orgtype=$_POST['otype'];
    if ($orgtype == "1" && $bloodgroup == "2" ){
        
$sql = "SELECT * from user where (con_privacy=:status and donator_or_requester=:type)";
    $query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
    }
else if($orgtype == "1")
{
$sql = "SELECT * from user where (con_privacy=:status and city=:bloodgroup and donator_or_requester=:type)";
    $query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':bloodgroup',$bloodgroup,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
}else if($bloodgroup == "2"){
$sql = "SELECT * from user where (con_privacy=:status  and donator_or_requester=:type and organ_type=:orgtype)";
$query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':orgtype',$orgtype,PDO::PARAM_STR);
}else{
    
$sql = "SELECT * from user where (con_privacy=:status and city=:bloodgroup and donator_or_requester=:type and organ_type=:orgtype)";
    $query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':bloodgroup',$bloodgroup,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':orgtype',$orgtype,PDO::PARAM_STR);
}
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    
                    <div class="card-block">
                        <p class="card-text"><b>Name : </b><?php echo htmlentities($result->name);?></a></p>
                        <p class="card-text"><b>Mobile No :</b> <?php echo htmlentities($result->mobile);?> 
                        <p class="card-text"><b> Email :</b> <?php echo htmlentities($result->email);?> 

                    
                             </p>
<p class="card-text"><b> Birthdate:</b> <?php echo htmlentities($result->birthdate);?></p>
<p class="card-text"><b>City:</b> <?php echo htmlentities($result->city);?></p>

     <p class="card-text"><b>Blood/Organs type :</b> <?php echo htmlentities($result->organ_type);?></p>

                    </div>
                </div>
            </div>

            <?php }}
else
{
echo htmlentities("No Record Found");


    //print_r($query);

}


            } ?>
          
 



       
 

 
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Page Script -->
  <script src="script_r.js"></script>
  </body>

 
  </html>
