<?php
$option       = $this->get_options();
$switch_style = $this->switch_styles()[ $option['switch_style'] ];
$light        = $switch_style['light'];
$dark         = $switch_style['dark'];
?>
<div id="dark-mode-toggle" class="<?php echo esc_attr( $option['switch_position'] ) . ' ' . esc_attr( $option['switch_style'] ); ?>">
<div class="container">
  <div class="checkbox">
	<input type="checkbox" name="example" id="toggle">
	<div class="checkbox-inner">
	  <label for="example"></label><span></span>
	</div>
	<div class="checkbox__off">DARK</div>
	<div class="checkbox__on">LIGHT</div>
  </div>
</div>
</div>
