<?php 
    namespace Gondr\App;

    class Route
    {
        private static $actions = [];


        public static function __callStatic($name , $args)
        {
            $req = strtolower($_SERVER['REQUEST_METHOD']);
            // 요청한 메서드르소문자로 변경한다.
            if($name == $req){
                self::$actions[] = $args;
            }
            // echo $name . "</br>"; 없는 함수명
            // var_dump($args); 파라메터 값
        }

        public static function init() 
        {
            // 현재 요청된 uri에 맞는 요청이 있는지를 검사한다.
            $path = explode("?",$_SERVER['REQUEST_URI']);
            $path = $path[0];
            foreach (self::$actions as $a) {
                if($a[0] === $path){
                    $action = explode("@" , $a[1]);
                    // 컨트롤러 이름은 acrtion 의 0번째에 들어갈 것이고
                    // 메서드의 이름은action의 1번째에 들어갈 것이다.
                    $controllerName = 'Gondr\\Controller\\' . $action[0];
                    $c = new $controllerName();
                    $c->{$action[1]}();
                    return;
                }
            }
            echo "없는 주소입니다.";
        }
    }