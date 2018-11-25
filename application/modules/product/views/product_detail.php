<style>
.product-display { padding-left:0; display:flex; flex-wrap:wrap; }
#product-image { width:100%; }


#product-logo { position:absolute; border:1px black #333; }
#product-logo img { max-height:100%; max-width:100%; }
.product-data .brand-logo { height:1em; }



.zoom-btn { position:absolute; height:2em; width:2em; border:solid 2px #999; padding:.375em; border-radius:100%; line-height:1em; color:#999; z-index:5; }
.zoom-btn.active { background:#999; color:#fff; }
.zoom-view {display:none; position:absolute; height:12em; width:12em; border:solid 2px #999; border-radius:100%; overflow:hiden; z-index:2; }
.zoom-view img { position:absolute; }
.activeZoom { overflow:hidden; }

#zoom-logo { position:absolute; top:0;left:0; border:1px black #333; z-index:2; }
#zoom-logo img { max-height:100%; max-width:100%; z-index:2; }

</style>


<div class="container">
  
  </div>
  <div class="row">
    <div class="col-md-9 col-sm-8 product-display">
      <div class="col-lg-6 product-preview">
        <div class="zoom-btn"><span class="fa fa-search" aria-hidden="true"></div>
        <div class="zoom-view">
          <div id="zoom-logo"></div>
          <img id="zoom-image" src="<?php echo isset($product['pr_image'])?base_url().'assets/uploads/products/'.$product['pr_image']:'';?>">
          </div>
          <div id="product-logo"><img src="<?php echo isset($product['pr_image'])?base_url().'assets/uploads/products/'.$product['pr_image']:'';?> "></div>
          
        <img id="product-image" src="<?php echo isset($product['pr_image'])?base_url().'assets/uploads/products/'.$product['pr_image']:'';?>  " height="700px" width="100%">
      </div>
      
    </div>
    <div class="col-md-3 col-sm-4 product-options well">
      <div id="product-detail">
        <h3><?php echo isset($product['pr_name'])?$product['pr_name']:'';?></h3>
        <div class="product-details">
          <p><?php echo isset($product['pr_description'])?$product['pr_description']:'';?> </p>
          <p><?php echo isset($product['pr_price'])?$product['pr_price']:'';?> </p>
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>