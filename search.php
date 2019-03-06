<?php

/*
	Written by Supun Kavinda, Admin of Hyvor
	2018.05.06
    Edited by Habeeb Okunade, habeebcycle@gmail.com
    2019.03.06
*/


require_once ('./config/config.php');

$username = $_GET['username'];
$startFrom = $_GET['startFrom'];

// validate - https://developer.hyvor.com/php/input-validation-with-php
$username = trim(htmlspecialchars($username));
$startFrom = filter_var($startFrom, FILTER_VALIDATE_INT);

// make username search friendly
$like = '%' . strtolower($username) . '%'; // search for a the username, case-insensitive (see strtolower() here and MYSQL lower() function in the query)
// open new mysql prepared statement
$statement = $connection -> prepare('
	SELECT * FROM product
	WHERE lower(product_name) LIKE ?
	ORDER BY INSTR(product_name, ?), product_name
	LIMIT 100 OFFSET ?
');

if (
	// $mysqli -> prepare returns false on failure, stmt object on success
	$statement &&
	// bind_param returns false on failure, true on success
	$statement -> bind_param('ssi', $like, $username, $startFrom ) &&
	// execute returns false on failure, true on success
	$statement -> execute() &&
	// same happens in store_result
	$statement -> store_result() &&
	// same happens here
	$statement -> bind_result($pid, $cid, $pname, $quan, $price, $picture)
) {
	// I'm in! everything was successful.

	// new array to store data
	$array = [];


	while ($statement -> fetch()) {
		$array[] = [
			'name' => $pname,
			'picture' => $picture,
			'linkid' => $pid
		];
	}

	echo json_encode($array);
	exit();


}
