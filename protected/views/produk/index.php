<!-- Data Grid ( #dg-produk ) -->
<div style="padding:1px">
	<table id="dg-produk" title="Produk" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/produk/index',array('grid'=>true)); ?>" 
		toolbar="#tb-produk" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="kd_produk" width="50" sortable="true">Kd Produk</th>
			<th field="nm_produk" width="50" sortable="true">Nm Produk</th>
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


<!-- Toolbar Data Grid ( #tb-produk ) -->
<div id="tb-produk">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-produk','#f-produk','Create Produk','<?php echo $this->createUrl('/produk/create'); ?>')">Create Produk</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-produk','#f-produk','Update Produk','#dg-produk','<?php echo $this->createUrl('/produk/update'); ?>')">Update Produk</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-produk','<?php echo $this->createUrl('/produk/delete'); ?>')">Delete Produk</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-produk')">Search</a>
</div>

<!-- Dialog Form ( #df-produk ) -->
<div id="df-produk" class="easyui-dialog" style="width: 400px; height: 400px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-produk">
	<form id="f-produk" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="kd_produk">Kd Produk</label><br />
			<input type="text" name="kd_produk" class="easyui-validatebox" required="true" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="nm_produk">Nm Produk</label><br />
			<input type="text" name="nm_produk" class="easyui-validatebox" maxlength="100" size="53" />
		</div>
		<div class="form-item">
			<label for="tgl_produksi">Tgl Produksi</label><br />
			<input type="text" name="tgl_produksi" class="easyui-validatebox easyui-numberspinner" size="53" />
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

<!-- Button Form ( #bf-produk ) -->
<div id="bf-produk">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-produk','#df-produk','#dg-produk')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-produk').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-produk ) -->
<div id="ds-produk" class="easyui-dialog" style="width:400px; height:400px; padding: 10px 20px" closed="true" buttons="#bs-produk" iconCls="IconMagnifier" >
	<label for="search_produk_kd_produk">Kd Produk</label>
	<input type="text" name="search_produk_kd_produk" id="fs-produk-kd_produk" size="52" />
	<label for="search_produk_nm_produk">Nm Produk</label>
	<input type="text" name="search_produk_nm_produk" id="fs-produk-nm_produk" size="52" />
	<label for="search_produk_tgl_produksi">Tgl Produksi</label>
	<input type="text" name="search_produk_tgl_produksi" id="fs-produk-tgl_produksi" size="52" />
	<label for="search_produk_harga_beli">Harga Beli</label>
	<input type="text" name="search_produk_harga_beli" id="fs-produk-harga_beli" size="52" />
	<label for="search_produk_harga_jual1">Harga Jual1</label>
	<input type="text" name="search_produk_harga_jual1" id="fs-produk-harga_jual1" size="52" />
	<label for="search_produk_harga_jual2">Harga Jual2</label>
	<input type="text" name="search_produk_harga_jual2" id="fs-produk-harga_jual2" size="52" />
	<label for="search_produk_stock_awal">Stock Awal</label>
	<input type="text" name="search_produk_stock_awal" id="fs-produk-stock_awal" size="52" />
	<label for="search_produk_stock">Stock</label>
	<input type="text" name="search_produk_stock" id="fs-produk-stock" size="52" />
	<label for="search_produk_reject_awal">Reject Awal</label>
	<input type="text" name="search_produk_reject_awal" id="fs-produk-reject_awal" size="52" />
	<label for="search_produk_reject">Reject</label>
	<input type="text" name="search_produk_reject" id="fs-produk-reject" size="52" />
	<label for="search_produk_prc">Prc</label>
	<input type="text" name="search_produk_prc" id="fs-produk-prc" size="52" />
	<label for="search_produk_gambar">Gambar</label>
	<input type="text" name="search_produk_gambar" id="fs-produk-gambar" size="52" />
	<label for="search_produk_harga_prod">Harga Prod</label>
	<input type="text" name="search_produk_harga_prod" id="fs-produk-harga_prod" size="52" />
	<label for="search_produk_kd_jenis">Kd Jenis</label>
	<input type="text" name="search_produk_kd_jenis" id="fs-produk-kd_jenis" size="52" />
	<label for="search_produk_hpp">Hpp</label>
	<input type="text" name="search_produk_hpp" id="fs-produk-hpp" size="52" />
</div>

<!-- Button Search ( #bs-produk ) -->
<div id="bs-produk">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_produk()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-produk').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_produk(){
	jQuery('#dg-produk').datagrid('load',{
		kd_produk: jQuery('#fs-produk-kd_produk').val(),
		nm_produk: jQuery('#fs-produk-nm_produk').val(),
		tgl_produksi: jQuery('#fs-produk-tgl_produksi').val(),
		harga_beli: jQuery('#fs-produk-harga_beli').val(),
		harga_jual1: jQuery('#fs-produk-harga_jual1').val(),
		harga_jual2: jQuery('#fs-produk-harga_jual2').val(),
		stock_awal: jQuery('#fs-produk-stock_awal').val(),
		stock: jQuery('#fs-produk-stock').val(),
		reject_awal: jQuery('#fs-produk-reject_awal').val(),
		reject: jQuery('#fs-produk-reject').val(),
		prc: jQuery('#fs-produk-prc').val(),
		gambar: jQuery('#fs-produk-gambar').val(),
		harga_prod: jQuery('#fs-produk-harga_prod').val(),
		kd_jenis: jQuery('#fs-produk-kd_jenis').val(),
		hpp: jQuery('#fs-produk-hpp').val(),
	});
}
</script>