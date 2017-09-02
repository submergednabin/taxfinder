(function() {

        $(document).on('submit', '.login-ajax', function () {
            var current_form = $(this);

            current_form.find('#login-error-message').removeClass('make-visible').html('');

            var request_data = {};

            request_data['_token']  = $(this).find('input[name=_token]').val();

            current_form.find('[name]').each(function(){
                request_data[$(this).attr("name")] = $(this).val();
            });

            $('.loading').addClass('make-visible');
            $.post(
                current_form.attr('action'),
                request_data,
                function (responce) {
                            console.log(responce);
                    if(responce.status == 'success'){
                        console.log(responce);
                        window.location.href = responce.url;
                        $('.loading').removeClass('make-visible');
                    }else if(responce.status == 'fails'){
                        console.log('fail');
                        current_form.find('[name=password]').val('');
                        current_form.find('#login-error-message').addClass('make-visible').html(responce.error);
                        $('.loading').removeClass('make-visible');
                    }
                }
            );

            return false;

        });

    })();

