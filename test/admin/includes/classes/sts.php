<?
class sts {
  var $sts_block, $template,
	  $template_file;
  
  function sts (){
  }
  
  function start_capture () {
	  ob_start();
  }
  
  function stop_capture ($block_name='') {
	$block = ob_get_contents(); // Get content of buffer
    ob_end_clean(); // Clear out the capture buffer
	
	if ($block_name=='') return $block; // Not need to continue if we don't want to save the buffer

	$this->template[$block_name] = $block;
	return $block;
  }
  
  function restart_capture ($block_name='') {
    // Capture buffer, save it and start a new capture
    $block = $this->stop_capture($block_name);
	  $this->start_capture();
		return $block;
  }
  
  function read_template_file ($filename){
    // Purpose: Open Template file and read it
    $template_file = DIR_WS_TEMPLATES . $filename;
	$this->$template_file = $template_file;

	// Generate an error if the template file does not exist and return 'false'.
    if (! file_exists($template_file)) {
      print 'Error : Template file does not exist: ['.$template_file.']';
	  return false;
    }
	// We use templates and the template file exists
	// Capture the template, this way we can use php code inside templates

	$this->start_capture (); // Start capture to buffer
	require $template_file; // Includes the template, this way php code can be used in templates
	$this->stop_capture ('template_html');
	
	// Load custom html template located under /includes/sts_custom_html/
	$files = dirList("includes/sts_custom_html/");
  
	for($i=0; $i<count($files); $i++){
		$block_name = str_replace('.php' , '' , $files[$i]);
		
		$this->start_capture ();
		require "includes/sts_custom_html/" . $files[$i]; // Includes the template, this way php code can be used in templates
		$this->stop_capture ($block_name);
	}
	
	return true;
  } // End read_template_file
  
  function replace_html(){
  // Replace variables in template with real content
  	foreach ($this->template as $key=>$value) {
      $this->template['template_html'] = str_replace('$' . $key , $value, $this->template['template_html']);
    }
  }
  
  function display_html(){
  	echo $this->template['template_html'];
  }
  
  function set_title($title =''){
    if(TITLE_ALL != 'TITLE_ALL')
		$this->template['page_title'] = ' - ' . TITLE_ALL;
	
  	if(!empty($title))
		$this->template['page_title'] = $title . $this->template['page_title'];
  }
  
  function set_description($desc =''){
    if(DESCRIPTION_ALL != 'DESCRIPTION_ALL')
		$this->template['page_description'] = ' - ' . DESCRIPTION_ALL;
	
  	if(!empty($desc))
		$this->template['page_description'] = $desc . $this->template['page_description'];
  }
  
  function set_keywords($keywords =''){
    if(KEYWORDS_ALL != 'KEYWORDS_ALL')
		$this->template['page_keywords'] = ', ' . KEYWORDS_ALL;
	
  	if(!empty($keywords))
		$this->template['page_keywords'] = $keywords . $this->template['page_keywords'];
  }
}
?>