@extends('template.master')
@section('chart_header')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
  .highcharts-figure, .highcharts-data-table table {
  min-width: 360px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>
@endsection
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
          <figure class="highcharts-figure">
            <div id="chart"></div>
            <p class="highcharts-description">
              Bagan ini dapat memperlihatkan bagaimana perkembangan jumlah tindakan KB,Imunisasi,Pemeriksaan dan Persalinan dalam kurun waktu 5 bulan terakhir
            </p>
          </figure>
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

  @section('chart_footer')
  <script>
    Highcharts.chart('chart', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Bagan perkembangan tindakan'
  },
  subtitle: {
    text: 'Pada klinik bersalin bidan Endang'
  },
  xAxis: {
    categories: <?= json_encode($tahun_bulan); ?>
  },
  yAxis: {
    title: {
      text: 'Berdasarkan jumlah tindakan perbulan'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: true
    }
  },
  series: [{
    name: 'KB',
    data: <?= json_encode($kb); ?>
  },{
    name: 'Imunisasi',
    data: <?= json_encode($imunisasi); ?>
  },{
    name: 'Pemeriksaan',
    data: <?= json_encode($pemeriksaan); ?>
  },{
    name: 'Persalinan',
    data: <?= json_encode($persalinan); ?>
  }]
});
  </script>
  @endsection