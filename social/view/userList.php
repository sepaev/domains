<p class="text-warning"><b><?=$err_message?></b></p>
    <h1>Пользователи</h1>
        <?php foreach($users as $user) { ?>
        <div class="user-group">
         
            <img src="avatar/<?=$user["avatar"]?>" alt="" width="70"> 
            Пользователь: <label name="user" id='<?=$user["idUser"]?>'>
            <?=$user["name"]?> <?=$user["l_name"]?><a href="userInfo?id=<?=$user["idUser"]?>"><?=$user['login']?></a></label>
            <?php
            if ($user['login'] == $login or $user['friend'] == 'true') {
            ?>
            <text id='<?=$user["idUser"]?>'>Нельзя добавить друзья</text>
            <hr>
            <?php
            } else{
            ?>
            <a href='addFriend_action?id=<?=$user["idUser"]?>'><button>Добавить в друзья</button></a>
            <hr>
            <?php
            }
        ?>
        </div>
        <?php            
        } ?>
