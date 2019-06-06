<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()): the_post(); ?>
    <div class="content">
        <div class="article-title title-page">
            Акция: <?php the_title();?>.<br>
            Цена: <?php the_field('price'); ?>р.
        </div>
        <?php
        $image = get_the_post_thumbnail_url();
        IF ($image) :
        ?>
        <div class="article-image"><img src="<?php echo $image;?>" alt="Image поста"></div>
        <?php endif; ?>
        <div class="article-info">
            <div class="post-date"><?php the_date();?></div>
        </div>
        <div class="article-text">
            <?php the_content();?>
        </div>
        <?php
        $prev_post = get_previous_post();
        $prev_thumbnail = get_the_post_thumbnail($prev_post->ID, array(170,113.8) );
        $next_post = get_next_post();
        $next_thumbnail = get_the_post_thumbnail($next_post->ID, array(170,113.8) );
        ?>
        <div class="article-pagination">
            <div class="article-pagination__block pagination-prev-left"><a href="<?php echo $prev_post->guid;?>" class="article-pagination__link"><i class="icon icon-angle-double-left"></i>Предыдущая статья</a>
                <div class="wrap-pagination-preview pagination-prev-left">
                    <div class="preview-article__img"><?php echo $prev_thumbnail;?></div>
                    <div class="preview-article__content">
                        <div class="preview-article__info"><a href="<?php echo $prev_post->guid;?>" class="post-date"><?php echo mysql2date('d.m.y', $prev_post->post_date, false);?></a></div>
                        <div class="preview-article__text"><?php echo $prev_post->post_title;?></div>
                    </div>
                </div>
            </div>
            <div class="article-pagination__block pagination-prev-right"><a href="<?php echo $next_post->guid;?>" class="article-pagination__link">Следующая статья<i class="icon icon-angle-double-right"></i></a>
                <div class="wrap-pagination-preview pagination-prev-right">
                    <div class="preview-article__img"><?php echo $next_thumbnail;?></div>
                    <div class="preview-article__content">
                        <div class="preview-article__info"><a href="<?php echo $next_post->guid;?>" class="post-date"><?php echo mysql2date('d.m.y', $next_post->post_date, false);?></a></div>
                        <div class="preview-article__text"><?php echo $next_post->post_title;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; else: ?>
<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>