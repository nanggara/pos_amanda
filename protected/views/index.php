 <div class="easyui-panel" style="padding:5px;" title="Penerimaan Barang">
         <a href="#" class="easyui-linkbutton" iconCls="IconPencil">Baru</a>
        <a href="#" class="easyui-linkbutton"  iconCls="IconDelete">Hapus</a>
        
		<a href="#"  class="easyui-linkbutton" iconCls="IconPencil">Simpan</a>
		<a href="#"  class="easyui-linkbutton" iconCls="IconMagnifier">Cari Transaksi</a>
    </div>
   

  
  
  
  
  
  


<!-- Data Grid ( #dg-trpabrik ) -->




<div style="padding:1px">
	<table id="dg-trpabrik" title="Tr Pabrik" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo $this->createUrl('/trPabrik/index',array('grid'=>true)); ?>" 
		toolbar="#tb-trpabrik" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="no_tr_pabrik" width="50" sortable="true">No Tr Pabrik</th>
			<th field="kd_pabrik" width="50" sortable="true">Kd Pabrik</th>
			<th field="tgl_terima" width="50" sortable="true">Tgl Terima</th>
			<th field="keterangan" width="50" sortable="true">Keterangan</th>
			<th field="posted" width="50" sortable="true">Posted</th>
			<th field="reject" width="50" sortable="true">Reject</th>
		</tr>
		</thead>
	</table>
</div>


		
		
<!-- Toolbar Data Grid ( #tb-trpabrik ) -->
<div id="tb-trpabrik">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-trpabrik','#f-trpabrik','Create Tr Pabrik','<?php echo $this->createUrl('/trPabrik/create'); ?>')">Create Tr Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-trpabrik','#f-trpabrik','Update Tr Pabrik','#dg-trpabrik','<?php echo $this->createUrl('/trPabrik/update'); ?>')">Update Tr Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-trpabrik','<?php echo $this->createUrl('/trPabrik/delete'); ?>')">Delete Tr Pabrik</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-trpabrik')">Search</a>
</div>

<!-- Dialog Form ( #df-trpabrik ) -->
<div id="df-trpabrik" class="easyui-dialog" style="width: 400px; height: 360px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-trpabrik">
	<form id="f-trpabrik" method="post" novalidate onSubmit="return false">
		<div class="form-item">
			<label for="no_tr_pabrik">No Tr Pabrik</label><br />
			<input type="text" name="no_tr_pabrik" class="easyui-validatebox" required="true" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="kd_pabrik">Kd Pabrik</label><br />
			<input type="text" name="kd_pabrik" class="easyui-validatebox" maxlength="7" size="53" />
		</div>
		<div class="form-item">
			<label for="tgl_terima">Tgl Terima</label><br />
			<input type="text" name="tgl_terima" class="easyui-validatebox easyui-numberspinner" size="53" />
		</div>
		<div class="form-item">
			<label for="keterangan">Keterangan</label><br />
			<input type="text" name="keterangan" class="easyui-validatebox" maxlength="100" size="53" />
		</div>
		<div class="form-item">
			<label for="posted">Posted</label><br />
			<input type="text" name="posted" class="easyui-validatebox easyui-numberspinner" size="53" />
		</div>
		<div class="form-item">
			<label for="reject">Reject</label><br />
			<input type="text" name="reject" class="easyui-validatebox easyui-numberspinner" size="53" />
		</div>
	</form>
</div>

<!-- Button Form ( #bf-trpabrik ) -->
<div id="bf-trpabrik">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-trpabrik','#df-trpabrik','#dg-trpabrik')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-trpabrik').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-trpabrik ) -->
<div id="ds-trpabrik" class="easyui-dialog" style="width:400px; height:360px; padding: 10px 20px" closed="true" buttons="#bs-trpabrik" iconCls="IconMagnifier" >
	
	<label for="search_trpabrik_nmproduk">Nama Produk</label>
	<input type="text" name="search_trpabrik_nmproduk" id="fs-trpabrik-nmproduk" size="52" />
	
	
	<!-- Button Search ( #bs-trpabrik ) -->

	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_produk()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-trpabrik').dialog('close')">Tutup</a>

	
	<table id="dg-trpabrik1" title="Tr Pabrik" 
		class="easyui-datagrid" width="200" height="200" 
		url="<?php echo $this->createUrl('/trPabrik/index',array('gridproduk'=>true)); ?>" 
		toolbar="#tb-trpabrik1" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
				<th field="kd_produk" width="50" sortable="true">Kd. Produk</th>
			<th field="nm_produk" width="50" sortable="true">Nama Produk</th>
			<th field="stock" width="50" sortable="true">Stock</th>
			
			
		</tr>
		</thead>
	</table>
	
</div>



<script type="text/javascript">
function search_data_trpabrik(){
	jQuery('#dg-trpabrik').datagrid('load',{
		no_tr_pabrik: jQuery('#fs-trpabrik-no_tr_pabrik').val(),
		kd_pabrik: jQuery('#fs-trpabrik-kd_pabrik').val(),
		tgl_terima: jQuery('#fs-trpabrik-tgl_terima').val(),
		keterangan: jQuery('#fs-trpabrik-keterangan').val(),
		posted: jQuery('#fs-trpabrik-posted').val(),
		reject: jQuery('#fs-trpabrik-reject').val(),
	});
}function search_data_produk(){
	jQuery('#dg-trpabrik1').datagrid('load',{
		no_produk: jQuery('#fs-trpabrik-nmproduk').val(),
		
	});
}
</script>