<?php

namespace PanduanVIP\WebExtractor;

use PanduanVIP\Helpers\Please;

class YahooImage{

	public static function get($keyword, $proxy='')
	{
        $keyword = str_replace(' ', '+', $keyword);
        $url = "https://images.search.yahoo.com/search/images?p=$keyword&imgsz=large&fr2=piv-web&fr=yfp-t";

		$html = Please::getWebContent($url, $proxy);

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

}