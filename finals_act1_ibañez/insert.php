<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Insert New Pilot</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="last_name">
		</p>
		<p>
			<label for="firstName">Email</label> 
			<input type="text" name="email">
		</p>
		<p>
			<label for="firstName">Gender</label> 
			<input type="text" name="gender">
		</p>
		<p>
			<label for="firstName">Address</label> 
			<input type="text" name="address">
		</p>
		<p>
			<label for="firstName">Date of Birth</label> 
			<input type="date" name="date_of_birth">
		</p>
		<p>
			<label for="firstName">Nationality</label> 
			<input type="text" name="nationality">
		</p>
		<p>
			<label for="firstName">Total Flight Hours</label> 
			<input type="text" name="total_flight_hours">
		</p>
		<p>
			<label for="firstName">Years of Experience</label> 
			<input type="text" name="years_of_experience">
		</p>
		<p>
			<label for="firstName">License</label> 
			<input type="text" name="license">
		</p>
		<p>
			<label for="firstName">Aircraft Flown</label> 
			<input type="text" name="aircraft_flown">
		</p>
		<p>
			<label for="firstName">Type Rating</label> 
			<input type="text" name="type_rating">
			<input type="submit" name="insertPilotBtn">
		</p>
	</form>
</body>
</html>