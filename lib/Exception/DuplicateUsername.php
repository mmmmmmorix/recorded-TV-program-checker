<?php

namespace MyApp\Exception;

class DuplicateUsername extends \Exception {
  protected $message = 'そのusernameは既に使用されています！';
}
