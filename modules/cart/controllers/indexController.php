<?php

function construct()
{
    load_model('index');
}

function addAction()
{

    $id = (int)$_GET['id'];
    // $id = !empty($_GET['id'])? $_GET['id']:'';

    //hàm thêm sản phẩm vào giỏ hàng
    add_cart($id);

    //lấy thông tin sản phẩm cần thêm vào giỏ hàng
    $item = get_product_by_id($id);

    //hàm update tổng số lượng và tổng giá
    update_info_cart($id);
    redirect('?mod=cart&action=show');

    $data['item'] = $item;
    load_view('add', $data);
}

function showAction()
{
    $list_buy = get_list_by_cart();
    $data['list_buy'] = $list_buy;
    load_view('show', $data);
}


function deleteAction()
{

    $id = (int) $_GET['id'];
    delete_cart($id);

    redirect('?mod=cart&action=show');
}

function checkoutAction()
{
    $list_buy = get_list_by_cart();
    $data['list_buy'] = $list_buy;
    load_view('checkout', $data);
}


function delete_allAction()
{
    delete_all();
    redirect('?mod=cart&action=show');
}


function updateAction()
{
    if (isset($_POST['btn_update_cart'])) {
        update_cart($_POST['qty']);
        redirect('?mod=cart&action=show');
    }
}


function check_out_orderAction()
{

    $list_buy = get_list_by_cart();
    $data['list_buy'] = $list_buy;

    global $phone, $email, $error, $fullname, $address, $note, $list_buy;
    if (isset($_POST['btn_check_out'])) {

        $error = array();

        //kiểm tra full name
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống họ và tên';
        } else {
            $fullname = $_POST['fullname'];
        }

        // kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = 'Không  được để trống email';
        } else {
            $email = $_POST['email'];
        }

        //kiểm tra địa chỉ
        if (empty($_POST['address'])) {
            $error['address'] = 'Không được để trống địa chỉ';
        } else {
            $address = $_POST['address'];
        }

        //kiểm tra phone
        if (empty($_POST['phone'])) {
            $error['phone'] = 'Không được để trống số điện thoại';
        } else {
            $phone = $_POST['phone'];
        }

        // if (empty($_POST['payment-method'])) {
        //     $error['payment-method'] = "Phải chọn phương thức thanh toán";
        // } else {
        //     $payment_method = $_POST['payment-method'];
        // }

        $note = $_POST['note'];



        if (empty($error)) {
            $form_order = form_order();
            $subject = "Cảm ơn quý khách đã đặt hàng tại Ismart";
            $content =
                "  
            Xác nhận đơn hàng của bạn <br>
            Họ và tên :$fullname  <br>
            Email :$email <br>
            Địa chỉ : $address <br>
            Số điện thoại : $phone <br>
            Ghi chú : $note <br> <br>
            Thông tin đơn hàng : $form_order   
            ";

            //Gửi email cho khách hàng 
            send_mail($email, $fullname, $subject, $content);

            $subject_2 = " Thông báo về đơn hàng của $fullname";
            //Gửi email cho admin - người bán hàng
            send_mail('doquangthinh.19981998@gmail.com', $fullname, $subject_2, $content);



            //đẩy thông tin khách hàng lên db
            $info_customer_order = array(
                'fullname' => $fullname,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,

            );
            insert_info_customer($info_customer_order);

            //đẩy thông tin đơn hàng lên db
            if (!empty($_SESSION)) {
                $total = currency_format($_SESSION['cart']['info']['total']);
                $num_order = $_SESSION['cart']['info']['num_order'];
                foreach ($_SESSION['cart']['buy'] as $item) {
                    // $product_thumb = $item['product_thumb'];
                    // $product_title = $item['product_title'];
                    // $price = currency_format($item['price']);
                    // $qty = $item['qty'];
                    // $sub_total = currency_format($item['price'] * $qty);
                    $info_order=array(
                        'product_title' => $item['product_title'],
                        'product_thumb' => $item['product_thumb'],
                        'price' => $item['price'],  
                        'qty' => $item['qty'],
                        'sub_total' => $item['sub_total'],
                        'total' => $total,
                        'num_order'=>$num_order,

                    );
                }
            }
           
            insert_info_order($info_order);

            delete_all();
            load_view('check_out_order');
        }
    }

    load_view('checkout', $data);
}


function update_ajaxAction()
{

    $id = $_POST['id'];
    $qty = $_POST['qty'];

    $item = get_product_by_id($id);

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {

        // Cập nhật số lượng mới 
        $_SESSION['cart']['buy'][$id]['qty'] = $qty;

        // Cập nhật tổng tiền 1 sản phẩm 
        $sub_total = $qty * $item['price']; // tính tổng tiền mới = số lượng ( price) * qty ;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;

        // cập nhật toàn bộ giỏ hàng ;
        update_info_cart($id);

        // tổng tiền toàn bộ giỏ hàng
        $total = get_total_cart();
        // $count = count(get_num_order_cart());

        //giá trị trả về 
        $data = array(
            'sub_total' => currency_format($sub_total),
            'total' => currency_format($total),
            // 'count' => count($count)
        );
    };
    echo json_encode($data);
}
