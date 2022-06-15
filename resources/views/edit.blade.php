@extends('layouts.app') 

@section('content')
<div class="container">
 	 <div class="row justify-content-center">
  			<div class="col-md-8">  
								<h3  class="my-3" >Modifier votre témoignage</h3>
								<form action="{{ route('ad.update', ['ad'=> $ad->id]) }}" method="POST">
												@method('PATCH') 
												@include('include.form')
								<button type="submit" class="btn btn-primary mt-3"> Sauvegarder</button>
                        </form>
      </div>
   </div>
</div>

@endsection
