<?php 
	session_start();

	if (!$_SESSION) {
		header("location:index.php");
	}
 ?>
<!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Escritorio | VetControl</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>

	<link rel="icon" type="image/png" href="favicon.png"/>

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<header class="col-sm-12">
				<nav class="navbar justify-content-between">
					<a href="dashboard.php">
						<h1>VetControl <i class="fa fa-paw" aria-hidden="true"></i></h1>
					</a>
					<div class="form-inline">
						<a href="" class="btn btn-success"><?php echo "<i class='fa fa-user-o' aria-hidden='true'></i> ".$_SESSION['Nombres']." ".$_SESSION['Apellidos']; ?></a>
						<a href="dashboard-usuarios.php" class="btn btn-success">Usuarios</a>					
						<a href="php/close_session.php" class="btn btn-success">Salir</a>
					</div>
				</nav>
			</header>
			<div class="col-md-3">
				<nav class="navbar navbar-expand-lg">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent" aria-controls="navbarcontent" aria-expanded="false" aria-label="Toggle navigation">
	    				<i class="fa fa-bars text-center" aria-hidden="true"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarcontent">
						<div class="list-group">
							<a href="dashboard.php" class="list-group-item list-group-item-action active">
								<i class="fa fa-tachometer" aria-hidden="true"></i> Escritorio
							</a>
							<a href="dashboard-cliente.php" class="list-group-item list-group-item-action">
								<i class="fa fa-user-o" aria-hidden="true"></i> Clientes
							</a>
							<a href="dashboard-mascotas.php" class="list-group-item list-group-item-action">
								<i class="fa fa-paw" aria-hidden="true"></i> Mascotas
							</a>
							<a href="dashboard-consultas.php" class="list-group-item list-group-item-action">
								<i class="fa fa-stethoscope" aria-hidden="true"></i> Consultas
							</a>
							<a href="#" class="list-group-item list-group-item-action disabled">Vacunas</a>
							<a href="#" class="list-group-item list-group-item-action disabled">Pesos</a>
							<a href="php/close_session.php" class="list-group-item list-group-item-action">
								<i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar
							</a>
						</div>
					</div>
				</nav>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<h1>
							Bienvenido 
							<br> <?php echo $_SESSION['Nombres']." ".$_SESSION['Apellidos']; ?>
						</h1>
					</div>					
				</div>				
				<hr>
				
				<table class="table table-responsive" style="height: auto;">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Clientes</th>
							<th scope="col">Mascotas</th>
							<th scope="col">Consultas</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Cantidad de clientes:
							<strong>
							<?php 
								require_once("php/class/Vet.class.php");
								$client = new Client;
								$client = $client->select();
								
								$client = mysqli_num_rows($client);

								echo $client;


							 ?>
							 </strong>
							 </td>
							 <td>Cantidad de mascotas:
							<strong>
							<?php 
								require_once("php/class/Vet.class.php");
								$client = new Pet;
								$client = $client->select();
								
								$client = mysqli_num_rows($client);

								echo $client;


							 ?>
							 </strong>
							 </td>
							 <td>Cantidad de consultas:
							<strong>
							<?php 
								require_once("php/class/Vet.class.php");
								$client = new Consultation;
								$client = $client->select();
								
								$client = mysqli_num_rows($client);

								echo $client;


							 ?>
							 </strong>
							 </td>
						</tr>
					</tbody>
				</table>
				<div>
					<canvas id="myChart" style="width: 100%; height: 40vh;"></canvas>
					<script>
					var ctx = document.getElementById("myChart");
					var myChart = new Chart(ctx, {
					    type: 'line',
					    data: {
					        labels: [
					        	<?php 
					        		require_once('php/class/Vet.class.php');
					        		$canvas = new Consultation;
					        		$canvas = $canvas->selectCanvas();
					        		while ($row = mysqli_fetch_array($canvas)) {
					        			echo "'".$row[x]."',";					        	
					        		}
					        	 ?>
					        ],
					        datasets: [{
					            label: 'Consultas',
					            data: [
					            	<?php 
					        		require_once('php/class/Vet.class.php');
					        		$canvas = new Consultation;
					        		$canvas = $canvas->selectCanvas();
					        		while ($row = mysqli_fetch_array($canvas)) {
					        			echo "'".$row[y]."',";					        	
					        		}
					        	 	?>
					            ],
					            backgroundColor: [
					                'rgba(54,159,71,0.2)',
					            ],
					            borderColor: [
					                'rgba(54,159,71,1)',
					            ],
					            borderWidth: 1
					        	},								
					        ]
					    },
					    options: {
					    	title: {
					            display: true,
					            text: 'Datos por Mes',
								fontFamily:"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
					            fontSize: 16,
					            fontColor: '#369F47'
					        },
					        scales: {
					            yAxes: [{
					                ticks: {
					                    beginAtZero:true
					                }
					            }]
					        }				        
					    }
					});
					</script>
				</div>
			</div>
			<footer class="col-sm-12">
				<div class="row">
					<div class="col-md-8">
						<label>Sistema de Control Veterinario en versión Alpha</label>
					</div>
					<div class="col-md-4 text-right">
						<label>
							Dame una mano con el proyecto :D <a href="mailto:cpmarcoo@gmail.com">cpmarcoo@gmail.com</a>
						</label>
					</div>
				</div>				
			</footer>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/tether.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/ajax.js"></script>
	
</body>
</html>