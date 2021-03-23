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
    <span class="leftq quotes">&ldquo;</span>comment<span class="rightq quotes">&bdquo;</span>
    </blockquote>
    <h2>John Doe</h2>
    <h6>Developer Relations at Woof Studios</h6>
  </div>
<?php } else {
    echo $posts;
}?>