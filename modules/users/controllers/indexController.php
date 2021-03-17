

<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
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

    global $username, $password, $error, $email;

    $reset_token = $_GET['reset_token'];
    if (!empty($reset_token)) {
        if (check_reset_token($reset_token)){
            if (isset($_POST['btn-new-pass'])) {
                if (empty($_POST['password'])) {
                    $error['password'] = "ko được để trống password";
                } else {
                    if (!is_password($_POST['password'])) {
                        $error['password'] = "password không đúng định dạng";
                    } else {
                        $password = md5($_POST['password']);
                    }
                }

                if(empty($error)){
                    $data=array(
                        'password'=>$password
                    );
                    update_pass($data,$reset_token);
                    redirect('?mod=users&action=resetOk');
                }
            }
            load_view('newPass');
        }else{
            echo 'yêu cầu lấy lại mk không hợp lệ';
        }
    } else {
        if (isset($_POST['btn-reset'])) {

            $error = array();
            //kiểm tra email
            if (empty($_POST['email'])) {
                $error['email'] = "ko được để trống email";
            } else {
                $email = $_POST['email'];
            }

            //kết luận
            if (empty($error)) {
                if (check_email($email)) {
                    $reset_token = md5($email . time());
                    $data = array(
                        'reset_token' => $reset_token
                    );
                    //cập nhật mã reset pass cho user cần khôi phục mật khẩu
                    update_reset_token($data, $email);

                    //gửi link khôi phục vào email của người dùng
                    $link = base_url("?mod=users&action=reset&reset_token={$reset_token}");
                    $content = "<p>Bạn vui lòng click vào link sau để khôi phục lại mật khẩu : {$link}</p>
                    <p>Nếu không phải bạn yêu cầu , vui lòng bỏ qua email này</p>";

                    send_mail($email, '', 'khôi phục mật khẩu', $content);
                } else {
                    $error['account'] = "Email không tồn tại trên hệ thống";
                }
            }
        }

        load_view('reset');
    }
}



function resetOkAction(){
    load_view('resetOk');
}