<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->





<script src="<?= base_url('asset/plugins/jquery/jquery.min.js') ?>"></script>
<!-- <script src="<?php // base_url('asset/plugins/jquery-ui/jquery-ui.min.js') ?>"></script> -->


<!-- Bootstrap 5 with Popper.js-->
<script src="<?= base_url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src=" <?= base_url('asset/js/adminlte.min.js') ?>"></script>

<!-- Page Global Script -->
<!-- Toggle Button -->
<script src="<?= base_url('asset/js/bootstrap4-toggle.min.js') ?>"></script>


<script src="<?= base_url('asset/plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('asset/plugins/sparklines/sparkline.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('asset/js/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('asset/js/pages/dashboard.js') ?>"></script>
<script src="<?= base_url('asset/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script src="<?= base_url('asset/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('asset/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<script src="<?= base_url('asset/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('asset/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<script src="<?= base_url('asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url('asset/js/jquery.validate.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('asset/plugins/select2/js/select2.full.min.js')?>"></script>

<!-- DataTables Full Function -->
<script src="<?= base_url("asset/plugins/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/dataTables.buttons.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/JSZip-2.5.0/jszip.min.js") ;?>" type="text/javascript"></script>					
<script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/buttons.print.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/buttons.html5.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/Responsive-2.2.9/js/dataTables.responsive.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/Responsive-2.2.9/js/responsive.bootstrap5.min.js") ;?>" type="text/javascript"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'IPA',
          'IPS',
         
      ],
      datasets: [
        {
          data: [80,500],
          backgroundColor : ['#f56954', '#00a65a'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })

 
</script>