@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('success'))
     <div class="alert alert-success">
         {{ session()->get('success') }}
     </div>
        
    @endif
    <h1>Témoignage de vie</h1>     
 </div>
 @endsection
