<?php

namespace MyApp\Exception;

class UnmatchUsernameOrPassword extends \Exception {
  protected $message = 'UsernameまたはPasswordが違います！';
}
