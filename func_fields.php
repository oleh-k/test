<?php
// $all = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
// $all = 'абвгґдеєжзиіїйклмнопрстуфхцчшщьюяАБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ';

//////////////////////////////////////////////////////////////
// ім'я
function generate_first_name() {
    /////////////////////////////////
    // перша літера
    $all = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $arr_all = str_split($all);
    // отримуємо масив рандомних символів
    $Key_rand_char = array_rand($arr_all, 1);
    $First_char = $arr_all[$Key_rand_char];

    ///////////////////////////////////////////
    // інші літери імені
    $all = 'abcdefghijklmnopqrstuvwxyz';
    $arr_all = str_split($all);
    // отримуємо рандомне число від 3 до 8
    $arr_numb_all = [];
    for ($i=3; $i < 8; $i++) { 
        $arr_numb_all[] = $i;
    }
    $key_rand_numb = array_rand($arr_numb_all, 1);
    $rand_numb = $arr_numb_all[$key_rand_numb];
    // отримуємо масив рандомних символів
    $arr_keys_rand_char = array_rand($arr_all, $rand_numb);
    // склеюємо масив у рядок рандомних символів
    foreach ($arr_keys_rand_char as $key => $value) {
        $str_rand_chars .= $arr_all[$value]; 
    }
    // перемішуємо рандомно обрані символи
    $arr_rand_chars = str_split($str_rand_chars);
    shuffle($arr_rand_chars);
    $small_chars = implode($arr_rand_chars);

    $firstname = $First_char . $small_chars;
    // echo '<br> inside func: ' . $firstname;
    return $firstname;
}

function generate_surname() {
    /////////////////////////////////
    // перша літера
    $all = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $arr_all = str_split($all);
    // отримуємо масив рандомних символів
    $Key_rand_char = array_rand($arr_all, 1);
    $First_char = $arr_all[$Key_rand_char];

    ///////////////////////////////////////////
    // інші літери прізвиша
    $all = 'abcdefghijklmnopqrstuvwxyz';
    $arr_all = str_split($all);
    // отримуємо рандомне число від 3 до 15
    $arr_numb_all = [];
    for ($i=3; $i < 15; $i++) { 
        $arr_numb_all[] = $i;
    }
    $key_rand_numb = array_rand($arr_numb_all, 1);
    $rand_numb = $arr_numb_all[$key_rand_numb];
    // отримуємо масив рандомних символів
    $arr_keys_rand_char = array_rand($arr_all, $rand_numb);
    // склеюємо масив у рядок рандомних символів
    foreach ($arr_keys_rand_char as $key => $value) {
        $str_rand_chars .= $arr_all[$value]; 
    }
    // перемішуємо рандомно обрані символи
    $arr_rand_chars = str_split($str_rand_chars);
    shuffle($arr_rand_chars);
    $small_chars = implode($arr_rand_chars);

    $surname = $First_char . $small_chars;
    // echo '<br> inside func: ' . $surname;
    return $surname;
}

function generate_text() {
    // отримуємо рандомне число від 10 до 30
    $arr_numb_all = [];
    for ($i=10; $i < 30; $i++) { 
        $arr_numb_all[] = $i;
    }
    $key_rand_numb = array_rand($arr_numb_all, 1);
    $rand_numb = $arr_numb_all[$key_rand_numb];

    for ($i=0; $i < $rand_numb; $i++) { 
        
        $all = 'abcdefghijklmnopqrstuvwxyz';
        $arr_all = str_split($all);
        // отримуємо рандомне число від 3 до 15
        $arr_numb_all2 = [];
        for ($j=3; $j < 15; $j++) { 
            $arr_numb_all2[] = $j;
        }
        $key_rand_numb = array_rand($arr_numb_all2, 1);
        $rand_numb2 = $arr_numb_all2[$key_rand_numb];
        // отримуємо масив рандомних символів
        $arr_keys_rand_char = array_rand($arr_all, $rand_numb2);
        // склеюємо масив у рядок рандомних символів
        $str_rand_chars = '';
        foreach ($arr_keys_rand_char as $key => $value) {
            $str_rand_chars .= $arr_all[$value]; 
        }
        // перемішуємо рандомно обрані символи
        $arr_rand_chars = str_split($str_rand_chars);
        shuffle($arr_rand_chars);
        $str_rand_chars = implode($arr_rand_chars);

        $rand_text .= ' ' . $str_rand_chars;
        

    }
    return $rand_text;
}

function get_arr_rand_users_id($serverName, $connectionOptions) {
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    $data = sqlsrv_query($conn, "SELECT id  FROM users");
    $arr_users_id = [];
    while ($row = sqlsrv_fetch_object($data)) {
        $arr_users_id[] = $row->id;
    }
    sqlsrv_free_stmt($conn);

    shuffle($arr_users_id);
    // echo 'arr_users_id: ' . $arr_users_id;

    return $arr_users_id;
}


function get_arr_rand_contracts_id($serverName, $connectionOptions) {
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    $data = sqlsrv_query($conn, "SELECT id  FROM contracts");
    $arr_contracts_id = [];
    while ($row = sqlsrv_fetch_object($data)) {
        $arr_contracts_id[] = $row->id;
    }
    sqlsrv_free_stmt($conn);

    shuffle($arr_contracts_id);

    return $arr_contracts_id;
}

function get_count($serverName, $connectionOptions, $target) {
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    $data = sqlsrv_fetch_object(sqlsrv_query($conn, "SELECT COUNT(id) AS count  FROM " . $target));
    return $data->count;
}

// $all = 'abcdefghijklmnopqrstuvwxyz';
// $arr_all = str_split($all);
// // отримуємо рандомне число від 10 до 20
// $arr_numb_all = [];
// for ($i=4; $i < 12; $i++) { 
//     $arr_numb_all[] = $i;
// }
// $key_rand_numb = array_rand($arr_numb_all, 1);
// $rand_numb = $arr_numb_all[$key_rand_numb];
// // отримуємо масив рандомних символів
// $arr_rand_char = array_rand($arr_all, $rand_numb);
// // склеюємо масив у рядок рандомних символів
// foreach ($arr_rand_char as $key => $value) {
//     $str_rand_chars .= $arr_all[$value]; 
// }
// echo '<br>str_rand_chars: ' . $str_rand_chars;
// // перемішуємо рандомно обрані символи
// $arr_rand_chars = str_split($str_rand_chars);
// shuffle($arr_rand_chars);
// $str_rand_chars = implode($arr_rand_chars);
// echo ' => ' . $str_rand_chars;