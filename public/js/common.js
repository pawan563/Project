$( document ).ready(function() {

    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        swal({
          title: "Are you sure!",
          type: "error",
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes!",
          showCancelButton: true,
        },
        function() {
          $.ajax({
          url: url,
          type: "DELETE" ,
          data: {"_token": $('meta[name="csrf-token"]').attr('content') },
          dataType: 'json',
          success: function(data) {
                location.reload();        
          },
          error: function(error){
             console.log(error.message);            
             }  
          });
        }   
        );
      });
    });