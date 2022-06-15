 @csrf
 
  @section('scripts')
       {!! NoCaptcha::renderJs() !!}
  @endsection

  <div class="form-group">
  <label for="title">Titre de votre témoignage</label>
  <input type="text" class="form-control {{ $errors->has('title')? 'is-invalid' : '' }}" id="title"  name='title' value="{{ old('title') ??  $ad->title}}">
  @if ($errors->has('title'))
    <span class="invalid-feedback">
     {{ $errors->first('title') }}
    </span>
  @endif
  </div>
  <div class="form-groupe">
  <label for="description">Description de votre témoignage</label>
  <textarea class="form-control  {{ $errors->has('description')? 'is-invalid' : '' }}" name="description" id="description" cols="30" rows="10">{{ old('description') ??  $ad->description}}</textarea>
   @if ($errors->has('description'))
    <span class="invalid-feedback">
     {{ $errors->first('description') }}
    </span>
  @endif
  </div>
	<div class= "form-group row mt-2">
      <div class="col-md-6 offseet-md-4">
           {!! NoCaptcha::display() !!}
           @if ($errors->has('g-recaptcha-response'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
            @endif
       </div>
 </div>
  