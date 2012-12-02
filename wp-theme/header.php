
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title><?php wp_title('') ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
<?php wp_head() ?>
</head>
<body>
  <div id="container">
		<div id="header">
			<a id="logo" href="<?php echo home_url() ?>">
				<img src="<?php bloginfo('template_directory') ?>/images/logo.png" alt="Logo <?php bloginfo('name') ?>" />
			</a>
			<?php wp_nav_menu( array( 'container_class' => 'topnavigation', 'theme_location' => 'primary' ) ) ?>
		</div>
