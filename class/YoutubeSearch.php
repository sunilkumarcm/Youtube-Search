<?php

/**
 * 
 */
class YoutubeSearch
{
	public function search()
	{
		if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
		  throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
		}

		require_once __DIR__ . '/vendor/autoload.php';

		if($_POST['q'] != '') {

		  $DEVELOPER_KEY = 'AIzaSyAOmKJha6rI75HAkx2scJ0LMuzEm7UH9CE';

		  $client = new Google_Client();
		  $client->setDeveloperKey($DEVELOPER_KEY);
		  
		  $youtube = new Google_Service_YouTube($client);
		  	$searchResponse = $youtube->search->listSearch('id,snippet', array(
		      'q' => $_POST['q'],
		      'maxResults' => 25,
		    ));


		    $count = 0;
		    foreach ($searchResponse['items'] as $searchResult) {
		        $count += 1;      
		        $recordData['id'] = $count;
		        $recordData['title'] = $searchResult['snippet']['title'];
		        $recordData['thumbnail'] = '<a href="http://youtube.com/watch?v='.$searchResult[id][videoId].'" title="'.$searchResult['snippet']['title'].'" target="_blank"><img src="'.$searchResult['snippet']['thumbnails']['default']['url'].'" alt="'.$searchResult['snippet']['title'].'" /></a>';
		        $recordData['uploader'] = $searchResult['snippet']['channelTitle'];
		        $recordData['date'] = $searchResult['snippet']['publishedAt'];
		        $result_data[] = $recordData;
		    }

			return $result_data;

		}
		else{
			return 'No data found';
		}
	}
}