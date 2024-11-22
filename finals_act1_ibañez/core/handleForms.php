<?php  

require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_POST['insertPilotBtn'])) {
	$insertPilot = insertNewPilot($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['gender'], $_POST['address'], $_POST['date_of_birth'], $_POST['nationality'], $_POST['total_flight_hours'], 
	$_POST['years_of_experience'], $_POST['license'], $_POST['aircraft_flown'], $_POST['type_rating'], $_POST['date_added']);

	if ($insertPilot) {
		$_SESSION['message'] = "Successfully inserted!";
		header("Location: ../index.php");
	}
}


if (isset($_POST['editPilotBtn'])) {
	$editPilot = editPilot($pdo,$_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['gender'], $_POST['address'], $_POST['date_of_birth'], $_POST['nationality'], $_POST['total_flight_hours'],
	$_POST['years_of_experience'], $_POST['license'], $_POST['aircraft_flown'], $_POST['type_rating'], $_POST['date_added'], $_GET['id']);

	if ($editPilot) {
		$_SESSION['message'] = "Successfully edited!";
		header("Location: ../index.php");
	}
}

if (isset($_POST['deletePilotBtn'])) {
	$deletePilot = deletePilot($pdo,$_GET['id']);

	if ($deletePilot) {
		$_SESSION['message'] = "Successfully deleted!";
		header("Location: ../index.php");
	}
}

if (isset($_GET['searchBtn'])) {
	$searchForAPilot = searchForAPilot($pdo, $_GET['searchInput']);
	foreach ($searchForAPilot as $row) {
		echo "<tr> 
				<td>{$row['id']}</td>
				<td>{$row['first_name']}</td>
				<td>{$row['last_name']}</td>
				<td>{$row['email']}</td>
				<td>{$row['gender']}</td>
				<td>{$row['address']}</td>
				<td>{$row['date_of_birth']}</td>
				<td>{$row['nationality']}</td>
				<td>{$row['total_flight_hours']}</td>
				<td>{$row['years_of_experience']}</td>
				<td>{$row['license']}</td>
				<td>{$row['aircraft_flown']}</td>
				<td>{$row['type_rating']}</td>
				<td>{$row['date_added']}</td>
			  </tr>";
	}
}

?>