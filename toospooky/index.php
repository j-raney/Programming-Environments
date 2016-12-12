<?php
/* Main template */

get_header(); ?>

<div>
    <main>
        <p id="loop-title"><br />Posts</p>
        <?php if ( have_posts() ) :
            while ( have_posts() ) : ?>
                <br />
                <?php the_post(); ?>
                <div id="post-title"> <?php the_title(); ?> </div>
                <?php the_content(); ?>
                <br /><br />
            <?php endwhile;
        else :?>
            <p>No posts found!</p>
        <?php endif; ?>
    </main>
<?php
get_footer();
?>
