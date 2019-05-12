<div class="wrapper">
    <div id="container" class="group">
            <div id="blog" class="left-col">
                <div id="post-list">
                    <?php if (have_posts()): while(have_posts()): the_post();?>  
                    <div class="post">
                        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>           

                        <?php the_content();?>
                    </div>
                        <?php endwhile; else:?>
                            <p><?php _e('Sorry, No posts were found!');?></p>
                        <?php endif;?>
                </div><!--End section post-->
            </div><!--End section blog-->
    </div><!--End section container-->
    <div class="site-menu">
        <?php get_sidebar(); ?>
    </div>
</div><!--End Wrapper-->
