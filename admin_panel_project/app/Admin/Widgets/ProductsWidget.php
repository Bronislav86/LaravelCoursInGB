<?php

namespace App\Admin\Widgets;

use App\Models\Products;
use Arrilot\Widgets\AbstractWidget;

class ProductsWidget extends AbstractWidget
{
  protected $config = [];

  public function run()
  {
    $count = Products::count();

    return view('voyager::dimmer', array_merge($this->config, [
      'icon' => 'voyager-tv',
      'title' => 'Счетчик продуктов',
      'text' => "Количество продуктов: {$count}",
      'button' => [
        'text' => 'Перейти к списку продуктов',
        'link' => '',
      ],
      'image' => "storage/products.png",
    ]));
  }

  public function shouldBeDisplayed()
  {
    return true;
  }
}
