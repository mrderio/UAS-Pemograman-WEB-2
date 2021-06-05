<?php  
include "header.php";
include_once 'includes/pembelian.inc.php';
$pro = new Pembelian($db);
$stmt = $pro->readAll();
$count = $pro->countAll();


if(isset($_POST['hapus-contengan'])){
    $imp = "('".implode("','",array_values($_POST['checkbox']))."')";
    $result = $pro->hapusell($imp)&&$pro->hapusellItem($imp);
    if($result){
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showSuccessToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 500);                                                                                                      
            };
            </script>
            <?php
    } else{
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showErrorToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 500);
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
	  <li class="active"><span class="fa fa-wrench"></span> Data Service</li>
	</ol>
<form method="post">
    <div class="row">
        <div class="col-md-6 text-left">
            <strong style="font-size:18pt;"><span class="fa fa-wrench"></span> Data Service</strong>
        </div>
        <div class="col-md-6 text-right">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Yang Ditandai</button>
            <button type="button" onclick="location.href='pembelian-baru.php'" class="btn btn-warning"><span class="fa fa-clone"></span> Tambah Data</button>
        </div>
    </div>
    <br/>
    <table width="100%"  class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th><input type="checkbox" name="select-all" id="select-all" /></th>
                <th style="text-align:center">Nama Pelanggan</th>
                <th style="text-align:center">Nama Mekanik</th>
                <th style="text-align:center">Sparepart & Qty</th>
                <th style="text-align:center">Harga Jasa</th>
                <th style="text-align:center">Harga Total</th>
                <th style="text-align:center">Aksi</th>
            </tr>
			
        </thead>
		
		
               <tbody>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $pro->id_pembelian=$row['id_pembelian'];
    ?>
            <tr>
            <td style="align:center;"><input type="checkbox" value="<?php echo $row['id_pembelian'] ?>" name="checkbox[]" /></td>
            <td style="align:center;"><?php echo $row['nama'] ?></td>
            <td style="align:center;"><?php echo $row['nama_mekanik']  ?></td>
            
            <td style="align:center;">
            <?php
            $stmt_item = $pro->readAllItem();
            $stmt_total = $pro->countHargaTotal();
                while ($row_item = $stmt_item->fetch(PDO::FETCH_ASSOC)){
                    $total=($row_item['harga']*$row_item['qty'])-($row_item['harga']*$row_item['qty'])*
                    ($row_item['diskon']/100);
	
	        ?>

            <?php echo $row_item['sparepart'].' ( Rp.'.number_format($row_item['harga']).' ) '.' X '.
                       $row_item['qty'].' = Rp.'.number_format($total).'( Diskon '.$row_item['diskon'].'% )'; ?></br>

                <?php 
                    }
                ?>
            </td>

            <td style="vertical-align:middle;">Rp.<?php echo number_format($row['harga_jasa']) ?></td>

            <td style="vertical-align:middle;">Rp.
            <?php

                while ($row_harga = $stmt_total->fetch(PDO::FETCH_ASSOC)){
	
	        ?>
            <?php echo number_format($row_harga['total_harga']+$row['harga_jasa']); ?>

            <?php
                }
            ?>
            </td>


            <td class="text-center" style="vertical-align:middle;">
                <a href="pembelian-cetak.php?id=<?php echo $row['id_pembelian'] ?>" class="btn btn-warning" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
                
    		  <a href="pembelian-hapus.php?id=<?php echo $row['id_pembelian'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    	    </td>

            </tr>
		 <?php
    }
    ?>	
   
        </tbody>
    </table>
    </form> 
</div>
</div>	
<?php include "footer.php"; ?>
