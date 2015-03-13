<?php
use BenjaminGayGeffroy\PokemonBattle\Pokemon;
use BenjaminGayGeffroy\PokemonBattle\Trainer;

$em = require __DIR__ . '/bootstrap.php';

$trainerRepo = $em->getRepository('BenjaminGayGeffroy\PokemonBattle\Trainer');

$trainer = $trainerRepo->findOneBy([
    'username' => $_SESSION['username'],
]);

$pokemonRepo = $em->getRepository('BenjaminGayGeffroy\PokemonBattle\Pokemon');
$pokemon = $pokemonRepo->findOneBy([
    'trainer' => $trainer,
]);

if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['type']) && !empty($_POST['type'])) {

    $pokemon = new Pokemon();
    $pokemon
        ->setResuscitate(0)
        ->setName($_POST['name'])
        ->setHP(100)
        ->SetTrainer($trainer);
    if($_POST['type'] == 'plant') {
        $pokemon->setType(Pokemon::TYPE_PLANT);
    }
    elseif($_POST['type'] == 'fire'){
        $pokemon->setType(Pokemon::TYPE_WATER);
    }
    elseif($_POST['type'] == 'water') {
        $pokemon->setType(Pokemon::TYPE_FIRE);
    }

    $em->persist($pokemon);

    $em->flush();
    echo 'Bravo tu as ton pokémon ! mais crois pas t\'es devenu sacha ou quoi que ce soit mec';
}
require '/pokemon_board.php';