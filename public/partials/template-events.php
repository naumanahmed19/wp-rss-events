<?php
/**
 * Template Name: Events
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */


get_header();?>
<!--Page Content-->
<main>
    <div class="container relative animatedParent animateOnce">
        <div class="animated fadeInUpShort p-md-5 p-3">
            <div class="relative mb-5">
                <h1 class="mb-2 text-primary"><?php the_title(); ?></h1>
                <div class="row">
                  <?php
                    query_posts(array('post_type'=>'events','paged'=>$paged));  ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>           
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                      <header class="entry-header has-text-align-center">
                        <div class="entry-header-inner section-inner medium">
                            <h2 class="entry-title heading-size-1"><a href="<?php echo  get_post_meta( get_the_ID(), 'link', TRUE )?>"><?php the_title(); ?></a></h2>
                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
                          <div class="post-meta-wrapper post-meta-single post-meta-single-top">
                            <ul class="post-meta">
                                          <li class="post-date meta-wrapper">
                                          <time datetime="<?php echo  get_post_meta( get_the_ID(), 'custom_label_1', TRUE )?>" itemprop="datePublished">   
                                            <?php echo  date('D, F j, Y g:i a', strtotime(get_post_meta( get_the_ID(), 'custom_label_1', TRUE ))); ?>
                                          </time>
                                </li>

                                <li class="post-comment-link meta-wrapper">
                                  <span class="meta-icon">
                                    <svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"><path d="M9.43016863,13.2235931 C9.58624731,13.094699 9.7823475,13.0241935 9.98476849,13.0241935 L15.0564516,13.0241935 C15.8581553,13.0241935 16.5080645,12.3742843 16.5080645,11.5725806 L16.5080645,3.44354839 C16.5080645,2.64184472 15.8581553,1.99193548 15.0564516,1.99193548 L3.44354839,1.99193548 C2.64184472,1.99193548 1.99193548,2.64184472 1.99193548,3.44354839 L1.99193548,11.5725806 C1.99193548,12.3742843 2.64184472,13.0241935 3.44354839,13.0241935 L5.76612903,13.0241935 C6.24715123,13.0241935 6.63709677,13.4141391 6.63709677,13.8951613 L6.63709677,15.5301903 L9.43016863,13.2235931 Z M3.44354839,14.766129 C1.67980032,14.766129 0.25,13.3363287 0.25,11.5725806 L0.25,3.44354839 C0.25,1.67980032 1.67980032,0.25 3.44354839,0.25 L15.0564516,0.25 C16.8201997,0.25 18.25,1.67980032 18.25,3.44354839 L18.25,11.5725806 C18.25,13.3363287 16.8201997,14.766129 15.0564516,14.766129 L10.2979143,14.766129 L6.32072889,18.0506004 C5.75274472,18.5196577 4.89516129,18.1156602 4.89516129,17.3790323 L4.89516129,14.766129 L3.44354839,14.766129 Z"></path></svg>						</span>
                                  <span class="meta-text">
                                    <a href="<?php echo  get_post_meta( get_the_ID(), 'link', TRUE )?>">Read more</a>						
                                    </span>
                                </li>
                                
                            </ul><!-- .post-meta -->
                          </div><!-- .post-meta-wrapper -->
                        </div><!-- .entry-header-inner -->
                      </header><!-- .entry-header -->

                      <div class="post-inner thin ">
                        <div class="entry-content">
                          <?php the_content( ) ;?>
                         
                        </div><!-- .entry-content -->
                      </div><!-- .post-inner -->
                      
                    </article>

                    <?php  endwhile; endif;   ?>
                </div>
              
            </div>
        </div>
    </div>
</main>
<!--@Page Content-->
<?php get_footer(); ?>