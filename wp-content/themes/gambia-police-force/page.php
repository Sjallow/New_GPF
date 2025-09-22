<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (!is_front_page()) : ?>
                    <header class="entry-header" style="text-align: center; margin-bottom: 40px;">
                        <h1 class="entry-title" style="color: var(--primary-blue); font-size: 36px; margin-bottom: 20px;">
                            <?php the_title(); ?>
                        </h1>
                    </header>
                <?php endif; ?>

                <?php if (has_post_thumbnail() && !is_front_page()) : ?>
                    <div class="entry-thumbnail" style="margin-bottom: 30px;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 300px; object-fit: cover; border-radius: 10px;')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="line-height: 1.8; font-size: 16px; color: var(--gray-800);">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'gpf'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
