<?php $this->titre="Afficher Pokémon";?>
<p id="pokemon">
    <label>Types : </label>
    <select name="idType" id="selectType" >
    <option value="" selected >---</option>
    <?php foreach($tabv as $i){
        echo $i;
    }?>


    </select>
</p>
    <script src="Public/JS/pokemon.js"></script>
