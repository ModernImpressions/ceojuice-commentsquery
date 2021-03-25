<?php
$ceoURL = "https://api.ceojuice.com/api/Processes/SurveyComments?CustomerNumber=";
$ceoCustNum = "097";
$ceoAPIKey = "dc5919d9-d0fb-44e0-a6d2-d71e8f38e747";
$ceoqty = "10";
$slideId = 1;
//$format = new NumberFormatter("en", NumberFormatter::SPELLOUT);

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
    <span>
      <h2>Name</h2> - <h6>Title</h6> 
    </span>
  </div>
<?php } else {
    //Results are recieved from the CEOJuice API
    //Decode JSON
    $data = json_decode($readjson, true);
    //Parse the comment
    foreach ($data as $answerId) {
        $companyId = $answerId["customer"];
        $comment = $answerId['comment'];
        $contact = $answerId["contact"];
        $date = date_create($answerId["responseDate"]);
        //placeholder for any future attempts to process company names
        $companyName = $companyId;
        echo "<div class='item'>";
        echo "<!--TESTIMONIAL ".$slideId."-->";
        echo "<div class='testimonial-slide'>";
        echo "<blockquote class='customer-blockquote'>";
        echo "<span class='leftq quotes'>&ldquo;</span>";
        echo "<p id='comment-text'>".$comment."</p>";
        echo "<span class='rightq quotes'>&bdquo;</span>";
        echo "</blockquote>";
        echo "<span class='contact-citation'>";
        echo "<h2 class='customername testimonial-name'>".$contact."</h2>";
        echo "<h6 class='surveydate date'>".date_format($date, "m/d/Y")."</h6>";
        if ($companyName == null) {
            //return nothing if no company name is available
            echo "<h6 class ='companyname'> - Company Name LLC</h6>"; //for debugging, will comment out after styling is configured.
        } else {
            echo "<h6 class ='companyname'> - ".$companyName."</h6>";
        }
        echo "</span>";
        echo "</div>";
        echo "<!--END OF TESTIMONIAL ".$slideId."-->";
        echo "</div>";
        $slideId++;
    }
}?>
