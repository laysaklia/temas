<?php get_header() ?>

<main>

    <section>
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5
        );
        $recent_posts = new WP_Query($args);

        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) :
                $recent_posts->the_post();
        ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>

                <?php if (has_post_thumbnail($post->ID)) : ?>
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
                    <img src="<?php echo $image[0]; ?>')">
                <?php endif; ?>

                <div>
                    Em <?php the_date() ?> por <?php the_author_posts_link() ?>.<br>
                    Categorias: <?php the_category(', ') ?>.
                </div>
                
                <div>
                    <?php the_excerpt() ?>
                </div>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </section>

    <aside>

        <h3>Categorias</h3>
        <ul>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) :
                $category_link = get_category_link($category->term_id);
                $post_count = $category->count;
            ?>
                <li>
                    <a href="<?php echo $category_link ?>"><?php echo $category->name ?></a>
                    <sup><?php echo $post_count ?></sup>
                </li>
            <?php
            endforeach;
            ?>
        </ul>

    </aside>
</main>

<?php get_footer() ?>