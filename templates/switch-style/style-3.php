<?php
$option       = $this->get_options();
$switch_style = $this->switch_styles()[ $option['switch_style'] ];
$light        = $switch_style['light'];
$dark         = $switch_style['dark'];
?>
<div id="dark-mode-toggle" class="<?php echo esc_attr( $option['switch_position'] ) . ' ' . esc_attr( $option['switch_style'] ); ?>">
	<div class="tool">
		<span><?php echo esc_html( 'Toggle Dark Mode', 'catch-dark-mode' ); ?></span>
	</div>
	<div class="toggle-wrapper">
		<input type="checkbox" id="toggle" class="switch" />
	</div>
</div>
