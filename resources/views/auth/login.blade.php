@extends('/layouts.app')

@section('title', 'Log In')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/login.css') }}">

<div class="body-login">

        @if($val==1)
    <div class="popupidstate">
        <label> A tua conta foi suspendida, por favor contacta o admin do website para mais informações </label>
    </div>
    @elseif($val==2)
    <div class="popupidstate">
        <label class="inf"> A tua conta foi eliminada, por favor contacta o admin do website para mais informações </label>
    </div>
    @endif
    <div class="container-login" id="container-login">
	    <div class="form-container-login sign-up-container-login">
		    <form class="form-login" method="POST" action="{{ route('register') }}">
			@csrf
			    <h1 class="h1-login">Create Account</h1>
                <input class="input-login {{ $errors->has('firstName') ? 'is-invalid' : '' }}" type="text" placeholder="First Name" id="firstName" name="firstName" value="{{ old('firstName') }}" required autofocus/>
                @if ($errors->has('firstName'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('firstName') }}</strong>
                    </span>
                @endif
                <input class="input-login {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" placeholder="Surname" id="surname" name="surname" value="{{ old('surname') }}" required/>
                @if ($errors->has('surname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
                <input class="input-login {{ $errors->any() ? $errors->has('birthDate') ? 'is-invalid' : 'is-valid' : ''}}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" type="text" name="birthDate" id="birthDate" placeholder="Data de Nascimento" value="{{ old('birthDate') }}"  required>
                @if ($errors->has('birthDate'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('birthDate') }}</strong>
                    </span>
                @endif
                <input class="input-login {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" placeholder="Email" id="email1" name="email" value="{{ old('email') }}" required/>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <input class="input-login {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" placeholder="Password" id="password" name="password" required/>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <input class="input-login {{ $errors->has('password-confirm') ? 'is-invalid' : '' }}" type="password" placeholder="Confirm Password" id="password-confirm" name="password_confirmation" required/>
                @if ($errors->has('password-confirm'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password-confirm') }}</strong>
                    </span>
                @endif
			    <button type="submit" style="cursor:pointer" class="button-login">Sign Up</button>
		    </form>
	    </div>
	    <div class="form-container-login sign-in-container-login">
		    <form class="form-login" method="POST" action="{{ route('login') }}">
            @csrf
			    <h1 class="h1-login">Login</h1>
                <input class="input-login {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus/>
                <input class="input-login {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" type="password" name="password" placeholder="Password" required/>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			    <button style="cursor:pointer" class="button-login">Login</button>
		    </form>
	    </div>
	    <div class="overlay-container-login">
		    <div class="overlay-login">
			    <div class="overlay-panel-login overlay-left-login">
				    <h1 class="h1-login">Bem-Vindo!</h1>
				    <p class="p-login">  Digite os seus dados pessoais e comece a uma nova jornada</p>
				    <button style="cursor:pointer" class="button-login ghost" id="signIn-login">Login</button>
			    </div>
			    <div class="overlay-panel-login overlay-right-login">
				    <h1 class="h1-login">Bem-Vindo de volta!</h1>
				    <p class="p-login"> Para se manter conectado, faça login com suas informações pessoais</p>
				    <button style="cursor:pointer" class="button-login ghost" id="signUp-login">Registar</button>
			    </div>
		    </div>
	    </div>
    </div>
</div>

<script src="{{ asset('/js/login.js') }}"></script>
@endsection
