<?php require_once("inc_koneksi.php") ?>
<?php //require_once("inc_function.php") ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<!-- JQ -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	
	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin= "anonymous"></script>

	<!-- INCLUDE SUMMERNOTE CSS/JS -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

	<!-- INCLUDE PLUGIN MELIHAT ISIAN GMABAR DI SUMMERNOTE-->
	<link href="../css/summernote-image-list.min.css">
	<script src="../js/summernote-image-list.min.js"></script>

	<!-- FONTAWESOME -->
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

	<style>
		.image-list-content .col-lg-3{
			width: 100%;
		}

		.image-list-content img{
			float: left;
			width: 20%;
		}

		.image-list-content p{
			float: left;
			padding-left: 20px;
		}

		.image-list-item{
			padding: 10px 0px 10px 0px;
		}
	</style>

</head>
<body class="navigasi">

	<header>
		<!-- navigasi -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
			    <a class="navbar-brand" href="#">#</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			     	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				        <li class="nav-item">
				         	<a class="nav-link active" aria-current="page" href="rental.php">Kembali</a>
				        </li>
                        <li class="nav-item">
				         	<a class="nav-link active" aria-current="page" href="input_rental.php">Input</a>
				        </li>
                        <a class="nav-link float-end">
                            <?php
                                //if(isset ($_SESSION["formrental"])){
                                    //echo "&nbsp&nbsp&nbsp&nbsp&//nbspSelamat Datang, ";
                                    //echo $_SESSION['adminuser'];
							    //}
							?>
						</a>
			     	</ul>
			    	<!-- <form class="d-flex">
			    		<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			        	<button class="btn btn-outline-success" type="submit">Search</button>
			      	</form> -->
			    </div>
			</div>
		</nav>
	</header>

	<main>