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
        $data = ['test'=>1,'data'=>2];
        $this->show('test', $data);
    }
}