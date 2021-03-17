<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    load_view('index');
}


// thêm mới sản phẩm
function add_productAction()
{

    global $error, $product_title,  $code, $price, $brand, $product_desc, $product_thumb, $cat_id;
    if (isset($_POST['btn_add_product'])) {

        $error = array();

        //nhập tên sản phẩm
        if (empty($_POST['product_title'])) {
            $error['product_title'] = "Bạn chưa nhập Tên sản phẩm";
        } else {
            $product_title = $_POST['product_title'];
        }

        //nhập code sản phẩm
        if (empty($_POST['code'])) {
            $error['code'] = "Bạn chưa nhập mã sản phẩm";
        } else {
            $code = $_POST['code'];
        }

        //nhập giá sản phẩm
        if (empty($_POST['price'])) {
            $error['price'] = "Bạn chưa nhập giá sản phẩm";
        } else {
            $price = $_POST['price'];
        }

        //nhập brand sản phẩm
        if (empty($_POST['brand'])) {
            $error['brand'] = "Bạn chưa nhập hãng sản phẩm";
        } else {
            $brand = $_POST['brand'];
        }

        //nhập product_desc sản phẩm
        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = "Bạn chưa nhập mô tả ngắn sản phẩm";
        } else {
            $product_desc = $_POST['product_desc'];
        }

        //nhập product_content sản phẩm
        if (empty($_POST['product_content'])) {
            $error['product_content'] = "Bạn chưa nhập nội dung sản phẩm";
        } else {
            $product_content = $_POST['product_content'];
        }

        // nhập product_thumb sản phẩm
        if (isset($_FILES['file'])) {

            $upload_dir = 'public/images/';
            $upload_file = $upload_dir . $_FILES['file']['name'];

            $tyle_allow = array('png', 'jpg', 'gif', 'jpeg'); // xử lí upload đúng file ảnh 
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // đuôi file 


            if (!in_array(strtolower($type), $tyle_allow)) {
                $error['file_type'] = "chỉ được upload file có đuôi png jpg gif jpeg";
            } else {
                #upload file có kích thước cho phép(<20MB ~ 29trieu KB)
                $file_size = $_FILES['file']['size'];
                if ($file_size > 29000000) {
                    $error['file_size'] = "chỉ dc upload file bé hơn 20 MB";
                }

                if (file_exists($upload_file)) {    #kiểm tra trùng file trên hệ thống
                    //xử lí đổi tên file tự động
                    //b1:tạo file mới 
                    // tên file.đuôi file
                    $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                    $new_file_name = $file_name . '- coppy.';
                    $new_upload_file = $upload_dir . $new_file_name . $type;
                    $k = 1;
                    while (file_exists($new_upload_file)) {
                        $new_file_name = $file_name . "-coppy({$k}).";
                        $k++;
                        $new_upload_file = $upload_dir . $new_file_name . $type;
                    }
                    $upload_file = $new_upload_file;
                }
            }


            if (empty($error)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'],"../".$upload_file)) {
                     $product_thumb = $upload_file;
                } else {
                    echo "upload file ko thành công";
                }
            } else {
                // show_array($error);
            }

        }

        //nhập danh mục sản phẩm ($cat_id)
        if (empty($_POST['cat_id'])) {
            $error['cat_id'] = "Bạn chưa chọn Danh mục sản phẩm";
        } else {
            $cat_id = $_POST['cat_id'];
        }

        if (empty($error)) {

            $data = array(
                'product_title' => $product_title,
                'code' => $code,
                'price' => $price,
                'brand' => $brand,
                'product_desc' => $product_desc,
                'product_content' => $product_content,
                'product_thumb' => $product_thumb,
                'cat_id' => $cat_id
            );

            add_product($data);
            load_view('add_product_success');
        }
    }

    load_view('add_product');
}

//Danh sách sản phẩm
function list_productAction()
{
    load_view('list_product');
}

//Danh mục sản phẩm
function list_catAction()
{
    load_view('list_cat');
}


