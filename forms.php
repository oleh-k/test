<?php 
//
// підключаємо необхідні файли
require_once('settings.php');
require_once('functions.php');

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
    <style>
        .field-ct {
            margin: 20px auto;
            padding: 15px 40px;
            width: 50%;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZVKL3X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div class="ct-phone field-ct">+380635415619</div>
<div class="ct-phone-1 field-ct">+380979658847</div>


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
<script>
    $(document).ready(function() {
        $('select').material_select();

    });

    /**************************************************** */
    // xwtool
    window.onload=function(){
        var tool = new xwtools();  
        tool.liraxWebPhoneInit({
        widgetId: "d783f96e1533f92d1c714840a412763b",
        targetClass: "lirax-make-call",
        scriptUrl: "https://lirax.ua/webcall"
        });
        tool.liraxWebFormInit({
        widgetId: "d783f96e1533f92d1c714840a412763b",
        targetClass: "lirax-custom-form",
        scriptUrl: "https://callme2.voip.com.ua/form",
        prefix: '+380',
        infoMessage: 'Message from web site: ',  //for chat dialog
        successMessage: 'Data sent successfully!',
        errorMessage: 'Data sent error!',
        nameError: 'must be not empty and more then 3 letters',
        phoneError: 'must be not empty and more then 8 digits',
        onSubmit: function() {
            console.log('submit');
        },
        onSuccess: function() {
            console.log('success');
        },
        onError: function() {
            console.log('error');
        }
        });
        tool.liraxWebCallInit({
        widgetId: "d783f96e1533f92d1c714840a412763b",
        targetClass: "lirax-custom-callback-form",
        scriptUrl: "https://callme2.voip.com.ua/callback",
        prefix: '+380',
        successMessage: 'Data sent successfully!',
        errorMessage: 'Data sent error!',
        phoneError: 'must be not empty and more then 8 digits',
        onSubmit: function() {
            console.log('submit');
        },
        onSuccess: function() {
            console.log('success');
        },
        onError: function() {
            console.log('error');
        }
        });
    }
</script>

</body>
</html>

