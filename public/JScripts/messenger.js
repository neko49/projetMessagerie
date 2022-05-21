document.addEventListener('DOMContentLoaded', function(){
var envoyer = document.getElementById('button');
var input = document.getElementById('message');
var messenger = document.getElementById('messenger');
var listEmojis = document.getElementsByClassName('emoji');
var writing = document.getElementById('writing');


envoyer.addEventListener('click', getMessage);
document.addEventListener('keypress', testTouche);

setInterval(getBddToMessenger, 4000);

for (var i = 0; i< listEmojis.length; i++) {
    listEmojis[i].addEventListener('click', addEmoji);
}
 


function addEmoji(){
    console.log(this.innerHTML);
    input.value += this.innerHTML;
    
}

function testTouche(){
    writing.style.opacity ='1';
    if(event.key == 'Enter'){
        getMessage();
    }
    
}

function getMessage(){
    console.log(input.value);
    
    ajaxPutMessageInBdd();
    
    input.value = null;
    witring.style.opacity ='0';
}


function getBddToMessenger(){
    
     //On crée un objet XMLHttpRequest
    var ajax = new XMLHttpRequest();
     //On initialise notre requête avec open()
    var url = 'getMessage';//url que vous souhaitez transmettre au serveur web. Ici on demande la page 'ajax'.
    ajax.open("GET", url, true);
    ajax.send();
    
    ajax.onload = function(){
         if (ajax.status == 200){
             var reponse = ajax.response;
             messenger.innerHTML = reponse;
             //document.getElementById('erreur').innerHTML = reponse;
             //console.log(reponse);
         } 
         else{
             console.log('Impossible de récupérer la demande Ajax !');
         }
       };
    
}



function ajaxPutMessageInBdd(){
    console.log('test ajax');
    
    var myForm = new FormData();
    myForm.append('message',input.value);
    //myForm.append('idMembre',1);
    
    //On crée un objet XMLHttpRequest
    var ajax = new XMLHttpRequest();
     //On initialise notre requête avec open()
    var url = 'putMessage';//url que vous souhaitez transmettre au serveur web. Ici on demande la page 'ajax'.
    ajax.open("POST", url, true);
    ajax.send(myForm);
    
    ajax.onload = function(){
         if (ajax.status == 200){
             var reponse = ajax.response;
             document.getElementById('erreur').innerHTML = reponse;
             console.log(reponse);
         } 
         else{
             console.log('Impossible de récupérer la demande Ajax !');
         }
       };
    
}

}, false);