<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->easyui->registerEasyUI(); ?>
</head>
<body class="easyui-layout">
	
	<!-- top -->
	<div data-options="region:'north',split:true" title="North Title" style="height:100px;padding:10px;">
		<span style="font-size:30px">Poin Of Sale Amanda Brownies</span>
		<span style="float:right; font-size:30px">-</span>
	</div>
	<!-- left -->
	<div data-options="region:'west',split:true" title="Main Menu" style="width:280px;padding1:1px;overflow:hidden;">
		<div class="easyui-accordion" data-options="fit:true,border:false">

			<div title="Penerimaan" style="padding:10px;">
			<ul class="easyui-tree" animate="true">
					
				<li><?php echo EasyuiWidget::openTabs(array('trpabrik/index'), 'Penerimaan Pabrik', 'IconApplication'); ?></li>
				
				
				</ul>
			</div>
			<div title="Pengiriman" style="padding:10px">
				content3
			</div>

			<div title="Master Data" style="padding:10px;overflow:auto;" data-options="selected:false" >
				<ul class="easyui-tree" animate="true">
					<li><?php echo EasyuiWidget::openTabs(array('site/home'), 'Home', 'IconHome'); ?></li>
				
				<li><?php echo EasyuiWidget::openTabs(array('area/index'), 'Area', 'IconApplication'); ?></li>
				<li><?php echo EasyuiWidget::openTabs(array('barang/index'), 'Barang', 'IconApplication'); ?></li>
				<li><?php echo EasyuiWidget::openTabs(array('customer/index'), 'Customer', 'IconApplication'); ?></li>
				<li><?php echo EasyuiWidget::openTabs(array('pabrik/index'), 'Pabrik', 'IconApplication'); ?></li>
				<li><?php echo EasyuiWidget::openTabs(array('outlet/index'), 'Outlet', 'IconApplication'); ?></li>
				
				
				</ul>
			</div>	
			
		</div>
	</div>
	
	<!-- center -->
	<div data-options="region:'center'" title="Main Content" style="overflow:hidden;padding:1px">
	
	<div id="main-content" class="easyui-tabs" fit="false" border="false">
		<div title="Home" href="<?php echo $this->createUrl('site/home'); ?>" iconCls="IconHouse"></div>
	</div>
	
	</div>
</body>
</html>