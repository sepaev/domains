
<form class="" action="<?=SITE?>message_action" enctype="multipart/form-data" method="post">
    <div class="form-group">
    	<input value='<?=$idRecipient?>' type="hidden" name="userId"><br>
        <label for="messageLabel">Отправить сообщение <?=$recipient['firstName']?> <?=$recipient['lastName']?></label> <img src="avatar/<?=$recipient['avatar']?>" alt="" width=75>
        <br><textarea name="message" id="message" cols="70" rows="10" placeholder="Введите текст сообщения"><?=$content?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Отправить</button>
</form>

<div align:"center">
	<h1>Ваш диалог:</h1><br><pre>
	<table width="100%">
<td>Отправитель<td>Сообщение<tr>
<?php
for ($i=0; $i < count($messages); $i++) { 
	?>
    <td><img src="avatar/<?=$messages[$i]['avatar'];?>" alt="" width=75> <td><?=$messages[$i]['message']?><br>
    <hr>
    <tr>
	<?php
}
?>
</table>
</div>
