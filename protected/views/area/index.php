<!-- Data Grid ( #dg-area ) -->
<div style="padding:1px">
	<table id="dg-area" title="Area" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/area/index',array('grid'=>true)); ?>" 
		toolbar="#tb-area" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="nm_area" width="50" sortable="true">Nm Area</th>
		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-area ) -->
<div id="tb-area">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-area','#f-area','Create Area','<?php echo $this->createUrl('/area/create'); ?>')">Create Area</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-area','#f-area','Update Area','#dg-area','<?php echo $this->createUrl('/area/update'); ?>')">Update Area</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-area','<?php echo $this->createUrl('/area/delete'); ?>')">Delete Area</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-area')">Search</a>
</div>

<!-- Dialog Form ( #df-area ) -->
<div id="df-area" class="easyui-dialog" style="width: 400px; height: 120px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-area">
	<form id="f-area" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="nm_area">Nm Area</label><br />
			<input type="text" name="nm_area" class="easyui-validatebox" maxlength="100" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-area ) -->
<div id="bf-area">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-area','#df-area','#dg-area')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-area').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-area ) -->
<div id="ds-area" class="easyui-dialog" style="width:400px; height:120px; padding: 10px 20px" closed="true" buttons="#bs-area" iconCls="IconMagnifier" >
	<label for="search_area_nm_area">Nm Area</label>
	<input type="text" name="search_area_nm_area" id="fs-area-nm_area" size="52" />
</div>

<!-- Button Search ( #bs-area ) -->
<div id="bs-area">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_area()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-area').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_area(){
	jQuery('#dg-area').datagrid('load',{
		nm_area: jQuery('#fs-area-nm_area').val(),
	});
}
</script>