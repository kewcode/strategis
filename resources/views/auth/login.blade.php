

@extends('layouts.app')

@section('content')

<section>
  <div class="container pt-lg-md  mt-4">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="card shadow border-0">
          <div class="text-center mt-5">
              <img src="/ajk.png" width="70px">
              <div class="text-center mt-3">Ayam Geprek Juara</div>
           
          </div>
          <div class="card-body px-lg-5 pb-lg-5 ">
            <form role="form" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                  <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">
                  <i class="ni ni-active-40"></i>
                  Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
