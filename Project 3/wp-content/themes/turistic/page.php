<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()): the_post(); ?>
    <div class="content">
        <div class="pdf">
            <?php
            $field = get_field('PDF');
            ?>
            <a href="<?php echo $field['url'] ?>">Условия сервиса PDF</a>
        </div>
        <h1 class="title-page"><?php the_title(); ?></h1>
        <div style="min-width: 795px">
            <?php the_content();?>
        </div>
    </div>

<?php endwhile; else: ?>
<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>
<?php get_template_part('parts/sidebar'); ?>
<?php get_footer(); ?>