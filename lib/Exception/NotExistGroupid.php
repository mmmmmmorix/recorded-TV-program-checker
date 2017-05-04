<?php

namespace MyApp\Exception;

class NotExistGroupid extends \Exception {
  protected $message = '存在しないgroupIDです！';
}
