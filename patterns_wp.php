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




<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
    <a rel="nofollow" title="Pintrest_Share" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>">
        <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.6286 1.74206C10.4584 0.618702 8.83899 0 7.06869 0C4.36447 0 2.70126 1.1085 1.7822 2.03836C0.649517 3.18431 0 4.7059 0 6.21307C0 8.10542 0.791527 9.55787 2.11704 10.0982C2.20603 10.1347 2.29557 10.153 2.38335 10.153C2.66299 10.153 2.88455 9.97008 2.96132 9.67657C3.00606 9.50819 3.10974 9.0928 3.15481 8.91246C3.25131 8.55634 3.17334 8.38505 2.96291 8.13705C2.57954 7.68345 2.40101 7.14704 2.40101 6.44895C2.40101 4.37538 3.94502 2.1716 6.80671 2.1716C9.07733 2.1716 10.4878 3.46213 10.4878 5.53954C10.4878 6.85047 10.2055 8.06451 9.69258 8.95819C9.33619 9.57914 8.70948 10.3193 7.74738 10.3193C7.33133 10.3193 6.95761 10.1484 6.72178 9.85049C6.49901 9.56883 6.42559 9.20498 6.51518 8.82578C6.6164 8.39733 6.7544 7.95041 6.88797 7.51835C7.13158 6.72924 7.36187 5.98393 7.36187 5.3893C7.36187 4.3722 6.73659 3.6888 5.80606 3.6888C4.62349 3.6888 3.69703 4.88991 3.69703 6.42323C3.69703 7.17523 3.89688 7.73767 3.98735 7.95365C3.83838 8.58485 2.95298 12.3375 2.78504 13.0451C2.68793 13.4582 2.10295 16.7209 3.0712 16.981C4.15908 17.2733 5.13149 14.0957 5.23046 13.7366C5.31067 13.4446 5.59135 12.3404 5.76335 11.6616C6.28851 12.1674 7.1341 12.5094 7.95688 12.5094C9.50797 12.5094 10.9029 11.8114 11.8847 10.5441C12.837 9.31497 13.3614 7.60175 13.3614 5.72031C13.3614 4.24944 12.7298 2.7994 11.6286 1.74206Z" fill="#8BB9C1"/>
        </svg>
    </a>