<form class="" action="<?=SITE?>action/registration_action" enctype="multipart/form-data" method="post">
    <p class="text-success">
    <?=$err_message?>
    </p>
    <div class="form-group">
        <label for="exampleInputEmail1">Логин</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Введите Е-mail">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
    </div>
	<div class="form-group">
        <label for="exampleInputName1">Имя</label>
        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Введите имя">
    </div>
	<div class="form-group">
        <label for="exampleInputL_name1">Фамилия</label>
        <input type="text" name="l_name" class="form-control" id="exampleInputL_name1" placeholder="Введите Вашу фамилию">
    </div>
	<div class="form-group">
        <label for="exampleInputBirthday1">Дата рождения</label>
        <input type="date" name="birthday" class="form-control" id="exampleInputBirthday1" placeholder="Введите дату рождения">
    </div>
	<div class="form-group">
        <label for="exampleInputDescription1">Описание</label>
        <input type="text" name="description" class="form-control" id="exampleInputDescription1" placeholder="Введите описание">
    </div>
    <div class="form-group">
        <label for="exampleInputGender1">Ваш пол</label>
        <select class="form-control" role="menu" name=" ">
            <option value="0"><a href="#">Мужской</a></option>
            <option value="1"><a href="#">Женский</a></option>
        </select>        
    </div>
    <div class="form-group">
        <label for="exampleInputQuestion1">Секретный вопрос</label>
        <select class="form-control" role="menu" name="idQuestion">
        <?php foreach($questions as $question) { ?>
            <option value="<?=$question['idQuestion']?>"><a href="#"><?=$question['question'];?></a></option>
            <?php } ?>
        </select>
        <input type="text" name="answer" class="form-control" id="exampleInputAnswer1" placeholder="Введите ответ">        
        <a href='addQuestion'>Добавить вопрос</a>
    </div>
    <div class="form-group">
        <label for="exampleInputQuestion1">Ваш город</label>
        <select class="form-control" role="menu" name="idTown">
		<?php foreach($towns as $town) { ?>
            <option value="<?=$town['idTown']?>"><a href="#"><?=$town['townName'];?></a></option>
			<?php } ?>
        </select>        
        <a href='addTown'>Добавить город</a>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Аватар</label>
        <input type="file" name="file" id="exampleInputFile">
        <p class="help-block">По возможности заполните все поля.</p>
    </div>
    <button type="submit" class="btn btn-default">Отправить</button>
</form>