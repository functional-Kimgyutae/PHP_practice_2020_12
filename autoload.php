<?php 
    function myLoader($className){
            $prefix = "Gondr\\";
            $preLen = strlen($prefix);

            if(strncmp($className, $prefix, $preLen) == 0){
                $realName = substr($className, $preLen);
                $realName = str_replace("\\" , '/',$realName);
                require_once __SRC . "/{$realName}.php";
            }
        // echo "시작 -- 여기는 오토로더 안입니다. </br>";
        // echo $className . "</br>";
        // echo "종료 -- 여기는 오토로더 안입니다.</br>";
    }

    spl_autoload_register("myLoader");

