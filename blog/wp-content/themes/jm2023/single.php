<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/theme/header.php");
?>

<style>
    img {
        max-width: 100%;
    }
</style>

<div class="single-column-layout">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <section>
            <header>
                <h1><?php the_title(); ?></h1>
            </header>
            <p><?php the_date(); 
                edit_post_link($text = "Edit", $before = " | "); ?></p>
            <?php 
                the_content(); 
            ?>
        </section>

        <?php 
        
        endwhile; 

        if ( get_next_posts_link() ) {
            next_posts_link();
        }

        if ( get_previous_posts_link() ) {
            previous_posts_link();
        }
        ?>

    <?php else: ?>

        <p>No posts found. :(</p>

    <?php endif; ?>

</div>