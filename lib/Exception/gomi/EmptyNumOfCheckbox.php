<?php

namespace MyApp\Exception;

class EmptyNumOfCheckbox extends \Exception {
  protected $message = 'Checkboxの数を選択してください！';
}
