<?php
echo '<div class="text-center">';
$big = 999999999; // need an unlikely integer
$args = array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'       => '?page=%#%',
    'current'      => max( 1, get_query_var( 'page' ) ),
	'total' => $wp_query->max_num_pages,
    'prev_text'    => __('&laquo; Previous', 'skeletor'),
    'next_text'    => __('Next &raquo;', 'skeletor'),
    'type'         => 'list'
);
echo paginate_links( $args ); 
echo '</div>';
