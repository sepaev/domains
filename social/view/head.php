<!DOCTYPE html>
<html lang="ru">
<head>
	<title>New Facebook</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width">
	<link href="<?=SITE?>lib/css/bootstrap.css" rel="stylesheet" type="text/css">
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
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">New Facebook</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if (!$_SESSION['login']) { ?>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>registration">Регистрация</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>auth">Авторизация</a></li>
            </ul>
            <?php } else { ?>  
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>main">Домашняя</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>admin">Управление</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>message">Отправить сообщение</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>frendsList">Мои друзья</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>userList">Все пользователи</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?=SITE?>exit">Выход</a></li>
            </ul>
            <?php } ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="center-block col-xs-8 col-md-8 center-block form-register">

