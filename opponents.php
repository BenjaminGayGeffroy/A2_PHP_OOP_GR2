<?php require __DIR__.'/header.php';
$em = require __DIR__ . '/bootstrap.php';
use BenjaminGayGeffroy\PokemonBattle\Pokemon;
use BenjaminGayGeffroy\PokemonBattle\Trainer;

$pokemonRepo = $em->getRepository('BenjaminGayGeffroy\PokemonBattle\Pokemon');

$pokemon = $pokemonRepo->findAll(); ?>


<div class="container">
    <div id="tableau">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>HP</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> <?php foreach ($pokemon as $var) {
                $tr = $var->getTrainer(); ?>

                <tr>
                    <td>
                        <?php echo $var->getName(); ?>
                    </td>

                    <td>
                        <?php
                        if ($var->getType() == "0")
                            echo "Water";
                        elseif ($var->getType() == "1")
                            echo "Fire";
                        elseif ($var->getType() == "2")
                            echo "Plant";
                        ?>
                    </td>


                    <td><?php echo $var->getHp(); ?></td>
                    <td><button type="submit" class="btn btn-default"><a href="battle.php?id=<?php echo $var->getId();?>">Attaquer</a></button></td>
                </tr>

            <?php } ?>


            </tbody>
        </table>
    </div>
</div>