<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="text-align: center; margin-bottom: 40px;">
                    <h1 class="entry-title" style="color: var(--primary-blue); font-size: 36px; margin-bottom: 20px;">
                        <?php the_title(); ?>
                    </h1>
                    <div class="entry-meta" style="color: var(--gray-600); font-size: 14px;">
                        <span>Published on <?php echo get_the_date(); ?></span>
                        <?php if (get_the_author()) : ?>
                            <span> | By <?php the_author(); ?></span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail" style="margin-bottom: 30px;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 400px; object-fit: cover; border-radius: 10px;')); ?>
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

                <footer class="entry-footer" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid var(--gray-200);">
                    <?php
                    $categories_list = get_the_category_list(', ');
                    if ($categories_list) {
                        printf('<div class="cat-links" style="margin-bottom: 10px;"><strong>Categories:</strong> %s</div>', $categories_list);
                    }

                    $tags_list = get_the_tag_list('', ', ');
                    if ($tags_list) {
                        printf('<div class="tags-links" style="margin-bottom: 20px;"><strong>Tags:</strong> %s</div>', $tags_list);
                    }
                    ?>
                </footer>
            </article>

            <!-- Navigation -->
            <nav class="post-navigation" style="margin: 40px 0; display: flex; justify-content: space-between;">
                <div class="nav-previous">
                    <?php previous_post_link('%link', '← Previous Post'); ?>
                </div>
                <div class="nav-next">
                    <?php next_post_link('%link', 'Next Post →'); ?>
                </div>
            </nav>

            <!-- Comments -->
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
