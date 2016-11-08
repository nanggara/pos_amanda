<!-- Data Grid ( #dg-barang ) -->
<div style="padding:1px">
	<table id="dg-barang" title="Barang" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/barang/index',array('grid'=>true)); ?>" 
		toolbar="#tb-barang" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="kd_barang" width="50" sortable="true">Kd Barang</th>
			<th field="nm_barang" width="50" sortable="true">Nm Barang</th>
			<th field="tgl_produksi" width="50" sortable="true">Tgl Produksi</th>
			<th field="harga_beli" width="50" sortable="true">Harga Beli</th>
			<th field="harga_jual1" width="50" sortable="true">Harga Jual1</th>
			<th field="harga_jual2" width="50" sortable="true">Harga Jual2</th>
			<th field="stock_awal" width="50" sortable="true">Stock Awal</th>
			<th field="stock" width="50" sortable="true">Stock</th>
			<th field="reject_awal" width="50" sortable="true">Reject Awal</th>
			<th field="reject" width="50" sortable="true">Reject</th>
			<th field="prc" width="50" sortable="true">Prc</th>
			<th field="gambar" width="50" sortable="true">Gambar</th>
			<th field="harga_prod" width="50" sortable="true">Harga Prod</th>
			<th field="kd_jenis" width="50" sortable="true">Kd Jenis</th>
			<th field="hpp" width="50" sortable="true">Hpp</th>
		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-barang ) -->
<div id="tb-barang">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-barang','#f-barang','Create Barang','<?php echo $this->createUrl('/barang/create'); ?>')">Create Barang</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-barang','#f-barang','Update Barang','#dg-barang','<?php echo $this->createUrl('/barang/update'); ?>')">Update Barang</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-barang','<?php echo $this->createUrl('/barang/delete'); ?>')">Delete Barang</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-barang')">Search</a>
	

</div>

<!-- Dialog Form ( #df-barang ) -->
<div id="df-barang" class="easyui-dialog" style="width: 400px; height: 400px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-barang">
	<form id="f-barang" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="kd_barang">Kd Barang</label><br />
			<input type="text" name="kd_barang" class="easyui-validatebox" required="true" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="nm_barang">Nm Barang</label><br />
			<input type="text" name="nm_barang" class="easyui-validatebox" maxlength="100" size="53" />
		</div>
		
		<div class="form-item">
			<label for="tgl_produksi">Tgl Produksi</label><br />
			<input type="text" name="tgl_produksi" class="easyui-datetimebox" label="Select DateTime:" labelPosition="top" style="width:100%;" size="53" />
		</div>
		
		
		<div class="form-item">
			<label for="harga_beli">Harga Beli</label><br />
			<input type="text" name="harga_beli" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
		<div class="form-item">
			<label for="harga_jual1">Harga Jual1</label><br />
			<input type="text" name="harga_jual1" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
		<div class="form-item">
			<label for="harga_jual2">Harga Jual2</label><br />
			<input type="text" name="harga_jual2" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
		<div class="form-item">
			<label for="stock_awal">Stock Awal</label><br />
			<input type="text" name="stock_awal" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
		<div class="form-item">
			<label for="stock">Stock</label><br />
			<input type="text" name="stock" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
		<div class="form-item">
			<label for="reject_awal">Reject Awal</label><br />
			<input type="text" name="reject_awal" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
		<div class="form-item">
			<label for="reject">Reject</label><br />
			<input type="text" name="reject" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
		<div class="form-item">
			<label for="prc">Prc</label><br />
			<input type="text" name="prc" class="easyui-validatebox easyui-numberspinner" size="53" />
		</div>
		<div class="form-item">
			<label for="gambar">Gambar</label><br />
			<input type="text" name="gambar" class="easyui-validatebox" maxlength="255" size="53" />
		</div>
		<div class="form-item">
			<label for="harga_prod">Harga Prod</label><br />
			<input type="text" name="harga_prod" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
		<div class="form-item">
			<label for="kd_jenis">Kd Jenis</label><br />
			<input type="text" name="kd_jenis" class="easyui-validatebox easyui-numberspinner" size="53" />
		</div>
		<div class="form-item">
			<label for="hpp">Hpp</label><br />
			<input type="text" name="hpp" class="easyui-validatebox" maxlength="10" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-barang ) -->
