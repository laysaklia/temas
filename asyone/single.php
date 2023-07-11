<!--
    Exibe um post 

    <?php get_header() ?>

<main>

    <article>

        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
        ?>
                <h2><?php the_title() ?></h2>
                <div>Em <?php the_date() ?> por <?php the_author_posts_link() ?>.</div>
                <div><?php the_content() ?></div>
                <div>Categorias: <?php the_category(', ') ?>.</div>
        <?php
            endwhile;
        endif;
        ?>

    </article>

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