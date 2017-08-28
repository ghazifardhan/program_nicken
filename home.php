<?php

include('header.php');
include('get_chart_data.php');
?>
<br>
<br>
<div class="imgR">
  <img src="logo_PID _kecil.jpg"/>
</div><br>
<div class="panel" style="margin-left: 10px; margin-right: 10px">
      <div class="panel-heading">
    <h3 class="panel-title">Dashboard</h3>
    </div>
    <div class="panel-body">
    <div class="row">
    <?php foreach($GLOBALS['chart_data'] as $key => $val){ ?>
    <div class="col-sm-6 col-lg-6">
    <canvas id="chart<?php echo $GLOBALS['chart_data'][$key]['id_sales']; ?>" style="display: inline-block; width: 110px; height: 50px; vertical-align: top;"></canvas>
    </div>
    <?php } ?>
    </div>
</div>
</div>
                <?php
                include('footer.php');
                ?>
