<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product List</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <style type="text/css">
    .modal-footer {
    padding: 15px;
    text-align: left;
    border-top: 1px solid #e5e5e5;
}
span{
  color:red;
}
  </style>

</head>
<body>


<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product Details</h4>
        </div>
        <form  id="add_product"  enctype="multipart/form-data">  
        <div class="modal-body">
           <div class="row" id="formshow">
           <div class="col-md-12">
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" name="product_name" id="product_name" class="form-control">
              <span id="product_error"></span>
            </div>
            <div class="form-group">
              <label>Product Price</label>
              <input type="number" name="product_price" id="product_price" class="form-control">
              <span id="price_error"></span>
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <textarea name="product_desccription" id="product_desccription" class="form-control"></textarea>
              <span id="description_error"></span>
            </div>
            <div class="form-group">
              <label>Select Product Multiple Image</label>
              <input type="file" name="product_image" id="product_image" multiple class="form-control">
              <span id="file_error"></span>
            </div>
           </div>
         </div>
        </div>
        <div class="modal-footer" style="margin-left: 25%;">
         <button class="btn btn-success submit" type="button" name="submit">Submit</button>  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
</div>
 
<div class="container">
	<h2>Product List</h2>
 <div class="col-md-12"> <a href="#"  class="btn btn-success add_form" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float: right;">Add Product</a></div>
    <br>
     <br>    
  <table id="productlist" class="table">
    <thead>
      <tr>
        <th>Sr No.</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Description</th>
        <th>Product Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php $i=1;foreach($productDetails as $value){ 
       //$Productimg =explode(",", $value['product_image']);
        $sql ="SELECT * FROM prodcut_image WHERE product_id='".$value['id']."'";
        $imgdata =$this->db->query($sql)->result();
      ?>
      <tr id="rowproduct<?php echo $value['id']?>">
        <td class="col-md-1"><?php echo $i;?></td>
        <td class="col-md-2"><?php echo $value['product_name'];?></td>
        <td class="col-md-3"><?php echo $value['product_price'];?></td>
        <td><?php echo $value['product_desccription'];?></td>
        <td class="col-md-4">
          <?php foreach($imgdata as $img){?>
          <img src="<?php echo  base_url()?>uploads/<?php echo $img->product_img;?>" width="100" style="width:10%;">
          <?php } ?>
        </td>
        <td class="col-md-2"><a href="#" class="btn btn-success" class="btn btn-success add_form" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editmyModal<?php echo $value['id'];?>">Edit</a>  <a href="#" class="btn btn-danger" onclick="delete_product(<?php echo $value['id']?>)">Delete</a></td>
      </tr>

 <!--edit Modal -->
    <div class="container">
 
  <div class="modal fade" id="editmyModal<?php echo $value['id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Product Details</h4>
        </div>
        <form  action="<?php echo base_url(); ?>Product/updateProduct" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="productid" id="productid" value="<?php echo $value['id'];?>">  
        <div class="modal-body">
           <div class="row" id="formshow">
           <div class="col-md-12">
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" name="product_name1" id="product_name1" class="form-control" value="<?php echo $value['product_name'];?>">
              <span id="product_error"></span>
            </div>
            <div class="form-group">
              <label>Product Price</label>
              <input type="number" name="product_price1" id="product_price1" class="form-control" value="<?php echo $value['product_price'];?>">
              <span id="price_error"></span>
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <textarea name="product_desccription1" id="product_desccription1" class="form-control"><?php echo $value['product_desccription'];?></textarea>
              <span id="description_error"></span>
            </div>
            <div class="form-group">

               <?php foreach($imgdata as $img){ ?>

               <a href="#" id="row<?php echo $img->id;?>"><img src="<?php echo  base_url()?>uploads/<?php echo $img->product_img;?>" style='width: 25px'> <span class="glyphicon glyphicon-trash" onclick="delete_img(<?php echo $img->id;?>)" style="position: absolute;margin-top: 38%;margin-left:-30px;"></span></a>

               <?php } ?>

            </div>
            <div class="form-group">
              <label>Select Product Multiple Image</label>
              <input type="file" name="productimg[]" id="productimg" multiple class="form-control">
              <span id="file_errorss"></span>
            </div>
           </div>
         </div>
        </div>
        <div class="modal-footer" style="margin-left: 25%;">
         <input class="btn btn-success update" type="submit" name="submit" value="Update">  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
</div>
<!-- end-->



        <?php $i++;} ?>
    </tbody>
  </table>
