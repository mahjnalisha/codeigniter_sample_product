<div class="col-sm-12">
	<table class="table table-product table-bordered table-condensed" style="width: 100%;">
		<thead>
		<tr>
			<th>SN</th>
            <th>Product Name</th>
            <th>Image</th>
			<th>Price</th>
			<th>Description</th>
			<th>action</th>
		</tr>
		</thead>
		<tbody class="product_list">
		</tbody>
	</table>
</div>

<script>
var prod_table="";
    prod_table = $('.table-product').dataTable({
    "aaSorting": [],
    "serverSide": true,
    "pageLength": 10,
    "ajax": {
        "url": "<?php echo base_url('product/index'); ?>",
        "dataType": "json",
        "type": "get",
        "data": function (data) {
        }
    },
    "columns": [
        {"data": "sn"},
        {"data": "pr_name"},
        {"data": "pr_image"},
        {"data": "pr_price", "width": "20%" },
        {"data": "pr_description"},
        {"data": "action", "width": "15%" },
    ],
    "columnDefs": [{"orderable": false, "targets": [5]}],

    "fnStateLoadParams": function (oSettings, oData) {
    }
});

$(document).on('click','.del_product',function(){
     var del_pid=$(this).data('product_id');
    if(confirm("Are you sure you want to delete this?")){
     
      delete_product(del_pid);

    }
    else{
        return false;
    }
})
function delete_product(proid){
 $.ajax({
      type: "POST",
      url: base_url + "product/delete",
      data: {proid: proid},
      dataType: 'json',
      cache:false,
      success: function(result){
        if(result.status=='success')
            location.reload();
        else
            return;
      }
  });
}

	</script>