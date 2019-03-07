@extends('layouts.app')

@section('body')
<style>
    .vertical-center {
        min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh; /* These two lines are counted as one :-)       */
        
    display: flex;
    align-items: center;
    }          
          
</style>
<body class="hold-transition login-page">        
<div class="col-md-6 col-md-offset-3 vertical-center">

<div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Register new user</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
        
        <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>

                    <div>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>             

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    <div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                          
          <div class="box-footer">            
            <button type="submit" class="btn btn-primary pull-right">
                {{ __('Register') }}
            </button>
            <a href="/login" class="btn btn-default">Go Back</a>
            
          </div>
          <!-- /.box-footer -->
        </form>
        </div>
      </div>

    </div>
      
</body>

</div>-->
@endsection
