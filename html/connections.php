<?php
	require_once '../php/dbClass.php'; //подключаем файл с классом подключения к БД
	$connect = new DBConnection(); //создаём экземпляр класса подключения к БД
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Administration panel</title>
	<!-- Your custom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  
</head>
		
<body class="grey lighten-2" id="medicine-body">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		 <div class="col-md-9">
		 	 <a class="navbar-brand" href="#">Administration panel</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		 </div>

		<div class="collapse navbar-collapse " id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item nav-link" href="employee.php">Employees</a>
		      <a class="nav-item nav-link" href="company.php">Company</a>
		      <a class="nav-item nav-link active" href="#">Connections</a>
		    </div>
		</div>
	</nav>

	<div class="shown-container">
		<div class="main-container container card mt-4 p-3">
			<div class="row">
				<div class="col-10">					
					<div  class="row p-2" >
						<div class="col-2 ml-2">ID employee</div>
						<div class="col-2 ml-2">ID company</div>
					</div>
				</div>
			</div>


			<?php
                  //$query = "SELECT pharmacy.* FROM pharmacy_medicine, pharmacy, medicine WHERE pharmacy_medicine.id_medicine = medicine.id_medicine AND pharmacy_medicine.id_pharmacy = pharmacy.id_pharmacy AND medicine.title IN ('Уголь') GROUP BY pharmacy.id_pharmacy"; //записываем запрос на выборку данных
			$query = "SELECT * FROM employee_company";
                  $queryResult = $connect->makeUnpreparedQuery($query); //выполняем запрос записываем ответ MySQL в $queryResult
                  $data = $connect->fetch($queryResult); //данные полученные из MySQL преабоазовываем в ассоциативный массив
                  for($i = 0, $count = sizeof($data); $i < $count; $i++) // выводим данные в виде строк HTML-таблицы 
                  {
                  	echo "
                  	<div class='row pt-3 input-container'>
						<div class='col-10'>
							<input class='item col-2 ml-2' type='text' data-type='i' name='id_employee' placeholder='Amount' value='{$data[$i]['id_employee']}'>
							<input class='item col-2 ml-2' type='text' data-type='i' name='id_company' placeholder='Rating' value='{$data[$i]['id_company']}'>
						</div>
					</div>
                  	";
                  }
                 ?>

		</div>
	</div>


   <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>