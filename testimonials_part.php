<?php

$posts = file_get_contents('https://api.ceojuice.com/api/Processes/SurveyComments?CustomerNumber=097&AuthKey=dc5919d9-d0fb-44e0-a6d2-d71e8f38e747&qty=10');

// do something w/ $posts here....

echo $posts;

?>