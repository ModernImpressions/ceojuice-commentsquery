<?php
$ceoURL = "https://api.ceojuice.com/api/Processes/SurveyComments?CustomerNumber=";
$ceoCustNum = "097";
$ceoAPIKey = "dc5919d9-d0fb-44e0-a6d2-d71e8f38e747";
$ceoqty = "10";
$slideId = 1;
$format = new NumberFormatter("en", NumberFormatter::SPELLOUT);

$readjson = @file_get_contents($ceoURL.$ceoCustNum.'&AuthKey='.$ceoAPIKey.'&qty='.$ceoqty, true);
if ($readjson === false) {
    //There is an error opening the file
    echo "failed to poll data";
    ?>
  <div class="slide">
    <blockquote>
    <span class="leftq quotes">&ldquo;</span>
    Comment
    <span class="rightq quotes">&bdquo;</span>
    </blockquote>
    <h2>Name</h2>
    <h6>Title</h6>
  </div>
<?php } else {
    //Results are recieved from the CEOJuice API
    //Decode JSON
    $data = json_decode($readjson, true);
    //Parse the comment
    foreach ($data as $answerId) {
        echo "<!--TESTIMONIAL ".$slideId."-->";
        echo "<div class=item ".$format->format($slideId)." testimonial-slide".">";
        echo "<div class='shadow-effect'>";
        echo "<blockquote>";
        echo "<span class='leftq quotes'>&ldquo;</span>";
        echo $answerId['comment'];
        echo "<span class='rightq quotes'>&bdquo;</span>";
        echo "</blockquote>";
        echo "<h2 class='customername testimonial-name'>".$answerId["contact"]."</h2>";
        echo "</div>";
        echo "</div>";
        echo "<!--END OF TESTIMONIAL ".$slideId."-->";
        $slideId++;
    }
}?>
