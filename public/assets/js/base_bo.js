$( document ).ready(function() {
    $('.delete').click(function(){
        if($('.delete').data('delete') == true) {
            return confirm($('.delete').data('confirm'));
        }
    });
});