<?php
@session_start();
include 'controller/domain.php';
include 'controller/bad_words.php';
include 'controller/snapshot.php';

	function get_snapchot($link, $date)
	{

		$_SESSION['spam_score'] = 0;

		//Clean the URL

		$link = str_replace("https://", "", $link);
		$link = str_replace("http://", "", $link);
		$link = str_replace("/", "", $link);
		$date = str_replace("-", "", $date);

		//Add domain to database

			$url = "http://web.archive.org/web/$date/$link";
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
            $html = curl_exec($ch); 
            // end the cURL call (this also cleans up memory so it is 
            // important)
            curl_close($ch);

			//Getting the spam score

			$bad_words = get_words();
			
			foreach($bad_words as $word)
			{
				$sx = str_replace(" ", "", $word);
				
				// Searching through the badwords
				
				if(@strpos($html, $sx))
				{
					$_SESSION['spam_score'] = $_SESSION['spam_score'] + substr_count($html, $sx);
				}

			}

			// Save the snapshot to the database

			$link = mysqli_escape_string($GLOBALS['connection'], $link);			

			add_snapshot_db($link, $date);

	}

?>