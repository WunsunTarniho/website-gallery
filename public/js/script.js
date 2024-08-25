$('#addLike').on('submit', e => {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        dataType: 'JSON',
        type: 'POST',
        url: '/like',
        data: $("#addLike").serialize(),
        success: function (response) {
            $('#totalLike').text(response.totalLike);
            console.log( $('.like-button').find('.bi'))

            if(($('.like-button').find('.bi-heart-fill')).length) {
                $('.like-button').find('.bi-heart-fill').remove();   
                $('.like-button').prepend('<i class="bi bi-heart"></i>')
            }else{
                $('.like-button').find('.bi-heart').remove();   
                $('.like-button').prepend('<i class="bi bi-heart-fill text-danger"></i>') 
            }
        },
        error: function (error) {
            // console.log('no send');
        }
    })
}) 