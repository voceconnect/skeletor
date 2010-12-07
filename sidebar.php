<div class="sidebar" role="complementary">
	<?php
		if (is_home() && is_active_sidebar('sidebar-main')) :
			// use sidebar-main if on home page and available
			dynamic_sidebar('sidebar-main');
		elseif (is_active_sidebar('sidebar-main') || is_active_sidebar('sidebar-secondary')) :
			// use sidebar-secondary if available, falling back to sidebar-main if available
			if (is_active_sidebar('sidebar-secondary')) :
				dynamic_sidebar('sidebar-secondary');
			elseif (is_active_sidebar('sidebar-main')) :
				dynamic_sidebar('sidebar-main');
			endif;
		else :
			// if the sidebars above aren't available, enter HTML/PHP to use below
	?>
	<?php endif; ?>
</div>