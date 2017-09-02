
(function(){

    function subCategory(id) {
        $('.sub-category').empty();

        if(id != ''){
            $.ajax({
                type:"GET",
                url:APP_URL+"/admin/category/ajax-category/"+id,
                dataType:"json",
                success: function (data) {
                    $('.sub-category').empty();
                    $('.sub-category').append("<option value=''>--Select Sub Category--</option>");
                    $.each(data, function (i, item) {
                        $('.sub-category').append('<option value="'+data[i].id+'">'+data[i].name+'</option>')
                    });
                },
                complete: function(){

                }
            });
        }else{
            $('.sub-category').append("<option value=''>--Select Sub Category--</option>");
        }
    }

    $(document).ready(function () {

        $(document).on('change', '.category', function(e){

            var categoryId = e.target.value;

            subCategory(categoryId);
        });

    });
})();