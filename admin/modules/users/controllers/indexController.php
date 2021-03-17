

<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'url');
}

function regAction()
{
    global $error, $username, $password, $email, $fullname;
    // echo send_mail("doquangthinh.199888@gmail.com", 'Đỗ quang thịnh', 'Kích hoạt tài khoản', " <a href='http://unitop.vn'> kích hoạt </a> ");
    if (isset($_POST['btn-reg'])) {
        $error = array();

        //kiểm tra full name
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "ko được để trống họ và tên";
        } else {
            $fullname = $_POST['fullname'];
        }

        // kiểm tra username
        if (empty($_POST['username'])) {
            $error['username'] = "ko được để trống username";
        } else {
            if (!is_username($_POST['username'])) {
                $error['password'] = "username không đúng định dạng";
            } else {
                $username = $_POST['username'];
            }
        }

        //kiểm tra password
        if (empty($_POST['password'])) {
            $error['password'] = "ko được để trống password";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "password không đúng định dạng";
            } else {
                $password = md5($_POST['password']);
            }
        }

        //kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "ko được để trống email";
        } else {
            $email = $_POST['email'];
        }

        #kêt luận
        if (empty($error)) {
            if (!user_exits($username, $email)) {
                $active_token = md5($username . time());
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'fullname' => $fullname,
                    'active_token' => $active_token,
                    'reg_date' => time()
                );

                add_users($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");

                $content = "<p>Xin chào {$fullname} </p>
                <p>Vui lòng vào link này để kích hoạt tài khoản :{$link_active} </p>
                <p>nếu không phải bạn đăng kí tài khoản vui lòng bỏ qua email này</p>";

                //sau khi đăng kí thì gửi email đến đây để nhận mã kích hoạt tài khoản 
                echo send_mail("doquangthinh.199888@gmail.com", 'Đỗ quang thịnh', 'Kích hoạt tài khoản', "$content");


                //thông báo
                // redirect("?mod=users&action=login");

            } else {
                $error['account'] = "Email hoặc Username đã  tồn tại trên hệ thống";
            }
        }
    }
    load_view('reg');
}


function activeAction()
{
    $active_token = $_GET['active_token'];
    $link_login = base_url("?mod=users&action=login");
    if (check_active_token($active_token)) {
        active_user($active_token);
        echo "Bạn dã kích hoạt thành công vui lòng click vào link sau để đăng nhập <a href ='$link_login'> đăng nhập</a>";
    } else {
        echo "Yêu cầu kích hoạt không hợp lệ hoặc tài khoản đã được kích hoạt trước đó , click vào link sau để đăng nhập <a href ='$link_login'> đăng nhập</a>";
    }
}


function loginAction()
{


    echo date('d/m/y h:m:s ');
    global $username, $password, $error;
    if (isset($_POST['btn-login'])) {

        $error = array();
        //kiểm tra username đăng nhập
        if (empty($_POST['username'])) {
            $error['username'] = "ko được để trống username";
        } else {
            if (!is_username($_POST['username'])) {
                $error['password'] = "username không đúng định dạng";
            } else {
                $username = $_POST['username'];
            }
        }


        //kiểm tra password đăng nhập
        if (empty($_POST['password'])) {
            $error['password'] = "ko được để trống password";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "password không đúng định dạng";
            } else {
                $password = md5($_POST['password']);
            }
        }

        //kết luận
        if (empty($error)) {
            if (check_login($username, $password)) {
                // lưu trữ phiên đăng nhập
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                //chuyển hướng vào trong hệ thống
                redirect();
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu ko chính xác";
            }
        }
    }

    load_view('login');
}


function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}


function resetAction()
{
    if(isset($_POST['btn-update-password'])){

        $error=array();

        //kiểm tra mật khẩu cũ
        if (empty($_POST['pass-old'])) {
            $error['pass-old'] = "ko được để trống mật khẩu";
        } else {
            if (!is_password($_POST['pass-old'])) {
                $error['pass-old'] = "mật khẩu không đúng định dạng";
            } else {
                $pass_old= $_POST['pass-old'];
            }
            check_pass_old($pass_old);
        }
    }

    load_view('reset');
}



function resetOkAction()
{
    load_view('resetOk');
}

function updateAction()
{
    // show_array($_SESSION);
    //1tạo giao diện
    //2Load lại thông tin cũ
    //3 validation form
    //4cập nhật thông tin

    if (isset($_POST['btn-update'])) {

        $error=array();
        // //kiểm tra address
        // if (empty($_POST['addess'])) {
        //     $error['address'] = "ko được để trống address";
        // } else {
        //     $address = ($_POST['address']);
        // }

        // //kiểm tra fullname đăng nhập
        // if (empty($_POST['fullname'])) {
        //     $error['fullname'] = "ko được để trống fullname";
        // } else {
        //     $fullname = ($_POST['fullname']);
        // }
        

        // //kiểm tra phone_number đăng nhập
        // if (empty($_POST['phone_number'])) {
        //     $error['phone_number'] = "ko được để trống phone_number";
        // } else {
        //     if (!is_number($_POST['phone_number'])) {
        //         $error['phone_number'] = "phone_number không đúng định dạng";
        //     } else {
        //         $phone_number = $_POST['phone_number'];
        //     }
        // }

        $fullname =$_POST['fullname'];
        $phone_number =$_POST['phone_number'];
        $address =$_POST['address'];
        

        
      
        //kiểm tra
        if(empty($error)){
            //update 
            $data=array(
                'fullname'=>$fullname,
                'phone_number'=>$phone_number,
                'address'=>$address
            );
            // show_array($data); 
            
            update_user_login(user_login(),$data);
        }
        
        
    }

    $info_user = get_user_by_username(user_login());
    $data['info_user'] = $info_user;
    load_view('update', $data);
}
