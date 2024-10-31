<?php

/**
 * Provide a public area view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       httpы://sendapi.net
 * @since      1.0.0
 *
 * @package    sendapi
 * @subpackage sendapi/public/partials
 */
?>

<div class='sendapi_widget'
	data-widget_theme='3'
	data-widget_position='<?php echo $sendapi_widget_position;?>'
	data-widget_check_online='true'
	data-widget_description='false'
	data-widget_message='false'
	data-widget_call_back='<?php echo ($sendapi_widget_hidden_call_back ? 'false' :'true');?>'
	data-widget_hidden_mobile='<?php echo ($sendapi_widget_hidden_mobile ? 'true' :'');?>'
	data-widget_hidden_desktop='<?php echo ($sendapi_widget_hidden_desktop ? 'true' :'');?>'
	>
	</div>
	<!-- BEGIN SENDAPI CODE {literal} -->
	<script>
	const widgetOptions = {
	widget_id: '<?php echo get_option('widget_id');?>',
	widget_container: 'sendapi_widget'
	};
	(function() {
	const script = document.createElement('script');
	script.type = 'text/javascript';
	script.async = true;
	script.charset = 'utf-8';
	script.src = 'https://sendapi.net/widget/script.php?ver=3';
	document.getElementsByTagName('head')[0].appendChild(script);
	})();
	</script>
	<!-- {/literal} END SENDAPI CODE -->