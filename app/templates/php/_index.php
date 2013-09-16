<html>
<head>
	<title><%= _.capitalize(blogName) %></title>
	<?php wp_head(); ?>
</head>
<body>
	<div class="" id="new-post-row" style="display: none;">
		<div class="container">
			<div class="row">
				<form id="new-post-form" role="form" class="form-new-post" action="#" method="POST">
					<fieldset>
						<div class="form-group">
							<label for="post-title">Titulo:</label>
							<input class="form-control" id="post-title" name="post-title" />
						</div>

						<div class="form-group">
							<label for="post-content">Conteúdo:</label>
							<textarea class="form-control" rows="3"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Postar</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<button type="submit" class="btn btn-success new-post-button">Postar</button>
		<div class="row">
			<div class="col-md12">
				<?php get_header(); ?>
			</div>
		</div>
		<div class="row">
			<div class="articles col-md-8">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

							<div class="entry">
								<?php the_content(); ?>
							</div>

						</article>

					<?php endwhile; ?>

				<?php endif; ?>
			</div>
			<div class="sidebar col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md12">
				<?php get_footer(); ?>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>