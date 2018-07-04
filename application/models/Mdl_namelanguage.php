<?php
class Mdl_namelanguage extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function translate_name($engname,$motherlang)
	{
		$apiKey = 'AIzaSyC9pDMijfgvhSnCHSq4ypNuzo-BQQwYXRw';
	    $text = $engname;
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=en&target=' . $motherlang;
	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    echo $responseDecoded['data']['translations'][0]['translatedText'];
	}

	public function namelanguage_reg($data)
	{
		if($this->db->insert('namelanguage',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
?>