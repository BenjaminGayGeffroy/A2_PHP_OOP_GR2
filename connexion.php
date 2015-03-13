
<?php
use BenjaminGayGeffroy\PokemonBattle\Trainer;
$em = require __DIR__ . '/bootstrap.php';
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

$trainerRepo = $em->getRepository('BenjaminGayGeffroy\PokemonBattle\Trainer');

$trainer = $trainerRepo->findOneBy([
'username' => $_POST['username'],
'password' => $_POST['password']
]);
if(is_object($trainer)){
$_SESSION['status'] = 'connected';

$_SESSION['username'] = $trainer->getUsername();

echo 'Vous etes bien connecte' ;
}
else{
echo 'Invalide';
}
} ?>
        <h3>CONNEXION</h3>
        <form method="post" action="">
            <input type="text" name="username" id="username" placeholder="USERNAME" />
            <br /><br />
            <input type="password" name="password" id="password" placeholder="PASSWORD" />
            <br /><br />
            <input type="submit" value="Valider" class="submit" />
        </form>
        <br />
        <a href="inscription.php">Pas encore inscrit ?</a>
