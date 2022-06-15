@extends('layouts.app')

@section('content')
  <div class="container">
 	 <div class="row justify-content-center">
  			<div class="col-md-8">  
				<h1 class="titre">Déposer votre témoignage</h1>
				<hr>
        
				{{-- formulaire de depot de témoignage --}}
				<form  method='POST' action='{{ route('ad.create') }}'>
			
									@include('include.form')
	<div class= "form-group row mb-2">
      <div class="col-md-6 offseet-md-4">
           <div class="g-recaptcha " data-sitekey="{{ env('CAPTCHA_KEY')}}"></div>
           @if($errors->has('g-recaptcha-response'))
              <span class='invalid-feedback' style="display:block">
                  <strong>{{$errors->first('g-recaptcha-response')}}</strong>
              </span>
           @endif
       </div>
 </div>

  {{-- proposotion d'identification quand utilisateur un nouveau --}}
  @guest
  <div class="mt-5">
		<h2>Vos informations.</h2>
		<hr>
		<div class="form-group">
			<label for="name">Votre nom</label>
			<input type="text" class="form-control   {{ $errors->has('name')? 'is-invalid' : '' }}"  name ="name" id="localisation" value="{{ old('name')}}">
			@if ($errors->has('name'))
				<span class="invalid-feedback">
					{{ $errors->first('name') }}
				</span>
			@endif
		  </div>
		  <div class="form-group">
			<label for="email">Votre email</label>
			<input type="email" class="form-control   {{ $errors->has('email')? 'is-invalid' : '' }}"  name ="email" id="email" value="{{ old('email')}}">
			@if ($errors->has('email'))
				<span class="invalid-feedback">
					{{ $errors->first('email') }}
				</span>
			@endif
  </div>
  <div class="form-group">
	 <label for="password">Mot de passe</label>
	 <input type="password" class="form-control   {{ $errors->has('password')? 'is-invalid' : '' }}"  name ="password" id="password" value="{{ old('email')}}">
	 @if ($errors->has('password'))
		  <span class="invalid-feedback">
			  {{ $errors->first('password') }}
		  </span>
	 @endif
  </div>
  <div class="form-group">
	 <label for="password_confirmation">Confirmer le mot de passe</label>
	 <input type="password" class="form-control   {{ $errors->has('password_confirmation')? 'is-invalid' : '' }}"  name ="password_confirmation" id="password_confirmation" value="{{ old('email')}}">
	 @if ($errors->has('password_confirmation'))
		  <span class="invalid-feedback">
			  {{ $errors->first('password_confirmation') }}
		  </span>
	 @endif
		</div>
</div>
  @endguest

  <button type="submit" class="btn btn-primary mt-4">Soumettre votre témoignage</button>
</form>
 
 </div>
@endsection