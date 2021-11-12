<?php
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Reporte.xls");  //File name extension was wrong


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table id="libro" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Fecha</th>
                    <?php foreach ($listquestion as $question) : ?>
                        <th><?php echo $question['qus_description'] ?></th>

                    <?php endforeach; ?>
                    <th scope="col">Recomendación Solo Tratamiento</th>
                    <th scope="col">Recomendación Tratamiento</th>
                    <th scope="col">Producto</th>

                  <!--  <th scope="col">RECLAMANTE</th>
                    <th scope="col">TIPO PERSONA</th>
                    <th scope="col">TIPO SERVICIO</th>
                    <th scope="col">SERVICIO</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">ACCIONES</th>
                    !-->
                </tr>
            </thead>
            <tbody>
                <?php $num = 0;$num_q_a = 0;
                foreach ($listclaim as $claim) : ?>
                    <tr>
                        <th scope="row"><?php $num = $num + 1;
                                        echo $num  ?></th>
                        <td><?php echo $claim['per_name'] ?> <?php echo $claim['per_lastname'] ?></td>
                        <td><?php echo $claim['per_mail'] ?></td>

                        <td><?php echo $claim['afr_date_register'] ?></td>
                        <?php for ($i = 0; $i <= 11; $i++) : ?>
                            <td><?php echo $list_question_answer[$num_q_a]['ans_description'] ?></td>


                         <?php $num_q_a++; endfor; ?>
                        <td><?php echo $tip_zero[$num-1][0]['mat_result'] ?></td>
                        <td><?php echo $tip_others[$num-1][0]['mat_result'] ?></td>
                        <td><?php $rre = str_replace('-', "</br>", $tip_others[$num-1][0]["mat_product"]); echo $rre;?> </h5></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>
</html>
