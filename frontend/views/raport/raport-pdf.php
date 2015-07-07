<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            Codul contractului
                        </th>
                        <th>

                            Nume Cient
                        </th>
                        <th>
                            Nume Angajat
                        </th>
                        <th>
                            Suma datorata
                        </th>
                        <th>
                            Suma Primita
                        </th>
                        <th>
                            Rest De Plata
                        </th>    
                        <th>
                            Data
                        </th>                       
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($raport as $key => $value) { ?>
                    <tr>
                        <td>
                            <?php echo $value['cod_contract'] ?>
                        </td>
                        <td>

                            <?php echo $value['client'] ?>
                        </td>
                        <td>
                            <?php echo $value['angajat'] ?>
                        </td>
                        <td>
                            <?php echo $value['suma_datorata'] ?>
                        </td>
                        <td>
                            <?php echo $value['suma_primita'] ?>
                        </td>
                        <td>
                            <?php echo $value['rest_de_plata'] ?>
                        </td>
                        <td>
                            <?php echo $value['data'] ?>
                        </td>                                                                        
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
th, td {
	padding: 10px;
}
</style>