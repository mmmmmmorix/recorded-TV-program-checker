<?php

namespace MyApp\Exception;

class DuplicateGroupid extends \Exception {
  protected $message = 'そのgroupIDは既に使用されています！';
}
