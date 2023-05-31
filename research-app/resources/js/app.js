import './bootstrap';

$.ajax({
    success: function(response){
        if(response.refresh){
            location.reload();
        }
    }
})