
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('Product_m');
    }

    public function index()
    {
        $data['productDetails']=$this->Product_m->getAlldata();
        $this->load->view('product/index',$data);
    }

    public function deleteimg(){

        $id = $this->input->post('id');
        $delete = $this->Product_m->deleteimg($id);
          if($delete){
            $status = '1';
            $msg = 'success';
            $result = array(
                'status' => $status,
                'msg' => $msg
            );
            echo json_encode($result);
            }
          else
            {
            $status = '0';
            $msg = 'error';
            $result = array(
                'status' => $status,
                'msg' => $msg
            );
            echo json_encode($result);
            }

    }

      public function deleteProduct(){

        $id = $this->input->post('id');
        $delete = $this->Product_m->deleteProduct($id);
          if($delete){
            $status = '1';
            $msg = 'success';
            $result = array(
                'status' => $status,
                'msg' => $msg
            );
            echo json_encode($result);
            }
          else
            {
            $status = '0';
            $msg = 'error';
            $result = array(
                'status' => $status,
                'msg' => $msg
            );
            echo json_encode($result);
            }

    }

    public function updateProduct(){
          
        $productid =$this->input->post('productid');
        if(!empty($productid)){
        
           $data= array('product_price'=> $this->input->post('product_price1'),
                              'product_name'=> $this->input->post('product_name1'),
                              'product_desccription'=> $this->input->post('product_desccription1')
                                          );
                 $this->Product_m->updateProduct($data,$productid);
    
                   $config = array();
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = FALSE;
                    $this->load->library('upload');
                    $files = $_FILES;
                    //$inserted = "";
                    
                    if (!empty($_FILES['productimg']['name'])) {

                        $new_image_name = array();
                        $files = $_FILES;
                        $count = count($_FILES['productimg']['name']);
                        
                        for ($i = 0; $i < $count; $i++) {

   $_FILES['file']['name'] = $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $files['productimg']['name'][$i]);
                            $_FILES['file']['type'] = $files['productimg']['type'][$i];
                            $_FILES['file']['tmp_name'] = $files['productimg']['tmp_name'][$i];
                            $_FILES['file']['error'] = $files['productimg']['error'][$i];
                            $_FILES['file']['size'] = $files['productimg']['size'][$i];
                            $this->upload->initialize($config);
                            $this->upload->do_upload('file');
                            $upload_data = $this->upload->data();
                            $name_array[] = $upload_data['file_name'];
                            $fileName = $upload_data['file_name'];
                            $images[] = $fileName;
                           

                                 $pImage['prodImage'] = $images[$i];
                                 $imag=implode(",",$pImage );
                                 $data1 = array('product_id'=>$productid,
                                          'product_img'=> $imag);
                                 $inserted = $this->db->insert('prodcut_image',$data1);
                            if($inserted){
                                redirect('Product');
                            }
                            else{
                                echo 0;
                            }

                        }
                        

                    }
                }

              }
    

    public function addProduct(){

                 $data= array('product_price'=> $this->input->post('product_price'),
                              'product_name'=> $this->input->post('product_name'),
                              'product_desccription'=> $this->input->post('product_desccription')
                                          );
                 $this->Product_m->addProduct($data);

                 $insert_id = $this->db->insert_id();

    
        $config = array();
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = FALSE;
                    $this->load->library('upload');
                    $files = $_FILES;
                    //$inserted = "";
                    
                    if (!empty($_FILES['product_image']['name'])) {

                        $new_image_name = array();
                        $files = $_FILES;
                        $count = count($_FILES['product_image']['name']);
                        
                        for ($i = 0; $i < $count; $i++) {

   $_FILES['file']['name'] = $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $files['product_image']['name'][$i]);
                            $_FILES['file']['type'] = $files['product_image']['type'][$i];
                            $_FILES['file']['tmp_name'] = $files['product_image']['tmp_name'][$i];
                            $_FILES['file']['error'] = $files['product_image']['error'][$i];
                            $_FILES['file']['size'] = $files['product_image']['size'][$i];
                            $this->upload->initialize($config);
                            $this->upload->do_upload('file');
                            $upload_data = $this->upload->data();
                            $name_array[] = $upload_data['file_name'];
                            $fileName = $upload_data['file_name'];
                            $images[] = $fileName;
                           

                                 $pImage['prodImage'] = $images[$i];
                                 $imag=implode(",",$pImage );
                                 $data1 = array('product_id'=>$insert_id,
                                          'product_img'=> $imag);
                                 $inserted = $this->db->insert('prodcut_image',$data1);
                            if($inserted){
                                echo 1;
                            }
                            else{
                                echo 0;
                            }

                        }
                        

                    }

              }
}
