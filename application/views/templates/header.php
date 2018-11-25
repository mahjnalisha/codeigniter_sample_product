<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product - Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src=" https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      var base_url='<?php echo base_url();?>';
    </script>
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url('product');?>">Sample</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('product');?>">Home</a></li>
        <li><a href="<?php echo base_url('product');?>">Product List</a></li>
        <li><a href="<?php echo base_url('product/create');?>">Create a product</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
   