</div>


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">

		$(document).on('click','.submit',function(){

        var product_name=$("#product_name").val();
        var product_price=$("#product_price").val();
        var product_desccription=$("#product_desccription").val();
        var formData = new FormData();
        var totalfiles = document.getElementById('product_image').files.length;
           for (var index = 0; index < totalfiles; index++) {
              formData.append("product_image[]", document.getElementById('product_image').files[index]);
           }

          formData.append('product_price', product_price);
          formData.append('product_name', product_name);

          formData.append('product_desccription', product_desccription);

            var product_preg=/^[A-Za-z0-9 ]{3,15}$/;
            var price_preg=/^[0-9]{1,6}$/;
            var description_preg=/^[A-Za-z0-9 ]{3,100}$/;
            var file= /^.*\.(jpg|JPG|gif|GIF)$/;

            if(product_preg.test(product_name)){
              document.getElementById("product_error").innerHTML= "";
            }
            else{
              document.getElementById("product_error").innerHTML="Enter product name.";
              return false;
            }
            if(price_preg.test(product_price)){
              document.getElementById("price_error").innerHTML="";
            }else{
              document.getElementById("price_error").innerHTML="Eneter product price";
              return false;
            }

            if(description_preg.test(product_desccription)){
              document.getElementById("description_error").innerHTML="";
            }else{
              document.getElementById("description_error").innerHTML="Eneter product description";
              return false;
            }

             $.ajax({  
                url:"<?php echo base_url(); ?>Product/addProduct", 
                method:"POST", 
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                success:function(data)  
                {  
                      alert("Data inserted");

                      $('#add_product')[0].reset(); 
                         location.reload();
                }  
           }); 


		});	
		




      $(document).on('click','.update',function(){
      // alert("dfgdfgfd");
      //var formData = new FormData($(this).parents('form')[0]);
     // alert(formData);

        var product_name=$("#product_name1").val();
        var product_price=$("#product_price1").val();
        var product_desccription=$("#product_desccription1").val();
         var productid = $("#productid").val();
         

            var formData = new FormData();
             $.each($("#productimg"), function (i,obj) {
            $.each(obj.files,function (j,file) {                    
                  formData.append('productimg['+i+']',file);
                  //formData.append("productimg[]", document.getElementById('productimg').files[index]);
              });
          });

     
          formData.append('product_price1', product_price);
          formData.append('product_name1', product_name);
          formData.append('productid', productid);

          formData.append('product_desccription1', product_desccription);

        var product_preg=/^[A-Za-z0-9 ]{3,15}$/;
        var price_preg=/^[0-9]{1,6}$/;
        var description_preg=/^[A-Za-z0-9 ]{3,100}$/;
        var file= /^.*\.(jpg|JPG|gif|GIF)$/;

        if(product_preg.test(product_name)){
          document.getElementById("product_error").innerHTML= "";
        }
        else{
          document.getElementById("product_error").innerHTML="Enter product name.";
          return false;
        }
        if(price_preg.test(product_price)){
          document.getElementById("price_error").innerHTML="";
        }else{
          document.getElementById("price_error").innerHTML="Eneter product price";
          return false;
        }

        if(description_preg.test(product_desccription)){
          document.getElementById("description_error").innerHTML="";
        }else{
          document.getElementById("description_error").innerHTML="Eneter product description";
          return false;
        }

             $.ajax({  
                url:"<?php echo base_url(); ?>Product/updateProduct", 
                method:"POST", 
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                success:function(data)  
                {  
                    $('#update_product').hide();  
                     //location:load();
                }  
           }); 


    }); 
    

		$(document).ready(function () {
        $('#productlist').DataTable();
       });



      function delete_img(id){

       if(confirm('Are you sure you want to delete img?')){
        $.ajax({
        type: "post",
        url:"<?php echo base_url(); ?>/Product/deleteImg",
        data: {id:id},
        dataType:"json",
        success: function(response) {
                 $("#row"+id).fadeOut();
                 //location.reload();
        }
    });
     event.preventDefault();
    }
     return false;
  }

       function delete_product(id){
        // alert(id);
       if(confirm('Are you sure Do you want to delete product list?')){
        $.ajax({
        type: "post",
        url:"<?php echo base_url(); ?>/Product/deleteProduct",
        data: {id:id},
        dataType:"json",
        success: function(response) {
                 $("#rowproduct"+id).fadeOut();
                 //location.reload();
        }
    });
     event.preventDefault();
    }
     return false;
  }
  

	</script>

</body>
</html>