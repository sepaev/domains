<?php
$obj = new \core\system\Model();
$uri = $obj->footer();
?>
<form style="bottom: 0px; left: 0px; height: 200px; width: 100%;"></form>
</div><br>
</div>
<form class="form-control" style="position: fixed; bottom: 0px; left: 0px; opacity: 1; cursor: pointer; height: 200px; width: 100%;">

    <div id="topcontrol" title="������� � ������ ��������"
         style="position: fixed; bottom: 20px; left: 5px; opacity: 1; cursor: pointer;"><a href="#nav">
            <img src="<?=SITE?>img/top.gif" style="width:42px; height:42px"> ������
        </a></div>

    <h2>��� ����� ������ ��������
    </h2>
    <a href="<?=SITE?><?=$uri[1]?>/<?=$uri[2]?>">�������� ������</a>
</form>