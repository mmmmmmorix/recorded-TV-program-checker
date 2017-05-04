<?php

namespace MyApp\Exception;

class InvalidGroupid extends \Exception {
  protected $message = 'groupIDは半角英数字で入力してください！';
}
