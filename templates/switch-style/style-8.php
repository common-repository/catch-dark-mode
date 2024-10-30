<?php
$option       = $this->get_options();
$switch_style = $this->switch_styles()[ $option['switch_style'] ];
$light        = $switch_style['light'];
$dark         = $switch_style['dark'];
?>

<div id="dark-mode-toggle" class="mid <?php echo esc_attr( $option['switch_position'] ) . ' ' . esc_attr( $option['switch_style'] ); ?>">
  <label class="rocker rocker-small">
	<input type="checkbox" id="toggle">
	<span class="switch-left">On</span>
	<span class="switch-right">Off</span>
  </label>
</div>
