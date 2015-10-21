<form class="" action="<?=SITE?>action/auth_action" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">E-mail адрес</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите Ваш e-mail">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
    </div>
    <input type="checkbox" name = "memory" id="memory" value="checked"> Чужой компьютер
    <br><button type="submit" class="btn btn-default">Отправить</button>
</form>