<!-- Data Grid ( #dg-<?php echo strtolower($this->modelClass); ?> ) -->
<div style="padding:1px">
	<table id="dg-<?php echo strtolower($this->modelClass); ?>" title="<?php echo $this->class2name($this->modelClass); ?>" 
		class="easyui-datagrid" width="auto" height="auto" 
		url="<?php echo '<?php'; ?> echo $this->createUrl('/<?php echo $this->controller; ?>/index',array('grid'=>true)); ?>" 
		toolbar="#tb-<?php echo strtolower($this->modelClass); ?>" pagination="true" 
		rownumbers="true" fitColumns="true" 
		singleSelect="true" collapsible="true"
	>
		<thead>
			<tr>
	<?php foreach($this->tableSchema->columns as $column)
	{
		if(!$column->autoIncrement)
		echo "\t\t\t".'<th field="'.$column->name.'" width="50" sortable="true">'.$this->class2name($column->name).'</th>'."\n";
	}
	?>		</tr>
		</thead>
	</table>
</div>


<!-- Toolbar Data Grid ( #tb-<?php echo strtolower($this->modelClass); ?> ) -->
<div id="tb-<?php echo strtolower($this->modelClass); ?>">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAdd" plain="true" onClick="create_data('#df-<?php echo strtolower($this->modelClass); ?>','#f-<?php echo strtolower($this->modelClass); ?>','Create <?php echo $this->class2name($this->modelClass); ?>','<?php echo '<?php'; ?> echo $this->createUrl('/<?php echo $this->controller; ?>/create'); ?>')">Create <?php echo $this->class2name($this->modelClass); ?></a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconPencil" plain="true" onClick="update_data('#df-<?php echo strtolower($this->modelClass); ?>','#f-<?php echo strtolower($this->modelClass); ?>','Update <?php echo $this->class2name($this->modelClass); ?>','#dg-<?php echo strtolower($this->modelClass); ?>','<?php echo '<?php'; ?> echo $this->createUrl('/<?php echo $this->controller; ?>/update'); ?>')">Update <?php echo $this->class2name($this->modelClass); ?></a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconDelete" plain="true" onClick="remove_data('#dg-<?php echo strtolower($this->modelClass); ?>','<?php echo '<?php'; ?> echo $this->createUrl('/<?php echo $this->controller; ?>/delete'); ?>')">Delete <?php echo $this->class2name($this->modelClass); ?></a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" plain="true" onClick="search_dialog('#ds-<?php echo strtolower($this->modelClass); ?>')">Search</a>
</div>

<!-- Dialog Form ( #df-<?php echo strtolower($this->modelClass); ?> ) -->
<div id="df-<?php echo strtolower($this->modelClass); ?>" class="easyui-dialog" style="width: 400px; height: <?php echo $this->getHeight($this->tableSchema->columns); ?>px; padding: 10px 20px" closed="true" modal="true" buttons="#bf-<?php echo strtolower($this->modelClass); ?>">
	<form id="f-<?php echo strtolower($this->modelClass); ?>" method="post" novalidate onSubmit="return false">
<?php foreach($this->tableSchema->columns as $column)
{
	if(!$column->autoIncrement)
	{
		echo "\t\t<div class=\"form-item\">\n";
		echo "\t\t\t<label for=\"".$column->name."\">".$this->class2name($column->name)."</label><br />\n";
		echo "\t\t\t".$this->getFormEasyui($this->modelClass, $column)."\n";
		echo "\t\t</div>\n";		
	}
}
?>	</form>
</div>

<!-- Button Form ( #bf-<?php echo strtolower($this->modelClass); ?> ) -->
<div id="bf-<?php echo strtolower($this->modelClass); ?>">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconAccept" onClick="save_data('#f-<?php echo strtolower($this->modelClass); ?>','#df-<?php echo strtolower($this->modelClass); ?>','#dg-<?php echo strtolower($this->modelClass); ?>')">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#df-<?php echo strtolower($this->modelClass); ?>').dialog('close')">Batal</a>
</div>

<!-- Dialog Search ( #ds-<?php echo strtolower($this->modelClass); ?> ) -->
<div id="ds-<?php echo strtolower($this->modelClass); ?>" class="easyui-dialog" style="width:400px; height:<?php echo $this->getHeight($this->tableSchema->columns); ?>px; padding: 10px 20px" closed="true" buttons="#bs-<?php echo strtolower($this->modelClass); ?>" iconCls="IconMagnifier" >
<?php foreach($this->tableSchema->columns as $column)
{
	if(!$column->autoIncrement)
	{
		echo "\t<label for=\"search_".strtolower($this->model)."_".$column->name."\">".$this->class2name($column->name)."</label>\n";
		echo "\t<input type=\"text\" name=\"search_".strtolower($this->model)."_".$column->name."\" id=\"fs-".strtolower($this->modelClass)."-".$column->name."\" size=\"52\" />\n";
	}
}
?></div>

<!-- Button Search ( #bs-<?php echo strtolower($this->modelClass); ?> ) -->
<div id="bs-<?php echo strtolower($this->modelClass); ?>">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconMagnifier" onClick="search_data_<?php echo strtolower($this->modelClass); ?>()">Cari</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="IconCancel" onClick="javascript:jQuery('#ds-<?php echo strtolower($this->modelClass); ?>').dialog('close')">Tutup</a>
</div>


<script type="text/javascript">
function search_data_<?php echo strtolower($this->modelClass); ?>(){
	jQuery('#dg-<?php echo strtolower($this->modelClass); ?>').datagrid('load',{
<?php foreach($this->tableSchema->columns as $column)
{
	if(!$column->autoIncrement)
	{
		echo "\t\t".$column->name.": jQuery('#fs-".strtolower($this->modelClass)."-".$column->name."').val(),\n";
	}
}
?>	});
}
</script>