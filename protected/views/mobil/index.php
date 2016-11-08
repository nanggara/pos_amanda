<!-- Data Grid ( #dg-mobil ) -->
<div style="padding:1px">
	<table id="dg-mobil" title="Mobil" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/mobil/index',array('grid'=>true)); ?>" 
		toolbar="#tb-mobil" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="type" width="50" sortable="true">Type</th>
			<th field="barang" width="50" sortable="true">Barang</th>
			<th field="harga" width="50" sortable="true">Harga</th>
		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-mobil ) -->
<div id="tb-mobil">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-mobil','#f-mobil','Create Mobil','<?php echo $this->createUrl('/mobil/create'); ?>')">Create Mobil</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-mobil','#f-mobil','Update Mobil','#dg-mobil','<?php echo $this->createUrl('/mobil/update'); ?>')">Update Mobil</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-mobil','<?php echo $this->createUrl('/mobil/delete'); ?>')">Delete Mobil</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-mobil')">Search</a>
</div>

<!-- Dialog Form ( #df-mobil ) -->
<div id="df-mobil" class="easyui-dialog" style="width: 400px; height: 240px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-mobil">
	<form id="f-mobil" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="type">Type</label><br />
			<input type="text" name="type" class="easyui-validatebox" required="true" maxlength="50" size="53" />
		</div>
		<div class="form-item">
			<label for="barang">Barang</label><br />
			<input type="text" name="barang" class="easyui-validatebox" required="true" maxlength="50" size="53" />
		</div>
		<div class="form-item">
			<label for="harga">Harga</label><br />
			<input type="text" name="harga" class="easyui-validatebox" required="true" maxlength="15" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-mobil ) -->
<div id="bf-mobil">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-mobil','#df-mobil','#dg-mobil')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-mobil').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-mobil ) -->
<div id="ds-mobil" class="easyui-dialog" style="width:400px; height:240px; padding: 10px 20px" closed="true" buttons="#bs-mobil" iconCls="IconMagnifier" >
	<label for="search_mobil_type">Type</label>
	<input type="text" name="search_mobil_type" id="fs-mobil-type" size="52" />
	<label for="search_mobil_barang">Barang</label>
	<input type="text" name="search_mobil_barang" id="fs-mobil-barang" size="52" />
	<label for="search_mobil_harga">Harga</label>
	<input type="text" name="search_mobil_harga" id="fs-mobil-harga" size="52" />
</div>

<!-- Button Search ( #bs-mobil ) -->
<div id="bs-mobil">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_mobil()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-mobil').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_mobil(){
	jQuery('#dg-mobil').datagrid('load',{
		type: jQuery('#fs-mobil-type').val(),
		barang: jQuery('#fs-mobil-barang').val(),
		harga: jQuery('#fs-mobil-harga').val(),
	});
}
</script>