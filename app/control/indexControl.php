<?php
namespace app\control;

use core\lib\control;

class indexControl extends control{
    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        echo $this->response(0,['ahb'=>1]);
    }
}