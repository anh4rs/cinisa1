<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


    <table border="1" class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th rowspan="3">NO</th>
                <th rowspan="3" colspan="2">NAMA KOMODITI</th>
                <?php foreach ($qkec as $k) { ?>
                    <th colspan="<?= $k['total']*3 ?>"> <?= strtoupper($k['namakec']) ?> </th>
                <?php } ?>
            </tr>            
            <tr>
                <?php foreach ($qpas as $p) { ?>
                    <th colspan="3"><?= strtoupper($p['namapas']) ?></th>
                <?php } ?>
            </tr>
            <tr>
            <?php for ($i=1; ($i<= $totalsql2)*3; $i++ ) { ?>
                <th>Sebelumnya</th><th>Terbaru</th><th>Ket</th>
            <?php } ?>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Beras</td>
                <td>Beras tipe A</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Beras</td>
                <td>Beras tipe B</td>
                <td>1000</td>
                <td>2000</td>
                <td>2000</td>
                <td>3000</td>
                <td>3000</td>
                <td>2000</td>
                <td>1000</td>
                <td>2000</td>
                <td>1000</td>
                <td>2000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Beras</td>
                <td>Beras tipe C</td>
                <td>2000</td>
                <td>3000</td>
                <td>3000</td>
                <td>2000</td>
                <td>2000</td>
                <td>3000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
                <td>2000</td>
            </tr>
        </tbody>
    </table>



    <br>

</body>
</html>

<!--  -->