function Onstart(){ 
    var random = Math.floor(Math.random() * 100);;

    document.getElementById('nbrvisiteur').innerHTML = "Il y a "+ random + " vistiteurs sur la site actuellement";

}
