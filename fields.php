<?php 
require_once('settings.php');
require_once('func_fields.php');




if (isset($_POST['create_users'])) {
    $count = 0;
    for ($i=0; $i < 200; $i++) { 
            
        $firstname = trim(generate_first_name());
        $surname = trim(generate_surname());
        // echo 'firstname :' . $firstname;
        // echo 'surname :' . $surname;

        $conn = sqlsrv_connect($serverName, $connectionOptions);

        sqlsrv_query($conn, "INSERT INTO [dbo].[users](firstname ,surname)  VALUES ('$firstname', '$surname')");
        $count = $count + 1;
    }
    sqlsrv_free_stmt($conn);
    echo 'Кількість створених користувачів: ' . $count;
}

if (isset($_POST['create_contracts'])) {
    $count = 0;
    for ($i=0; $i < 5; $i++) { 
        $arr_users_id = get_arr_rand_users_id($serverName, $connectionOptions);
        // echo 'arr_users_id: ' . $arr_users_id[0];
    
        // $rand_text = trim(generate_text());
        // echo '<br>rand_text: ' . $rand_text;

        $conn = sqlsrv_connect($serverName, $connectionOptions);

        foreach ($arr_users_id as $key => $value) {
            // echo '<br>key: ';
            // var_dump($key);
            // echo '<br>value: ' . $value->id;
            // var_dump($value);
            
            $rand_text = trim(generate_text());
            // echo '<br>rand_text: ' . $rand_text;
            $query = "INSERT INTO [dbo].[contracts]
                                ([id_user]
                                ,[body])
                        VALUES
                                ('$value'
                                ,'$rand_text')";
            sqlsrv_query($conn, $query);
            $count = $count + 1;
            if ($count == 15000) {
                break;
            }
        }
    }
    sqlsrv_free_stmt($conn);
    echo 'Кількість створених контрактів: ' . $count;
}


if (isset($_POST['create_payments'])) {
    $count = 0;
    $arr_contracts_id = get_arr_rand_contracts_id($serverName, $connectionOptions);
    // створюємо випадкові суми для оплат
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    foreach ($arr_contracts_id as $key => $contract_id) {
        $arr_numb_all = [];
        for ($i=1000; $i < 50000; $i++) { 
            $arr_numb_all[] = $i;
        }
        $key_rand_numb = array_rand($arr_numb_all, 1);
        $rand_sum_payment = $arr_numb_all[$key_rand_numb];
        
        $query = "INSERT INTO [dbo].[payments]
                            ([id_contract]
                            ,[paid])
                    VALUES
                            ('$contract_id'
                            ,'$rand_sum_payment')";
        sqlsrv_query($conn, $query);
        $count = $count + 1;
        if ($count == 10000) {
            break;
        }
    }
    sqlsrv_free_stmt($conn);
    echo 'Кількість створених оплат: ' . $count;
}

///////////////////////////////////////////////// get_count
if (isset($_POST['count_users'])) {
    echo 'Кількість користувачів: ' . get_count($serverName, $connectionOptions, 'users');
} elseif (isset($_POST['count_contracts'])) {
    echo 'Кількість договорів: ' . get_count($serverName, $connectionOptions, 'contracts');
} elseif (isset($_POST['count_payments'])) {
    echo 'Кількість оплат: ' . get_count($serverName, $connectionOptions, 'payments');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create and count</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
    <style>
        input {
            left: 120px;
            position: absolute;
        }
    </style>
</head>
<body>



    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <br><br>
        <input type="submit" name="create_users" value="Створити користувача"/>
        <br><br>
        <br><br>
        <input type="submit" name="create_contracts" value="Створити договір"/>
        <br><br>
        <br><br>
        <input type="submit" name="create_payments" value="Створити оплату"/>
        <br><br>
        <hr>
        <br><br>
        <input type="submit" name="count_users" value="Кількість користувачів"/>
        <br><br>
        <input type="submit" name="count_contracts" value="Кількість договорів"/>
        <br><br>
        <input type="submit" name="count_payments" value="Кількість оплат"/>
        <br><br>
    </form>
</body>
</html>