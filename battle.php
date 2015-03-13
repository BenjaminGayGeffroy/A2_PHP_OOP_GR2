<?php require __DIR__.'/header.php';
$em = require __DIR__ . '/bootstrap.php';

use BenjaminGayGeffroy\PokemonBattle\Pokemon;
use BenjaminGayGeffroy\PokemonBattle\Trainer;

$trainerRepo = $em->getRepository('BenjaminGayGeffroy\PokemonBattle\Trainer');
$trainer = $trainerRepo->findOneBy([
    'username' => $_SESSION['username']
]);

$pokemonRepo = $em->getRepository('BenjaminGayGeffroy\PokemonBattle\Pokemon');
$pokemon = $pokemonRepo->findOneBy([
    'trainer' => $trainer
]);

$pokemonRepoOpponent = $em->getRepository('BenjaminGayGeffroy\PokemonBattle\Pokemon');
$pokemonOpponent = $pokemonRepoOpponent->find($_GET['id']);


$hp = $pokemonOpponent->getHp();


if (($pokemon->getType() == Pokemon::TYPE_FIRE) && ($pokemonOpponent->getType() == Pokemon::TYPE_PLANT) OR
    ($pokemon->getType() == Pokemon::TYPE_PLANT) && ($pokemonOpponent->getType() == Pokemon::TYPE_WATER) OR
    ($pokemon->getType() == Pokemon::TYPE_WATER) && ($pokemonOpponent->getType() == Pokemon::TYPE_FIRE))
{
    $newHp = $hp - rand(15, 30);
}
elseif (($pokemon->getType() == Pokemon::TYPE_FIRE) && ($pokemonOpponent->getType() == Pokemon::TYPE_WATER) OR
    ($pokemon->getType() == Pokemon::TYPE_WATER) && ($pokemonOpponent->getType() == Pokemon::TYPE_PLANT) OR
    ($pokemon->getType() == Pokemon::TYPE_PLANT) && ($pokemonOpponent->getType() == Pokemon::TYPE_FIRE))
{
    $newHp = $hp - rand(5, 10);
}
else
    $newHp = $hp - rand(10, 20);

if ($newHp < 0) {
    $newHp = 0;
}

$pokemonOpponent->setHp($newHp);
$em->flush(); ?>

<div id="pokemon_opponent">
    <p>BIM ! Une attaque de pokémon ça fait MAL </p>
    Le pokemon <?php echo $pokemonOpponent->getName(); ?> a maintenant <?php echo $newHp; ?> HP !
    Veuillez attendre 6h pour pouvoir combattre a nouveau !
    <a href="index.php">Retournez à l'index</a>
</div>