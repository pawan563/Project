<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row justify-center">
            <div class="col-lg-6">
                <button class="btn btn-outline-primary">Click Here</button>
                <input type="text"class="form-control" id="one">
                <input type="text"class="form-control" id="two">
                <div class="text-success demo"></div>
                
            </div>
            <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="spinner-border text-muted"></div>
        <div class="spinner-border text-primary"></div>
        <div class="spinner-border text-success"></div>
        <div class="spinner-border text-info"></div>
        <div class="spinner-border text-warning"></div>
        <div class="spinner-border text-danger"></div>
        <div class="spinner-border text-secondary"></div>
        <div class="spinner-border text-dark"></div>
        <div class="spinner-border text-light"></div>
        
      </div>
    </div>
  </div>
        </div>
    </div>
    <script>
    $(function(){
        $('.btn').click(function(){
            $.ajax({
                url:'products',
                data:FormData,
                dataType:'json',
                beforeSend:function(){
                    $('#myModal').modal('show');
                },
                complete:function(){
                    $('#myModal').modal('hide');
                },
                success:function(result,status,xhr){
                    $('#one').val(result.name);
                    //$('#two').val(result.message);


                    $('.demo').html(result);


                //     console.log(status);
                //     console.log(xhr.status);
                },
                error:function(fst){
                    console.log(fst.responseJSON.message);
                    if(fst.status == 422){
                        //loop fst.responseJSON.errors
                    }
                    else{
                        if(fst.status == 404){
                        alert(fst.responseJSON.message);
                        }
                        else{  
                            alert('someting went wrong');     
                        }   
                    }
                }
            })
        });
    })
    </script>
</body>
</html>