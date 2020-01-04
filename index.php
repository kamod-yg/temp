      <?php
	function getYouTubeVideoID($url){
	$queryString = parse_url($url,PHP_URL_QUERY);
	parse_str($queryString,$params);
	if(isset($params['v']) && strlen($params['v'])>0){
		return $params['v'];
	}
	else{
		return "";
		}
	}
	
$video_url = 'https://www.youtube.com/watch?v=h5Uh58Z8sRI';	
 $api_key = 'AIzaSyAkkiuqQgMxVXJ3wHJQe50_S79Yi-Q9fgE';
 $api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=
 '.getYouTubeVideoID($video_url).'&key='.$api_key;
 // echo $api_url;
 // die;
 $data = json_decode(file_get_contents($api_url));
 // echo $data;jj
 // die;
 echo '<strong>Title:<strong>'.$data->items[0]->snippet->title.'<br/>';
 echo '<strong>Published At:<strong>'.$data->items[0]->snippet->publishedAt.'<br/>';
 echo '<strong>Duration  :<strong>'.$data->items[0]->contentDetails->duration.'<br/>';
 echo '<strong>View Count:<strong>'.$data->items[0]->statistics->viewCount.'<br/>';
	
?>