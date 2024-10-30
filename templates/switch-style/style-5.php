<?php
$option       = $this->get_options();
$switch_style = $this->switch_styles()[ $option['switch_style'] ];
$light        = $switch_style['light'];
$dark         = $switch_style['dark'];
?>
<button id="dark-mode-toggle" class="<?php echo esc_attr( $option['switch_position'] ) . ' ' . esc_attr( $option['switch_style'] ); ?>">
	<input type="checkbox" id="toggle" />
	<label for="toggle" class="toggleWrapper">
	<div class="toggle"></div>
</label>
</button>
