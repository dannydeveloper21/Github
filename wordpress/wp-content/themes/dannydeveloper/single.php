<?php
get_header();
?>
<div class="wrapper">
<div id="container" class="group">
        <div id="blog" class="left-col">
            <div id="post">
                <?php if (have_posts()): while(have_posts()): the_post();?>   
                    <h2><?php the_title();?></h2>           
                    <div class="post_thumb">
                    <?php
                    the_post_thumbnail('small');
                    ?>
                    </div>
                    <?php the_content();?>
                    <div class="byline">By <?php the_author_posts_link();?>
                    on <a href="<?php the_permalink();?>"><?php the_time('l F d, Y');?></a>
                    </div>
                    <?php endwhile; else:?>
                        <p><?php _e('Sorry, No posts were found!');?></p>
                    <?php endif;?>
                    <div class="post-navigator"><?php previous_post_link('%link','Previous');?> | <?php next_post_link('%link','Next');?></div>
            </div><!--End section post-->
            <div class="commnets">
                <?php comments_template();?>
            </div>
        </div><!--End section blog-->
</div><!--End section container-->
    <div class="site-menu">
        <?php get_sidebar(); ?>
    </div>
</div>
<!--End Wrapper-->

<?php
get_footer();
?>