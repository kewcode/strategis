@extends('layouts.app')

@section('content')

<br>
@if(Session::has('success'))
<div class="col-12">
    <div class="alert alert-success p-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> {{ Session::get('success') }}
    </div>
</div>
@endif
      
@if(Session::has('error'))
<div class="col-12">
    <div class="alert alert-danger p-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> {{ Session::get('error') }}
    </div>
</div>
@endif
      <div class="row mt-4">
        <div class="col">

          <div class="container mt-4">
              <div class="row" id="post-data">
                  @include('admin.userData')
                  <div class="col-md-12">
                    <div class="ajax-load text-center" style="display:none">
                        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
                    </div>
                  </div>
              </div>
          </div>
        
      </div>
    </div>

      
<!-- Edit Users -->
  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-0">      	
               <div class="card bg-secondary shadow border-0">
                  <div class="card-body px-lg-5 pb-lg-5" id="formEditUsers">
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('js-after')
    

<script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});


	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#post-data").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
<script>

  
   // Users Controller JS
   function edituser(u) {
            $("#modal-form").modal('show');
            // $.get(`{{url('/users')}}/${id}` , function( data ) {
              var d = JSON.parse(u);
              // console.log(u);
              // console.log(d);
              var data = '';
              data += `
              <form role="form" method="post" action="{{url('/users')}}/${d.id}/edit">
                          @csrf
                          <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input value="${d.id}" type="hidden" name="id" required>
                                <input class="form-control" placeholder="Nama Lengkap" type="text" name="name" value="${d.name}" required autofocus>
                                @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-secondary"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="Email" type="email" name="email" value="${d.email}">
                                @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="New Password" type="text" name="password">
                                @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                               @endif
                              </div>
                            </div>
                          <div class="text-center">
                              <button type="submit id="btnformEditUser" class="btn btn-primary btn-block">Simpan Perubahan</button>
                          </div>
                      </form>
                `;
              $("#formEditUsers").html(data);
            
            // });
          }
  </script>

@endsection