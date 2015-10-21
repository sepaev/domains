<?php
if (isset($_GET['id'])){
	?>
<form class="" action="<?=SITE?>message_action" enctype="multipart/form-data" method="post">
    <div class="form-group">
    	<p class="text-warning"><b><?=$err_message?></b></p>
    	<input value='<?=$idRecipient?>' type="hidden" name="userId"><br>
        <label for="messageLabel">Отправить сообщение <?=$recipient['firstName']?> <?=$recipient['lastName']?></label> <img src="avatar/<?=$recipient['avatar']?>" alt="" width=75>
        <br><textarea name="message" id="message" cols="70" rows="10" placeholder="Введите текст сообщения"><?=$content?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Отправить</button>
</form>
<?php }
?>
<div align:"center">
	<h1>Список диалогов:</h1><br>
	<table width="100%">
<?php
foreach ($talkers as $key => $talker) {
	?>
    <td><label for="talker"><?=$talker['firstName']?> <?=$talker['lastName']?></label> <td><a href="message?id=<?=$talker['idUser']?>">Отправить сообщение</a> <td><a href="chat?id=<?=$talker['idUser']?>">Просмотреть диалоги</a><br>
<tr>
	<?php
}
?>
</table>
</div>
