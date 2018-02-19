<?php 
// перевіряє, чи порожнє поле
function empty_field($val) {
	if(empty($val)) {
		echo 'Всі поля повинні бути заповнені';
		exit();
	} else {
		$val = validation_str($val);
		return $val;
	}
}

// перевіряє на спец символи
function validation_str($val) {
	// щоб не було не хороших символів
	$sumbols = array("<", ">", "/", "?", "_", "*", "#", "$", "^");
	foreach ($sumbols as $key => $sumbol) {
		$find_sp_chars = stristr($val, $sumbol);
		if ($find_sp_chars !== false) {
			// echo 'Не можна використовувати спеціальні символи.';
			echo 'don\'t use special chars';
			exit();
		}
	}
	
	if ($find_sp_chars == false) {
		$val = htmlspecialchars($val);
	}

	return $val;
}

// перевіряє на вміст чилес у текстовому полі
function validation_text($val) {

	$sumbols = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-", "=", "+");

	foreach ($sumbols as $key => $sumbol) {
		$find_sp_chars = stristr($val, $sumbol);
		if ($find_sp_chars !== false) {
			// echo 'Не можна використовувати спеціальні символи.';
			echo 'don\'t use special chars. like 1231232';
			exit();
		}
	}
	
	return $val;
}