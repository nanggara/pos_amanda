<!-- Data Grid ( #dg-trdpabrik ) -->
<div style="padding:1px">
	<table id="dg-trdpabrik" title="Trd Pabrik" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/trdPabrik/index',array('grid'=>true)); ?>" 
		toolbar="#tb-trdpabrik" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="no_tr_pabrik" width="50" sortable="true">No Tr Pabrik</th>
			<th field="kd_produk" width="50" sortable="true">Kd Produk</th>
			<th field="qty" width="50" sortable="true">Qty</th>
			<th field="user_name" width="50" sortable="true">User Name</th>
		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-trdpabrik ) -->
<div id="tb-trdpabrik">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-trdpabrik','#f-trdpabrik','Create Trd Pabrik','<?php echo $this->createUrl('/trdPabrik/create'); ?>')">Create Trd Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-trdpabrik','#f-trdpabrik','Update Trd Pabrik','#dg-trdpabrik','<?php echo $this->createUrl('/trdPabrik/update'); ?>')">Update Trd Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-trdpabrik','<?php echo $this->createUrl('/trdPabrik/delete'); ?>')">Delete Trd Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-trdpabrik')">Search</a>
</div>

<!-- Dialog Form ( #df-trdpabrik ) -->
<div id="df-trdpabrik" class="easyui-dialog" style="width: 400px; height: 300px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-trdpabrik">
	<form id="f-trdpabrik" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="no_tr_pabrik">No Tr Pabrik</label><br />
			<input type="text" name="no_tr_pabrik" class="easyui-validatebox" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="kd_produk">Kd Produk</label><br />
			<input type="text" name="kd_produk" class="easyui-validatebox" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="qty">Qty</label><br />
			<input type="text" name="qty" class="easyui-validatebox easyui-numberspinner" size="53" />
		</div>
		<div class="form-item">
			<label for="user_name">User Name</label><br />
			<input type="text" name="user_name" class="easyui-validatebox" maxlength="100" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-trdpabrik ) -->
<div id="bf-trdpabrik">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-trdpabrik','#df-trdpabrik','#dg-trdpabrik')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-trdpabrik').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-trdpabrik ) -->
<div id="ds-trdpabrik" class="easyui-dialog" style="width:400px; height:300px; padding: 10px 20px" closed="true" buttons="#bs-trdpabrik" iconCls="IconMagnifier" >
	<label for="search_trdpabrik_no_tr_pabrik">No Tr Pabrik</label>
	<input type="text" name="search_trdpabrik_no_tr_pabrik" id="fs-trdpabrik-no_tr_pabrik" size="52" />
	<label for="search_trdpabrik_kd_produk">Kd Produk</label>
	<input type="text" name="search_trdpabrik_kd_produk" id="fs-trdpabrik-kd_produk" size="52" />
	<label for="search_trdpabrik_qty">Qty</label>
	<input type="text" name="search_trdpabrik_qty" id="fs-trdpabrik-qty" size="52" />
	<label for="search_trdpabrik_user_name">User Name</label>
	<input type="text" name="search_trdpabrik_user_name" id="fs-trdpabrik-user_name" size="52" />
</div>

<!-- Button Search ( #bs-trdpabrik ) -->
<div id="bs-trdpabrik">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_trdpabrik()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-trdpabrik').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_trdpabrik(){
	jQuery('#dg-trdpabrik').datagrid('load',{
		no_tr_pabrik: jQuery('#fs-trdpabrik-no_tr_pabrik').val(),
		kd_produk: jQuery('#fs-trdpabrik-kd_produk').val(),
		qty: jQuery('#fs-trdpabrik-qty').val(),
		user_name: jQuery('#fs-trdpabrik-user_name').val(),
	});
}
</script>