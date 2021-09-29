@extends('layouts.app')


@section('content')
<div class="details-container">
  <div class="imagebox">
    <img alt="pokemon" src={{$details[0]['imageUrl']}}>
  </div>
  <div class="desc">
    <h1>{{$details[0]['name']}}</h1>
    
    <div class="types">
      <p class="{{$details[0]['type']}}">{{$details[0]['type']}}</p>
      <p class="poison">poison</p>
    </div>
    <div class="abilities">
      <div class="abilities_row1">
        <h2>Height</h2>
        <p>{{$details[0]['height']}}</p>
        <h2>Weight</h2>
        <p>{{$details[0]['weight']}}</p>
        <h2>Hp</h2>
        <p>{{$details[0]['hp']}}</p>
      </div>
      <div class="abilities_row2">
        <h2>Attack</h2>
        <p>{{$details[0]['attack']}}</p>
        <h2>Speed</h2>
        <p>{{$details[0]['speed']}}</p>
        <h2>Special Attack</h2>
        <p>{{$details[0]['special_attack']}}</p>
      </div>
    </div>
  </div>
  <div class="evolution">
    <h2>Evolution</h2>
    
     




@foreach ($pokemons_evolution as $key=>$pokemon)

<div class="evolution_form{{$key +1}}">
  <a href="/pokemon/{{$pokemon['name']}}">
    <img alt="pokemon" src={{$pokemon['imageUrl']}}>
  </a>
</div>
@endforeach



      
    
  </div>
</div>
        
@endsection



    
