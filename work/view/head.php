<!DOCTYPE html>
<html lang="ru">

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter33440748 = new Ya.Metrika({
                    id:33440748,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/33440748" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<head>
	<title>
        <?php
        if (isset($PAGE)){
            echo "Павловский ". $PAGE;
        } else{
            echo "ФОП Павловский Е.С.";
        }
        ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=win-1251" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width">
	<link href="<?=SITE?>lib/css/bootstrap.css" rel="stylesheet" type="text/css">

    <script src="<?=SITE?>lib/js/jquery-2.1.4.js"></script>

    <script src="<?=SITE?>lib/js/bootstrap.js"></script>
    <!--[if lt IE 9]>
		<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
    <style>
        .form-register {
            float: none !important;
        }
        .footer {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 80px;
        }
    </style>
    <link rel="icon" href="<?=SITE?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?=SITE?>/favicon.ico" type="image/x-icon" />
</head>
<body id="nav">
<nav class="navbar navbar-default" >
    <div class="container-fluid" style="position: fixed; margin-left: 0px">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header"style="position: fixed; margin-left: 10px">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Переключатель навигатора</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" >
                <?php
                if (isset($PAGE)){
                    echo  $PAGE;
                } else{
                    echo "ФОП Павловский Е.С.";
                }
                ?>
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="position: fixed; margin-left: 300px">
            <?php if (!$_SESSION['login']) { ?>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>main/logout">Очистить сессию</a></li>
            </ul>
            <?php } else { ?>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>main">Главная</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>zavod">Поставщики</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>but">Торговые точки</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>tovar"><b>ТОВАР</b></a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>return">Возврат</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>proplata">Проплата</a></li>
            </ul>
                <ul class="nav navbar-nav">
                    <li><a href="<?=SITE?>main/logout">Выход</a></li>
                </ul>
            <?php } ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<br><br><br>