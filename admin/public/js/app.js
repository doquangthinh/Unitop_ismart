$(document).ready(function() {
    $("#btn-upload-thumb").click(function() {
        var file = $("#upload-thumb").text();
        var data = { file: file };
        alert(data);

        $.ajax({
            url: '?mod=products&action=upload_ajax', // trang xử lí, mặc định trang hiện tại
            method: 'POST', // post hoặc get / mặc đinh là get
            data: data, // dữ liệu truyền lên server
            dataType: 'text', //html text, script hoặc json
            success: function(data) {
                // $("#sub-total-" + id).text(data.sub_total);
                // $("#total-price span").text(data.total);
                //    $("#num").text(data.count);
                //    console.log (data);
            },

            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr, status);
                alert(thrownError);
            }
        });
        return false;
    });
});

$(function() {
    var inputFile = $('#file');
    $('#upload_single_bt').click(function(event) {
        var URI_single = $('#form-upload-single #file').attr('data-uri');
        var fileToUpload = inputFile[0].files[0];
        var formData = new FormData();
        formData.append('file', fileToUpload);
        $.ajax({
            url: URI_single,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.status == 'ok') {
                    showThumbUpload(data);
                    $('#thumbnail_url').val(data.file_path);
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    });

    function showThumbUpload(data) {
        var items;
        items = '<img src="' + data.file_path + '"/>';
        $('#show_list_file').html(items);
    }

});