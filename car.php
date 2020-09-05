<?php
function getListOfCar() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$sqlStr = "select * from car";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchCarByPlateNumber() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumberToSearch = $_POST["searchValue"];
	$sqlStr = "select * from car where plateNUmber like '%".$plateNumberToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchCarByName() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$nameToSearch = $_POST["searchValue"];
	$sqlStr = "select * from car where carName like '%".$nameToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchCarByBrand() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$brandToSearch = $_POST["searchValue"];
	$sqlStr = "select * from car where brand like '%".$brandToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchCarByColour() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$colourToSearch = $_POST["searchValue"];
	$sqlStr = "select * from car where colour like '".$colourToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchCarByYear() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$yearToSearch = $_POST["searchValue"];
	$sqlStr = "select * from car where year like '".$yearToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function deleteCar() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumber = $_POST['plateNumberToDelete'];
	$sqlStr = "delete from car where plateNumber = '".$plateNumber."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	echo "<script>;
	alert('Car deleted successfully');
	window.location.href='adminCarList.php';
	</script>";
}

function getCarInformation() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumberToUpdate = $_POST["plateNumberToUpdate"];
	$sqlStr = "select * from car where plateNumber = '".$plateNumberToUpdate."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function updateCar() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumber = $_POST['plateNumber'];
	$carName = $_POST['carName'];
	$brand = $_POST['brand'];
	$colour = $_POST['colour'];
	$year = $_POST['year'];
	$sqlStr = 'update car set carName = "'.$carName.'", brand = "'.$brand.'", colour = "'.$colour.'", year = "'.$year.'" where plateNumber = "'.$plateNumber.'"';
	mysqli_query($con, $sqlStr);
	echo "<script>;
	alert('Car information updated successfully');
	window.location.href='adminCarList.php';
	</script>";
}

function addCar() {
	$plateNumber = $_POST["plateNumber"];
	$carName = $_POST["carName"];
	$brand = $_POST["brand"];
	$colour = $_POST["colour"];
	$year = $_POST["year"];

	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	else {
		$sqlStr = "insert into car
		(plateNumber, carName, brand, colour, year) 
		values 
		('$plateNumber', '$carName', '$brand', '$colour', '$year')";
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		echo "<script>;
		alert('Car added successfully');
		window.location.href='adminCarList.php';
		</script>";
    }
}
?>