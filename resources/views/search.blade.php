@extends('layouts.app')

@section('content')

<div class="container">
  @foreach ($pokemons as $pokemon)
  <a class="card-link" href="/pokemons/{{$pokemon['name']}}">
    <div class="pokemon-card {{$pokemon['type']}}">
      <div class="pokemon-card__content" >
        <div class="image-box">
          <img class={{$pokemon['type']}} alt='pokemon'src="{{$pokemon['imageUrl']}}">
        </div>
        <div class="pokemon-desc {{$pokemon['type']}}">
          <h3 class="name">{{$pokemon['name']}}</h3>
          
        <div class="types">
          <p>{{$pokemon['type']}}</p>
        </div>
        <p>height: {{$pokemon['height']}}</p>
        <p>weight: {{$pokemon['weight']}}</p>
        <p>base_experience: {{$pokemon['weight']}}</p>
        <p>Damage: 50</p>
      </div>
    </div>
  </div>
</a>
@endforeach 
</div>


@if (empty($pokemon))
    <p class="not-found">No Pokemon found</p>
@endif

@endsection