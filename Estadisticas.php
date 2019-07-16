<?php
 
require 'logica/Estadisticas/visitas.php';
 require 'logica/Estadisticas/barradebusqueda.php';
?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Compras y Ventas</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Visitas</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
		<div id="chartContainer" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
      </div>
    </div>
  </div> 
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type='text/javascript'>
    $(function () {
        $(document).ready(function() {
            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Estadisticas'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Compras y Ventas',
                    colorByPoint: true,
                    data: <?php require 'logica/Estadisticas/comprasyventas.php'; ?> 
                }]
            });
			Highcharts.chart('container2', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'areaspline'
                },
                title: {
                    text: 'Estadisticas'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Compras y Ventas',
                    colorByPoint: true,
                    data: <?php require 'logica/Estadisticas/comprasyventas.php'; ?> 
                }]
            });
        });

    });

</script>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Dias"
	},
	axisY: {
		title: "Visitas"
	},	
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


}
</script>