document.addEventListener('DOMContentLoaded', function(){

var connexion = document.getElementById('connexion');
var pseudo;
var passe;
var valider;
var close;
var deconnecte;

connexion.addEventListener('click', showPopin);

setInterval(lastActionUser, 5000);
setInterval(getUserConnect, 5000);

function getUserConnect(){
    
       var ajax = new XMLHttpRequest();
    //on initialise la requete avec open()
    var url = 'getUserConnect';
    ajax.open("GET", url, true);
    ajax.send();
    
    ajax.onload = function(){
        if (ajax.status == 200){
            var reponse = ajax.response;
            document.getElementById('membresConnect').innerHTML = reponse;
            console.log(reponse);
            
        }
        else{
             console.log('Impossible de recup');       
         }
        };
    
}

function lastActionUser(){
    
       var ajax = new XMLHttpRequest();
    //on initialise la requete avec open()
    var url = 'lastActionUser';
    ajax.open("GET", url, true);
    ajax.send();
    
    ajax.onload = function(){
        if (ajax.status == 200){
            var reponse = ajax.response;
            console.log(reponse);
            
        }
        else{
             console.log('Impossible de recup');       
         }
        };
    
}



function showPopin(){
    //console.log('afficher popin');
    
    var ajax = new XMLHttpRequest();
    //on initialise la requete avec open()
    var url = 'connexion';
    ajax.open("GET", url, true);
    ajax.send();
    
    ajax.onload = function(){
        if (ajax.status == 200){
            var reponse = ajax.response;
            var newDiv = document.createElement("div");
            newDiv.setAttribute("id", "popin");
            newDiv.classList.add('popin');
            newDiv.innerHTML = reponse;
            document.body.appendChild(newDiv);
            
            initConnexionUser(newDiv);
            
        }
        else{
             console.log('Impossible de recup');       
         }
        };
        
        
        
}


function closePopin(element){
    
   element.remove();
   
}
function initConnexionUser(element){
    console.log('init form user');
    
    pseudo = document.getElementById('pseudo');
    passe = document.getElementById('passe');
    valider = document.getElementById('valider');
    close = document.getElementById('close');
    deconnecte = document.getElementById('deconnexion');
    
    close.addEventListener('click',function(){closePopin(element);});
    valider.addEventListener('click',connexUser);
    deconnecte.addEventListener('click',closeSession);
}
function closeSession(){
    
       var ajax = new XMLHttpRequest();
    //on initialise la requete avec open()
    var url = 'closeSession';
    ajax.open("GET", url, true);
    ajax.send();
    
    ajax.onload = function(){
        if (ajax.status == 200){
            var reponse = ajax.response;
            console.log(reponse);
            
        }
        else{
             console.log('Impossible de recup');       
         }
        };
    
}
function connexUser(){
    //console.log('insert form user');
    //console.log(pseudo.value);
    //console.log(passe.value);
    var myForm = new FormData();
    myForm.append('pseudo',pseudo.value);
    myForm.append('passe',passe.value);
    
    //On crée un objet XMLHttpRequest
    var ajax = new XMLHttpRequest();
     //On initialise notre requête avec open()
     var url = 'connexUser';//url que vous souhaitez transmettre au serveur web. Ici on demande la page 'ajax'.
    ajax.open("POST", url, true);
    //on envoie la requete
    ajax.send(myForm);
     
     ajax.onload = function(){
         if (ajax.status == 200){
             var reponse = ajax.response;
             document.getElementById('erreur').innerHTML = reponse;
             console.log(reponse);
             
             if(reponse == ''){
                 document.getElementById('login').innerHTML = 'Vous etes connectés';
                 document.getElementById('disconnect').style.display = 'block';
                 document.getElementById('connect').style.display = 'none';
                 document.getElementById('popin').remove();
             }
             else{
                 document.getElementById('reponseConnexion').innerHTML = 'Problème de connexion';
             }
             console.log(reponse);
         }
         else{
             console.log('Impossible de recuperer la demande ajax');
         }
     };
    
    
}




}, false);