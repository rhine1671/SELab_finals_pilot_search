<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pilots Records</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>

	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: green; text-align: center; background-color: ghostwhite; border-style: solid;">	
			<?php echo $_SESSION['message']; ?>
		</h1>
	<?php } unset($_SESSION['message']); ?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
		<input type="text" name="searchInput" placeholder="Search here">
		<input type="submit" name="searchBtn">
	</form>

	<p><a href="index.php">Clear Search Query</a></p>
	<p><a href="insert.php">Insert New Pilot</a></p>

	<center><h1> StrikeWing Pilot Records</h1></center>
	<table style="width:100%; margin-top: 20px;">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Address</th>
			<th>Date of Birth</th>
			<th>Nationality</th>
			<th>Total Flight Hours</th>
			<th>Years of Experience</th>
			<th>License</th>
			<th>Aircraft Flown</th>
			<th>Type Rating</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>

		<?php if (!isset($_GET['searchBtn'])) { ?>
			<?php $getAllPilots = getAllPilots($pdo); ?>
				<?php foreach ($getAllPilots as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['date_of_birth']; ?></td>
						<td><?php echo $row['nationality']; ?></td>
						<td><?php echo $row['total_flight_hours']; ?></td>
						<td><?php echo $row['years_of_experience']; ?></td>
						<td><?php echo $row['license']; ?></td>
						<td><?php echo $row['aircraft_flown']; ?></td>
						<td><?php echo $row['type_rating']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
						</td>
					</tr>
			<?php } ?>
			
		<?php } else { ?>
			<?php $searchForAPilot =  searchForAPilot($pdo, $_GET['searchInput']); ?>
				<?php foreach ($searchForAPilot as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['date_of_birth']; ?></td>
						<td><?php echo $row['nationality']; ?></td>
						<td><?php echo $row['total_flight_hours']; ?></td>
						<td><?php echo $row['years_of_experience']; ?></td>
						<td><?php echo $row['license']; ?></td>
						<td><?php echo $row['aircraft_flown']; ?></td>
						<td><?php echo $row['type_rating']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
						</td>
					</tr>
				<?php } ?>
		<?php } ?>	
		
	</table>
</body>
</html>