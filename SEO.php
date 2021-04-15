<?php       
       // ---------- REMOVE PAGE FROM SEARCH INDEXATION ----------

       if($_SERVER['REQUEST_URI'] == '/hello-world/'){ ?>
            <meta name="robots" content="noindex,nofollow" />
       <?php }?>
              
     
              
       // <----------- Fix iphone monobrows ------------- >

       <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

                   
        <----------- Remove active link ------------- >             
       /wp-includes/class-walker-nav-menu.php // line 180:
        
               if($item->current){
                     $atts['href']="#";
              } else {
                     $atts['href'] =  $item->url;
              } 
         
        
        /your-file.js/
              document.querySelectorAll("a[href='#']").forEach((element) => {
               element.addEventListener("click", function(event){
                   event.preventDefault()
               })
              })
        
               
        <----------- functions.php 301 Redirect ------------- >   
               
       
              add_action( 'template_redirect', function() {
                     if( in_category('portfolio') && !is_category() ){
                            wp_redirect( 'https://coolkidsblogs.com/portfolio/', 301 );
                     exit;
                     }
              });    
    
?>      
