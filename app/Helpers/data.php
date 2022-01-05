<?php
function milti_level($data, $post_cat_id = 0, $level = 0)
{
    $result = [];
    foreach($data as $item){
        if($item['post_cat_id'] == $post_cat_id){
            $item['level'] = $level;
            $result[] = $item;
            $child = milti_level($data, $item['id'], $level + 1);
            $result = array_merge($result, $child);
        }
    }
    return $result;
}

function milti_level_product($list_product, $product_cat_id = 0, $level = 0)
{
    $array = [];
    foreach($list_product as $product){
        if($product['product_cat_id'] == $product_cat_id){
            $product['level'] = $level;
            $array[] = $product;
            $child = milti_level_product($list_product, $product['id'], $level + 1);
            $array = array_merge($array, $child);
        }
    }
    return $array;
}

function milti_level_permisson($data, $parent_id = 0, $level = 0)
{
    $result = [];
    foreach($data as $item){
        if($item['parent_id'] == $parent_id){
            $item['level'] = $level;
            $result[] = $item;
            $child = milti_level_permisson($data, $item['id'], $level + 1);
            $result = array_merge($result, $child);
        }
    }
    return $result;
}
?>