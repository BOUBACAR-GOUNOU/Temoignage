@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">Gérer vos témoignages.</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif   
                    <div>
                    <div>
                       @php
                        $i = 0
                        @endphp

                        @foreach ($ads as $ad)
                    
                            <div class="card mb-4" style="width: 100%;">
                                {{--  <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h2 class="card-title titre mb-3">{{ $ad->title }}</h2>
                                    <div class="mb-4">
                                        <small >Posté {{ Carbon\Carbon::parse($ad->created_at)->format('d M Y à H:i:s') }}.</small>
                                    </div>
                                    <p class="card-text description">{{ $ad->description }}</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>

                                <form action = "{{ route('ad.destroy', ['ad'=> $ad ->id]) }}"  method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('ad.edit', ['ad'=> $ad ->id]) }}" class="btn btn-link"> Modifier</a>
                                    |<button type="submit" class="btn btn-link text-danger">Supprimer</button>
                                </form>
                            </div>
                            @php
                            $i++
                            @endphp
                        @endforeach

                         @if ($i==0)
                                 <p class="text-info">Vous n'avez posté aucun témoignage !!!</p>
                         @endif
                </div>
            </div>
        </div>
</div>
@endsection
