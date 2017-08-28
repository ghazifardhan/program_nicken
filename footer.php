
        </div>
            <!--===================================================-->
            <footer id="footer">
                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Visible when footer positions are static -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="hide-fixed pull-right pad-rgt">Currently v1.2</div>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <p class="pad-lft">&#0169; 2017 PT. Pratama Inti Distribusindo</p>
            </footer>
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <!--===================================================-->
        
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!-- SETTINGS - DEMO PURPOSE ONLY -->
        <!--===================================================-->

        <!--===================================================-->
        <!-- END SETTINGS -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="js/jquery-2.1.1.min.js"></script>
		  <script src="plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Nifty Admin [ RECOMMENDED ]-->
        <script src="js/nifty.min.js"></script>
        <!--Morris.js [ OPTIONAL ]-->
        <script src="plugins/morris-js/morris.min.js"></script>
        <script src="plugins/morris-js/raphael-js/raphael.min.js"></script>
        <!--Sparkline [ OPTIONAL ]-->
        <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
        <!--Skycons [ OPTIONAL ]-->
        <script src="plugins/skycons/skycons.min.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="js/demo/nifty-demo.min.js"></script>
        <!--Specify page [ SAMPLE ]-->
        <script src="js/demo/dashboard.js"></script>
        <!-- Chart JS -->
        <script src="js/Chart.bundle.js"></script>
        <?php
        include("get_chart_data.php");
        ?>
        <script>
        <?php foreach($GLOBALS['chart_data'] as $key => $val){ ?>
        var ctx = document.getElementById("chart<?php echo $GLOBALS['chart_data'][$key]['id_sales']; ?>");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php foreach($GLOBALS['chart_data'][$key]['data_sales'] as $k => $v){ echo '"' . $GLOBALS['chart_data'][$key]['data_sales'][$k]->Tgl . '",'; }?>],
                datasets: [{
                        label: '<?php echo $GLOBALS['chart_data'][$key]['id_sales'].'-'.$GLOBALS['chart_data'][$key]['nama_sales']; ?>',
                        data: [<?php foreach($GLOBALS['chart_data'][$key]['data_sales'] as $k => $v){ echo '"' . $GLOBALS['chart_data'][$key]['data_sales'][$k]->Jumlah . '",'; }?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
            },
            options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
        });
    <?php } ?>

        </script>
    </body>
</html>
