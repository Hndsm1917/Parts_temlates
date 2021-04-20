<----------------- SHOW IMAGE WITH USEFUL ATTRIBUTES ------------------->

<img src="<?= the_post_thumbnail_url()?>" 
     alt="<?= get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)?>"
/>


<----------------------- Check UserAgent by php ---------------------->
<?php

$user_agent = $_SERVER["HTTP_USER_AGENT"];
if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
else $browser = "Unknown";


if($browser == "Firefox"){ ?>
     <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style/bootstrap-grid.min.css">
     <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/font/stylesheet.css?<?=time()?>">
<?php } else { ?>
     <link rel="preload" type="text/css" href="<?php bloginfo('template_url') ?>/style/bootstrap-grid.min.css" as="style" onload="this.rel='stylesheet'">
     <noscript><link rel="stylesheet" href="<?php bloginfo('template_url') ?>/style/bootstrap-grid.min.css"></noscript>
     
     <link rel="preload" type="text/css" href="<?php bloginfo('template_url')?>/font/stylesheet.css?<?=time()?>" as="style" onload="this.rel='stylesheet'">
     <noscript><link rel="stylesheet" href="<?php bloginfo('template_url')?>/font/stylesheet.css?<?=time()?>"></noscript>

<?php } ?>