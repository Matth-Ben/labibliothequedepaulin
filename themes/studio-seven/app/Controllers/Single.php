<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Single extends Controller
{
  public static function post() {
    $id = get_the_ID();

    return [
      'id' => $id,
      'titles' => [
        'title' => get_the_title($id),
        'hn' => 'h1'
      ],
      'image' => Element::image(get_post_thumbnail_id($id), '100vw'),
    ];
  }
}
