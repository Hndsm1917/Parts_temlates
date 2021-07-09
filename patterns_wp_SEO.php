      
       ----------- REMOVE PAGE FROM SEARCH INDEXATION -----------

       <?php if($_SERVER['REQUEST_URI'] == '/hello-world/'){ ?>
          <meta name="robots" content="noindex,nofollow" />
       <?php } ?>
              
     
              
       <----------- Fix iphone monobrows ------------- ---------

       <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

                   
       <----------- Remove active link ------------- >             
       /wp-includes/class-walker-nav-menu.php // line 180:
        
      <?php 
      if($item->current){
        $atts['href']="#";
      } else {
        $atts['href'] =  $item->url;
      } 
      ?>
         
        
       /your-file.js/
      document.querySelectorAll("a[href='#']").forEach((link) => {
            link.addEventListener("click", function(event){
                    event.preventDefault()
            })
      })
        
               
       <----------- functions.php 301 Redirect -------------- >   
               
       
        <?php 
        add_action( 'template_redirect', function() {
          if( in_category('portfolio') && !is_category() ){
            wp_redirect( 'https://coolkidsblogs.com/portfolio/', 301 );
            exit;
          }
        }); 
        ?>   
    
      
       <----------- Filters for Yoast Seo ------------->
      <?php if(is_home()){?>
        <meta property="og:title" content="All about Growing Plants - Blog about Indoor & Outdoor Gardening" />
        <meta property="og:url" content="<?= get_site_url() ?>" />
      <?php } ?>
      <?php if(is_category()){?>
        <meta property="og:url" content="<?= get_category_link( get_query_var('cat') )?>" />
      <?php } ?>
      <?php if(is_singular()){?>
        <meta property="og:url" content="<?= get_permalink( get_the_ID() ) ?>" />
      <?php } ?>


      <?php 
      add_filter( 'wpseo_opengraph_url', 'op_url' );
      function op_url($filter){
        if( is_home() || is_category() || is_singular() ){
                return false;
        }
        return $filter;
      }
      add_filter( 'wpseo_opengraph_image ', 'op_img' );
      function op_img($filter){
        if(is_category()){
          return false;
        }
        return $filter;
      }
      ?>


       <---------------------- Yoast Canonical ------------ >

       
       <?php 
       add_filter( 'wpseo_canonical', 'prefix_filter_canonical_example' );
       function prefix_filter_canonical_example($filter){
       if( is_paged() || is_single() || is_archive()|| is_home() || is_front_page() ){
             return false;
       }
       return $filter;
       }
       
       remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); ?>

       <?php  if(is_category() && is_paged())  { $Term = get_term_by('id', get_query_var('cat'), 'category'); ?>
              <!-- is_category() && is_paged() -->
              <link rel="canonical" href="<?php  echo get_category_link($Term->term_id); ?>"/>
       <?php } elseif(is_tag() && is_paged()){  $Term = get_term_by('slug', get_query_var('tag'), 'post_tag') ?>
              <!-- is_tag() && is_paged() -->
              <link rel="canonical" href="<?php  echo get_category_link($Term->term_id); ?>/"/>
       <?php } elseif(is_home() ||  is_front_page()){ ?>
              <!-- is_home() -->
              <link rel="canonical" href="<?php echo trim("https://$_SERVER[HTTP_HOST]", '/');?>/"/>
       <?php } elseif(is_single()  ){ ?>
              <!-- is_single() -->
              <link rel="canonical" href="<?php echo trim("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/');?>/"/>
       <?php } elseif(is_archive()  ){ ?>
              <!-- is_archive() -->
              <link rel="canonical" href="<?php echo trim("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/');?>/"/>
       <?php } ?>

       <---------------------- Yoast Change title && description on paginated pages ------------ >

       <?php 


       add_filter( 'wpseo_title', 'prefix_filter_title' );
       function prefix_filter_title($title){
       if( is_paged() ){
          return $title . " - Page " . get_query_var( 'paged' );
       }
       return $title;
       }

       add_filter( 'wpseo_metadesc', 'prefix_filter_description' );
       function prefix_filter_description($description){
              if( is_paged() ){
                     return $description . " - Page " . get_query_var( 'paged' );
              }
              return $description;
       }


       ?>

       <--------------- Schema Breadcrumb

       <script type="application/ld+json"> {
          "@context" : "http://schema.org",
          "@type" : "Breadcrumblist",
          "itemListElement" : [
          {
                  "@type" : "ListItem",
                  "position" : 1,
                  "item" : {
                  "@id" : "https://dogsonlyclub.net/",
                  "name" : "dogsonlyclub.net"
                  }
          },
          {
                  "@type" : "ListItem",
                  "position" : 2,
                  "item" : {
                  "@id" : "https://dogsonlyclub.net/<?php $cats = get_the_category();for ($i = 0; $i < count($cats); $i++) { echo strtolower($cats[$i]->cat_name);} ?>/",
                  "name" : "<?php $cats = get_the_category();for ($i = 0; $i < count($cats); $i++) { echo strtolower($cats[$i]->cat_name);} ?>"
                  }
          },
          {
                  "@type" : "ListItem",
                  "position" : 3,
                  "item" : {
                  "@id" : "https://dogsonlyclub.net/<?php echo  $_SERVER['REQUEST_URI']; ?>",
                  "name" : "<?php the_title(); ?>"
                  }
          }
      ]}
      </script>  
      <----------------------               ------------ >


      <?php
        add_filter( 'remove_pagintaed_link', 'filter_function_name_5681' );
        function remove_pagintaed_link( $link ){
            return rtrim( $link, '/' );
        }



      //исключение страниц из результатов поиска start
      function wph_exclude_pages($query) {
          if ($query->is_search) {
              $query->set('post_type', 'post');
          }
          return $query;
      }
      add_filter('pre_get_posts','wph_exclude_pages');
      //исключение страниц из результатов поиска end

      <--------------------- Slash 301 Redirect ------------------------------>

      add_action( 'template_redirect', function() {
        if( is_category() ){
          $str = $_SERVER['REQUEST_URI']; 
          if(substr($str, -1) != '/'){
            wp_redirect( 'https://dogsonlyclub.net' . $str . '/', 301 );
            exit;
          }
        }
      }); 