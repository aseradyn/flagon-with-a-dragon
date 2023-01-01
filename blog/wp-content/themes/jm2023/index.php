<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/theme/header.php");

    function apply_class( $attr) {
        $attr['class'] .= ' photo-card';
        return $attr;
    }
    
    add_filter( 'wp_get_attachment_image_attributes', 'apply_class', 10 );
?>

<style>
    .blog-thumbnail {
        width: 75px;
    }
</style>

<div class="single-column-layout">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <section>
            <header>
                <h2>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h2>
            </header>
            
            <p><?php the_date() ?></p>
            <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'thumbnail', array( 'class' => 'photo-card blog-thumbnail' ) );
                    //the_post_thumbnail();
                }
            ?>
            <?php 
                the_excerpt();
                edit_post_link(); 
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