<?php

namespace App\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Category;

class CategoriesWidget extends AbstractWidget
{
  protected $config = [];

  public function run()
  {
    $count = Category::count();

    return view('voyager::dimmer', array_merge(
      $this->config,
      [
        'icon' => 'voyager-news',
        'title' => 'Счетчик категорий',
        'text' => "Количество категорий: {$count}",
        'button' => [
          'text' => 'Перейти к списку',
          'link' => '',
        ],
        'image' => 'DB9.png',
      ]
    ));
  }

  public function shouldBeDisplayed()
  {
    return true;
  }
}
