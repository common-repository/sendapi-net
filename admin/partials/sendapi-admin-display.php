<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       httpы://sendapi.net
 * @since      1.0.0
 *
 * @package    sendapi
 * @subpackage sendapi/admin/partials
 */
?>
<div class="wrap">
<div class = "sp-content-wrapping">
<h1 >sendapi.net</h1>

	
<form method="post" action="options.php">
	<?php settings_fields( 'sendapi-settings' ); ?>
	<?php do_settings_sections( 'sendapi-settings'); ?>
	<table class="form-table" >
		<tr valign="middle">
			<h5 style="color: #666;">Скопируйте и вставьте Widget ID с вашего <a href='https://sendapi.net/?page_id=239'>личного кабинета.</a></h5>
		<th style="vertical-align:middle;" scope="row">Widget ID</th>
		<td>
			<input class="sp-wa-button-text" type="text" minlength="3" maxlength="20" name="widget_id" placeholder="widget id" value="<?php echo esc_attr( get_option('widget_id') ); ?>" /></td>
		</tr>
			
		<tr valign="middle">
		<th style="vertical-align:middle;" scope="row" >Расположение виджета </th>
		<td>
			<select name="widget_position" style="font-size: 16px;height:40px;padding: 7px 10px;" class="sp-wa-button-text" id="widget-position">
				<option value="right" <?php echo ( get_option('widget_position')=='right' ? 'selected="selected"' : '');?>><?php echo 'Справа' ?></option>
				<option value="left" <?php echo ( get_option('widget_position')=='left' ? 'selected="selected"' : '');?>><?php echo 'Слева' ?></option>
			</select>
		</td>
		
		</tr>

		
		<tr>
		<th style="vertical-align:middle;" scope="row">
			Скрыть виджет на мобильных устройствах
		</th>
		<td>
			<div class="sp-wa-switch-control">
				<input type="checkbox" id="sp-wa-switch" name="widget_hidden_mobile" <?php echo (get_option('widget_hidden_mobile') ? 'checked' : ''); ?>>
				<label for="sp-wa-switch" class="green"></label>
			</div>
		</td>
		
		</tr>

		<tr>
		<th style="vertical-align:middle;" scope="row">
			Скрыть виджет на десктопах
		</th>
		<td>
			<div class="sp-wa-switch-control">
				<input type="checkbox" id="sp-wa-switch-mb" name="widget_hidden_desktop" <?php echo (get_option('widget_hidden_desktop') ? 'checked' : ''); ?>>
				<label for="sp-wa-switch-mb" class="green"></label>
			</div>
		</td>
		</tr>

		<tr>
		<th style="vertical-align:middle;" scope="row">
			Скрыть кнопку обратный звонок
		</th>
		<td>
			<div class="sp-wa-switch-control">
				<input type="checkbox" id="sp-wa-switch-cb" name="widget_hidden_call_back" <?php echo (get_option('widget_hidden_call_back') ? 'checked' : ''); ?>>
				<label for="sp-wa-switch-cb" class="green"></label>
			</div>
		</td>
		</tr>
	</table>
	</div>

	<div class = "sp-content-wrapping">
	<h1>Расширенные настройки виджета</h1>
	<a class="sp_button" id='a' href="https://sendapi.net/?page_id=29882" target="_blank">Перейти к расширенным настройкам</a>
	</div>
	
	<div class = "sp-content-wrapping">
	<h5 style="color: #666;">
		Используйте форму ниже, чтобы автоматически отображать кнопки на странице продукта WooCommerce. Если кнопка не работает, обратитесь в <a href='https://sendapi.net/?page_id=22'>службу поддержки.</a>
	</h5>
	<h1 >WooCommerce - Покупка в один клик</h1>
	<table class="form-table" >
	<tr valign="top">
		<th style="vertical-align:middle;" scope="row">Активировать</th>
		<td>	
	<div class="sp-wa-switch-control">
				<input type="checkbox" id="sp-wa-switch-woo" name="woo_status" <?php echo (get_option('woo_status') ? 'checked' : ''); ?>>
				<label for="sp-wa-switch-woo" class="green"></label>
	</div>
	</td>
	</tr>	
	<tr>
	<th style="vertical-align:middle;" scope="row"><label for="woo_button_position">Расположение кнопки</label></th>
		
	<td>
		<select name="woo_button_position" style="font-size: 16px;height:40px;padding: 7px 10px;">
			<option value="before_atc" <?php echo (get_option('woo_button_position') == 'before_atc' ? 'selected="selected"' : ''); ?>>Перед Добавить в корзину</option>
			<option value="after_atc" <?php echo (get_option('woo_button_position') == 'after_atc' ? 'selected="selected"' : ''); ?>>После Добавить в корзину</option>
		</select>
	</td>
	</tr>

	<tr valign="top">
		<th style="vertical-align:middle;" scope="row">Текст кнопки</th>
		<td><input class="sp-wa-button-text" type="text" minlength="3" maxlength="64" name="button_name" placeholder="Купить через Whatsapp" value="<?php echo get_option('button_name') ? get_option('button_name') : 'Купить через Whatsapp'; ?>" required/></td>
		</tr>
	
	<tr valign="top">
		<th style="vertical-align:middle;" scope="row">Shortcode кнопки</th>
		<td>
			<input class="sp-wa-button-text" type="text" value="[spi_button]" readonly/>
		</td>
	</tr>

		<tr>
			<th style="vertical-align:middle;" scope="row">Скрыть покупку в один клик на мобильных устройствах</th>
		<td>
			<div class="sp-wa-switch-control">
				<input type="checkbox" id="sp-wa-switch-mb-2" name="widget_oneclick_hidden_mobile" <?php echo (get_option('widget_oneclick_hidden_mobile') ? 'checked' : ''); ?>>
				<label for="sp-wa-switch-mb-2" class="green"></label>
			</div>
		</td>
		
		</tr>

		<tr>
		<th style="vertical-align:middle;" scope="row">Скрыть покупку в один клик на десктопах</th>
		<td>
			<div class="sp-wa-switch-control">
				<input type="checkbox" id="sp-wa-switch-2" name="widget_oneclick_hidden_desktop" <?php echo (get_option('widget_oneclick_hidden_desktop') ? 'checked' : ''); ?>>
				<label for="sp-wa-switch-2" class="green"></label>
			</div>
		</td>
		</tr>
	</table>
</div>
	<?php submit_button(); ?>
	</form>
</div>