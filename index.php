<?php

  if(isset($_POST['return'])) {
    require('/includes/header.php');
    require('/includes/navigation.php');

    //$array = $_REQUEST['data'];
    echo 'ISSET POST';

    echo "<div id=\"infobox\" class=\"alert alert-info alert-dismissable\"></div>";
    echo "<div id=\"responder\"></div>";

    echo <<<EOD
    <h1 class="page-header">Dashboard</h1>

<!--
    <div class="row placeholders">
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
    </div>
-->
EOD;

    require('/includes/footer.php');
  }

  else {
    require('/includes/header.php');
    require('/includes/navigation.php');

    //$array = $_REQUEST['data'];
    echo '!ISSET POST';

    echo "<div id=\"infobox\" class=\"alert alert-info alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button></div>";
    echo "<div id=\"responder\"></div>";

    echo <<<EOD
    <h1 class="page-header">Dashboard</h1>

<!--
    <div class="row placeholders">
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
    </div>
-->
EOD;

    require('/includes/footer.php');
  }
?>