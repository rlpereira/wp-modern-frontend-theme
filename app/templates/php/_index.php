<html>
<head>
	<title><%= _.capitalize(blogName) %></title>
	<?php wp_head(); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 stage">
				<?php
					echo "<h1>";
				?> 
					<%= _.capitalize(blogName) %> 
				<?php
					echo "</h1>";
				?>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>