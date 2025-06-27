<?php

namespace App\Admin\Widgets;

use App\Admin\Widgets\AbstractWidget;
use App\Models\Product;

class ProductsWidget extends AbstractWidget
{
  protected $config = [];

  public function run()
  {
    $count = Product::count();

    return view('voyager::dimmer', array_merge(
      $this->config,
      [
        'icon' => 'voyager-news',
        'title' => 'Счетчик продуктов',
        'text' => "Количество продуктов: {$count}",
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
