<!-- Data Grid ( #dg-jenis ) -->
<div style="padding:1px">
	<table id="dg-jenis" title="Jenis" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/jenis/index',array('grid'=>true)); ?>" 
		toolbar="#tb-jenis" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="nm_jenis" width="50" sortable="true">Nm Jenis</th>
		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-jenis ) -->
<div id="tb-jenis">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-jenis','#f-jenis','Create Jenis','<?php echo $this->createUrl('/jenis/create'); ?>')">Create Jenis</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-jenis','#f-jenis','Update Jenis','#dg-jenis','<?php echo $this->createUrl('/jenis/update'); ?>')">Update Jenis</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-jenis','<?php echo $this->createUrl('/jenis/delete'); ?>')">Delete Jenis</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-jenis')">Search</a>
</div>

<!-- Dialog Form ( #df-jenis ) -->
<div id="df-jenis" class="easyui-dialog" style="width: 400px; height: 120px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-jenis">
	<form id="f-jenis" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="nm_jenis">Nm Jenis</label><br />
			<input type="text" name="nm_jenis" class="easyui-validatebox" maxlength="100" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-jenis ) -->
<div id="bf-jenis">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-jenis','#df-jenis','#dg-jenis')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-jenis').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-jenis ) -->
<div id="ds-jenis" class="easyui-dialog" style="width:400px; height:120px; padding: 10px 20px" closed="true" buttons="#bs-jenis" iconCls="IconMagnifier" >
	<label for="search_jenis_nm_jenis">Nm Jenis</label>
	<input type="text" name="search_jenis_nm_jenis" id="fs-jenis-nm_jenis" size="52" />
</div>

<!-- Button Search ( #bs-jenis ) -->
<div id="bs-jenis">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_jenis()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-jenis').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_jenis(){
	jQuery('#dg-jenis').datagrid('load',{
		nm_jenis: jQuery('#fs-jenis-nm_jenis').val(),
	});
}
</script>