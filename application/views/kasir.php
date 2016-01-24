<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kasir</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?= base_url('assets/bootstrap-3.3.5/css/bootstrap.min.css') ?>">
  	<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
  	<link rel="stylesheet" href="<?= base_url('assets/datatables/css/dataTables.bootstrap.css') ?>">

  	<script src="<?= base_url('assets/jquery-2.1.4.min.js') ?>"></script>
  	<script src="<?= base_url('assets/bootstrap-3.3.5/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
  	<script src="<?= base_url('assets/maskMoney/jquery.maskMoney.min.js') ?>"></script>
  	<style type="text/css">
	  	#header,#footer{
	  		background-color: #337ab7;
	  		color: #fff;
	  		text-align: center;
	  	}
	  	#header{
	  		margin-bottom: 30px;
	  	}
	  	#header h1{
	  		margin: 0;
	  		padding: 15px;
	  	}
	  	#footer{
	  		padding: 3px;
	  	}
	  	.btn{
			border-radius: 2px;
		}
		.btn-kecil{
			padding: 0 6px 0 6px;
		}
		.form-control[disabled], .form-control[readonly], 
		fieldset[disabled] .form-control{
			background-color: #EBF2F8;
		}
		.besar{
			font-size: 20px;
			font-weight: 300;
		}
		table th,table td{
			text-align: center;
		}
		form{
			margin-top: 20px;
		}
		.mb{
			margin-bottom: 30px;
		}
		.nav ul li{
			list-style: none;
		}
		.nav ul{
			padding-left: 20px;
			
		}
		.nav ul li a{
			text-decoration: none;
			display: block;
			padding: 4px;
			margin: 3px;
		}
		.nav ul li a:hover{
			text-decoration: none;
			color: #fff;
			background-color: #337ab7;
			border-radius: 2px;
		}
		.nav>li>a:hover{
			background-color: #337ab7;
			color: #fff;
		}
		.nav ul .active{
			background-color: #337ab7;
			border-radius: 2px;
		}
		.nav ul .active a{
			color: #fff;
		}
		.nav li a:active,.nav li a:focus{
			background-color: #337ab7;
			border-radius: 2px;
			color: #fff;
		}
  	</style>
