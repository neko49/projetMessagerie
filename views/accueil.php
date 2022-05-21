<section class='header'>
    <nav>
        <ul id="connect">
            <li id='connexion'>Connexion</li>
            <li id="creatUser">Créer compte</li>
        </ul>
        <ul id="disconnect">
            <li id='deconnexion'>Deconnexion</li>
        </ul>
    </nav>
</section>
<h1> Messenger </h1>
<div class="zoneMessage"> 
      
  <div id="messenger">
  
  </div>
<div id="writing"> Un Message arrive...</div>
</div>
  
  <input id="message" type="text" name="message" value=""/>
  <input type="hidden" name="id" value="<?=$messenger->idMessage?>"/>
  <div id="button">Envoyer</div>
  <div id="emojis">
  <span class='emoji'>&#128512</span>
  <span class='emoji'>&#128514</span>
  <span class='emoji'>&#128521</span>
  <span class='emoji'>&#128517</span>
  <span class='emoji'>&#128540</span>
  <span class='emoji'>&#128545</span>
  <span class='emoji'>&#128556</span>
  <span class='emoji'>&#128567</span></div>
  <div id="membresConnect" style="border:1px solid #666; padding:10px; width:300px">
      <h3>Ils sont la !</h3>
  </div>
  
  <div id="erreur"></div>