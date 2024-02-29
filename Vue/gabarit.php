<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Public/css/style.css" rel="stylesheet" type="text/css">
    <title>Application Pokémon - <?= $titre?></title>
</head>
<body>
    <header>
        <table>
                <tr>
                                        <td><a href="index.php">Accueil</a></td>
                    <td><a href="index.php?action=test">Test</a></td>
                    <td><a href="index.php?action=modifyPokemon">Modifier Pokémon</a></td>
                    <td><a href="index.php?action=historique">Historisation</a></td>
                    <td><a href="index.php?action=printPokemon">Afficher Pokémon</a></td>
                </tr>
        </table>
    </header>
    <div id="content">
        <?= $contenu ?>
    </div>
    <footer>
        <table>
            <tr>
                <td>Licence 3 Informatique</td>
                <td><?=date("Y-m-d H:i:s")?></td>
            </tr>
        </table>
    </footer>
</body>
</html>
