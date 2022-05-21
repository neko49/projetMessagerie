<?php

//var_dump($messages);

foreach ($messages as $message):?>
<?=$message->pseudo?> :
<?=$message->messages?> 
[<?=$message->date?>]<br>


<?php
endforeach;
?>