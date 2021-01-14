<?php

require_once ("../crud1/component.php");
require_once ("../crud1/operation.php");

?>

<!doctype html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Companey</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

 </head>

 <body>

	<main>
		<div class="d-flex justify-content-center">
			<form action="" method="post" class="w-50">

<!--text boxes-->
				<div class="py-2">
					<?php 
						inputElement("Employee ID :","ID","Employee_ID","");
					?>
				</div>

				<div class="pt-2">
					<?php 
						inputElement("First Name :","Enter your First Name","First_Name","");
					?>
				</div>

				<div class="pt-2">
					<?php 
						inputElement("Last Name :","Enter your Last Name","Last_Name","");
					?>
				</div>

				<div class="pt-2">
					<?php 
						inputElement("Dept. No. :","Department number","Dept_No","");
					?>
				</div>


		<!--buttons-->


				<div class="d-flex justify-content-center">
					<?php 
						buttonElement("btn-Add_Employee","btn btn-success","Add Employee","Add_Employee","")
					?>

					<?php 
						buttonElement("btn-Read_Record","btn btn-primary","Read Record","Read_Record","")
					?>

					<?php 
						buttonElement("btn-Edit_Employee","btn btn-primary","Edit Employee","Edit_Employee","")
					?>

					<?php 
						buttonElement("btn-Delete_Employee","btn btn-danger","Delete Employee","Delete_Employee","")
					?>
					<?php 
						deleteBtn();
					?>
				</div>
			</form>
		</div>

		<!--bootstrap table-->

		<div class="d-flex table-data">
			<table class="table table-striped table-dark">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Department</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>

				<tbody id="tbody">
					<?php
					      if(isset($_POST['Read_Record'])){
                       			      $result = getData();

                       				if($result){

                           				while ($row = mysqli_fetch_assoc($result)){ ?>

							       <tr>
								   <td><?php echo $row['ID']; ?></td>
								   <td><?php echo $row['First_Name']; ?></td>
								   <td><?php echo $row['Last_Name']; ?></td>
								   <td><?php echo $row['Dept_No']; ?></td>
								   <td><a href="/" class="btn btn-primary">edit</a></td>
						                   <td><a href="/" class="btn btn-danger">delete</a></td>
							       </tr>

						   <?php
							   }

						       }
						   }
 
					?>
				</tbody>
			</table>
	</main>
    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 

 </body>

</html>
