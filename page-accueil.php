<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                    
                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();

                             /*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		get_template_part( 'template-parts/content', get_post_format() );

	       // End the loop.
	       endwhile;	
	        ?>
                    
                     <?php
                   $args = array( 'numberposts' => 5, 'order'=> 'DESC', 'orderby' => 'date' );
                   $postslist = get_posts( $args );
                   foreach ($postslist as $post) :  setup_postdata($post); ?>

                     <article>  
                         <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                           <p><?php the_content();?></p>
                         </article> 
                    
                   <?php endforeach;
                    
                    wp_reset_query();?>
                   
                    
                    

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
