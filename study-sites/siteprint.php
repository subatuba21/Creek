<?php
  $reqpay = file_get_contents("php://input");
  $data = json_decode($reqpay, true);
  $site = $data['site'];
  $urlt = "site" . "$site/text.txt";
  $urlm = "site" . "$site/images";
  try {
    $file_handle = @fopen($urlt, "r");
    if (!$file_handle) {
         throw new Exception('That is not a valid site.');
       }
    else {
      $imnum = 0;
      $text = file_get_contents($urlt);
      $studysite = array('text' => $text, 'images' => array());
      $images = array_diff(scandir($urlm), array('..', '.'));
      foreach ($images as $image) {
        $htmlstr = "<img class='siteims' src='study-sites/$urlm/$image'>";
        array_push($studysite['images'], $htmlstr);
      }
      print json_encode($studysite);
    }
  } catch (Exception $e) {
    print "0";
  }




?>
