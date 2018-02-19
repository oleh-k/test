<?php 
// створюємо набір рандомних символів
// від 10 до 20 символів
$all = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
// $all = 'абвгґдеєжзиіїйклмнопрстуфхцчшщьюяАБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ';
$arr_all = str_split($all);
// отримуємо рандомне число від 10 до 20
$arr_numb_all = [];
for ($i=10; $i < 20; $i++) { 
    $arr_numb_all[] = $i;
}
$key_rand_numb = array_rand($arr_numb_all, 1);
$rand_numb = $arr_numb_all[$key_rand_numb];
// отримуємо масив рандомних символів
$arr_rand_char = array_rand($arr_all, $rand_numb);
// склеюємо масив у рядок рандомних символів
foreach ($arr_rand_char as $key => $value) {
    $str_rand_chars .= $arr_all[$value]; 
}
echo '<br>str_rand_chars: ' . $str_rand_chars;
// перемішуємо рандомно обрані символи
$arr_rand_chars = str_split($str_rand_chars);
shuffle($arr_rand_chars);
$str_rand_chars = implode($arr_rand_chars);
echo ' => ' . $str_rand_chars;