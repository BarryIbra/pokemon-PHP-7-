(function (){
    var sel=document.getElementById('selectType');
    sel.addEventListener('change',function(e){
        let id=e.target.options[e.target.selectedIndex].value;
        if(id)
        {
            
            fetch('Controleurs/tableauDepokemon.php', {
                method: 'POST',
                body: new URLSearchParams("id=" + id),
            })
            .then((response) => response.json())
            .then((pokemons)=>{
                
                let contenu=document.getElementById('content');
                if(document.getElementsByTagName('table').length!=2){
                    let table=document.getElementsByTagName('table')[1];
                    table.innerHTML='<thead><tr><th>Nom</th><th>Taille</th><th>Poids</th></tr></thead>';
                    let tbody=document.createElement('tbody');
                    table.appendChild(tbody);
                    let cor="";
                    for(let i of pokemons)
                    {
                        cor+='<tr><td>'+i.nom+'</td><td>'+i.taille+'</td><td>'+i.poids+'</td></tr>';
                    }
                    tbody.innerHTML=cor;
                
                }
                else
                {
                    let table=document.createElement('table');
                    table.innerHTML='<thead><tr><th>Nom</th><th>Taille</th><th>Poids</th></tr></thead>';
                    contenu.appendChild(table);
                    let tbody=document.createElement('tbody');
                    table.appendChild(tbody);
                    let cor="";
                    for(let i of pokemons)
                    {
                        cor+='<tr><td>'+i.nom+'</td><td>'+i.taille+'</td><td>'+i.poids+'</td></tr>';
                    }
                    tbody.innerHTML=cor;


                }
                



            })
            .catch((error) => {
                console.log('Error:', error);
            });
            
        }

    },false)

})();