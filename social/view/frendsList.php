<p class="text-warning"><b><?=$err_message?></b></p>
    <h1>Мои друзья</h1>
        <?php 
    if ($friends){
        foreach($friends as $user) { ?>
        <div class="user-group">
         
            <img src="avatar/<?=$user["avatar"]?>" alt="" width="70"> 
            Пользователь: <label name="user" id='<?=$user["idUser"]?>'>
            <?=$user["name"]?> <?=$user["l_name"]?><a href="userInfo?id=<?=$user["idUser"]?>"><?=$user['login']?></a></label>
            <a href='message?id=<?=$user["idUser"]?>'><button>Отправить сообщение</button></a>
            <a href='deleteFriend_action?pair=<?=$user["id"]?>&user=<?=$user["idUser"]?>'><button>Удалить из друзей</button></a><hr>
        </div>
        <?php            
        } 
    } else{ ?>
            <div class="user-group">
            У вас нет друзей.
            <hr>
            </div>
            <?php   
        }?>
