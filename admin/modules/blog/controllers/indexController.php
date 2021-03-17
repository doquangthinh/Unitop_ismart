<?php

function construct() {
    load_model('index');
}

function indexAction() {
   load_view('index');
}

//THÊM MỚI BÀI VIẾT
function add_postAction() {


    global $error,$title,$created_date,$thumb,$blog_desc,$category,$status;
    if (isset($_POST['btn_add_post'])) {
        $error = array();

        //nhập tên bài viết
        if (empty($_POST['title'])) {
            $error['title'] = "Bạn chưa nhập title của bài viết";
        } else {
            $title = $_POST['title'];
        }   

        //nhập ngày tạo bài viết
        if (empty($_POST['created_date'])) {
            $error['created_date'] = "Bạn chưa chọn ngày tạo của bài viết";
        } else {
            $created_date = $_POST['created_date'];
        }  

        // nhập hình ảnh của bài viết
        // if (isset($_FILES['file'])) {

        //     $upload_dir = '../public/images';  // thư mục chứa file ảnh sau khi upload
        //     // $upload_file = $upload_dir . $_FILES['file']['name']; 
        //     $upload_file = $_FILES['file']['name'];  // đường dẫn của file sau khi upload

        //     $tyle_allow = array('png', 'jpg', 'gif', 'jpeg'); // xử lí upload đúng file ảnh 
        //     $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // đuôi file 


        //     if (!in_array(strtolower($type), $tyle_allow)) {
        //         $error['file_type'] = "chỉ được upload file có đuôi png jpg gif jpeg";
        //     } else {
        //         #upload file có kích thước cho phép(<20MB ~ 29trieu KB)
        //         $file_size = $_FILES['file']['size'];
        //         if ($file_size > 29000000) {
        //             $error['file_size'] = "chỉ dc upload file bé hơn 20 MB";
        //         }

        //         if (file_exists($upload_file)) {    
        //             #kiểm tra trùng file trên hệ thống
        //             //xử lí đổi tên file tự động
        //             //b1:tạo file mới 
        //             // tên file.đuôi file
        //             $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        //             $new_file_name = $file_name . '- coppy.';
        //             $new_upload_file = $upload_dir . $new_file_name . $type;
        //             $k = 1;
        //             while (file_exists($new_upload_file)) {
        //                 $new_file_name = $file_name . "-coppy({$k}).";
        //                 $k++;
        //                 $new_upload_file = $upload_dir . $new_file_name . $type;
        //             }
        //             $upload_file = $new_upload_file;
        //         }
        //     }


        //     if (empty($error)) {
        //         if (move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir . $upload_file)) {
        //              $thumb = $upload_file;
        //         } else {
        //             echo "upload file ko thành công";
        //         }
        //     } else {
        //         $error['thumb'] = "upload file không thành công";
        //     }
        // }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Bước 1: Tạo thư mục lưu file
            $error = array();
            $target_dir = "../public/images";
            $target_file = $target_dir . basename($_FILES['file']['name']);
            // Kiểm tra kiểu file hợp lệ
            $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $error['file'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
            }
            //Kiểm tra kích thước file
            $size_file = $_FILES['file']['size'];
            if ($size_file > 5242880) {
                $error['file'] = "File bạn chọn không được quá 5MB";
            }
        // Kiểm tra file đã tồn tại trên hệ thống
            if (file_exists($target_file)) {
                $error['file'] = "File bạn chọn đã tồn tại trên hệ thống";
            }
        //
            if (empty($error)) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $flag = true;
                    echo json_encode(array('status' => 'ok','file_path' => $target_file));
                } else {
                    echo json_encode(array('status' => 'error'));
                }
            } else {
                echo json_encode(array('status' => 'error'));
            }
        }


        //nhập mô tả bài viết
        if (empty($_POST['blog_desc'])) {
            $error['blog_desc'] = "Bạn chưa nhập mô tả của bài viết";
        } else {
            $blog_desc = $_POST['blog_desc'];
        }
        
        //nhập danh mục bài viết
        if (empty($_POST['category'])) {
            $error['category'] = "Bạn chưa nhập danh mục của bài viết";
        } else {
            $category = $_POST['category'];
        }  


        //nhập trạng thái bài viết
        if (empty($_POST['status'])) {
            $error['status'] = "Bạn chưa nhập trạng thái của bài viết";
        } else {
            $status = $_POST['status'];
        }  

        if (empty($error)) {

            $data = array(
                'title' => $title,
                'created_date' => $created_date,
                'thumb' => $thumb,
                'blog_desc' => $blog_desc,
                'category' => $category,
                'status' => $status,
            );

            add_blog($data);
            load_view('add_post_success');
        }

    }

    load_view('add_post');
}



