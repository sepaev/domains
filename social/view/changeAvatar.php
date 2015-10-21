<h1><?=$message?></h1>
<form class="" action="<?=SITE?>action/changeAvatar_action" enctype="multipart/form-data" method="post">
<input value='<?=$user['login']?>' type="hidden" name="userLogin"><br>
<input value='<?=$user['idUser']?>' type="hidden" name="userId"><br>
<table>
<td><font size="5" color="Grey" face="Arial">Приветствую  Вас <b><?=$user['firstName']?> <?=$user['lastName']?></b></font></td>
<td align='right' width=200><img src="avatar/<?=$user['avatar']?>" alt="" width="100"></td>
<tr><td><hr></td>
<td><hr></td><tr>
<td><b>Сменить аватар:</b></td>
<td><font size="4" color="Grey"><b><u><?=$user['avatar']?></u></b></font>
	<br><br> <input type="file" name="file" id="exampleInputFile"></td>
<tr><td><hr></td>
<tr><td colspan="2" rowspan="2" headers="" align="right"><button type="submit" class="btn btn-default">Отправить</button></td>
<tr>
</table>


</form>