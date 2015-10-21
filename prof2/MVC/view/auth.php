<form class="" action="<?=SITE?>Auth/getAuth" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">E-mail</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="please enter e-mail">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
    </div>
    <input type="checkbox" name = "memory" id="memory" value="checked">Other PC
    <br><button type="submit" class="btn btn-default">Send</button>
</form>