jQuery( document ).ready( function( $ ) {
    //profile slug of category to be automatically generated
    $(function () {

        $(document).on('change', '.category_name' ,function (data) {
            var category_name = $(this).val();

            category_name = category_name.replace(/\s+/g, '-').toLowerCase();

            $('.generate_category_slug').val(category_name);


        });

    });

    //time pciker
    $(document).ready(function () {

        $(".datepicker").datepicker({
            defaultDate: 'now'
        });

        $(".timepicker").timepicker({
            showInputs: false,
        });

        $('.timepicker').val('');

    });


    $(function () {

        $(document).on('change', '.product_sku' ,function (data) {
            var category_name = $(this).val();
            category_name = category_name.toUpperCase();
            $('.generate_parent_sku').val(category_name);


        });

    });



    // User update form
    (function(){
        $(document).on('submit', '.update-user', function(){

            // remove prior message which might have accumulated during earlier update
            $( '.error-message' ).each(function( ) {
                $(this).removeClass('make-visible');
                $(this).html('');
            });


            $( 'input' ).each(function( ) {
                $(this).removeClass('errors');
            });



            // current form under process
            var current_form = $(this);
            // alert(current_form);


            // === Dynamically get all the values of input data
            // var request_data = new FormData();
           var request_data = {};

            request_data['_token']  = $(this).find('input[name=_token]').val();
            request_data['_method'] = $(this).find('input[name=_method]').val();

            current_form.find('[name]').each(function(){
                request_data[$(this).attr("name")] = $(this).val();
            });

            if($('#active').is(":checked"))
            {
                request_data['status']= 1;
            }
            if($('#inactive').is(":checked"))
            {
                request_data['status']= 0;
            }



            $.post(
                $(this).prop('action'),
                request_data,
                function(data){
                    console.log(data);

                    if(data.status == 'success'){
                        $('.user-edit').modal('hide');

                        current_form.find('[name]').each(function(){
                            $(this).val('');
                        });


                        if(window.location.href == data.url+"/create"){
                            window.location.href = data.url;
                        }else if(window.location.href.indexOf("password/reset") > -1){
                            window.location.href = data.url;
                        }else if(window.location.href.indexOf("course") > -1){
                            window.location.href = data.url;
                        }else{
                            location.reload();
                        }

                    }else if(data.status == 'fails'){
                        for (var key in data.errors) {

                            // skip loop if the property is from prototype
                            if (!data.errors.hasOwnProperty(key)) continue;

                            var error_message = data.errors[key];

                            current_form.find("[name="+key+"]").addClass('errors');

                            var parent = current_form.find("[name="+key+"]").parent();
                            parent.find('.error-message').addClass('make-visible').html(error_message);

                        }
                    }

                }
            );


            return false;

        });

    })();


    
    $('.data-table').DataTable();

// sweet alert delete
    $(document).on('submit', 'form.update-status-form', function(){

        var current_form = $(this);


        swal({   title: "Are you sure?",
                text: "Are you sure you want to change the status!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, change it!",
                closeOnConfirm: false
            },
            function(){

                var request_data = {};

                request_data['_token']  = current_form.find('input[name=_token]').val();
                console.log(request_data['_token']);

                $.ajax({
                    type: current_form.attr('method'),
                    url: current_form.attr('action'),
                    data: request_data,
                    success: function (data) {
                        //console.log(data);
                        if(data.status == 'success') {
                            // console.log('success');
                            location.reload();
                        }
                    }
                });

                swal("Deleted!", "Deleted Successfully!", "success");
            });

        return false;
    }) ;



    // sweet alert delete
    $(document).on('submit', 'form.delete-user-form', function(){

        var current_form = $(this);


        swal({   title: "Are you sure?",
                text: "Are you sure you want to delete this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){

                var request_data = {};

                request_data['_token']  = current_form.find('input[name=_token]').val();
                console.log(request_data['_token']);

                $.ajax({
                    type: current_form.attr('method'),
                    url: current_form.attr('action'),
                    data: request_data,
                    success: function (data) {
                        //console.log(data);
                        if(data.status == 'success') {
                            // console.log('success');
                            location.reload();
                        }
                    }
                });

                swal("Deleted!", "Deleted Successfully!", "success");
            });

        return false;
    }) ;




    (function(){

        var url;

        // Create course form submission
        $( document ).on('click' , '.user-list .edit-user-form' , function(e){


            url = $(this).attr('data-url');

            //console.log(url);

            $('.user-edit').modal();

        });



        $('.user-edit').on('shown.bs.modal', function(){


            $( ".user-edit .modal-body" ).load( url, function(response, status, xhr){

                if(status == 'error'){
                    var msg = 'Sorry but there was an error: ';
                    $( ".ajax-errors" ).html( msg + xhr.status + " " + xhr.statusText );
                }

                $(function () {
                    //Initialize Select2 Elements
                    $(".select2").select2();

                });



            });
        });

        $('.user-edit').on('hidden.bs.modal', function(){

            var prep_content = $('.prep').html();

            $( ".user-edit .modal-body").html(prep_content);

        });

    })();

});




//JS for order create








