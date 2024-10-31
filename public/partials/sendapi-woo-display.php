<?php

/**
 * Provide a woo area view for the plugin
 *
 * This file is used to markup the woo-facing aspects of the plugin.
 *
 * @link       httpы://sendapi.net
 * @since      1.0.0
 *
 * @package    sendapi
 * @subpackage sendapi/public/partials
 */
?>
<div class="sp-woo-products-button">
    <div class="sendapi_widget"
		data-widget_theme="1"
		data-button_text="<?php echo $sendapi_button_name;?>"
		data-widget_title=""
		data-widget_description="false"
		data-buy_in_one_click="true"
		data-buy_in_one_click_title="<?php echo $product->name; ?>"
		data-buy_in_one_click_city=""
		data-buy_in_one_click_price="<?php echo $price; ?>"
		data-buy_in_one_click_images="<?php echo $image_url; ?>"
		data-buy_in_one_click_url="<?php echo $product_url; ?>"
		data-buy_in_one_click_hidden_mobile="<?php echo ($sendapi_widget_oneclick_hidden_mobile ? "true" : ''); ?>"
		data-buy_in_one_click_hidden_desktop="<?php echo ($sendapi_widget_oneclick_hidden_desktop ? "true" : ''); ?>"
		>
    </div>
</div>