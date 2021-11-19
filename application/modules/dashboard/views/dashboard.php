<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-grey"><i class="fa fa-dollar"></i></span>

          <div class="info-box-content">
            <span class="info-box-text dash-text">Penerimaan Hari Ini</span>
            <a href="manage/debit">
            <span class="info-box-number"><?php echo 'Rp. ' . number_format($total_bulan, 0, ',', '.') ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-grey"><i class="fa fa-bank"></i></span>

          <div class="info-box-content">
            <?php
            $totalAll = $total_bulan+$total_bebas+$total_debit;
            ?>
            <span class="info-box-text dash-text">Total Penerimaan</span>
            <a href="#">
            <span class="info-box-number"><?php echo 'Rp. ' . number_format($totalAll - $total_kredit,0, ',', '.') ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-grey"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text dash-text">Siswa Aktif</span>
            <a href="manage/student">
            <span class="info-box-number"><?php echo $student ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      
    </div>

    <div class="row">
      <!-- /.col -->

      <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<canvas id="myChart" style="width:500px;height:423px"></canvas>

<script>
var xValues = ["Juni","Juli","Agstus","September","Oktober","November","Desember","Januari","Februari","Maret","April","Mei","Juni"];
var yValues = [25.000,50.000,100.000,150.000,200.000,250.000,300.000];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "orange",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Kalender</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">

            <div id="calendar"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- row -->



  </section>
  <!-- /.content -->
</div>

<div class="modal fade in" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <?php echo form_open(current_url()); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addModalLabel">Tambah Agenda</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="add" value="1">
        <label>Tanggal*</label>
        <p id="labelDate"></p>
        <input type="hidden" name="date" class="form-control" id="inputDate">
        <label >Keterangan*</label>
        <textarea name="info" id="inputDesc" class="form-control"></textarea><br />
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnSimpan" class="btn btn-success">Simpan</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <?php echo form_open(current_url()); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="delModalLabel">Hapus Hari Libur</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="del" value="1">
        <input type="hidden" name="id" id="idDel">
        <label>Tahun</label>
        <p id="showYear"></p>
        <label>Tanggal</label>
        <p id="showDate"></p>
        <label >Keterangan*</label>
        <p id="showDesc"></p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>

<script type="text/javascript">
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'prevYear,nextYear',
    },
    
    events: "<?php echo site_url('manage/dashboard/get');?>",

    dayClick: function(date, jsEvent, view) {

      var tanggal = date.getDate();
      var bulan = date.getMonth()+1;
      var tahun = date.getFullYear();
      var fullDate = tahun + '-' + bulan + '-' + tanggal;

      $('#addModal').modal('toggle');
      $('#addModal').modal('show');

      $("#inputDate").val(fullDate);
      $("#labelDate").text(fullDate);
      $("#inputYear").val(date.getFullYear());
      $("#labelYear").text(date.getFullYear());
    },

    eventClick: function(calEvent, jsEvent, view) {
      $("#delModal").modal('toggle');
      $("#delModal").modal('show');
      $("#idDel").val(calEvent.id);
      $("#showYear").text(calEvent.year);

      var tgl = calEvent.start.getDate();
      var bln = calEvent.start.getMonth()+1;
      var thn = calEvent.start.getFullYear();

      $("#showDate").text(tgl+'-'+bln+'-'+thn);
      $("#showDesc").text(calEvent.title);
    }


  });

  $("#inputDesc").on('change keyup focus input propertychange', function(){
    var desc = $("#inputDesc").val();
    if (desc.trim().length > 0) {
      $("#btnSimpan").removeClass('disabled');
    }else{
      $("#btnSimpan").addClass('disabled');
    }
  })

  $("#closeModal").click(function(){
    $("#inputDesc").val('');
    $("#btnSimpan").addClass('disabled');
  });

</script>  