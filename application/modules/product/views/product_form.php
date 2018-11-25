<form method="POST" action="<?php echo base_url().'product/save';?>" enctype="multipart/form-data" novalidate="novalidate">
	<?php echo validation_errors(); ?>  
	<div class="form-group ">
		<label for="product_name">Product Name <span class="required" aria-required="true">*</span></label>
		<div>
			<input type="text" name="pr_name" id="pr_name" class="form-control" value="<?php echo isset($product['pr_name'])?$product['pr_name']:'';?>">
		</div>
	</div>
	<div class="form-group ">
		<label for="product_price">Product Price<span class="required" aria-required="true">*</span></label>
		<div>
			<input type="text" name="pr_price" id="product_price" class="form-control" value="<?php echo isset($product['pr_price'])?$product['pr_price']:'';?>">
		</div>
	</div>
	<div class="form-group">
		<div>
			<label for="product_description " class="control-label">Product Description</label>
			<textarea name="pr_description" class="form-control" rows="4"><?php echo isset($product['pr_description'])?$product['pr_description']:'';?></textarea>
		</div>
	</div>

	<div class="form-group <?php //echo form_error('pr_image') ? 'has-error' : '' ?>">
		<label for="pr_image" class="control-label">Logo*
			<p class="small">Please upload an image file<br> (jpg / png / jpeg) <br></p>
		</label>
		<div class="">
			<input type="file" name="pr_image" id="pr_image" >
		</div>
	</div>
	<div class="form-group">
		<div class="">
		<input type="hidden" name="product_id" id="product_id" value="<?php echo isset($product['id'])?$product['id']:'';?>">
		<button type="submit" class="btn btn-success">Save</button>
		<a href="<?php echo base_url('product')?>"  class="btn btn-primary" >Cancel</a>
		</div>
	</div>

</form>