@extends('layouts.app')

@section('content')
 <div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">

        {{--  message flash --}}
         <div class="container">
            @if (session()->has('notification.message'))
            <div class="alert alert-{{ session('notification.type') }}">
                  {{ session('notification.message') }}
            </div>   
            @endif
           {{--  <h2>Témoignage de vie</h2>    --}} 
         <p class="mb-5 mt-3">
            <strong >Partager avec les autres votre expérience et vos témoignages et devenez une source d'inspiration.</strong> 
         </p>
         </div>

        {{--  formulaire de recherche --}}
         <form method="POST" action="{{ route('ad.search') }}" onsubmit="search(event)" id="searchForm">
            @csrf
           <div class="form-group">
               <input type="text" class="form-control mb-2"  placeholder="Entrer un mot de recherche" id='words'>
               <button type="submit" class="btn btn-primary mb-5">Rechercher</button>
           </div>
         </form>

       {{-- affichage des informations --}}

       <div class="card mb-4 " style="width: 100%;">
            {{--  <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="..."> --}}
            <div class="card-body">
               <div class="mb-4">
                  <strong class="card-text text-muted">Posté par : Alice </strong>
                  <small>{{ Carbon\Carbon::parse()->diffForHumans() }}.</small>
               </div> 
               <h1 class="card-title titre mb-3">Une de mes première experience avec Laravel</h1>
               <p class="card-text">
                  <div class="nonSelection  description">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a
                    type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting, remaining
                    essentially unchanged. It was popularised in the 1960s with the release of
                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </div><strong> dev@dev.com.</strong>
              </p>
               {{--  <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
         </div>

        <div id="results">
            @foreach ($ads as $ad)
            <div class="card mb-4 " style="width: 100%;">
              {{--  <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="..."> --}}
               <div class="card-body">
                  <div class="mb-4">
                     <strong class="card-text text-muted">Posté par : {{ $ad->name }}</strong>
                     <small>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}.</small>
                  </div> 
                  <h1 class="card-title titre mb-3">{{ $ad->title }}</h1>
                  <p class="card-text description nonSelection">{{ $ad->description }}</p>
                 {{--  <a href="#" class="btn btn-primary">Go somewhere</a> --}}
               </div>
            </div>
         @endforeach
        </div>

       {{--  pagination --}}
         {{ $ads->links() }}
         
    </div>
   </div>
</div>

@endsection

@section('extra-js')
   <script>
     /*  script ajax de recherche  et de remplissage*/
         function search(event)
         {
              event.preventDefault()
              const words = document.querySelector('#words').value
              const url = document.querySelector('#searchForm').getAttribute('action')
              
               axios.post(`${url}` , 
               { words: words,
               })
               .then(function (response){
                  const ads = response.data.ads
                  let results = document.querySelector('#results')
                  results.innerHTML = ''

                  for(let i = 0; i < ads.length; i++)
                  {
                     let card = document.createElement('div')
                     let cardBody = document.createElement('div')
                     cardBody.classList.add('card-body')
                     card.classList.add('card', 'mb-3')
                     let title = document.createElement('h1')
                     title.classList.add('card-title titre mb-3')
                     title.innerHTML = ads[i].title
                     let description = document.createElement('p')
                     description.classList.add('card-text')
                     description.innerHTML = ads[i].description
                     cardBody.appendChild(title)
                     cardBody.appendChild(description)
                     card.appendChild(cardBody)
                     results.appendChild(card)

                  }
  
               })
               .catch(function (error){
                  console.log(error);
               });
        }
     
   </script>
@endsection