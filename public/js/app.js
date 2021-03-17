$(document).ready(function () {
    $(".num-order").change(function () {
        var id = $(this).attr('data_id');
        var qty = $(this).val();
        var data = {id:id, qty: qty};
    //    console.log(data);// test ok đâ lấy dc 2 dữ liệu 

        $.ajax({
            url: '?mod=cart&action=update_ajax', // trang xử lí, mặc định trang hiện tại
            method: 'POST', // post hoặc get / mặc đinh là get
            data: data, // dữ liệu truyền lên server
            dataType: 'json', //html text, script hoặc json
            success: function (data) {
               $("#sub-total-"+ id).text(data.sub_total);
               $("#total-price span").text(data.total);
            //    $("#num").text(data.count);


            //    console.log (data);
            },

            error:function(xhr,ajaxOptions,thrownError){
                alert(xhr,status);
                alert(thrownError);
            }
        });
        return false;
    });
});


