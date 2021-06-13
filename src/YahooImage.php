<?php

namespace PanduanVIP\WebExtractor;

class YahooImage{

	public static function get($keyword, $proxy='')
	{
		$html = self::curl($keyword, $proxy);

        $dom = new \DOMDocument('1.0', 'UTF-8');
		@$dom->loadHTML($html);
		$xpath = new \DOMXPath($dom);

        $results = [];

		$blocks = $xpath->query('//ul[@id="sres"]/li');
		if(count($blocks)==0){
			return json_encode($results);
		}
		
		foreach ($blocks as $block) {
			$info = json_decode($block->getAttribute('data'));
			
            // get image

            $image = $info->iurl ?? '';
            
			if(empty($image)) {
				$image = $info->oi ?? '';
			}

            if(empty($image)) {
                continue;
            }

            // get alt

			$alt = $info->alt ?? '';
			
            if (empty($alt)) {
				$alt = $info->altTitle ?? '';
			} 
            
            if (empty($alt)) {
				$alt = $info->tit ?? '';
			}

			// get thumbnail

			$thumbnail = $info->ith ?? '';
			if(empty($image)) {
				$thumbnail = $info->turl ?? '';
			}

			$thumbnail = str_replace('/th?id=', '/th/id/', $thumbnail);
			$thumbnail = explode('&', $thumbnail);
			$thumbnail = array_shift($thumbnail).'?w=230';
						
			// get source

			$source = $info->rurl ?? '';
			if(empty($source)) {
				$source = $info->aurl ?? '';
            }

			if(empty($source)){
				$source = $info->trurl ?? '';
			}
			
            $results[] = array('alt' => $alt, 'image' => $image, 'thumbnail' => $thumbnail, 'source' => $source);
			
		}

		return json_encode($results);
    }

	private static function curl($keyword, $proxy='')
	{
		if (!function_exists('curl_version')) {
			die('cURL extension is disabled on your server!');
		}

		$keyword = str_replace(' ', '+', $keyword);
		$url = "https://images.search.yahoo.com/search/images?p=sepatu+roda&imgsz=large&fr2=piv-web&fr=yfp-t";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);	
		if(isset($_SERVER['HTTP_USER_AGENT'])){
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		}
		if (isset($_SERVER['HTTP_REFERER'])) {
			curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_REFERER']);
		}
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		if (!empty($proxy)) {
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
		}
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

}