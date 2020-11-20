<?php
    
namespace Gondr\Controller;

use Gondr\App\DB;
use Gondr\Library\Lib;

class UserController extends MainController 
{
    
    public function registerPage()
    {
        $this->render("register");
    }
    public function registerPageProcess()
    {

        $con = new DB();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $passwordc = $_POST['passwordc'];
    
        if(trim($id) == "" || trim($name) == "" || trim($password) == "" || trim($passwordc) == "") {
            Lib::msgAndBack("필수값을 입력하세요.");
            exit();
        }
    
        if($password !== $passwordc){
            Lib::msgAndBack("비밀번호와 확인이 일치하지 않습니다.");
            exit();
        }
    
        $db = new DB();
        $user = $db->fetch("SELECT * FROM users WHERE id = ?" , [$id]);
    
        if($user) { //이미 해당 아이디를 사용하는 유저가 존재한다.
            Lib::msgAndBack("해당 아이디는 이미 사용중입니다.");
            exit();
        }
    
        $sql = "INSERT INTO users (id  , name,password , profile) VALUES(?,?,PASSWORD(?),?)";
        $result = $db->execute($sql , [$id , $name, $password , ""]);
        if($result){
            Lib::msgAndGo("성공적을 회원가입 되었습니다." , "/");
        }else {
            Lib::msgAndBack("데이터 베이스 입력실패");
        }
    }
    public function loginPage()
    {
        $this->render("login");
    }
    public function loginPageProcess()
    {
        $con = new DB();
        $id = $_POST['id'];
        $password = $_POST['password'];
    
        if(trim($id) == "" || trim($password) == "") {
            Lib::msgAndBack("필수값이 비였습니다.");
            exit();
        }
    
        $sql = "SELECT * FROM users WHERE id = ? AND password = PASSWORD(?)";
        $db = new DB();
        $result = $db->fetch($sql,[$id , $password]);
        if($result){
            $_SESSION['user'] = $result;
            Lib::msgAndGo("성공적을 로그인 되었습니다." , "/");
        }else {
            Lib::msgAndBack("아이디 또는 비밀번호가 올바르지 않습니다.");
        }    
    }
    public function logoutPage()
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            Lib::msgAndGo("성공적을 로그아웃 되었습니다." , "/");
        }else {
            Lib::msgAndGo("불법적인 접근입니다 다시 돌아갑니다.", "/" );
        }
    }
}