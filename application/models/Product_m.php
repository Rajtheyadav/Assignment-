
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_m extends CI_model {
	
 public function addProduct($data){
    
 	$rowinserted=$this->db->insert('products',$data);
 	if($rowinserted){
 		return $rowinserted;
 	}
 	else
 	{
 		return null;
 	}
 }

 public function updateProduct($data,$productid){

     $this->db->where('id',$productid);
 	 $rowupdate=$this->db->update('products',$data);

 }

 public function getAlldata(){
      
      $this->db->order_by("id", "desc");
 	  $query = $this->db->get('products');
      $ret = $query->result_array();
       return $ret;

 }

 public function deleteimg($id){

 	   $this->db-> where('id', $id);
       $del=$this->db-> delete('prodcut_image');
       return $del;
 }

 public function deleteProduct($id){

      $this->db-> where('product_id', $id);
      $this->db-> delete('prodcut_image');
      $this->db-> where('id', $id);
      $del = $this->db->delete('products');
       return $del;
 }
	
}
?>