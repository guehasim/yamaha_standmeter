<link href="<?php echo base_url() ?>assets/chart/css/default.css" rel="stylesheet">

<!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-flash"></i> MIN Listrik (KVARH)</span>

              <?php foreach ($min_listrik as $lis): ?>
              <div class="count red"><?php echo number_format($lis->total,0);?></div>                
              <?php endforeach ?>

            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-flash"></i> MAX Listrik (KVARH)</span>

              <?php foreach ($max_listrik as $lis): ?>
              <div class="count red"><?php echo number_format($lis->total,0);?></div>                
              <?php endforeach ?>

            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-flash"></i> AVG Listrik (KVARH)</span>

              <?php foreach ($avg_listrik as $lis): ?>
              <div class="count red"><?php echo number_format($lis->total,0);?></div>                
              <?php endforeach ?>

            </div>



            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-tint"></i> MIN PDAM (M3)</span>

              <?php foreach ($min_pdam as $pd): ?>
              <div class="count blue"><?php echo number_format($pd->total,0);?></div>                
              <?php endforeach ?>

            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-tint"></i> MAX PDAM (M3)</span>

              <?php foreach ($max_pdam as $pd): ?>
              <div class="count blue"><?php echo number_format($pd->total,0);?></div>                
              <?php endforeach ?>

            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-tint"></i> AVG PDAM (M3)</span>

              <?php foreach ($avg_pdam as $pd): ?>
              <div class="count blue"><?php echo number_format($pd->total,0);?></div>                
              <?php endforeach ?>

            </div>
          </div>
        </div>
          <!-- /top tiles -->

           <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Grafik Stand Meter Listrik (KVARH)</h3>
                  </div>
                   <div class="col-md-6">
                    <h3>Grafik Stand Meter PDAM (M3)</h3>
                  </div>
                </div>

                <div class="col-md-6 ">
                  <canvas id="myChart" style="width:100%;"></canvas>
                  <?php
                    $bulan_listrik = "";            // string kosong untuk menampung data tahun
                    $total_listrik = null;    // nilai awal null untuk menampung data total siswa

                    // looping data dari $chartSiswa
                    foreach ($listrik as $chart) {
                        $databulan     = date('d M', strtotime($chart->date_stan_meter));
                        $bulan_listrik.= "'$databulan'" . ",";
                        $dataTotal     = $chart->total;
                        $total_listrik .= "'$dataTotal'" . ",";
                    }

                    ?>
                </div>

                 <div class="col-md-6 ">
                  <canvas id="myChart2" style="width:100%;"></canvas>
                  <?php
                    $bulan  = "";            // string kosong untuk menampung data tahun
                    $total_penggunaan = null;    // nilai awal null untuk menampung data total siswa

                    // looping data dari $chartSiswa
                    foreach ($pdam as $chart) {
                        $databulan     = date('d M', strtotime($chart->tgl_pdam));
                        $bulan         .= "'$databulan'" . ",";
                        $dataTotal     = $chart->total;
                        $total_penggunaan .= "'$dataTotal'" . ",";
                    }

                    ?>
                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>

<script src="<?php echo base_url() ?>assets/chart/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/chart/js/Chart.min.js"></script>

<script>
$(document).ready(function() {

  //get canvas
  var ctx = $("#myChart");

  var data = {
    labels : [<?= $bulan_listrik; ?>],
    datasets : [
      {
        label : "Listrik",
        data : [<?= $total_listrik; ?>],
        backgroundColor : "red",
        borderColor : "lightpink",
        fill : false,
        lineTension : 0,
        pointRadius : 5
      }
    ]
  };

  var options = {
    title : {
      position : "top",
      fontSize : 18,
      fontColor : "#111"
    },
    legend : {
      display : false
    },
    scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true,
                    callback: function(value, index, values) {
                      if(parseInt(value) >= 1000){
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                      } else {
                        return value;
                      }
                    }
                  }
                }]
              }
  };

  var chart = new Chart( ctx, {
    type : "line",
    data : data,
    options : options
  } );

});
</script>

<script>
$(document).ready(function() {

  //get canvas
  var ctx = $("#myChart2");

  var data = {
    labels : [<?= $bulan; ?>],
    datasets : [
      {
        label : "PDAM",
        data : [<?= $total_penggunaan; ?>],
        backgroundColor : "blue",
        borderColor : "lightblue",
        fill : false,
        lineTension : 0,
        pointRadius : 5
      }
    ]
  };

  var options = {
    title : {
      position : "top",
      fontSize : 18,
      fontColor : "#111"
    },
    legend : {
      display : false
    },
    scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true,
                    callback: function(value, index, values) {
                      if(parseInt(value) >= 1000){
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                      } else {
                        return value;
                      }
                    }
                  }
                }]
              } 
  };

  var chart = new Chart( ctx, {
    type : "line",
    data : data,
    options : options
  } );

});
</script>
        
  