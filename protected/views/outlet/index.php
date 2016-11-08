<!-- Data Grid ( #dg-outlet ) -->
<div style="padding:1px">
	<table id="dg-outlet" title="Outlet" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/outlet/index',array('grid'=>true)); ?>" 
		toolbar="#tb-outlet" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="kd_outlet" width="50" sortable="true">Kd Outlet</th>
			<th field="nm_outlet" width="50" sortable="true">Nm Outlet</th>
			<th field="alamat" width="50" sortable="true">Alamat</th>
			<th field="telp1" width="50" sortable="true">Telp1</th>
			<th field="cp" width="50" sortable="true">Cp</th>
			<th field="status" width="50" sortable="true">Status</th>
			<th field="kd_pabrik" width="50" sortable="true">Kd Pabrik</th>
		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-outlet ) -->
<div id="tb-outlet">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-outlet','#f-outlet','Create Outlet','<?php echo $this->createUrl('/outlet/create'); ?>')">Create Outlet</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-outlet','#f-outlet','Update Outlet','#dg-outlet','<?php echo $this->createUrl('/outlet/update'); ?>')">Update Outlet</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-outlet','<?php echo $this->createUrl('/outlet/delete'); ?>')">Delete Outlet</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-outlet')">Search</a>
</div>

<!-- Dialog Form ( #df-outlet ) -->
<div id="df-outlet" class="easyui-dialog" style="width: 400px; height: 400px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-outlet">
	<form id="f-outlet" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="kd_outlet">Kd Outlet</label><br />
			<input type="text" name="kd_outlet" class="easyui-validatebox" required="true" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="nm_outlet">Nm Outlet</label><br />
			<input type="text" name="nm_outlet" class="easyui-validatebox" maxlength="100" size="53" />
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
			<label for="kd_pabrik">Kd Pabrik</label><br />
			<input type="text" name="kd_pabrik" class="easyui-validatebox" maxlength="7" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-outlet ) -->
<div id="bf-outlet">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-outlet','#df-outlet','#dg-outlet')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-outlet').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-outlet ) -->
<div id="ds-outlet" class="easyui-dialog" style="width:400px; height:400px; padding: 10px 20px" closed="true" buttons="#bs-outlet" iconCls="IconMagnifier" >
	<label for="search_outlet_kd_outlet">Kd Outlet</label>
	<input type="text" name="search_outlet_kd_outlet" id="fs-outlet-kd_outlet" size="52" />
	<label for="search_outlet_nm_outlet">Nm Outlet</label>
	<input type="text" name="search_outlet_nm_outlet" id="fs-outlet-nm_outlet" size="52" />
	<label for="search_outlet_alamat">Alamat</label>
	<input type="text" name="search_outlet_alamat" id="fs-outlet-alamat" size="52" />
	<label for="search_outlet_telp1">Telp1</label>
	<input type="text" name="search_outlet_telp1" id="fs-outlet-telp1" size="52" />
	<label for="search_outlet_cp">Cp</label>
	<input type="text" name="search_outlet_cp" id="fs-outlet-cp" size="52" />
	<label for="search_outlet_status">Status</label>
	<input type="text" name="search_outlet_status" id="fs-outlet-status" size="52" />
	<label for="search_outlet_kd_pabrik">Kd Pabrik</label>
	<input type="text" name="search_outlet_kd_pabrik" id="fs-outlet-kd_pabrik" size="52" />
</div>

<!-- Button Search ( #bs-outlet ) -->
<div id="bs-outlet">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_outlet()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-outlet').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_outlet(){
	jQuery('#dg-outlet').datagrid('load',{
		kd_outlet: jQuery('#fs-outlet-kd_outlet').val(),
		nm_outlet: jQuery('#fs-outlet-nm_outlet').val(),
		alamat: jQuery('#fs-outlet-alamat').val(),
		telp1: jQuery('#fs-outlet-telp1').val(),
		cp: jQuery('#fs-outlet-cp').val(),
		status: jQuery('#fs-outlet-status').val(),
		kd_pabrik: jQuery('#fs-outlet-kd_pabrik').val(),
	});
}
</script>