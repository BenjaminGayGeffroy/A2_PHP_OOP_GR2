
<?php
use BenjaminGayGeffroy\PokemonBattle\Trainer;
$em = require __DIR__ . '/bootstrap.php';
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

$trainer = new Trainer();
$trainer
->setUsername($_POST['username'])
->setPassword($_POST['password']);
$em->persist($trainer);
$em->flush();
echo 'Votre inscription a bien ete prise en compte!';
} ?>
        <h3>INSCRIPTION</h3>
        <form method="post" action="">
            <input type="text" name="username" id="username" placeholder="USERNAME" />
            <br /><br />
            <input type="password" name="password" id="password" placeholder="PASSWORD" />
            <br /><br />
            <input type="submit" value="Valider" class="submit" />
        </form>
        <br />
        <a href="connexion.php">Déjà inscrit? Connecte toi ici</a>
</div>