<?php
use Ixudra\Curl\Facades\Curl;

function convertStatus($item)
{
    if ($item == 1) {
        echo 'Hiển thị';
    } else {
        echo 'Không hiển thị';
    }
}

function convertHot($item)
{
    if ($item == 1) {
        echo 'Nổi bật';
    } else {
        echo 'Không nổi bật';
    }
}

function showCategories($data, $parent_id = 0, $char = '')
{
    foreach ($data as $key => $item) {
        if ($item['parent_id'] == $parent_id) {
            echo '<option value="' . $item['id'] . '">';
            echo $char . $item['name'];
            echo '</option>';
            unset($data[$key]);
            showCategories($data, $item['id'], $char . '-- ');
        }
    }
}

function cateParent($data, $parent_id = 0, $char = '')
{
    foreach ($data as $key => $item) {
        if ($item['parent_id'] == $parent_id) {
            echo '<option value="'. $item->id .'" data-badge="'. $item->id .'"> ' . $char . $item->name . '</option>';
            unset($data[$key]);
            cateParent($data, $item['id'], $char . '--- ');
        }
    }
}


function star($star)
{
    if ($star == 5) {
        echo '<i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>';
    } elseif ($star == 4) {
        echo '<i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>';
    } elseif ($star == 3) {
        echo '<i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>';
    } elseif ($star == 2) {
        echo '<i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>';
    } else {
        echo '<i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>';
    }
}

function curl_get_contents($url,$useragent='cURL',$headers=false, $follow_redirects=false,$debug=false) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    if ($headers==true){
        curl_setopt($ch, CURLOPT_HEADER,1);
    }
    if ($headers=='headers only') {
        curl_setopt($ch, CURLOPT_NOBODY ,1);
    }
    if ($follow_redirects==true) {
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    }
    if ($debug==true) {
        $result['contents']=curl_exec($ch);
        $result['info']=curl_getinfo($ch);
    } else {
        $result=curl_exec($ch);
    }
    curl_close($ch);
    return $result;
}