<?php

namespace MyApp\Exception;

class EmptyPost extends \Exception {
  protected $message = '空の項目があります！';
}
