<?php 
//
// підключаємо необхідні файли
require_once('settings.php');
require_once('functions.php');


if (isset($_POST['send_form'])) {
	// перевіряємо на спеціальні символи
	$phone_numb = empty_field($_POST['phone']);
	$contact_name = empty_field($_POST['name']);
	$order_name = empty_field($_POST['order_name']);
	$order_sum = empty_field($_POST['order_sum']);
	$order_tags = empty_field($_POST['order_tags']);
	$email = empty_field($_POST['email']);
	$discount = empty_field($_POST['discount']);
	$status = empty_field($_POST['status']);
	$color = empty_field($_POST['color']);
	$type = empty_field($_POST['type']);
	$sex = empty_field($_POST['sex']);

	// перевіряємо на правильність вмісту
	// в імені не має бути чисел і т.д.
	$contact_name = validation_text($_POST['contact_name']);
	$status = validation_text($_POST['status']);
	$type = validation_text($_POST['type']);

    // // підключення до бази та дії з базою
    $abc = sqlsrv_connect($serverName, $connectionOptions);

    $query = "
    INSERT INTO [dbo].[orders]
            ([phone_numb]
            ,[contact_name]
            ,[order_name]
            ,[order_sum]
            ,[order_tags]
            ,[email]
            ,[discount]
            ,[order_status]
            ,[color]
            ,[order_type]
            ,[sex])
        VALUES
            ('$phone_numb'
            ,'$contact_name'
            ,'$order_name'
            ,'$order_sum'
            ,'$order_tags'
            ,'$email'
            ,'$discount'
            ,'$status'
            ,'$color'
            ,'$type'
            ,'$sex')";
    sqlsrv_query($abc, $query);

    // Закриваємо з'єднання
    sqlsrv_free_stmt($abc);
}

// Щоб у віждет надсилалась форма, 
// необхідно, щоб були поля
// phone
// name

// Поля для AmoCRM
// lirax_pipeline_status_id
// integration
// lirax_deal_name
// lirax_deal_sum
// lirax_deal_task
// lirax_deal_tag
// lirax_contact_task
// lirax_contact_tag

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WZVKL3X');</script>
    <!-- End Google Tag Manager -->


	<title>Форма</title>
	<meta charset="utf-8">

	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Мої стилі -->
    <link rel="stylesheet" type="text/css" href="style_amocrm.css">
    

    

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113694205-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-113694205-1');
    </script>

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZVKL3X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="ct-phone field-ct">+380635415912</div>
<div class="ct-phone-1 field-ct">+380979658667</div>
<div class="conteiner">
    <div class="row">
    <button type="submit" class="waves-effect waves-light btn lirax-make-call">Make Call</button>
        <form class="col s12 lirax-custom-callback-form">
            <div class="row">
                <div class="input-field col s12">
                <input id="phone" type="tel" name="phone" class="validate" value="">
                <label for="phone">Phone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                        <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">send</i>Callback</button>
                </div>
                <div class="input-field col s12">
                    <a href="#" class="button lirax-custom-callback-form">Book</a>
                </div>
            </div>
        </form>
        <form class="lirax-custom-form" method="POST" action="index.php">
            <div class="input-field col s8">
                <input type="number" id="phone" name="phone" class="validate">
                <label for="phone_numb">Телефон</label>
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="send_form">Заказать
                <i class="material-icons right">send</i>
            </button>

            <div class="input-field col s8">
                <input type="text" id="name" name="name" class="validate">
                <label for="contact_name">Имя контакта</label>
            </div>

            <!-- <div class="input-field col s8">
                <input type="text" id="ct-phone" name="ct-phone" class="validate">
                <label for="contact_name">Контактный номер</label>
            </div>

            <div class="input-field col s8">
                <input type="text" id="ct-phone" name="ct-phone-1" class="validate">
                <label for="contact_name">Контактный номер 1</label>
            </div> -->


            <div class="input-field col s8">
                <input type="text" id="order_name" name="order_name" class="validate">
                <label for="order_name">Название сделки</label>
            </div>

            <div class="input-field col s8">
                <input type="number" id="order_sum" name="order_sum" class="validate">
                <label for="order_sum">Сумма сделки</label>
            </div>
            
            <div class="input-field col s8">
                <input type="text" id="order_tags" name="order_tags" class="validate">
                <label for="order_tags">Теги сделки</label>
            </div>

            <div class="input-field col s8">
                <input type="email" id="email" name="email" class="validate">
                <label for="email">Email контакта</label>
            </div>

            <div class="input-field col s8">
                <input type="text" id="discount" name="discount" class="validate">
                <label for="discount">Скидка</label>
            </div>

            <div class="input-field col s8">
                <input type="text" id="status" name="status" class="validate">
                <label for="status">Состояние</label>
            </div>

            <div class="input-field col s8">
                <select id="color" name="color" class="validate">
                    <option value="1">Черный</option>
                    <option value="2">Синий</option>
                    <option value="3">Красный</option>
                </select>
                <label for="color">Цвет</label>
            </div>

            <div class="input-field col s8">
                <input type="text" id="type" name="type" class="validate">
                <label for="type">Тип</label>
            </div>

            <div class="input-field col s8">
                <select name="sex">
                    <option value="1" cheked>Мужчина</option>
                    <option value="2">Женщина</option>
                    <option value="3">Не знаю</option>
                </select>
                <label>Пол</label>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script type="text/javascript" src="script_amocrm.js"></script>

</body>
</html>

