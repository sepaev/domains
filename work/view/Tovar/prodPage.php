
<!--<h1 xmlns:display="http://www.w3.org/1999/xhtml">�������</h1>-->
</div>
<div class="hidden">
    ������:
    SELECT <input id= "select" type="text" value='<?echo iconv('UTF-8', 'windows-1251', $_GET['what']);?>'>

    FROM <input id= "from" type="text" value='<?echo iconv('UTF-8', 'windows-1251', $_GET['table']);?>'>

    WHERE <input id= "where" type="text" value='<?php echo iconv('UTF-8', 'windows-1251', $_GET['where']);?>'>

    LIMIT <input id= "limit" type="text" value='<?php echo $_GET['limit'];?>'>
</div>
<div id="top" >
    <?php
    if ($args != NULL) {
    ?>
<table class="table-condensed table-bordered table-hover ">
    <tr  class="alert-danger .active  ">
        <th>#</th>
        <th>����</th>
        <th>���</th>
        <th>�������</th>
        <th>������������</th>
        <th>���</th>
        <th>���������</th>
        <th>���� ���������</th>
        <th>��������</th>
        <th>��� �����</th>
        <th>��� ����.</th>
        <th>�������������.</th>
        <th>���</td>
        <th>����������</th>
        <th>������</th>
        <th>���� �.1��</th>
        <th>���� ������</th>
        <th>���� �.1��</th>
        <th>���� ����������</th>
        <th>���� �� �����</th>
        <th>PDV</th>
        <th>�����</th>
        <th>�����.</th>
        <th>���� �������� ���</th>
        <th>�������� ������</th>
        <th>����������� ���� ������</th>


    </tr>
    <?php
    foreach ($args as $key => $value) {
        if ($value == "limit") {
            break;
        }
        ?>
        <tr id="<?= $value["Key"] ?>" class="active">
            <td><input type="text" value="<?= $key + 1 ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Key"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Kod1"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Artikul"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Name_iz"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Vid_iz"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Kvitan_but"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= substr($value["Date_zav"], 0, 10) ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["kod_man"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Kod_but"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Kod_zav"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Zavod"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Ves_iz"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Prim"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Mod"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= rtrim(rtrim($value["Cost_zav"], '0'), '.') ?> ���." class="form-control"></td>
            <td><input type="text" value="<?= rtrim(rtrim($value["Price_zav"], '0'), '.') ?> ���." class="form-control"></td>
            <td><input type="text" value="<?= rtrim(rtrim($value["Cost_but"], '0'), '.') ?> ���." class="form-control"></td>
            <td><input type="text" value="<?= rtrim(rtrim($value["Price_but"], '0'), '.') ?> ���." class="form-control"></td>
            <td><input type="text" value="<?= substr($value["Date_but"], 0, 10) ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["PDV"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Prob_iz"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["Kol_iz"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= substr($value["Date_PSV"], 0, 10) ?>" class="form-control"></td>
            <td><input type="text" value="<?= $value["suso"] ?>" class="form-control"></td>
            <td><input type="text" value="<?= rtrim(rtrim($value["Fix_price_zav"], '0'), '.') ?> ���." class="form-control"></td>


        </tr>
        <?php
        if ($key == $args['limit'] - 1) {
            break;
        }
    }
    } else {
        ?>
        <tr>
            �� ������ ������� ����������� ����������
        </tr>
        <?php
    }
    ?></table>
    
</div>
<div class="">LALALALA</div>