
<form class="" action="<?=SITE?>addTown_action" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Город</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите название города" name="town">
<!--     </div>
    <div class="form-group"> -->
    <label for="exampleInputFile">Вставить список</label>
    <input type="file" name="file" id="file">
    </div>
    <button type="submit" class="btn btn-default">Подтвердить</button>
</form>
<br>
<p class="text-success">
	<?=$text?>
</p>