<?php
$option       = $this->get_options();
$switch_style = $this->switch_styles()[ $option['switch_style'] ];
$light        = $switch_style['light'];
$dark         = $switch_style['dark'];
?>
<button id="dark-mode-toggle" class="<?php echo esc_attr( $option['switch_position'] ) . ' ' . esc_attr( $option['switch_style'] ); ?>">
	<div class="tool">
		<span><?php echo esc_html( 'Toggle Dark Mode', 'catch-dark-mode' ); ?></span>
	</div>	
	<label>
		<input type="checkbox" id="toggle" class="switch" />
		<img src="<?php echo esc_url( $light ); ?>" class="light">
		<img src="<?php echo esc_url( $dark ); ?>" class="dark">
	</label>
</button>
