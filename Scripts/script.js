function Onstart(){ 
    var random = Math.floor(Math.random() * 10);;

    document.getElementById('nbrvisiteur').innerHTML = "Il y a "+ random + " vistiteurs sur la site actuellement";

}
function showDetails(element) {
    // Afficher les détails (géré par CSS :hover)
}

function hideDetails(element) {
    // Cacher les détails (géré par CSS :hover)
}
