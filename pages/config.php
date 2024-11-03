<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
layout_page_header( lang_get( 'plugin_format_title' ) );
layout_page_begin( 'config.php' );
print_manage_menu();
?>

<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<br/>
<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo  plugin_lang_get( 'config' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped">  

<tr>
<td align="left">
</td>
</tr>
<tr >
<td class="category" width="60%">
<?php echo lang_get( 'plugin_Captcha_lifetime' )?>
</td>
<td class="center" width="20%">
<input type="number" name="lifetime" min="5" max="999"  value="<?php echo plugin_config_get( 'lifetime' )?>" >
</td>
</tr> 

<tr >
<td class="category" width="60%">
<?php echo lang_get( 'plugin_Captcha_length' )?>
</td>
<td class="center" width="20%">
<input type="number" name="length" min="3" max="10"  value="<?php echo plugin_config_get( 'length' )?>" >
</td>
</tr> 


<tr >
<td class="category" width="60%">
<?php echo lang_get( 'plugin_Captcha_imagetext' )?>
</td>
<td class="category" width="20%">
<label><input type="radio" name='imagetext' value="1" <?php echo( ON == plugin_config_get( 'imagetext' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo lang_get( 'enabled' )?></label>

<label><input type="radio" name='imagetext' value="0" <?php echo( OFF == plugin_config_get( 'imagetext' ) )? 'checked="checked" ' : ''?>/>
<?php echo lang_get( 'disabled' )?></label>
</td>
</tr> 

<tr >
<td class="category" width="60%">
<?php echo lang_get( 'plugin_Captcha_antibotq' )?>
</td>
<td class="category" width="20%">
<label><input type="radio" name='antibotq' value="1" <?php echo( ON == plugin_config_get( 'antibotq' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo lang_get( 'enabled' )?></label>

<label><input type="radio" name='antibotq' value="0" <?php echo( OFF == plugin_config_get( 'antibotq' ) )? 'checked="checked" ' : ''?>/>
<?php echo lang_get( 'disabled' )?></label>
</td>
</tr> 


</table>
</div>
</div>
<div class="widget-toolbox padding-8 clearfix">
	<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'change_configuration' )?>" />
</div>
</div>
</div>
</form>
</div>
</div> 

<?php
layout_page_end();

