<?php

function widont($str = '')
{
  $str = rtrim($str);
  $space = strrpos($str, ' ');
  if ($space !== false)
  {
    $str = substr($str, 0, $space).'&nbsp'.substr($str, $space + 1); //;
  }
  return $str;
}


function my_acf_load_value( $value, $post_id, $field )
{
    // run widont on value
    $value = widont($value);
    return $value;
}


function my_acf_load_value_two( $value, $post_id, $field )
{
    // run widont on value
    var_dump($value);
    $value = widont($value);
    return $value;

}


// acf/load_value - filter for every value load
add_filter('acf/load_value/type=text', 'App\my_acf_load_value', 10, 3);
add_filter('acf/load_value/type=textarea', 'App\my_acf_load_value', 10, 3);
add_filter('acf/load_value/type=wysiwyg', 'App\my_acf_load_value_two', 10, 3);