@extends('welcome')
@section('main')
<main class="main-login" style="background-image:url('{{ asset('user/images/book-bkg.jpg') }}');background-size: cover;background-repeat: no-repeat;height: 100%;">
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
                <img class="mb-4" src="{{ asset('user/images/unnamed.png') }}" alt="" width="100" height="100">
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('login') }}">
                @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><img class="" src="{{ asset('user/images/businessman.png') }}" alt="" width="25" height="25"></span>
						</div>
                                <input id="username" type="text" placeholder="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                    </div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><img class="" src="{{ asset('user/images/lock.png') }}" alt="" width="25" height="25"></span>
						</div>
                        <input id="password" placeholder="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
					<div class="row align-items-center remember">
					<input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                    </div>
					<div class="form-group">
                        <button type="submit" class="btn float-right login_btn">
                                    {{ __('Login') }}
                                </button>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
                <a class="tag-sidebar" href="{{ route('password.request') }}">Forgot your password?</a>
				</div>
            </div>
		</div>
        </div>
    </div>
</div>
</main>
@endsection
