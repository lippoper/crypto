<?php

    $url = "http://pubapi.cryptsy.com/api.php?method=singlemarketdata&marketid=";

    if(isset($_POST['marketid'])) {
      $url .= $_POST['marketid'];
      $jsondata = file_get_contents($url);
      $json = json_decode($jsondata, true);
      //var_dump($json);
    }
    else {
      $url .= "132"; // Default DOGE market id
      $jsondata = file_get_contents($url);
      $json = json_decode($jsondata, true);      
      var_dump($json);
    }

    //echo 'POST: '; print_r($_POST);

    $data = $json['return']['markets'][$_POST['code']];
    //var_dump($data); break;

?>

          <h2 id="subheader" class="sub-header"><?php echo $data['label']." ".$data['lasttradeprice']." <small>".$data['primaryname']."</small>"; ?></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Currency Name</th>
                  <th>Last Price<small>(BTC)</small></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $data['label']; ?></td>
                  <td><?php echo $data['primaryname']; ?></td>
                  <td><?php echo $data['lasttradeprice']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>

<!-- Start Cryptsy dump -->
<div class="row">
    <!-- start cell -->
    <div class="col-xs-6">
      <div class="panel panel-default panel-market-list-small">
        <div class="panel-heading"> <span class="glyphicon glyphicon-open-orders"></span> Sell orders </div>

          <table cellpadding="0" cellspacing="0" border="0" class="table table2 table-striped" id="sellorderlist">
            <thead>
              <tr>
                <th>Price <small>(BTC)</small></th>
                <th><?php echo $data['label']; ?></th>
                <th>Total <small>(BTC)</small></th>
              </tr>
            </thead>
            <tbody>
<?php
  $sellorders = $data['sellorders'];
  //var_dump($sellorders); break;

  foreach($sellorders as $key => $value) {
    echo "<tr>";
    if(is_array($value)) {
      foreach ($value as $key => $value) {
        echo "<th>".$value."</th>";
      }
    }
    else {
      echo "</tr>";
    }
  }
?>
            </tbody>
          </table>

        </div><!-- end panel-list -->
      </div><!--/end cell-->
                
    <!-- start cell -->
    <div class="col-xs-6">
      <div class="panel panel-default panel-market-list-small">
        <div class="panel-heading"> <span class="glyphicon glyphicon-open-orders"></span> Buy Orders <small> </small></div>

          <table cellpadding="0" cellspacing="0" border="0" class="table table2 table-striped" id="buyorderlist">
            <thead>
              <tr>
                <th>Price&nbsp;<small>(BTC)</small></th>
                <th><?php echo $data['label']; ?></th>
                <th>Total&nbsp;<small>(BTC)</small></th>
              </tr>
            </thead>
            <tbody>
<?php
  $buyorders = $data['buyorders'];
  //var_dump($sellorders); break;

  foreach($buyorders as $key => $value) {
    echo "<tr>";
    if(is_array($value)) {
      foreach ($value as $key => $value) {
        echo "<th>".$value."</th>";
      }
    }
    else {
      echo "</tr>";
    }
  }
?>
            </tbody>

          </table>

        </div><!--/end panel-list-->
      </div><!--/end cell-->
</div>

<div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default panel-trade-list">
        <div class="panel-heading"> 
          <span class="glyphicon glyphicon-account-balances"></span> Recent Trade History <small>(Last 50)</small>
        </div>

          <div class="tablewrap" id="market-wrap">

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="tradehistory">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Price Each <small>(BTC)</small></th>
                  <th><?php echo $data['label']; ?> Traded</th>
                  <th>Total BTC</th>
                </tr>
              </thead>
              <tbody>
<?php
  $recenttrades = $data['recenttrades'];
  //var_dump($sellorders); break;

  foreach($recenttrades as $key => $value) {
    echo "<tr>";
    if(is_array($value)) {
      foreach ($value as $key => $value) {
        if($key=="id") {
          //Ignore ID key:value pair
        }
        else {
          echo "<th>".$value."</th>";
        }
      }
    }
    else {
      echo "</tr>";
    }
  }
?>
              </tbody>

            </table>

        </div>

      </div><!--/panel charts-->
    </div>
</div>

<!-- /end of Cryptsy Dump -->