<!-- PCサイズ -->
<?php if (is_tax('column_cat')|| is_singular('column') || is_post_type_archive('column')) : ?>
<?php get_template_part('template-parts/sidebar-column'); ?>
<!-- PCサイズ -->
<?php elseif (is_tax('voice_cat')|| is_singular('voice') || is_post_type_archive('voice')) : ?>
<?php get_template_part('template-parts/sidebar-voice'); ?>

<!-- PCサイズ -->
<?php elseif (is_category('news_cat')|| is_single() || is_archive('news')) : ?>

<?php get_template_part('template-parts/sidebar-news'); ?>
<?php else: ?>
<!-- 導入事例はサイドバー無しcase -->
<?php endif; ?>