function uploadAjaxAction(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Bước 1: Tạo thư mục lưu file
        $error = array();
        $target_dir = "../public/images";
        $target_file = $target_dir . basename($_FILES['file']['name']);
        // Kiểm tra kiểu file hợp lệ
        $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
            $error['file'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
        }
        //Kiểm tra kích thước file
        $size_file = $_FILES['file']['size'];
        if ($size_file > 5242880) {
            $error['file'] = "File bạn chọn không được quá 5MB";
        }
    // Kiểm tra file đã tồn tại trên hệ thống
        if (file_exists($target_file)) {
            $error['file'] = "File bạn chọn đã tồn tại trên hệ thống";
        }
    //
        if (empty($error)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $flag = true;
                echo json_encode(array('status' => 'ok','file_path' => $target_file));
            } else {
                echo json_encode(array('status' => 'error'));
            }
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}

//DANH SÁCH BÀI VIẾT
function list_postAction() {

    $num_rows = db_num_rows("SELECT * FROM `tbl_blog` WHERE `status` = 'active'  ");
    $num_per_page = 5;          //số bản ghi mỗi trang 
    $total_row = $num_rows;     // tổng số bản ghi
    $num_page = ceil($total_row / $num_per_page);  // làm tròn trần // tổng số bản ghi chia số bản ghi trên mỗi trang
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // trang hiện tại
    $start = ($page - 1) * $num_per_page; // trang bắt dầu
    $list_blog_active = get_list_blog_active($start, $num_per_page,"`status` = 'active'");
    // $list_users=get_users($start, $num_per_page,"`gender`=male"); kèm theo điều kiện giới tính = nam
    // lấy từ  start= 0 và lấy 4 bản ghi 

    $data['page'] = $page;
    $data['num_page'] = $num_page;

    $list_blog = get_list_blog();
    $count_list_blog_active = count_list_blog_active();
    $list_blog_deactive = get_list_blog_deactive();
    $data['list_blog']= $list_blog;
    $data['list_blog_active']= $list_blog_active;
    $data['count_list_blog_active']= $count_list_blog_active;
    $data['list_blog_deactive']= $list_blog_deactive;
    load_view('list_post',$data);
}


//DANH SÁCH DANH MỤC
function list_catAction() {
    load_view('list_cat');
}

//SỬA BÀI VIẾT
function update_postAction(){


    $id= (int) $_GET['id'];
    $blog_item= db_fetch_row(" SELECT * FROM `tbl_blog` WHERE `id`= {$id}");
    global $id,$error,$title,$created_date,$thumb,$blog_desc,$category,$status;
    if (isset($_POST['btn_update_post'])) {
        $error = array(); 
        
        // cập nhật title
        if (empty($_POST['title'])) {
            $error['title'] = "không được để trống title";
        } else {
            $title = $_POST['title'];
        }
        
        //cập nhập ngày tạo bài viết
        if (empty($_POST['created_date'])) {
            $error['created_date'] = "Bạn chưa chọn ngày tạo của bài viết";
        } else {
            $created_date = $_POST['created_date'];
        }  

        //cập nhập ảnh bài viết
        if (empty($_POST['thumb'])) {
            $error['thumb'] = "Bạn chưa chọn hình ảnh của bài viết";
        } else {
            $thumb = $_POST['thumb'];
        }  

        //cập nhập mô tả bài viết
        if (empty($_POST['blog_desc'])) {
            $error['blog_desc'] = "Bạn chưa nhập mô tả của bài viết";
        } else {
            $blog_desc = $_POST['blog_desc'];
        }
        
        //cập nhập danh mục bài viết
        if (empty($_POST['category'])) {
            $error['category'] = "Bạn chưa nhập danh mục của bài viết";
        } else {
            $category = $_POST['category'];
        }  

        //cập nhập trạng thái bài viết
        if (empty($_POST['status'])) {
            $error['status'] = "Bạn chưa nhập trạng thái của bài viết";
        } else {
            $status = $_POST['status'];
        }  

        if (empty($error)) {

            $data = array(
                'title' => $title,
                'created_date' => $created_date,
                'thumb' => $thumb,
                'blog_desc' => $blog_desc,
                'category' => $category,
                'status' => $status,
            );

            db_update('tbl_blog',$data,"`id` = {$id}");
            load_view('list_post');
        }
        
    }
    $data['blog_item'] = $blog_item;
    load_view('update_post',$data);
}

function add_pageAction(){
    load_view('add_page');
}

function list_pageAction(){
    load_view('list_page');
}
