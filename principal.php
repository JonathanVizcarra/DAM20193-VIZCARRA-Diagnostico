<?php 
	session_start();

	if(isset($_SESSION["nombre"])){
		$usuario = $_SESSION["nombre"];
	}
	else{
		header("Location: index.html");
	}
?>

<html>

	<head>

		<title>Principal</title>

		<style type="text/css">
			input{
			   font-size: 30;
			   height: 50px;
			}
			form, h1{
				margin: 5%;
			}
			table {
			  border-collapse: collapse;
			}

			table, th, td {
			  border: 1px solid black;
			  padding: 15px;
			}
			tr:nth-child(odd) {
				background-color: #f2f2f2;
			}
			th {
			  background-color: #000000;
			  color: white;
			}
		</style>

	</head>
	<body>
		<center>
			<h1>Bienvenid@ <?php if(isset($_SESSION["nombre"])){ echo $usuario;}?></h1>

			<form method="post" action="principal.php">
					
				<input type="number" name="numero" required="action" value="1" size="5" style="width: 100px"/>
				<input type="submit" value="Mostrar" style="width: 150px"/>
			
			</form>

			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {

					include("validar_dato.php");
					
					$numero=validar_dato($_POST["numero"]);
					if ($numero != null){

						if (!$numero < 1) {

							echo "<table>
								<tr>
									<th>Numero</th>
									<th>Operación</th>
									<th>Resultado</th>
								</tr>";
							$operacion = "1";
							$resultado = 1;
							for ($i=1; $i <= $numero; $i++) { 
								echo '<tr><td style="text-align:center">'.$i.'</td>';
								$operacion = $operacion."*".$i;
								echo "<td> ".$operacion."</td>";
								$resultado = ($resultado*$i);
								echo '<td style="text-align:right">'.$resultado.'</td></tr>';
							}

							echo "</table>";

						}
					}
				}
			?>
		</center>
	</body>
</html>