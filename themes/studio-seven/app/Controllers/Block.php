<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Block extends Controller {
  // public static function example($data) {
  //     return [
  //         'title' => Element::title($data),
  //         'image' => Element::image($data['image'], '1920px')
  //     ];
  // }

  public static function flexibleContent($data) {
    $fields = get_field($data['_blocks']);
    $index = 0;
    $components = [];

    foreach($fields as $block) {
      $component_function = toCamelCase($block['acf_fc_layout']);
      $components[$block['acf_fc_layout'] . '_' . $index] = Component::$component_function($block);
      $components[$block['acf_fc_layout'] . '_' . $index]['name'] = $block['acf_fc_layout'];
      $index++;
    }

    return [
      'components' => $components
    ];
  }

  public static function categories($data) {
    foreach ($data['cat-categories'] as $value) {
      $category[] = [
        'title' => get_cat_name($value),
        'image' => get_field('image', 'category_'.$value),
        'link' => get_category_link($value)
      ];
    }

    return [
      'titles' => Element::title($data),
      'categories' => $category
    ];
  }

  public static function cover($data) {
    return [
      'titles' => Element::title($data),
      'button' => Element::button($data['button']),
      'content' => $data['c-content'],
      'image' => Element::image($data['c-image'], '1920px'),
    ];
  }

  public static function lastArticles($data) {
    $posts = App::getPosts(2, 'post', NULL);

    return [
      'titles' => Element::title($data),
      'posts' => $posts
    ];
  }

  public static function list($data) {
    for ($i = 0; $i < $data['l-repeater'] ; $i++) {
      $elements = [];

      for ($j = 0; $j < $data['l-repeater_' . $i . '_elements'] ; $j++) {
        $elements[] = $data['l-repeater_' . $i . '_elements_' . $j . '_title'];
      }

      $list[] = [
        'subtitle' => $data['l-repeater_' . $i . '_suptitle'],
        'title' => $data['l-repeater_' . $i . '_title'],
        'button' => Element::button($data['l-repeater_' . $i . '_button']),
        'elements' => $elements
      ];
    }

    return [
      'titles' => Element::title($data),
      'list' => $list
    ];
  }

  // generated function here
}
