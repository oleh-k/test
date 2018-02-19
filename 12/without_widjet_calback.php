<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>test callBack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <script src="js/xwtools.js"></script>

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
    
    <form class="col s12 lirax-custom-callback-form">
        <div class="row">
            <div class="input-field col s12">
                <input id="phone" type="tel" name="phone" class="validate" value="">
                <label for="phone">Phone</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">send</i>Book the call</button>
            </div>
            <div class="input-field col s12">
                <a href="#" class="button lirax-custom-callback-form">Book</a>
            </div>
        </div>
    </form>

    <script>
        window.onload=function(){
            var tool = new xwtools();
            tool.liraxWebCallInit({
            widgetId: "d783f96e1533f92d1c714840a412763b",
            targetClass: "lirax-custom-callback-form",
            scriptUrl: "https://callme2.voip.com.ua/callback",
            prefix: '+380',
            successMessage: 'Data sent successfully!',
            errorMessage: 'Data sent error!',
            phoneError: 'must be not empty and more then 8 digits',
            onSubmit: function() {
                console.log('submit'); // якщо не потрібно, можете закоментувати
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