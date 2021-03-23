<?php
$ceoURL = "https://api.ceojuice.com/api/Processes/SurveyComments?CustomerNumber=";
$ceoCustNum = "097";
$ceoAPIKey = "dc5919d9-d0fb-44e0-a6d2-d71e8f38e747";
$ceoqty = "10";

$posts = @file_get_contents($ceoURL.$ceoCustNum.'&AuthKey='.$ceoAPIKey.'&qty='.$ceoqty, true);
if ($posts === false) {
    //There is an error opening the file
    echo "failed to poll data";
?>
  <div class="slide">
    <blockquote>
    <span class="leftq quotes">&ldquo;</span>Comment<span class="rightq quotes">&bdquo;</span>
    </blockquote>
    <h2>Name</h2>
    <h6>Title</h6>
  </div>
<?php } else {
    echo $posts;
}?>