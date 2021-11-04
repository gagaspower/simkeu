<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $judul;?> | Dashboard</title>
  <?php include(APPPATH.'views/layouts/style.php'); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/admin/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/admin/bower_components/select2-bootstrap-theme/dist/select2-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/admin/bower_components/bootstrap-table/dist/bootstrap-table.min.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<style>
td, th {
    vertical-align: middle !important;
}
</style>
</head>
  <body class="hold-transition skin-purple-light sidebar-mini">
<div class="wrapper">
<?php include(APPPATH.'views/layouts/header.php'); ?>
<?php include(APPPATH.'views/layouts/sidebar.php'); ?>
    <div class="content-wrapper">
        <!-- breadcumb -->
        <section class="content-header">
            <h1><?php echo $judul;?> </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo $judul;?></li>
            </ol>
        </section>
        <!-- content section -->
        <section class="content">
            <div class="row">
                <!-- konten here -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Periode</label>
                                    <select class="select2" name="periode_id" id="periode_id" required>
                                        <option value="">pilih</option>
                                        <?php foreach($periode as $row){ ?>
                                            <option value="<?php echo $row['id'];?>"> <?php echo $row['bulan_periode'];?> - <?php echo $row['tahun_periode']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary" id="search_report">Cari</button>
                                    <button type="button" class="btn btn-info" id="download">Download</button>
                                </div>
                            </div>
                            <br/>
                        </div>
                       
                       
                        <div class="box-body">
                            <div class="col-md-12">
                                <div id="printableAreadefault">
                                    <table class="table" style="font-weight:bold; padding: 5">
                                        <tr>
                                            <td>
                                                Saldo Awal Debit : 0 <br />
                                                Saldo Awal Kredit : 0
                                            </td>
                                            <td>
                                                Mutasi Debit : 0 <br />
                                                Mutasi Kredit : 0
                                            </td>
                                            <td>
                                                Saldo Akhir Debit : 0 <br />
                                                Saldo Akhir Kredit : 0
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered">
                                            <tr style="font-weight:bold;background-color:#a2b9bc;color:#FFFFFF">
                                                <td rowspan="2" style="text-align:center">Tanggal</td>
                                                <td rowspan="2" style="text-align:center">Keterangan</td>
                                                <td rowspan="2" style="text-align:center">No. Ref</td>
                                                <td rowspan="2" style="text-align:center">Debit</td>
                                                <td rowspan="2" style="text-align:center">Kredit</td>
                                                <td colspan="2" style="text-align:center">Saldo</td>
                                            </tr>
                                            <tr style="font-weight:bold;background-color:#a2b9bc;color:#FFFFFF">
                                                <td style="text-align:center"> Debit</td>
                                                <td style="text-align:center"> Kredit</td>
                                            </tr>
                                    </table>
                                </div>
                                <div id="printableArea"></div>
                            </div>
                        </div>
                    <!-- /.box-body -->
                    </div>
                </div>
                <!-- konten selesai -->
            </div>
        </section>
    </div>
    <?php include(APPPATH.'views/layouts/copyright.php'); ?>
</div>
<?php include(APPPATH.'views/layouts/jquery.php'); ?>
 <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/admin/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/admin/bower_components/bootstrap-table/src/extensions/export/bootstrap-table-export.js"></script>
<script src="<?php echo base_url();?>assets/theme/admin/js/tableExport.js"></script>
<script src="<?php echo base_url();?>assets/theme/admin/js/FileSaver.min.js"></script>
<script src="<?php echo base_url();?>assets/theme/admin/js/jspdf.min.js"></script>
<script src="<?php echo base_url();?>assets/theme/admin/js/jspdf.plugin.autotable.js"></script>
<script src="<?php echo base_url(); ?>assets/theme/admin/bower_components/numeral/min/numeral.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/theme/admin/js/xlsx.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/theme/admin/js/papaparse.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/theme/admin/js/FileSaver.min.js"></script>
<script>
    $( ".select2" ).select2({
        theme: "bootstrap"
    });
    $(".select2").width("100%");
    $("#download").hide();

    function moneyFormatter(value){
            return numeral(value).format('0,0.00');
        }

    $('#download').click(function (e) {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('div[id$=printableArea]').html()));
        e.preventDefault();
    });

    $(function () {
            $("#search_report").click(function () {
                searchItem();
            });
        });

        function searchItem() {
                var periode_id = $("#periode_id").val();
                console.log(periode_id);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>get-buku-besar",
                    data: {
                        periode_id : periode_id
                    },
                    dataType: 'json',
                    success: function (data) {
                        var html = '';
                        html += '<center><strong><h3>BUKU BESAR</h3><br><h4>Periode : ' + data.periode.bulan_periode + '&nbsp;' + data.periode.tahun_periode + '</h4></strong></center>';

                        html +='<table class="table" style="font-weight:bold; padding: 5">'+
                                '<tr>'+
                                    '<td>'+
                                        'Saldo Awal Debit : 0 <br />'+
                                        'Saldo Awal Kredit : 0'+
                                    '</td>'+
                                    '<td>'+
                                        'Mutasi Debit : &nbsp;&nbsp;&nbsp;&nbsp;' + moneyFormatter(data.total_debit) + '<br />'+
                                        'Mutasi Kredit : &nbsp;&nbsp;&nbsp;&nbsp;' + moneyFormatter(data.total_kredit) + '</td>'+
                                    '<td>'+
                                        'Saldo Akhir Debit :  &nbsp;&nbsp;&nbsp;&nbsp;' + moneyFormatter(data.saldo_akhir_debit) + '<br />'+
                                        'Saldo Akhir Kredit : 0'+
                                    '</td>'+
                                '</tr>'+
                            '</table>';
                        html += '<table class="table table-bordered">'+
                                    '<tr style="font-weight:bold;background-color:#a2b9bc;color:#FFFFFF">'+
                                        '<td rowspan="2" style="text-align:center">Tanggal</td>'+
                                        '<td rowspan="2" style="text-align:center">Keterangan</td>'+
                                        '<td rowspan="2" style="text-align:center">No. Ref</td>'+
                                        '<td rowspan="2" style="text-align:center">Debit</td>'+
                                        '<td rowspan="2" style="text-align:center">Kredit</td>'+
                                        '<td colspan="2" style="text-align:center">Saldo</td>'+
                                    '</tr>'+
                                    '<tr style="font-weight:bold;background-color:#a2b9bc;color:#FFFFFF">'+
                                        '<td style="text-align:center"> Debit</td>'+
                                        '<td style="text-align:center"> Kredit</td>'+
                                    '</tr>';
                        // loop data disini
                        var debit = parseInt(0);
                        var kredit = parseInt(0);
                        var hasil = parseInt(0);
                        for (let x = 0; x < data.item.length; x++) 
                            {

                            debit += parseInt(data.item[x].debit);
                            kredit += parseInt(data.item[x].kredit);
                            hasil = debit - kredit;
                            // console.log(debit);
                            html +='<tr>'+
                                        '<td style="text-align:center">'+data.item[x].tgl_trx +'</td>'+
                                        '<td>'+data.item[x].detail_trx+'</td>'+
                                        '<td style="text-align:center">'+data.item[x].kode_trx+'</td>'+
                                        '<td style="text-align:right">'+moneyFormatter(data.item[x].debit)+'</td>'+
                                        '<td style="text-align:right">'+moneyFormatter(data.item[x].kredit)+'</td>';
                            if(hasil > 0){
                                html += '<td style="text-align:right">'+moneyFormatter(hasil)+'</td>'+
                                        '<td style="text-align:right">0</td>';
                            }else{
                                html += '<td style="text-align:right">0</td>'+
                                        '<td style="text-align:right">'+moneyFormatter(hasil)+'</td>';
                            }

                                html +='</tr>';

                            }
                        html += '<tr>'+
                                '<td colspan = "3" style="text-align:center;font-weight:bold">Total</td>'+
                                '<td style="text-align:right;font-weight:bold">' + moneyFormatter(data.total_debit) + '</td>'+
                                '<td style="text-align:right;font-weight:bold">' + moneyFormatter(data.total_kredit) + '</td>'+
                                '<td colspan = "2"></td>'+
                                '</tr>';
                        html += '</table>';
                     
                        $('#printableArea').html(html);
                        $('#printableAreadefault').hide();
                        $("#download").show();
                        },
                    error: function(data){
                        console.log(data);
                    }
                }); 
            }


</script>
</body>
</html>
