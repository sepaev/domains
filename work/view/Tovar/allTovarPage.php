<!--<h1 xmlns:display="http://www.w3.org/1999/xhtml">������ �������</h1>-->
</div>

<form id="top" class="navbar-form">
    <?php
    if ($args['result'] != NULL) {
    ?>
    <!--    <table class="table table-bordered table-hover">-->
    <table class=" table-bordered table-hover ">
        <tr class="alert-success .active">
            <th width="100">�������</th>
            <th>������������</th>
            <th>���</th>
            <th>���������</th>
            <th>���� ���������</th>
            <th>��� �����</th>
            <th>�������������.</th>
            <th>���
            </td>
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
            <th>#</th>
            <th>����</th>
            <th>���</th>
            <th>��������</th>
            <th>��� ����.</th>

        </tr>

        <?php
        echo "������: ".$args['sys']['sql'];
//        echo "<pre>";
//        print_r($args);

        foreach ($args['result'] as $key => $value) {
            if ($value == "limit") {
                break;
            }
            ?>

            <tr id="<?= $value["Key"] ?>" style=" top: 200px; left: 10px; opacity: 1; cursor: pointer;>">
                <td><input type="text" name="Artikul" value="<?= $value["Artikul"] ?>" class="form-control"></td>
                <td><input type="text" name="Name_iz" value="<?= $value["Name_iz"] ?>" class="form-control"></td>
                <td><input type="text" name="Vid_iz" value="<?= $value["Vid_iz"] ?>" class="form-control"></td>
                <td><input type="text" name="Kvitan_but" value="<?= $value["Kvitan_but"] ?>" class="form-control"></td>
                <td><input type="text" name="Date_zav" value="<?= substr($value["Date_zav"], 0, 10) ?>"
                           class="form-control"></td>
                <td><input type="text" name="Kod_but" value="<?= $value["Kod_but"] ?>" class="form-control"></td>
                <td><input type="text" name="Zavod" value="<?= $value["Zavod"] ?>" class="form-control"></td>
                <td><input type="text" name="Ves_iz" value="<?= $value["Ves_iz"] ?>" class="form-control"></td>
                <td><input type="text" name="Prim" value="<?= $value["Prim"] ?>" class="form-control"></td>
                <td><input type="text" name="Mod" value="<?= $value["Mod"] ?>" class="form-control"></td>
                <td><input type="text" name="Cost_zav" value="<?= rtrim(rtrim($value["Cost_zav"], '0'), '.') ?> ���."
                           class="form-control"></td>
                <td><input type="text" name="Price_zav" value="<?= rtrim(rtrim($value["Price_zav"], '0'), '.') ?> ���."
                           class="form-control"></td>
                <td><input type="text" name="Cost_but" value="<?= rtrim(rtrim($value["Cost_but"], '0'), '.') ?> ���."
                           class="form-control"></td>
                <td><input type="text" name="Price_but" value="<?= rtrim(rtrim($value["Price_but"], '0'), '.') ?> ���."
                           class="form-control"></td>
                <td><input type="text" name="Date_but" value="<?= substr($value["Date_but"], 0, 10) ?>"
                           class="form-control"></td>
                <td><input type="text" name="PDV" value="<?= $value["PDV"] ?>" class="form-control"></td>
                <td><input type="text" name="Prob_iz" value="<?= $value["Prob_iz"] ?>" class="form-control"></td>
                <td><input type="text" name="Kol_iz" value="<?= $value["Kol_iz"] ?>" class="form-control"></td>
                <td><input type="text" name="Date_PSV" value="<?= substr($value["Date_PSV"], 0, 10) ?>"
                           class="form-control"></td>
                <td><input type="text" name="suso" value="<?= $value["suso"] ?>" class="form-control"></td>
                <td><input type="text" name="Fix_price_zav"
                           value="<?= rtrim(rtrim($value["Fix_price_zav"], '0'), '.') ?> ���." class="form-control">
                </td>
                <td><input type="text" name="number" value="<?= $key + 1 ?>" class="form-control"></td>
                <td><input type="text" name="Key" value="<?= $value["Key"] ?>" class="form-control"></td>
                <td><input type="text" name="Kod1" value="<?= $value["Kod1"] ?>" class="form-control"></td>
                <td><input type="text" name="kod_man" value="<?= $value["kod_man"] ?>" class="form-control"></td>
                <td><input type="text" name="Kod_zav" value="<?= $value["Kod_zav"] ?>" class="form-control"></td>

            </tr>
            <?php
            if ($key == $args['limit'] - 1) {
                break;
            }
        }
        } else {
            ?>
            <h1>�� ������ ������� ������ �� �������</h1>

            <?php
        }
        ?></table>
</form>
<div class="hidden">
<!--<div>-->
    ������:
    SELECT <input id="select" type="text" value='<?=$args['sys']['what']?>'>

    FROM <input id="from" type="text" value='<?=$args['sys']['table']?>'>

    WHERE <input id="where" type="text" value='<?=$args['sys']['whereString']?>'>

    LIMIT <input id="limit" type="text" value='<?=$args['sys']['limit']?>'>
</div>

<?php include_once($SITE . "lib/js/components/Tovar/allTovarPage.js"); ?>