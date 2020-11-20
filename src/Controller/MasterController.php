<?php

namespace Gondr\Controller;

class MasterController
{
    public function render($view_name , $data = [])
    {
        extract($data); // 배열의 키값을 기반으로 변수를 만든다.


        require_once(__VIEWS . "/layout/header.php");
        require_once(__VIEWS . "/{$view_name}.php");
        require_once(__VIEWS . "/layout/footer.php");
    }
}
