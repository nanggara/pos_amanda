/**
 * Yii EasyUI Basic Code
 *
 * @author 		Dida Nurwanda
 * @email		dida_n@ymail.com
 * @blog		didanurwanda.blogspot.com
 * @create		April 2013
 *
 */

/**
 * Link to form
 */
var link_to_form;

/**
 * Open Tabs
 *
 * @url 	link to items
 * @title	title tabs
 * @icon	icon tabs
 */
function open_tabs(url, title, icon)
{
	if (jQuery('#main-content').tabs('exists',title)) {
		jQuery('#main-content').tabs('select',title);
	} else {
		jQuery('#main-content').tabs('add', {
			iconCls : icon,
			title : title,
			href : url,
			closable : true,
		});
	}
}

/**
 * Create or Open Dialog Create
 *
 * @dialog		identity dialog
 * @form		identity form
 * @title 		title dialog
 */
function create_data(dialog,form,title, url)
{
	jQuery(dialog).dialog('open').dialog('setTitle',title);
	jQuery(form).form('clear');
	link_to_form = url;
}

/**
 * Update or Open Dialog Update
 *
 * @dialog		identity dialog
 * @form		identity form
 * @title 		title dialog
 * @grid		identity grid
 */
function update_data(dialog,form,title,grid, url)
{
	var row = jQuery(grid).datagrid('getSelected');
	if(row) {
		jQuery(dialog).dialog('open').dialog('setTitle',title);
		jQuery(form).form('load',row);
		link_to_form = url+ '/' + row.id;
	}
	else {
		jQuery.messager.show({
			title: 'Error',
			msg: "Please select item will be edited",
			timeout:5000,
		});
	}
}

/**
 * Save data
 *
 * @form		identity form
 * @dialog		identity dialog
 * @grid		identity grid
 */
function save_data(form, dialog, grid)
{
	jQuery(form).form('submit', {
		url : link_to_form,
		onSubmit : function() {
			return jQuery(this).form('validate');
		},
		success : function(result) {
			var result = eval('('+result+')');
			if(result.success) {
				jQuery(dialog).dialog('close');
				jQuery(grid).datagrid('reload');
				jQuery.messager.show({
					title: 'Success',
					msg: result.msg,
					timeout:5000,
				});
			} else {
				jQuery.messager.show({
					title : 'Error',
					msg : result.msg,
					timeout:10000,
				});
			}
		}
	});
}
/**
 * Save data Trans
 *
 * @form		identity form
 * @dialog		identity dialog
 * @grid		identity grid
 */
function save_trans(form, grid)
{
	jQuery(form).form('submit', {
		url : link_to_form,
		onSubmit : function() {
			return jQuery(this).form('validate');
		},
		success : function(result) {
			var result = eval('('+result+')');
			if(result.success) {
				//jQuery(dialog).dialog('close');
				jQuery(grid).datagrid('reload');
				jQuery.messager.show({
					title: 'Success',
					msg: result.msg,
					timeout:5000,
				});
			} else {
				jQuery.messager.show({
					title : 'Error',
					msg : result.msg,
					timeout:10000,
				});
			}
		}
	});
}

/**
 * Remove data
 *
 * @grid		identity grid
 */
function remove_data(grid,url){
	var row = jQuery(grid).datagrid('getSelected');
	if (row){
		jQuery.messager.confirm('Confirm','Are you sure you want to remove this data ?',function(r){
			if (r){
				jQuery.post(url,{id:row.id},function(result){
					if (result.success){
						jQuery(grid).datagrid('reload');
						jQuery.messager.show({
							title: 'Success',
							msg: result.msg,
							timeout:5000,
						});
					} else {
						jQuery.messager.show({
							title: 'Error',
							msg: result.msg,
							timeout:5000,
						});
					}
				},'json');
			}
		});
	}
	else {
		jQuery.messager.show({
			title: 'Error',
			msg: "Please select item will be deleted",
			timeout:5000,
		});
	}
}

/**
 * Search dialog
 *
 * @dialog		identity dialog
 */
function search_dialog(dialog)
{
	jQuery(dialog).dialog('open').dialog('setTitle','Search');
}

/**
 * Date Default for My SQL
 *
 */
function date_default(date){
	var y = date.getFullYear();
	var m = date.getMonth()+1;
	var d = date.getDate();
	return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
}
/**
 * End Of File 
 */