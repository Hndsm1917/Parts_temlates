       
       <-----------REMOVE PAGE FROM SEARCH INDEXATION ------------- >
       
       <?php if($_SERVER['REQUEST_URI'] == '/hello-world/'){ ?>
            <meta name="robots" content="noindex,nofollow" />
       <?php }?>
