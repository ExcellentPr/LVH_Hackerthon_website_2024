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
     
    
    
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.html">LVH Admin</a>
		   <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">

                </div>
            </form>
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
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard </a>
							
							<a class="nav-link" href="post.html">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus-square"></i></div>
                               Posters
                            </a>
							<a class="nav-link" target="_blank" href="download/dashboard.html">
                                <div class="sb-nav-link-icon"><i class="fa fa-cloud-download"></i></div>
                               Download pdf
                            </a>
                            <a class="nav-link" target="_blank" href="download/dashboard.html">
                                <div class="sb-nav-link-icon"><i class="fa fa-download"></i></div>
                               Download CSV
                            </a>
                        </div>
						
                    </div>
                    <div class="sb-sidenav-footer">s
                        <div class="small">Logged in as:</div>
                        Administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
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
                        
                            
           <form action="display.php" method="POST" >
		<select class="institution" id="institution" name="institution" >
		<option value="null"  >Select institution</option>
		<option value="Tshwane University Of Technology">Tshwane University Of Technology</option>
		<option value="University Of Limpopo">University Of Limpopo</option>
		<option value="University Of Venda">University Of Venda</option>
		</select>
   

		 <select class ="gender" id="gender" name="gender" >
	     <option value="null"  > select gender</option>
         <option value="female">Female</option>
         <option value="male">Male</option>
           
           </select>
		   <button type="submit" onclick="check();" >filter</button>
		   </form>
		   
		   
                            
                        </div>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                LVH Participants
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <tr>
<th>Name</th>
<th>Surname</th>
<th>Age</th>
<th>Gender</th>
<th>Institution</th>
<th>Student Number</th>
<th>Phone Number</th>
<th>Department</th>
<th>ID Number</th>
<th>Level</th>
<th>Role</th>
<th>Email</th>
</tr>
								<?php include "findAll.php";?>
                                 </table>
								 
								 
								 
                            </div>
							<?php
                            include "connect.php"; 
				
								$sql1  = "SELECT count(student_number) from registration";
							$sql2 = "SELECT count(student_number) from registration where  institution = 'Tshwane University Of Technology' ";
                        $sql3 = "SELECT count(student_number) from registration where  institution = 'University Of Limpopo'";
                        $sql4 = "SELECT count(student_number) from registration where  institution = 'University Of Venda'";
                    $sql5 = "SELECT count(student_number) from registration where  gender = 'male'";
                    $sql6 = "SELECT count(student_number) from registration where   gender = 'female'";


							
	//student registered 	
$result1 = mysqli_query($conn,$sql1);
if($result1->num_rows>0)
{
while($row = $result1->fetch_assoc()){
	echo "<br> ";
echo "   <p style='color:#2B2121;'> Total students registered at ". $row["count(student_number)"]."</p>";

}

}	

	//student registered at Tshwane University Of Technology	
    $result2 = mysqli_query($conn,$sql2);
    if($result1->num_rows>0)
    {
    while($row = $result2->fetch_assoc()){
        echo "<br> ";
    echo "   <p style='color:#2B2121;'> Total students registered at Tshwane University Of Technology :". $row["count(student_number)"]."</p>";
    
    }
    
    }	
    
    //student registered at University Of Limpopo	
    $result3 = mysqli_query($conn,$sql3);
    if($result1->num_rows>0)
    {
    while($row = $result3->fetch_assoc()){
        echo "<br> ";
    echo "   <p style='color:#2B2121;'> Total students registered at University Of Limpopo : ". $row["count(student_number)"]."</p>";
    
    }
    
    }


     //student registered at University Of Venda	
     $result4 = mysqli_query($conn,$sql4);
     if($result4->num_rows>0)
     {
     while($row = $result4->fetch_assoc()){
         echo "<br> ";
     echo "   <p style='color:#2B2121;'> Total students registered at University Of Venda : ". $row["count(student_number)"]."</p>";
     
     }
     
     }
								 
		 //student males registered 	
         $result5 = mysqli_query($conn,$sql5);
         if($result5->num_rows>0)
         {
         while($row = $result5->fetch_assoc()){
             echo "<br> ";
         echo "   <p style='color:#2B2121;'> Total Males registered : ". $row["count(student_number)"]."</p>";
         
         }
         
         }	
         //student females registered 
         $result6 = mysqli_query($conn,$sql6);
         if($result6->num_rows>0)
         {
         while($row = $result6->fetch_assoc()){
             echo "<br> ";
         echo "   <p style='color:#2B2121;'> Total Females registered : ". $row["count(student_number)"]."</p>";
         
         }
         
         }					 
								 
								?>
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
