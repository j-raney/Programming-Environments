<?php
/* Header file */
?>

<head>
    <title><?php bloginfo( 'description' ); ?></title>
    <link type="text/css" rel="stylesheet" href="<?php bloginfo( 'template_directory' )?>/style.css" />
    <?php wp_head(); ?>
</head>
<body>
    <div id="header">
        <h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <h2 id="site-info"><?php bloginfo( 'description' ); ?></h2>
    </div>
</body>

