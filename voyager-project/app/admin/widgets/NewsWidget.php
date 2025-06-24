<?php

namespace App\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\News;


class NewsWidget extends AbstractWidget
{
  protected $config = [];

  public function run()
  {
    $count = News::count();

    return view('voyager::dimmer', array_merge($this->config, [
      'icon' => 'voyager-news',
      'title' => 'Счетчик новостей',
      'text' => "Количество новостей: {$count}",
      'button' => [
        'text' => 'Перейти к списку',
        'link' => '',
      ],
      'image' => 'DB9.png',
    ]));
  }

  public function shouldBeDisplayed()
  {
    //
    return true;
  }
}
