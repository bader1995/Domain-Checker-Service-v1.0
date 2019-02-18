<?php
	@session_start();
	//Api checker function, returns Unavailable or Available
	function domainAvailable($domain)
	{

		$domain = trim($domain);
		$domain = str_replace("http://", "", $domain);
		$domain = str_replace("https://", "", $domain);
		$url = "https://who.is/whois/".$domain;
		// start cURL
		$ch = curl_init(); 
		// tell cURL what the URL is
		curl_setopt($ch, CURLOPT_URL, $url);
		// tell cURL to follow redirects
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		// tell cURL that you want the data back from that URL
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		// Disable SSL Verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
		// run cURL
		$result = curl_exec($ch); 
		// end the cURL call (this also cleans up memory so it is 
		// important)
		
		$result = str_replace(" ", "", $result);
		
		curl_close($ch);

		if( strpos($result, 'clientTransferProhibited') == false)
		{
			return "YES";
		}else
		{
			return "NO";
		}

	}

?>