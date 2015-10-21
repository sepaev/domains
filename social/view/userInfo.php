<table>
<td><font size="5" color="Grey" face="Arial">Пользователь: <b><?=$user['firstName']?> <?=$user['lastName']?></b></font></td>
<td align='right' width=200><img src="avatar/<?=$user['avatar']?>" alt="" width="100">
<br></td>
<tr>
<td><b>Логин:</b></td>
<td><?=$user['login']?></td>
<tr>
<td><b>Город:</b></td>
<td><?=$user['townName']?></td>
<tr>
<td><b>Пол:</b></td>
<td><?=$user['gender']?></td>
<tr>
<td><b>Дата рождения:</b></td>
<td><?=$user['birthday']?></td>
<tr>
<td><b>Зарегистрирован:</b></td>
<td><?=$user['dateReg']?></td>
<tr>
<td><b>Количество друзей:</b></td>
<td><?=$user['numFriends']?></td>
<tr>
<td><b>Статус:</b></td>
<td><?=$user['userInfo']?></td>
<tr>
<td><b>Выйти:</b></td>
<td><a href='exit'>Покинуть сессию</a></td>
<br>
</table>