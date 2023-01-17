//Delete
$("body").on("click",".remove-crud",function(){
    var current_object = $(this);
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "error",
        showCancelButton: true,
        cancelButtonClass: 'btn-default btn-md waves-effect',
        confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
        confirmButtonText: 'Delete!'
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = $("input[name='_token']").val();
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='POST' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="DELETE">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+ token +'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+ id +'">');
            $('body').find('.remove-form').submit();
        }
    });
});

jQuery(".search-modules").click(function(e) {
    e.preventDefault();
    jQuery(".filter-panel").toggle("slow");
});