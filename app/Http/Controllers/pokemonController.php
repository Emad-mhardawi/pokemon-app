<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;


class PokemonController extends Controller
{
public function index(){
	print_r('loading');
  $response = Http::get('https://pokeapi.co/api/v2/pokemon?limit=50')['results'];

  foreach($response as $pokemon){
		$pokemonData = Http::get($pokemon["url"]);
		$pokemon =Pokemon::updateOrCreate([
			'name' =>  $pokemonData['name'],
      'imageUrl' => $pokemonData['sprites']['other']['dream_world']['front_default'],
      'base_experience' => $pokemonData['base_experience'],
      'weight' => $pokemonData['weight'],
      'height' => $pokemonData['height'],
      'type' => $pokemonData['types'][0]['type']['name'],
      'hp' => $pokemonData['stats'][0]['base_stat'],
      'attack' => $pokemonData['stats'][1]['base_stat'],
      'defense' => $pokemonData['stats'][2]['base_stat'],
      'special_attack' => $pokemonData['stats'][3]['base_stat'],
      'special_defense' => $pokemonData['stats'][4]['base_stat'],
      'speed' => $pokemonData['stats'][5]['base_stat']
		]);
		$pokemon->save();
	};

	return redirect('/pokemons');
}




/// show pokemons in the view
public function show(){
	$pokemons = Pokemon::all();
	return view('home', [
    'pokemons'=>$pokemons,
  ]);
}


/// show pokemon detail page
public function showDetails($pokemonName){
	$pokemon_details = Pokemon::where('name', '=', $pokemonName)->get();
	$pokemon_species = Http::get('https://pokeapi.co/api/v2/pokemon-species/' .$pokemonName)->json();
  $evolution_chain =Http::get($pokemon_species["evolution_chain"]["url"])->json();


	$form_one = $evolution_chain['chain']["species"]['name'];
	$form_two='';
	$form_three='';
	
	

	if($evolution_chain['chain']["evolves_to"] !== []){
		$form_two = $evolution_chain['chain']["evolves_to"][0]["species"]['name'];
		if($evolution_chain['chain']["evolves_to"][0]["evolves_to"] !==[]){
			$form_three = $evolution_chain['chain']["evolves_to"][0]["evolves_to"][0]["species"]['name'];
		}
	};




	$pokemons_evolution = Pokemon::where('name', '=', $form_one)
    ->orWhere('name', '=', $form_two)
    ->orWhere('name', '=', $form_three)
    ->get();

		return view('pokemonDetails', [
			'details'=>$pokemon_details,
			'pokemons_evolution' =>$pokemons_evolution
	]); 
}



////search
public function search(Request $request){
	$search = $request->input('search');
	$pokemons = Pokemon::where('name', 'LIKE', "%{$search}%")
									->orWhere('type', 'LIKE', "%{$search}%")
									->get();
									
	return view('search',[
		"pokemons"=>$pokemons
]);
}


}
