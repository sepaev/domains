<h1>ПОЛНЫЙ СПИСОК ТОРГОВЫХ ТОЧЕК</h1>
        <table class="table">
           <tr  class="alert-success .active" >
               <th>Код</th>
               <th>Наименование</th>
               <th>Примечание</th>
           </tr>
    <?php
//      var_dump($args);

    foreach ($args['result'] as $key => $value) {
        ?>
            <tr id="<?= $value["kod_but2"] ?>">
                <td><input type="text" value=" <?= $value["kod_but2"] ?>" class="form-control"></td>
                <td><input type="text" value=" <?= $value["name_but"] ?>" class="form-control"></td>
                <td><input type="text" value=" <?= $value["Prim"] ?>" class="form-control"></td>
            </tr>

        <?php
    }
    ?>
            </tr>
        </table>
