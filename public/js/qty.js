

$(document).ready(function(){
    $('.count').prop('readonly', true);
       $(document).on('click','.plus',function(){
        let id = $(this).data('id');
        let count = $('#number'+id);
        count.val(parseInt(count.val()) + 1 );
    });

    $(document).on('click','.minus',function(){
        let id = $(this).data('id');
        let count = $('#number'+id);
        count.val(parseInt(count.val()) - 1 );
            if ($(count).val() == 0) {
                $(count).val(1);
            }
        });
 });
