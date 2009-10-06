<?php

// HTML formatter

// step1: new Formatter();
// step2: addContent($placeholder, $content)
// step3: call finalize(), output the formatted html

class Formatter{
	var $pieces = array();	
	var $r_pieces = array();
	var $format_str;
	var $in_order;
	var $final_html; 	
	
	/**
	 * initialize this class
	 * @param $format_str
	 * @return 
	 */
	function Formatter($format_str)
	{
		$this->format_str = trim($format_str); 
		$final_html ='';
	}
	
	/**
	 * add content 
	 * @param content array
	 */
	function addContent($placeholder,$content)
	{
		$this->r_pieces['#'.$placeholder.'#'] = $content;
	}
	
	/**
	 * clear cache content
	 */
	function clearContent(){
		$r_pieces = array();
	}
	
	/**
	 * output the formatted string
	 */
	function flush(){
		$html_output = $this->format_str;
		
		if (count($this->r_pieces) == 0 )
			return "<h1>Add Content First!</h1>";
						
		$placeholder =array_keys($this->r_pieces);
		foreach ($placeholder as $token){
			$str_pos = strpos($html_output,$token);
			//echo $str_pos;
			if ($str_pos > 0){
				$html_output = str_replace($token,$this->r_pieces[$token],$html_output);	
			} 
			//echo $html_output;
		}
		$this->clearContent();
		$this->final_html.= $html_output;
	}
	
	function finalize(){
		return $this->final_html;
	}
}
?>