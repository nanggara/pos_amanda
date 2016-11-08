<!-- Data Grid ( #dg-pabrik ) -->
<div style="padding:1px">
	<table id="dg-pabrik" title="Pabrik" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/pabrik/index',array('grid'=>true)); ?>" 
		toolbar="#tb-pabrik" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="kd_pabrik" width="50" sortable="true">Kd Pabrik</th>
			<th field="nm_pabrik" width="50" sortable="true">Nm Pabrik</th>
			<th field="alamat" width="50" sortable="true">Alamat</th>
			<th field="telp1" width="50" sortable="true">Telp1</th>
			<th field="cp" width="50" sortable="true">Cp</th>
			<th field="status" width="50" sortable="true">Status</th>
			<th field="kd_area" width="50" sortable="true">Kd Area</th>
		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-pabrik ) -->
<div id="tb-pabrik">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-pabrik','#f-pabrik','Create Pabrik','<?php echo $this->createUrl('/pabrik/create'); ?>')">Create Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-pabrik','#f-pabrik','Update Pabrik','#dg-pabrik','<?php echo $this->createUrl('/pabrik/update'); ?>')">Update Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-pabrik','<?php echo $this->createUrl('/pabrik/delete'); ?>')">Delete Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-pabrik')">Search</a>
</div>

<!-- Dialog Form ( #df-pabrik ) -->
<div id="df-pabrik" class="easyui-dialog" style="width: 400px; height: 400px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-pabrik">
	<form id="f-pabrik" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="kd_pabrik">Kd Pabrik</label><br />
			<input type="text" name="kd_pabrik" class="easyui-validatebox" required="true" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="nm_pabrik">Nm Pabrik</label><br />
			<input type="text" name="nm_pabrik" class="easyui-validatebox" maxlength="100" size="53" />
		</div>
		<div class="form-item">
			<label for="alamat">Alamat</label><br />
			<input type="text" name="alamat" class="easyui-validatebox" maxlength="300" size="53" />
		</div>
		<div class="form-item">
			<label for="telp1">Telp1</label><br />
			<input type="text" name="telp1" class="easyui-validatebox" maxlength="50" size="53" />
		</div>
		<div class="form-item">
			<label for="cp">Cp</label><br />
			<input type="text" name="cp" class="easyui-validatebox" maxlength="50" size="53" />
		</div>
		<div class="form-item">
			<label for="status">Status</label><br />
			<input type="text" name="status" class="easyui-validatebox easyui-numberspinner" size="53" />
		</div>
		<div class="form-item">
			<label for="kd_area">Kd Area</label><br />
			<input type="text" name="kd_area" class="easyui-validatebox easyui-numberspinner" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-pabrik ) -->
<div id="bf-pabrik">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-pabrik','#df-pabrik','#dg-pabrik')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-pabrik').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-pabrik ) -->
<div id="ds-pabrik" class="easyui-dialog" style="width:400px; height:400px; padding: 10px 20px" closed="true" buttons="#bs-pabrik" iconCls="IconMagnifier" >
	<label for="search_pabrik_kd_pabrik">Kd Pabrik</label>
	<input type="text" name="search_pabrik_kd_pabrik" id="fs-pabrik-kd_pabrik" size="52" />
	<label for="search_pabrik_nm_pabrik">Nm Pabrik</label>
	<input type="text" name="search_pabrik_nm_pabrik" id="fs-pabrik-nm_pabrik" size="52" />
	<label for="search_pabrik_alamat">Alamat</label>
	<input type="text" name="search_pabrik_alamat" id="fs-pabrik-alamat" size="52" />
	<label for="search_pabrik_telp1">Telp1</label>
	<input type="text" name="search_pabrik_telp1" id="fs-pabrik-telp1" size="52" />
	<label for="search_pabrik_cp">Cp</label>
	<input type="text" name="search_pabrik_cp" id="fs-pabrik-cp" size="52" />
	<label for="search_pabrik_status">Status</label>
	<input type="text" name="search_pabrik_status" id="fs-pabrik-status" size="52" />
	<label for="search_pabrik_kd_area">Kd Area</label>
	<input type="text" name="search_pabrik_kd_area" id="fs-pabrik-kd_area" size="52" />
</div>

<!-- Button Search ( #bs-pabrik ) -->
<div id="bs-pabrik">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_pabrik()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-pabrik').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_pabrik(){
	jQuery('#dg-pabrik').datagrid('load',{
		kd_pabrik: jQuery('#fs-pabrik-kd_pabrik').val(),
		nm_pabrik: jQuery('#fs-pabrik-nm_pabrik').val(),
		alamat: jQuery('#fs-pabrik-alamat').val(),
		telp1: jQuery('#fs-pabrik-telp1').val(),
		cp: jQuery('#fs-pabrik-cp').val(),
		status: jQuery('#fs-pabrik-status').val(),
		kd_area: jQuery('#fs-pabrik-kd_area').val(),
	});
}
</script>