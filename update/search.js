$(document).ready(function(){
    $('#search-form').submit(function(e){
        e.preventDefault(); // Ngăn chặn chuyển hướng mặc định của biểu mẫu

        var formData = $(this).serialize(); // Lấy dữ liệu từ biểu mẫu
        $.ajax({
            type: 'GET',
            url: '/search',
            data: formData,
            success: function(response){
                // Xử lý kết quả tìm kiếm ở đây
                console.log(response);
            },
            error: function(xhr, status, error){
                console.error('Đã xảy ra lỗi: ' + status);
            }
        });
    });
});
