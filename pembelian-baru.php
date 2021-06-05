<?php
include_once 'header.php';
if($_POST){
	
	include_once 'includes/pembelian.inc.php';
	$eks = new Pembelian($db);

	$eks->id_mekanik = $_POST['id_mekanik'];
	$eks->id_sparepart = $_POST['id_sparepart'];
	$eks->id_pelanggan = $_POST['id_pelanggan'];
	$eks->qty = $_POST['qty'];
	$eks->harga_jasa = $_POST['harga_jasa'];
	$eks->tgl_beli = $_POST['tgl_beli'];
		
	if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
	showStickySuccessToast();
	setTimeout(function(){
		window.location.href = "pembelian.php";

	}, 1000); 	
};
</script>
<?php
	}
	
	else{
?>
<script type="text/javascript">
window.onload=function(){
	showStickyErrorToast();
};

</script>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-2">
		  <?php
			include_once 'sidebar.php';
			?>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-10">
		  <ol class="breadcrumb">
			  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			  <li><a href="pembelian.php"><span class="fa fa-wrench"></span> Data Service</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-wrench"></span> Tambah Data Service</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
				<form action="proses.php" method="POST">
				<div class="form-group">

				    <label for="nama">Nama Pelanggan</label>
				    <select class="form-control" id="id_pelanggan" name="id_pelanggan">
					<?php
					$conn = mysql_connect("localhost","progra12_elan","palapeyang926");
					mysql_select_db("progra12_bengkel",$conn); 
					$result = mysql_query("SELECT * FROM 213_pelanggan");
					?>
					<?php
					$i=0;
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row["id_pelanggan"];?>"><?=$row["nama"];?></option>
					<?php
					$i++;
					}
					?>
					</select>
				  </div>

				   <div class="form-group">
				    <label for="nama_mekanik">Nama Mekanik</label>
				    <select class="form-control" id="id_mekanik" name="id_mekanik">
					<?php
					$conn = mysql_connect("localhost","progra12_elan","palapeyang926");
					mysql_select_db("progra12_bengkel",$conn); 
					$result = mysql_query("SELECT * FROM 213_mekanik");
					?>
					<?php
					$i=0;
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row["id_mekanik"];?>"><?=$row["nama_mekanik"];?></option>
					<?php
					$i++;
					}
					?>
					</select>
				  </div>
				  <div class="form-group row after-add-more">
				  <div class="form-group col-md-6">
				    <label for="id_sparepart">Sparepart</label>
				    <select class="form-control" id="id_sparepart"  name="id_sparepart[]">
					<?php
					$conn = mysql_connect("localhost","progra12_elan","palapeyang926");
					mysql_select_db("progra12_bengkel",$conn); 
					$result = mysql_query("SELECT * FROM 213_sparepart where stock > 0 ");
					?>
					<?php
					$i=0;
					while($row = mysql_fetch_array($result)) {
					?>
					
					<option value="<?=$row["id_sparepart"];?>"><?=$row["sparepart"];?></option>
					<?php
					$i++;
					}
					?>
					</select>
				  </div>
				  <div class="form-group col-md-2">
				  <label for="qty">Banyaknya(qty)</label>
				  <input type="number" class="form-control" id="qty" name="qty[]" required>
				  </div>
				  <label for="diskon">Diskon (%)</label>
				  <div class="input-group col-md-2">
				    <td><input type="number" class="form-control" id="diskon" name="diskon[]"  required ></td>
					<td><span class="input-group-btn">
					<button class="btn btn-success add-more" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true">
					</span></button></td>
				</div>
				 
				
				
				
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
                    
					</div>
					
				  <div class="form-group">
				    <label for="tgl_beli">Tanggal Service</label>
				    <input type="text" class="form-control" id="dtgl_beli" name="tgl_beli" value="<?php echo $date = date('Y-m-d'); ?>" required >
				  </div>
				 
				   <div class="form-group">
				    <label for="harga_jasa">Harga Jasa</label>
				    <input type="text" class="form-control" id="harga_jasa" name="harga_jasa" required>
				  </div>

				 
				  
				  <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
				  <button type="button" onclick="location.href='pembelian.php'" class="btn btn-info"><span class="fa fa-history"></span> Kembali</button>
				</form>

				</div>
				</div>
				<div class="copy hide">
				<div class="form-group row control-group">
				  <div class="form-group col-md-6">
				    <label for="id_sparepart">Sparepart</label>
				    <select class="form-control" id="id_sparepart"  name="id_sparepart[]">
					<?php
					$conn = mysql_connect("localhost","progra12_elan","palapeyang926");
					mysql_select_db("progra12_bengkel",$conn); 
					$result = mysql_query("SELECT * FROM 213_sparepart where stock > 0 ");
					?>
					<?php
					$i=0;
					while($row = mysql_fetch_array($result)) {
					?>
					
					<option value="<?=$row["id_sparepart"];?>"><?=$row["sparepart"];?></option>
					<?php
					$i++;
					}
					?>
					</select>
				  </div>
				  <div class="form-group col-md-2">
				  <label for="qty">Banyaknya(qty)</label>
				  <input type="number" class="form-control" id="qty" name="qty[]" required>
				  </div>
				  <label for="diskon">Diskon (%)</label>
				  <div class="input-group col-md-2">
				    <td><input type="number" class="form-control" id="diskon" name="diskon[]"  required ></td>
					<td><span class="input-group-btn">
					<button class="btn btn-danger remove" type="button"><span class="glyphicon glyphicon-remove" aria-hidden="true">
					</span></button></td>		
				</div>
						

					
				</div>
			  
		  </div>
		</div>

		
		
		<?php
include_once 'footer.php';

?>
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>-->
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->