<!-- Data Grid ( #dg-customer ) -->
<div style="padding:1px">
	<table id="dg-customer" title="Customer" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/customer/index',array('grid'=>true)); ?>" 
		toolbar="#tb-customer" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="kd_customer" width="50" sortable="true">Kd Customer</th>
			<th field="nm_customer" width="50" sortable="true">Nm Customer</th>
			<th field="alamat" width="50" sortable="true">Alamat</th>
			<th field="telp1" width="50" sortable="true">Telp1</th>
			<th field="cp" width="50" sortable="true">Cp</th>
			<th field="status" width="50" sortable="true">Status</th>
			<th field="kd_area" width="50" sortable="true">Kd Area</th>
			<th field="kd_faktur" width="50" sortable="true">Kd Faktur</th>
		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-customer ) -->
<div id="tb-customer">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-customer','#f-customer','Create Customer','<?php echo $this->createUrl('/customer/create'); ?>')">Create Customer</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-customer','#f-customer','Update Customer','#dg-customer','<?php echo $this->createUrl('/customer/update'); ?>')">Update Customer</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-customer','<?php echo $this->createUrl('/customer/delete'); ?>')">Delete Customer</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-customer')">Search</a>
</div>

<!-- Dialog Form ( #df-customer ) -->
<div id="df-customer" class="easyui-dialog" style="width: 400px; height: 400px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-customer">
	<form id="f-customer" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="kd_customer">Kd Customer</label><br />
			<input type="text" name="kd_customer" class="easyui-validatebox" required="true" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="nm_customer">Nm Customer</label><br />
			<input type="text" name="nm_customer" class="easyui-validatebox" maxlength="100" size="53" />
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
		<div class="form-item">
			<label for="kd_faktur">Kd Faktur</label><br />
			<input type="text" name="kd_faktur" class="easyui-validatebox" maxlength="7" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-customer ) -->
<div id="bf-customer">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-customer','#df-customer','#dg-customer')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-customer').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-customer ) -->
<div id="ds-customer" class="easyui-dialog" style="width:400px; height:400px; padding: 10px 20px" closed="true" buttons="#bs-customer" iconCls="IconMagnifier" >
	<label for="search_customer_kd_customer">Kd Customer</label>
	<input type="text" name="search_customer_kd_customer" id="fs-customer-kd_customer" size="52" />
	<label for="search_customer_nm_customer">Nm Customer</label>
	<input type="text" name="search_customer_nm_customer" id="fs-customer-nm_customer" size="52" />
	<label for="search_customer_alamat">Alamat</label>
	<input type="text" name="search_customer_alamat" id="fs-customer-alamat" size="52" />
	<label for="search_customer_telp1">Telp1</label>
	<input type="text" name="search_customer_telp1" id="fs-customer-telp1" size="52" />
	<label for="search_customer_cp">Cp</label>
	<input type="text" name="search_customer_cp" id="fs-customer-cp" size="52" />
	<label for="search_customer_status">Status</label>
	<input type="text" name="search_customer_status" id="fs-customer-status" size="52" />
	<label for="search_customer_kd_area">Kd Area</label>
	<input type="text" name="search_customer_kd_area" id="fs-customer-kd_area" size="52" />
	<label for="search_customer_kd_faktur">Kd Faktur</label>
	<input type="text" name="search_customer_kd_faktur" id="fs-customer-kd_faktur" size="52" />
</div>

<!-- Button Search ( #bs-customer ) -->
<div id="bs-customer">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_customer()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-customer').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_customer(){
	jQuery('#dg-customer').datagrid('load',{
		kd_customer: jQuery('#fs-customer-kd_customer').val(),
		nm_customer: jQuery('#fs-customer-nm_customer').val(),
		alamat: jQuery('#fs-customer-alamat').val(),
		telp1: jQuery('#fs-customer-telp1').val(),
		cp: jQuery('#fs-customer-cp').val(),
		status: jQuery('#fs-customer-status').val(),
		kd_area: jQuery('#fs-customer-kd_area').val(),
		kd_faktur: jQuery('#fs-customer-kd_faktur').val(),
	});
}
</script>