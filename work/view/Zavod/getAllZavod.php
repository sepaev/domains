<h1>������ ������ �����������</h1>
<table class="table">
    <tr class="alert-success .active">
        <th>���</th>
        <th>������������</th>
        <th>������������</th>
        <th>�������</th>
        <th>����������</th>
        <th>����</th>
    </tr>
    <?php
    //      var_dump($args);
    foreach ($args as $key => $value) {
        ?>
        <tr id="<?= $value["Kod_zav"] ?>">
            <td><input type="text" value=' <?= $value["Kod_zav"] ?>' class="form-control"></td>
            <td><input type="text" value=' <?= $value["Name_zav"] ?>' class="form-control"></td>
            <td><input type="text" value=' <?= $value["Plase"] ?>' class="form-control"></td>
            <td><input type="text" value=' <?= $value["Kontakt"] ?>' class="form-control"></td>
            <td><input type="text" value=' <?= $value["Prim"] ?>' class="form-control"></td>
            <td><input type="text" value=' <?= $value["Site"] ?>' class="form-control"></td>
        </tr>

        <?php
    }
    ?>
    </tr>
</table>
