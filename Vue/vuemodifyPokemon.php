<?php $this->titre="Modifier Pokémon";?>

<h1>Modifier Pokémon</h1>
<form action="<?=$_SERVER['PHP_SELF']?>"  method="POST" >
<p id="pokemon"><label>Pokémon : </label>
<select name="idPokemon" id="selectPokemon" >
    <?php foreach($tab as $i){
        echo $i;
    }?>

</select></p><p><label>Taille : </label>
<input type="number" name="taillePokemon"
id="taillePokemon" required/>
</p><p><label>Poids : </label><input type="number" name="poidsPokemon" id="poidsPokemon" required />
</p><p><input type="submit" />
</p></form>