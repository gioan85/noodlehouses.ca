<?php
  // Save HTML into body_html tag
  $sts->stop_capture('body_html');
  
  // Prepair for displaying html from STS
  $sts->replace_html();
  $sts->display_html();
?>
