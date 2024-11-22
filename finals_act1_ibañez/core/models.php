<?php  

require_once 'dbConfig.php';

function getAllPilots($pdo) {
	$sql = "SELECT * FROM search_pilots_data 
			ORDER BY first_name ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getPilotByID($pdo, $id) {
	$sql = "SELECT * from search_pilots_data WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function searchForAPilot($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM search_pilots_data WHERE 
			CONCAT(first_name,last_name,email,gender,
				address,date_of_birth,nationality,total_flight_hours,date_added) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}



function insertNewPilot($pdo, $first_name, $last_name, $email, 
	$gender, $address, $date_of_birth, $nationality, $total_flight_hours, $years_of_experience, $license, $aircraft_flown, $type_rating) {

	$sql = "INSERT INTO search_pilots_data 
			(
				first_name,
				last_name,
				email,
				gender,
				address,
				date_of_birth,
				nationality,
				total_flight_hours,
				years_of_experience,
				license,
				aircraft_flown,
				type_rating	
			)
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([
		$first_name, $last_name, $email, 
		$gender, $address, $date_of_birth, 
		$nationality, $total_flight_hours, $years_of_experience, $license, $aircraft_flown, $type_rating,
	]);

	if ($executeQuery) {
		return true;
	}

}

function editPilot($pdo, $first_name, $last_name, $email, $gender, 
	$address, $date_of_birth, $nationality, $total_flight_hours, $years_of_experience, $license, $aircraft_flown, $type_rating, $id) {

	$sql = "UPDATE search_Pilots_data
				SET first_name = ?,
					last_name = ?,
					email = ?,
					gender = ?,
					address = ?,
					date_of_birth = ?,
					nationality = ?,
					total_flight_hours = ?,
					years_of_experience = ?,
					license = ?,
					aircraft_flown = ?,
					type_rating = ?
				WHERE id = ? 
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, 
		$address, $date_of_birth, $nationality, $total_flight_hours, $years_of_experience, $license, $aircraft_flown, $type_rating, $id]);

	if ($executeQuery) {
		return true;
	}

}


function deletePilot($pdo, $id) {
	$sql = "DELETE FROM search_pilots_data 
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return true;
	}
}




?>