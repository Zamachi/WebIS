<?php 

namespace app\core;

use mysqli;

class DBConnection 
{
    public function conn()
    {
        return new mysqli("localhost","root","","webis");
    }
}


