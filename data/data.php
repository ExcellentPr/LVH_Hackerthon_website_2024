
<?php
require 'connect.php';
if(isset($_POST["submit"])){
    $name =$_POST["title"];
    $date =$_POST["date_posted"];
	$ex_date =$_POST["expiry_date"];
    if($_FILES["image"]["error"]===4){
        echo "<script> alert('Image Does not exist'); </script>";
    }else{
        $fileName =$_FILES["image"]["name"];
        $fileSize =$_FILES["image"]["size"];
        $tmpName =$_FILES["image"]["tmp_name"];

        $validImageExtension=['jpg','jpeg','png'];
        $imageExtension=explode('.',$fileName);
        $imageExtension=strtolower(end($imageExtension));
            if(!in_array($imageExtension,$validImageExtension)){
                echo "<script> alert('Invalid Image Extension'); </script>"; 
            }else if($fileSize > 1000000){
                echo "<script> alert('Image Size is Too Large'); </script>"; 
            }else{
                $newImageName = uniqid();
                $newImageName .= '.'.$imageExtension;


                move_uploaded_file($tmpName,'img/'.$newImageName);
                $query = "INSERT INTO event_images VALUES('','$name','$newImageName','$ex_date','$date')";
                mysqli_query($conn,$query);
                echo "<script> 
                document.location.href='registration-successful.html';
                </script>
                	
                ";
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
        body{
            background-color:#d3d3d3;
        
        }
	.btn1{
        margin-top:30px;
		margin-left:20px;
        
	}
	
	.btn1:hover {
  background: 	#778899;
  color: lightgrey;
}
	
	form{
        margin-top:60px;
    }
	
	</style>
	<script>
	function goBack(){
		window.location.href = "dashboard.html";
	}
	
	</script>
	
	</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Sidebar Toggle-->
           
           <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.html">LVH Admin</a>
		   <!-- Navbar Search-->
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
      
           
           
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            
                        </ol>
						
						
						<form   action="" method="post" autocomplete="off" enctype="multipart/form-data">
   <div class="form-group" >
      <label for="title" class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
      <input class="form-control"  type="text" name="title" id="title" required value="">
        <span class="ageText" id="ageText" name="ageText"></span>
    </div>

    <div class="form-group">
      <label for="title" class="col-sm-2 col-form-label">Image</label>
      <div class="col-sm-10">
      <input class="form-control"  type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
        <span class="ageText" id="ageText" name="ageText"></span>
    </div>
    <div class="form-group">
      <label for="start" class="col-sm-2 col-form-label">Date posted:</label>
      <div class="col-sm-10">
      <input class="form-control"  type="date"    name="date_posted">
        <span class="ageText" id="ageText" name="ageText"></span>
    </div>

    <div class="form-group">
      <label for="expiry_date" class="col-sm-2 col-form-label">Expiry :</label>
      <div class="col-sm-10">
      <input class="form-control"  type="date"    name="expiry_date">
        <span class="ageText" id="ageText" name="ageText"></span>
    </div>
	



<div class="form-group">

<button type="submit" name="submit" class="btn1">Post</button>
<button type="button" name="back" class="btn1" onclick="goBack();">Back</button>
</div>


</form>
<br>
						
						   </div>
                 
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Limpopo Varsity Hackathon 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>