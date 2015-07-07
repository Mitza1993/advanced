<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

<h1>  Lista contractelor de vânzare încheiate</h1>
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
                           Denumirea produsului
                        </th>
                        <th>
                            Data incheierii
                        </th>
                        <th>
                            Suma contractata
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
                            <?php echo $value['produs'] ?>
                        </td>
                        <td>
                            <?php echo $value['data_inchieierii'] ?>
                        </td>
                        <td>
                            <?php echo $value['suma_contractata'] ?>
                        </td>                                                                       
                    </tr>
                <?php } ?>
                <?php foreach ($raport as $key => $value) { $sum += $value['suma_contractata']; }?>
                    <tr>
                        <td colspan="5">
                                Total    
                        </td>
                        <td colspan="0">
                            <?php echo $sum." lei";  ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
th, td {
	padding: 10px;
    border-width: 10px;importamt!
}
</style>