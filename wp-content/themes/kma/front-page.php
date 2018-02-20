<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Seriously_Creative
 */

get_header(); ?>
	<div id="mast">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col text-center">
                    <div class="mast-content">
                        <p class="home-tag">Serious Creativity</p>
                        <h1>We Build Brands Like Nobody’s Business.</h1>
                        <a class="btn btn-clear btn-lg" style="margin:.5rem;" href="/portfolio/">See Our Work</a> &nbsp; <a class="btn btn-clear btn-lg" style="margin:.5rem;" href="/services/">Let's Get started</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div id="scrollbg" class="hide"></div>
    <div id="hider"></div>
	<div id="clickdown"><a class="circlebutton" href="#services-anchor"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.38 14.24"><defs><style>.cls-1{fill:#fff;opacity:0.8;}</style></defs><polygon class="cls-1" points="0 0 0 5.09 25.19 14.24 50.38 5.09 50.38 0 25.19 9 0 0"/></svg></a></div>
	<div id="video-container" ></div>
</div>
<div class="clearfix"></div>
<div id="mid">
    <div id="copy-section">
        <div class="container text-center no-gutter">
            <div class="row justify-content-center align-items-center">
	            <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col text-center">
			            <?php the_content(); ?>
                    </div>
	            <?php endwhile; ?>
            </div>
        </div>
    </div>
	<div id="testimonials-section">
		<div class="container text-center no-gutter">
            <div class="row justify-content-center align-items-center">
            <?php
            $args = array(
                'numberposts' => -1,
                'offset' => 0,
                'category' => 0,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_type' => 'testimonial',
                'post_status' => 'publish',
                'suppress_filters' => true,
                'meta_query' => array(
                    array(
                        'key' => 'author_info_featured',
                        'value'   => '1',
                        'compare' => '!='
                    )
                )
            );

            $featured_testimonials = get_posts( $args, ARRAY_A );

            foreach($featured_testimonials as $testimonial) {
                $testimonial_id = $testimonial->ID;
                $copy = $testimonial->post_content;
                $author = get_post_meta($testimonial_id,author_info_name, true);
                $company = get_post_meta($testimonial_id,author_info_company, true);
                $featured = get_post_meta($testimonial_id,author_info_featured, true);
                $shorttext = get_post_meta($testimonial_id,author_info_short_version, true);
	            $link = get_permalink($testimonial_id);
	            $link = '/testimonials/';

                if($shorttext!=''){ $copy = $shorttext; }

	            $copy = wp_trim_words( $copy, 35, '... <a href="'.$link.'">read more</a>.' );
                //if(strlen($copy)<110){ $copy .= '<br>'; }

                ?>
                <div class="quotes col">
                    <p class="quote-content"><?php echo $copy; ?></p>
                    <p class="quote-author" ><?php echo $author.', '.$company; ?></p>
                </div>
            <?php } ?>
            </div>
            <div id="services-anchor"></div>
			<a class="btn btn-lg btn-primary more-testimonials" href="/testimonials/">More Testimonials</a>

		</div>
	</div>
	<div id="services-section">
		<div class="container-fluid text-center no-gutter">
			<div class="row">
				<div class="col-xs-12 overflow-text">
					<p>Services</p>
				</div>
			</div>
			<div class="row justify-content-center align-items-center">
                
                <?php
                
                $serviceAreas = get_terms( array( 
                    'taxonomy' => 'service_category',
                    'orderby' => 'menu_order',
                    'order' => 'ASC' 
                ) );
                
				foreach($serviceAreas as $serviceArea){ 
                    
                    //print_r($serviceArea);
                    
                    //Get Taxonomy Info
                    $categoryName = get_field('short_name', $serviceArea->taxonomy . '_' . $serviceArea->term_id);
                    $serviceSlug = $serviceArea->slug;

                    $args = array(
                        'numberposts' => -1,
                        'offset' => 0,
                        'category' => 0,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'post_type' => 'service',
                        'tax_query' => array(
                            array(
                              'taxonomy' => 'service_category',
                              'field' => 'slug',
                              'terms' => $serviceSlug
                            )
                        ),
                        'post_status' => 'publish',
                        'suppress_filters' => true,
                    );
                    
                    $servItems = get_posts( $args, ARRAY_A );
                    
				?>

				<div class="col-lg-4 col-xl-3">
					<div class="service-box">
                        <h2><?php echo $categoryName; ?></h2>
                        <div class="dividerline"></div>
                        <?php foreach($servItems as $service){
                    
                                //print_r($service);
                                
                                $serv_id = $service->ID;
                                $isEnabled = get_field('enable_link',$serv_id);
                                $serviceName = $service->post_title;
                                $serviceLink = get_permalink($serv_id);	
                                
                                if($isEnabled === TRUE){ ?>
                                    <h3><a href="<?php echo $serviceLink; ?>" class="service-link" ><?php echo $serviceName; ?></a></h3>
                        
                                <?php }else{ ?>
                        
                                    <h3><span class="service-link" ><?php echo $serviceName; ?></span></h3>
                        
                                <?php } ?>
                        
                        <?php } ?>
                    
					</div>
				</div>

			<?php } ?>
                
			</div>
		</div>
    </div>
	<div id="work-section">
		<div class="container-fluid text-xs-center no-gutter">
			<div class="row">
				<div class="col-xs-12 overflow-text">
					<p>Featured Work</p>
				</div>
			</div>
			<div class="row">
				
				<?php
					$args = array(
						'numberposts' => 6,
						'offset' => 0,
						'category' => 0,
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'include' => '',
						'exclude' => '',
						'meta_key' => '',
						'meta_value' =>'',
						'post_type' => 'work',
						'post_status' => 'publish',
						'suppress_filters' => true,
						'meta_key'		=> 'featured',
						'meta_value'	=> '1'
					);

					$featured_work = get_posts( $args, ARRAY_A );

					foreach($featured_work as $work){ 
						$work_id = $work->ID;
						$thumb_id = get_post_thumbnail_id( $work_id );
						$thumb = wp_get_attachment_image_src( $thumb_id, 'medium'); 
						$thumb_url = $thumb[0];
                        $workContent = $work->post_content;
						$tax = get_the_terms( $work_id, 'client' );
                        $types = get_the_terms( $work_id, 'work_category' );
						$clientName = $tax[0];
                        $workTypes = '';
                        $w = 1;
                        foreach($types as $type){
                            $w++;
                            if($type->slug!='client'){
                                $workTypes .= $type->name;
                                if($w <= count($types)){ $workTypes .= '<span class="seperator">/</span>'; }
                            }
                        }
						
						if(get_field('link',$work_id) != ''){
							$link = get_field('link',$work_id);
						}else{
							$link = get_permalink($work_id);	
						}
                        
                        if(get_field('background_color',$work_id)!=''){
                            $bgColor = get_field('background_color',$work_id);
                        }else{
                            $bgColor = '#DDDDDD';
                        }
						
					?>

					<div class="col-lg-6">
						<div class="work-box" <?php if($thumb_url != ''){ ?>style="background-image:url('<?php echo $thumb_url; ?>');"<?php } ?> >
							<div class="button-overlay align-items-center">
                                <div class="work-content">
                                    <h2><?php echo $clientName->name; ?></h2>
                                    <p><?php echo $workContent; ?></p>
                                    <p class="types"><?php echo $workTypes; ?></p>
                                </div>
								<a href="<?php echo $link; ?>" class="work-link" ></a>
							</div>
                            <div class="work-box-hover <?php echo $work->slug; ?>" style="background-color: <?php echo $bgColor; ?>;"></div>
						</div>
					</div>

				<?php } ?>
			</div>
		</div>
	</div>
	<div id="news-section">
		<div class="container-fluid text-center">
			<div class="row">
				<div class="col-xs-12 overflow-text">
					<p>Recent News & Helpful Articles</p>
				</div>
			</div>
			<div class="row">
			<?php
				$args = array(
					'numberposts' => 4,
					'offset' => 0,
					'category' => 0,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'include' => '',
					'exclude' => '',
					'meta_key' => '',
					'meta_value' =>'',
					'post_type' => 'post',
					'post_status' => 'publish',
					'suppress_filters' => true
				);

				$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

				foreach($recent_posts as $article){ 
					$article_id = $article['ID'];
					$post_date = $article['post_date'];
					$thumb_id = get_post_thumbnail_id( $article_id );
					$thumb = wp_get_attachment_image_src( $thumb_id, 'medium'); 
					$thumb_url = $thumb[0];

					//echo $article_id;
					//print_r($article);
				?>

				<div class="col-sm-6 col-xl-3" >
					<div class="article-box" >
						<div class="embed-responsive embed-responsive-16by9" >
							<?php if($thumb_url != ''){ ?>
							<img src="<?php echo $thumb_url; ?>" alt="<?php echo $article["post_title"]; ?>" class="img-fluid embed-responsive-item" >
							<?php }else{ ?>
							<img src="<?php echo get_template_directory_uri().'/img/blog-placeholder.jpg'; ?>" alt="<?php echo $article["post_title"]; ?>" class="img-fluid embed-responsive-item" >
							<?php } ?>
						</div>
						<div class="article-intro" >
						<p class="title"><?php echo wp_trim_words( $article["post_title"], 10, '...' ); ?> <span class="article-tile-date"><?php echo mysql2date( get_option( 'date_format' ), $post_date); ?></span></p>
						<p class="intro"><?php echo wp_trim_words( $article['post_content'], 20, '...' ); ?></p>
						<p class="read-more">Read More</p>
						</div>
						<a href="<?php echo get_permalink($article_id); ?>" class="article-box-link"></a>
					</div>	
				</div>

			<?php } ?>
			</div>
			<div class="text-center" >
                <a class="btn btn-primary" href="/news/" >More News</a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>