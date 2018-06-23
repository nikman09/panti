<script type="text/javascript">
$(document).ready(function(){
	
});


</script>
<div class="row-fluid">
<div class="table-header">
    <?php echo $judul;?> 
    <div class="widget-toolbar no-border pull-right">
    <a href="<?php echo base_url();?>index.php/jadwal/tambah" class="btn btn-small btn-success"  name="tambah" id="tambah" >
        <i class="icon-check"></i>
        Tambah Data
    </a>
    <a href="<?php echo site_url();?>/jadwal" class="btn btn-small btn-info"  >
        <i class="icon-refresh"></i>
        Refresh
    </a>
    </div>
</div>

<table  class="table fpTable lcnp table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="center">No</th>

            <th class="center">Program Studi</th>
            <th class="center">Status</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
		$i=1;
		foreach($data->result() as $dt){ 
			$nama_probi = $this->model_probi->nama_jurusan($dt->kd_probi);
			$jml = $this->model_probi->jml_data_jadwal($dt->kd_probi);
			
		?>
        <tr>
        	<td class="center span1"><?php echo $i++?></td>
            <td ><?php echo $dt->kd_probi;?> - <?php echo $nama_probi;?></td>
            <td class="center"><?php echo $jml;?> Jadwal</td>
        </tr>
		<?php } ?>
    </tbody>
</table>
</div>