<div id="bf-barang">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-barang','#df-barang','#dg-barang')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-barang').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-barang ) -->
<div id="ds-barang" class="easyui-dialog" style="width:400px; height:400px; padding: 10px 20px" closed="true" buttons="#bs-barang" iconCls="IconMagnifier" >
	<label for="search_barang_kd_barang">Kd Barang</label>
	<input type="text" name="search_barang_kd_barang" id="fs-barang-kd_barang" size="52" />
	<label for="search_barang_nm_barang">Nm Barang</label>
	<input type="text" name="search_barang_nm_barang" id="fs-barang-nm_barang" size="52" />
	<label for="search_barang_tgl_produksi">Tgl Produksi</label>
	<input type="text" name="search_barang_tgl_produksi" id="fs-barang-tgl_produksi" size="52" />
	<label for="search_barang_harga_beli">Harga Beli</label>
	<input type="text" name="search_barang_harga_beli" id="fs-barang-harga_beli" size="52" />
	<label for="search_barang_harga_jual1">Harga Jual1</label>
	<input type="text" name="search_barang_harga_jual1" id="fs-barang-harga_jual1" size="52" />
	<label for="search_barang_harga_jual2">Harga Jual2</label>
	<input type="text" name="search_barang_harga_jual2" id="fs-barang-harga_jual2" size="52" />
	<label for="search_barang_stock_awal">Stock Awal</label>
	<input type="text" name="search_barang_stock_awal" id="fs-barang-stock_awal" size="52" />
	<label for="search_barang_stock">Stock</label>
	<input type="text" name="search_barang_stock" id="fs-barang-stock" size="52" />
	<label for="search_barang_reject_awal">Reject Awal</label>
	<input type="text" name="search_barang_reject_awal" id="fs-barang-reject_awal" size="52" />
	<label for="search_barang_reject">Reject</label>
	<input type="text" name="search_barang_reject" id="fs-barang-reject" size="52" />
	<label for="search_barang_prc">Prc</label>
	<input type="text" name="search_barang_prc" id="fs-barang-prc" size="52" />
	<label for="search_barang_gambar">Gambar</label>
	<input type="text" name="search_barang_gambar" id="fs-barang-gambar" size="52" />
	<label for="search_barang_harga_prod">Harga Prod</label>
	<input type="text" name="search_barang_harga_prod" id="fs-barang-harga_prod" size="52" />
	<label for="search_barang_kd_jenis">Kd Jenis</label>
	<input type="text" name="search_barang_kd_jenis" id="fs-barang-kd_jenis" size="52" />
	<label for="search_barang_hpp">Hpp</label>
	<input type="text" name="search_barang_hpp" id="fs-barang-hpp" size="52" />
</div>

<!-- Button Search ( #bs-barang ) -->
<div id="bs-barang">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_barang()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-barang').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_barang(){
	jQuery('#dg-barang').datagrid('load',{
		kd_barang: jQuery('#fs-barang-kd_barang').val(),
		nm_barang: jQuery('#fs-barang-nm_barang').val(),
		tgl_produksi: jQuery('#fs-barang-tgl_produksi').val(),
		harga_beli: jQuery('#fs-barang-harga_beli').val(),
		harga_jual1: jQuery('#fs-barang-harga_jual1').val(),
		harga_jual2: jQuery('#fs-barang-harga_jual2').val(),
		stock_awal: jQuery('#fs-barang-stock_awal').val(),
		stock: jQuery('#fs-barang-stock').val(),
		reject_awal: jQuery('#fs-barang-reject_awal').val(),
		reject: jQuery('#fs-barang-reject').val(),
		prc: jQuery('#fs-barang-prc').val(),
		gambar: jQuery('#fs-barang-gambar').val(),
		harga_prod: jQuery('#fs-barang-harga_prod').val(),
		kd_jenis: jQuery('#fs-barang-kd_jenis').val(),
		hpp: jQuery('#fs-barang-hpp').val(),
	});
}
</script>