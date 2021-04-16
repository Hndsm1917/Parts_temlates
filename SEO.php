      
       ----------- REMOVE PAGE FROM SEARCH INDEXATION -----------

       <?php if($_SERVER['REQUEST_URI'] == '/hello-world/'){ ?>
            <meta name="robots" content="noindex,nofollow" />
       <?php } ?>
              
     
              
       <----------- Fix iphone monobrows ------------- ---------

       <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

                   
       <----------- Remove active link ------------- >             
       /wp-includes/class-walker-nav-menu.php // line 180:
        
       <?php if($item->current){
              $atts['href']="#";
       } else {
              $atts['href'] =  $item->url;
       } ?>
         
        
       /your-file.js/
       document.querySelectorAll("a[href='#']").forEach((element) => {
              element.addEventListener("click", function(event){
              event.preventDefault()
              })
       })
        
               
        <----------- functions.php 301 Redirect -------------- >   
               
       
              <?php add_action( 'template_redirect', function() {
                     if( in_category('portfolio') && !is_category() ){
                            wp_redirect( 'https://coolkidsblogs.com/portfolio/', 301 );
                     exit;
                     }
              }); ?>   
    
      
       <----------- Fuck Yoast Seo ------------->
       <?php if(is_home()){?>
              <meta property="og:title" content="All about Growing Plants - Blog about Indoor & Outdoor Gardening" />
              <meta property="og:url" content="<?= get_site_url() ?>" />
       <?php } ?>
       <?php if(is_category()){?>
              <meta property="og:url" content="<?= get_category_link( get_query_var( 'cat' ) ) ?>" />
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
       if( is_category()){
                     return false;
              }

              return $filter;
       }?>