<?php include 'header.php'; ?>
	<div class="margin"></div>
	<div class="margin"></div>
	<?php
	// Start the loop.
	$ids[] = array();
	while ( have_posts() ) : the_post();
	$ids[] = get_the_ID();
	?>
	<div class="texto">
		<div class="pdd">
			<h1><?php the_title(); ?></h1>
			<p class="data"><?php the_date(); ?></p>
				<div class="conteudo">
					<?php the_content(); ?>
				</div>

			<?php
			// End the loop.
			endwhile;
			?>
		</div>
	</div>
	<div class="blog">
        <div class="titulo col-xs-12 scrollAnima bounceInUp" data-wow-duration="500ms" data-wow-delay="300ms">
          <div class="col-md-4 col">
          </div>
          <div class="col-md-4 col">
			<h1>Mais Notícias </h1>
          </div>
          <div class="col-md-4 col">
            
          </div>
        </div>
        <div class="noticias">
          <div class="row">
            <?php
                $blogPet = new WP_Query( array('post_type' => 'blog', 'showposts' => 3, 'post__not_in' => $ids) );
                while($blogPet->have_posts()) : $blogPet->the_post();
            ?>
              <div class="col-md-4">
                  <a href="<?php the_permalink(); ?>" class="linkNoticia">
                    <div class="noticia scrollAnima bounceInLeft" data-wow-duration="500ms" data-wow-delay="400ms">
                      <div class="data">
                        <span><?php echo get_the_date('d-m-Y'); ?></span>
                      </div>
                      <div class="thumb">
                        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                          <?php the_post_thumbnail('medium', array( 'class' => 'img-responsive')); ?>
                        <?php endif; ?>
                      </div>
                      <div class="tituloNoticia">
                        <h3><?php the_title(); ?></h3>
                      </div>
                      <div class="resumo">
                        <?php the_excerpt(); ?>
                      </div>
                    </div>
                  </a>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          </div>
        </div>
      </div>
<?php include 'footer.php'; ?>
