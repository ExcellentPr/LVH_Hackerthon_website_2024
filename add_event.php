
<?php
require 'connection.php';
if(isset($_POST["submit"])){
    $name =$_POST["title"];
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
                $query = "INSERT INTO event_images VALUES('','$name','$newImageName')";
                mysqli_query($conn,$query);
                echo "<script> alert('Added successfully');
                document.location.href='post.html';
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
	.btn{
	width: 14%;
	border-color: #392727;
	margin-left:10px;
	}
	.btn:hover {
  background: #392727;
  color: white;
}
.content{
	margin:auto;
	left:50%;
	width:50%;
}
	</style>
	
	</head>
    <body class="sb-nav-fixed">
	<script >
function goToPoster()
{
	window.location.href = "post.html";
}
</script>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.html">LVH Admin</a>
            <!-- Sidebar Toggle-->
           
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                  
                   
                        <a class="navbar-brand ps-3" href="dashboard.htmll">Exit </a>
                    
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
           
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                       
						
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       
                    </div>
                </nav>
            </div>
			
            <div id="layoutSidenav_content">
                <main>
				
                    <div class="container-fluid px-4">
					<div class="content">
                        <h1 class="mt-4">Add Events</h1>
                        <ol class="breadcrumb mb-4">
                            
                        </ol>
                        <div class="row">
                           <!--- <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> TUT Students</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>-->
                        
                            
                        </div>
                       
                        <div class="card mb-4">
                        
                         
			<form action="" method="POST" autocomplete="off" enctype="multipart/form-data"  role="form" class="php-email-form">
              <div class="row gy-4">
                <div class="col-lg-6 form-group">
				<label for="title"></label>
                  <input type="text" name="title" class="form-control" id="name" placeholder="Title" required>
                </div>
               
             
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
           
              <div class="form-group">
			  <label for="start">Date posted:</label>

				<input type="date"    name="date_posted">
				 </div>
				 
              <div class="form-group">
			  <label for="start">Expiry Date:</label>

				<input type="date"   name="expiry_date">
			   </div>
			
			   
			<div class="form-group">
			  <input type="submit" value="Post" class="btn"/>
        
            
			   </div>
            </form>
                        </div>
                    </div>
					</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>



        <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-storage.js"></script>
        <script src="firefunctions.js"></script>
    </body>
</html>
