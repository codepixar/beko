<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beko
 */

?>

    <article <?php post_class('blog_item'); ?> >
        <?php
        if( is_sticky() ){
            echo '<span class="sticky_label">'. esc_html__( 'Sticky', 'beko' ) .'</span>';
        }
        if( has_post_thumbnail() ){ ?>
            <div class="blog_item_img">
                <?php
                the_post_thumbnail( 'beko_single_blog_750x375', array( 'class' => 'card-img rounded-0' ) );

                echo '<a href="'. esc_url( beko_blog_date_permalink() ) .'" class="blog_item_date"><h3>'.  get_the_time( 'd' ) .'</h3><p>'. get_the_time('M') .'</p></a>';

                ?>
            </div>
            <?php
        }
        ?>

        <div class="blog_details">
            <a class="d-inline-block" href="<?php the_permalink(); ?>">
                <h2 class="p_title"><?php the_title(); ?></h2>
            </a>
            <?php
            $post_exc_limit = !empty( beko_opt( 'beko_excerpt_length' ) ) ? beko_opt( 'beko_excerpt_length' ) : 28;
            echo wpautop( wp_trim_words( get_the_content(), $post_exc_limit, '' ) );

            if( beko_opt( 'beko_blog_meta' ) == 1 ) {
	            ?>
                <ul class="blog-info-link">
                    <li><i class="fa fa-tags"></i> <?php echo beko_featured_post_cat(); ?></li>
                    <li><?php echo beko_posted_comments(); ?></li>
                </ul>
	            <?php
            } ?>
        </div>
        
    </article>
