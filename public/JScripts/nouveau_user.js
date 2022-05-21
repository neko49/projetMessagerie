document.addEventListener('DOMContentLoaded', function(){

var nouvelu = document.getElementById('creatUser');
var pseudo;
var passe;
var valider;
var close;

nouvelu.addEventListener('click', showPopin);



function showPopin(){
    //console.log('afficher popin');
    
    var ajax = new XMLHttpRequest();
    //on initialise la requete avec open()
    var url = 'creatUser';
    ajax.open("GET", url, true);
    ajax.send();
    
    ajax.onload = function(){
        if (ajax.status === 200){
            var reponse = ajax.response;
            var newDiv = document.createElement("div");
            newDiv.setAttribute("id", "popin");
            newDiv.classList.add('popin');
            newDiv.innerHTML = reponse;
            document.body.appendChild(newDiv);
            
            initFormCreatUser(newDiv);
           
        }
        else{
             console.log('Impossible de recup');       
         }
        };
        
        
        
}

function closePopin(element){
    
   console.log(element);
   element.remove();
   
} 


function initFormCreatUser(element){
    //console.log('init form user');
    
    pseudo = document.getElementById('pseudo');
    passe = document.getElementById('passe');
    valider = document.getElementById('valider');
    close = document.getElementById('close');
    close.addEventListener('click',function(){closePopin(element);});
    
    valider.addEventListener('click',insertUser);
}

function insertUser(){
    console.log('insert form user');
    console.log(pseudo.value);
    console.log(passe.value);
    var myForm = new FormData();
    myForm.append('pseudo',pseudo.value);
    myForm.append('passe',passe.value);
    
    //On crée un objet XMLHttpRequest
    var ajax = new XMLHttpRequest();
     //On initialise notre requête avec open()
     var url = 'insertUser';//url que vous souhaitez transmettre au serveur web. Ici on demande la page 'ajax'.
    ajax.open("POST", url, true);
    //on envoie la requete
    ajax.send(myForm);
     
     ajax.onload = function(){
         if (ajax.status == 200){
             var reponse = ajax.response;
             document.getElementById('erreur').innerHTML = reponse;
             document.getElementById('formUser').innerHTML = reponse;
             console.log(reponse);
         }
         else{
             console.log('Impossible de recuperer la demande ajax');
         }
     };
    
    
}



}, false);