<?php
require __DIR__.'/header.php';

if ($_SESSION ==  TRUE){
    echo "Bonjour ".$_SESSION['username'].'<br />';
    require 'pokemon_board.php';
}else{
    echo '<div id="index">Connectez-vous !</div>';
    require '/connexion.php';
} ?>