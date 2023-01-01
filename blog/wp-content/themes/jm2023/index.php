<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/theme/header.php");
?>

<style>
    .blog-thumbnail {
        width: 150px;
    }
    .post-layout {
        margin-top: 10px;
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 10px;
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
            
            <div class="post-layout">
                <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'thumbnail', array( 'class' => 'photo-card blog-thumbnail' ) );
                    }
                ?>
                <div>
                    <p><?php the_date() ?></p>
                    <?php the_excerpt(); ?>
                    <p><?php edit_post_link(); ?></p>
                </div>
            </div>
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