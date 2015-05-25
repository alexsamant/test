<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tc_test_api extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		echo "index page";
	}
	
	function detect_topic()
	{
		
		$objJSON = json_decode($this->input->post('htmlString')); //JSON Decode the string received
		$htmlString = str_replace("  ", " ", trim(strip_tags($objJSON->htmlString)));
		
		$maxOccurrenceWordArray = array(); //Array to store the word that occured for maximum time
		
		$forbiddenWords = array("which", "where", "however", "furthermore", "always", "never"); // Array containing list of words that needs to be omitted
		
		$wordsList = array();
		$wordsArray = explode(" ", $htmlString);
		
		foreach ($wordsArray as $key=>$word) {
			
			// Replace the double-space, dot, comma, question mark, exclamation mark with a empty-space.
			$word = str_replace(array('  ', '.', ',', '?', '!'), '', trim($word)); 
			
			//If the length of word is less than five characters OR is a forbidden word; continue
			if (strlen($word) < 5 || in_array($word,$forbiddenWords))
				continue;
			else {				
				$wordsList[] = $word;
			}
			
		}
		
		if (sizeof($wordsList > 0)) {
		
			$wordsList = array_count_values($wordsList);
			arsort($wordsList);
		
			$key = key($wordsList); //Key of the first element in an array
			$value = $wordsList[key($wordsList)];//Value of the first element in an array
			$maxOccurrenceWordArray = array($key => $value); // {'word' => no_of_occurence}
		}
		else
			$maxOccurrenceWordArray = array('words' => 0);
		
		// add the header line to specify that the content type is JSON
		header("Content-type: application/json");
		echo json_encode($maxOccurrenceWordArray);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/index.php */
