<?php if //(is_post_type_archive('') || is_tax('')) : ?>

<?php dynamic_sidebar( 'sidebar' ); ?>

<?php elseif (is_single()) : ?>

<?php endif; ?>