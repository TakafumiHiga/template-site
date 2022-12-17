<!-- PCサイズ -->
<!-- 固定ページの場合 -->
<?php if (is_tax('works-cat')|| is_singular('works') || is_post_type_archive('works')) : ?>
<?php get_template_part('includes/sidebar-works'); ?>
<!-- PCサイズ -->
<?php elseif (is_tax('seminar_genru')|| is_singular('seminar_info') || is_post_type_archive('voice')) : ?>
<?php get_template_part('includes/sidebar-voice'); ?>

<!-- PCサイズ -->
<?php elseif (is_category('')|| is_single() || is_archive('post')) : ?>

<?php get_template_part('includes/sidebar-news'); ?>
<?php else: ?>
<?php dynamic_sidebar('sidebar'); ?>
<!-- 導入事例はサイドバー無しcase -->
<?php endif; ?>