</head>
<body>
<div id="header">
<h1>Aplikasi Kasir</h1>
</div><!-- end header -->
	<div class="col-md-3">
		<div class="panel panel-default">
		  <div class="panel-body">
			<ul class="nav nav-pills nav-stacked">
			  <li class="active">
			  	<a data-toggle="collapse" data-parent="#accordion" 
			  		href="#collapse1"><i class="fa fa-shopping-cart"></i> Penjualan</a>
			  		<div id="collapse1" class="panel-collapse collapse in">
				  		<ul>
				  			<li class="active"><a href="#"><i class="fa fa-cart-plus"></i>
				  				Tambah Penjualan</a></li>
				  			<li><a href="#"><i class="fa fa-list-ul"></i>
				  				List Data Penjualan</a></li>
				  		</ul>
			  		</div>
			  	</li>
			  <li><a data-toggle="collapse" data-parent="#accordion" 
			  		href="#collapse2"><i class="fa fa-cubes"></i> Barang</a>
			  		<div id="collapse2" class="panel-collapse collapse">
				        <ul>
				  			<li><a href="#"><i class="fa fa-plus"></i>
				  				Tambah Barang</a></li>
				  			<li><a href="#"><i class="fa fa-list-ul"></i>
				  				List Data Barang</a></li>
				  		</ul>
			      	</div>	
			  </li>
			  <li><a href="#">Menu 2</a></li>
			  <li><a href="#">Menu 3</a></li>
			</ul>
		  </div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
		 <div class="panel-body">
		 	<form class="form-horizontal" id="form_transaksi" role="form">
	      	<div class="col-md-8">
			    <!-- <div class="panel panel-default">
				  <div class="panel-body"> -->
	      		<!-- <div class="form-group">
			      <label class="control-label col-md-4" 
			      	for="tgl_transaksi">Tgl.Transaksi :</label>
			      <div class="col-md-5">
			        <input type="text" class="form-control" 
			        	name="tgl_transaksi" value="<?= date('d-m-Y') ?>" 
			        	readonly="readonly">
			      </div>
			    </div> -->
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="id_barang">Id Barang :</label>
			      <div class="col-md-5">
			        <input list="list_barang" class="form-control reset" 
			        	placeholder="Isi id..." name="id_barang" id="id_barang" 
			        	autocomplete="off" onchange="showBarang(this.value)">
	                  <datalist id="list_barang">
	                  	<?php foreach ($barang as $barang): ?>
	                  		<option value="<?= $barang->id_barang ?>"><?= $barang->nama_barang ?></option>
	                  	<?php endforeach ?>
	                  </datalist>
			      </div>
			      <div class="col-md-1">
			      	<a href="javascript:;" class="btn btn-primary" 
			      		data-toggle="modal" 
			      		data-target="#modal-cari-barang">
			      		<i class="fa fa-search"></i></a>
		          </div>
			    </div>
			    <div id="barang">
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_barang" id="nama_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="harga_barang" id="harga_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	autocomplete="off" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" id="qty" min="0" 
				        	name="qty" placeholder="Isi qty...">
				      </div>
				    </div>
			    </div><!-- end id barang -->
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="sub_total">Sub-Total (Rp):</label>
			      <div class="col-md-8">
			        <input type="text" class="form-control reset" 
			        	name="sub_total" id="sub_total" 
			        	readonly="readonly">
			      </div>
			    </div>
			    <div class="form-group">
			    	<div class="col-md-offset-3 col-md-3">
			      		<button type="button" class="btn btn-primary" 
			      		id="tambah" onclick="addbarang()">
			      		  <i class="fa fa-cart-plus"></i> Tambah</button>
			    	</div>
			    </div>
			      <!-- </div>
			    </div> --><!-- end panel-->
	      	</div><!-- end col-md-8 -->
	      	<div class="col-md-4 mb">
				<div class="col-md-12">
				  	<div class="form-group">
				      <label for="total" class="besar">Total (Rp) :</label>
				      	<input type="text" class="form-control input-lg" 
			        	name="total" id="total" placeholder="0"
			        	readonly="readonly"  value="<?= number_format( 
                    	$this->cart->total(), 0 , '' , '.' ); ?>">
				    </div>
				    <div class="form-group">
				      <label for="bayar" class="besar">Bayar (Rp) :</label>
				        <input type="text" class="form-control input-lg uang" 
				        	name="bayar" placeholder="0" autocomplete="off"
				        	id="bayar" onkeyup="showKembali(this.value)">
				    </div>
				    <div class="form-group">
				      <label for="kembali" class="besar">Kembali (Rp) :</label>
				      	<input type="text" class="form-control input-lg" 
			        	name="kembali" id="kembali" placeholder="0"
			        	readonly="readonly">
				    </div>
				</div>
	      	</div><!-- end col-md-4 -->
	      	</form>

	      	<table id="table_transaksi" class="table table-striped 
	      		table-bordered">
				<thead>
				 	<tr>
					   	<th>No</th>
					   	<th>Id Barang</th>
					   	<th>Nama Barang</th>
					   	<th>Harga</th>
					   	<th>Quantity</th>
					   	<th>Sub-Total</th>
					   	<th>Aksi</th>
				 	</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="col-md-offset-8" style="margin-top:20px">
				<button type="button" class="btn btn-primary btn-lg" 
				id="selesai" disabled="disabled" 
				onclick="alert('Belum ada action untuk save pejualan')">
				Selesai <i class="fa fa-angle-double-right"></i></button>
			</div>
	      </div>
	    </div>
	</div><!-- end col-md-9 -->
	<div class="col-md-12" id="footer">
		<small>Copyright <?= date('Y') ?>, All Right Reserved.</small>
	</div>

	<!-- Modal selesai -->
  <div class="modal fade" id="modal-cari-barang" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal cari barang dengan AJAX</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
          	<div class="form-group has-primary has-feedback">
            	<input type="text" class="form-control input-lg" placeholder="Search for...">
            	<span class="glyphicon glyphicon-search form-control-feedback"></span>
          	</div>
          	<table class="table">
          		<thead>
          			<tr>
          				<th>asd</th>
          				<th>asd</th>
          				<th>asd</th>
          				<th>asd</th>
          				<th>asd</th>
          				<th>asd</th>
          			</tr>
          		</thead>
          	</table>
		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        </div>
      </div>
      
    </div>
  </div>

	<script type="text/javascript">

	function showBarang(str) 
	{

	    if (str == "") {
	        $('#nama_barang').val('');
	        $('#harga_barang').val('');
	        $('#qty').val('');
	        $('#sub_total').val('');
	        $('#reset').hide();
	        return;
	    } else { 
	      if (window.XMLHttpRequest) {
	          // code for IE7+, Firefox, Chrome, Opera, Safari
	           xmlhttp = new XMLHttpRequest();
	      } else {
	          // code for IE6, IE5
	          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	      }
	      xmlhttp.onreadystatechange = function() {
	           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	              document.getElementById("barang").innerHTML = 
	              xmlhttp.responseText;
	          }
	      }
	      xmlhttp.open("GET", "<?= base_url(
	        'index.php/kasir/getbarang') ?>/"+str,true);
	      xmlhttp.send();
	    }
	}

	function subTotal(qty)
	{

		var harga = $('#harga_barang').val().replace(".", "").replace(".", "");

		$('#sub_total').val(convertToRupiah(harga*qty));
	}

	function convertToRupiah(angka)
	{

	    var rupiah = '';    
	    var angkarev = angka.toString().split('').reverse().join('');
	    
	    for(var i = 0; i < angkarev.length; i++) 
	      if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	    
	    return rupiah.split('',rupiah.length-1).reverse().join('');
	
	}

	var table;
    $(document).ready(function() {

      showKembali($('#bayar').val());

      table = $('#table_transaksi').DataTable({ 
        paging: false,
        "info": false,
        "searching": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' 
        // server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= site_url('kasir/ajax_list_transaksi')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,1,2,3,4,5,6 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {

      table.ajax.reload(null,false); //reload datatable ajax 
    
    }

    function addbarang()
    {
        var id_barang = $('#id_barang').val();
        var qty = $('#qty').val();
        if (id_barang == '') {
          $('#id_barang').focus();
        }else if(qty == ''){
          $('#qty').focus();
        }else{
       // ajax adding data to database
          $.ajax({
            url : "<?= site_url('kasir/addbarang')?>",
            type: "POST",
            data: $('#form_transaksi').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding data');
            }
        });

          showTotal();
          showKembali($('#bayar').val());
          //mereset semua value setelah btn tambah ditekan
          $('.reset').val('');
        };
    }

    function deletebarang(id,sub_total)
    {
        // ajax delete data to database
          $.ajax({
            url : "<?= site_url('kasir/deletebarang')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

          var ttl = $('#total').val().replace(".", "");

          $('#total').val(convertToRupiah(ttl-sub_total));

          showKembali($('#bayar').val());
    }

    function showTotal()
    {

    	var total = $('#total').val().replace(".", "").replace(".", "");

    	var sub_total = $('#sub_total').val().replace(".", "").replace(".", "");

    	$('#total').val(convertToRupiah((Number(total)+Number(sub_total))));

  	}

  	//maskMoney
	$('.uang').maskMoney({
		thousands:'.', 
		decimal:',', 
		precision:0
	});

	function showKembali(str)
  	{
	    var total = $('#total').val().replace(".", "").replace(".", "");
	    var bayar = str.replace(".", "").replace(".", "");
	    var kembali = bayar-total;

	    $('#kembali').val(convertToRupiah(kembali));

	    if (kembali >= 0) {
	      $('#selesai').removeAttr("disabled");
	    }else{
	      $('#selesai').attr("disabled","disabled");
	    };

	    if (total == '0') {
	      $('#selesai').attr("disabled","disabled");
	    };
  	}

	</script>
</body>
</html>