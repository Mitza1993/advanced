<?php

use yii\helpers\Html;
use frontend\controllers\ClientiController;
use kartik\grid\GridView;
use frontend\models\Tranzactie;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Vanzare_Cumparare_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$bU = \Yii::$app->homeUrl;


?>
<div class="row" style="margin-top:60px">

  <div class="vanzare-cumparare-index col-md-6">

    <h1>Rapoarte totale contractele de amanetare</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <form method="post" id="formular-rapoarte">
      <input class="has-datepicker" name="begin-date" placeholder='Selecteaza prima data'>

      <input class="has-datepicker" name="end-date" placeholder='Selecteaza a2a data'>

      <input class="btn btn-warning" id="secondDateSelected" type="submit" value="Afiseaza rapoarte">
    </form>

  <table class="table table-bordered" style="margin-top:20px">
    <thead>
      <tr>
        <th>Total sume incasate</th>
        <th>Total sume platite</th>
        <th>Total sume ramase de primit</th>
        <th>Total sume incasate din comisioane</th>

      </tr>
    </thead>
    <tbody id="raport-results-table">
    
    </tbody>
  </table>

</div>
<div class="vanzare-cumparare-index col-md-6">

    <h1>Rapoarte totale privind contractele de vanzare-cumparare</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <form method="post" id="formular-vanzari">
      <input class="has-datepicker" name="begin-date2" placeholder='Selecteaza prima data'>

      <input class="has-datepicker" name="end-date2" placeholder='Selecteaza a2a data'>

      <input class="btn btn-success" id="secondDateSelected2" type="submit" value="Afiseaza rapoarte">
    </form>

  <table class="table table-bordered" style="margin-top:20px">
    <thead>
      <tr>
        <th>Valoare contracte</th>
        <th>Tipul operatiei</th>
      </tr>
    </thead>
    <tbody id="vanzari-results-table">
    
    </tbody>
  </table>

</div>
  

</div>


<div class="produse-index row" style="margin-top:50px">

    <h1>Rapoarte totale privind produsele gestionate</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <form method="post" id="formular-produse">

  

      <input class="btn btn-primary" id="situatieSelect" type="submit" value="Afiseaza rapoarte">
    </form>

  <table class="table table-bordered" style="margin-top:20px">
    <thead>
      <tr>
        <th>Produse aflate in stoc</th>
        <th>Produse vandute</th>
        <th>Produse sub amanetare</th>
      </tr>
    </thead>
    <tbody id="produse-results-table">
    
    </tbody>
  </table>

</div>

