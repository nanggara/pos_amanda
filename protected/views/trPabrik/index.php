
  
  
  
  
  
  		
		


		
<!-- Toolbar Data Grid ( #tb-trpabrik ) -->
<div id="tb-menu">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-trpabrik','#f-trpabrik','Create Tr Pabrik','<?php echo $this->createUrl('/trPabrik/create'); ?>')">Baru</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDatabaseAdd" plain="true" onClick="save_data('#f-trpabrik','#df-trpabrik','#dg-trpabrik')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-trpabrik','#f-trpabrik','Update Tr Pabrik','#dg-trpabrik','<?php echo $this->createUrl('/trPabrik/update'); ?>')">Ubah</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-trpabrik','<?php echo $this->createUrl('/trPabrik/delete'); ?>')">Hapus</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-trpabrik')">Cari Transaksi</a>
</div>
<!-- Dialog Form ( #df-trpabrik ) -->
<div id="df-trpabrik"  class="easyui-panel"  style="width: auto; height: auto; padding: 10px 20px" closed="true" modal="true" buttons="#bf-trpabrik">
	<form id="f-trpabrik" method="post" novalidate onSubmit="return false">
		<table>
	<tr>
		<td><label for="no_tr_pabrik">No Faktur</label><br /></td><td>:</td>
		<td><input type="text" name="no_tr_pabrik" class="easyui-validatebox" required="true" maxlength="7" size="53" /></td>
		<td><label for="tgl_terima">Tgl Terima</label><br /></td><td>:</td>
		<td><input type="text" class="easyui-datebox" name="tgl_terima"  /></td>
	</tr>
	<tr>
	
	
				
	<td><label for="kd_pabrik">Pabrik</label><br /></td><td>:</td>
	<td>
	         <select class="easyui-combobox" name="kd_pabrik" label="kd_pabrik:" labelPosition="top" size="53px">
             	<?php
				$connection = Yii::app()->db;  
					$sql="select * from pabrik";
					$command=$connection->createCommand($sql);
					$reader=$command->query();
						foreach($reader as $row){
							echo '<option value='.$row['kd_pabrik'].'>'.$row['nm_pabrik'].'</option>';
							
							}
	
				?>

            </select>
	
	
	
	<td><label for="keterangan">Keterangan</label><br /></td><td>:</td>
	<td><input type="text" name="keterangan" class="easyui-validatebox" maxlength="100" size="53" /></td>
	
	
	</tr>
	<tr>
	<td>
	<input type="text" name="txtkd_produk" id="txtkd_produk" size="10" value="0"  />
	<input type="hidden" name="posted" size="53" />
	<input type="hidden" name="reject"  size="53" />
	
	</td>
	</tr>
	
	</table>
	
	</form>
</div>

<!-- Button Form ( #bf-trpabrik ) -->
<div id="bf-trpabrik">
</div>



<div style="padding:1px">
	<table id="dg-trpabrik" title="Detail Penerimaan" 
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
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="search_dialog('#ds-trpabrik')">Tambah Produk</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-trpabrik','<?php echo $this->createUrl('/trPabrik/delete'); ?>')">Hapus Produk</a>
	
</div>


<!-- Dialog Search ( #ds-trpabrik ) -->
<div id="ds-trpabrik" class="easyui-dialog" style="width:400px; height:360px; padding: 10px 20px" closed="true" buttons="#bs-trpabrik" iconCls="IconMagnifier" >
	
	<label for="search_trpabrik_nm_produk">Nama Produk</label>
	<input type="text" name="search_trpabrik_nm_produk" id="fs-trpabrik-nm_produk" size="45" />
	   
	
	
	<!-- Button Search ( #bs-trpabrik ) -->

	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_produk()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-trpabrik').dialog('close')">Tutup</a>

	
	
	
	<div style="margin:20px 0;">
        <a href="#" class="easyui-linkbutton" onclick="getSelections()">GetSelections</a>
    </div>
	
		<form id="form" method="post">
		
		</form>
	
	<table id="dg-trpabrik1" title="Daftar Barang" 
		class="easyui-datagrid" width="400" height="300" 
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
	 <div style="margin:10px 0;">
       
        <select style="display:none;" onchange="$('#dg-trpabrik1').datagrid({singleSelect:(this.value==1)})">
           
            <option value="1">Multiple Rows</option>
        </select>
    </div>
	
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
}

function search_data_produk(){
	jQuery('#dg-trpabrik1').datagrid('load',{
		
		nm_produk: jQuery('#fs-trpabrik-nm_produk').val(),
		
		
	});
}




        function getSelections(){
            var ss = [];
            var rows = $('#dg-trpabrik1').datagrid('getSelections');
            for(var i=0; i<rows.length; i++){
                var row = rows[i];
                ss.push('<span>'+row.kd_produk+":"+row.nm_produk+":"+row.stock+'</span>');
			
            }
			
			
            $.messager.alert('Info', ss.join('<br/>'));
				  document.getElementById('txtkd_produk').value =row.kd_produk.toString();

			
			
			
        }
</script>