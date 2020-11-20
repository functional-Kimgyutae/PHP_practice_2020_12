<?php
    
namespace Gondr\Controller;

use Gondr\App\DB;
use Gondr\Library\Pagination;
use Gondr\Library\Lib;


class BoardController extends MasterController
{
    public function boardPage()
    {
        $page = 1;

        if(isset($_GET['p']) && is_numeric($_GET['p'])){
            $page = $_GET['p'] * 1;
        }

        $start = ($page - 1) * 10;
        $sql = "SELECT * FROM boards ORDER BY id DESC LIMIT {$start}, 10";
        $db = new DB();
        $list = $db->fetchAll($sql);

        $cnt = $db->fetch("SELECT count(*) AS cnt FROM boards")->cnt;
        $pg = new Pagination($cnt, $page);
        
        $this->render("board",['list'=>$list , 'pg'=>$pg]);
    }

    public function viewPage()
    {
        if (!isset($_GET['id'])) {
            lib::msgAndBack("올바른 접근이 아닙니다.");
            exit;
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM boards WHERE id = ?";
        $db = new DB();
        $thing = $db->fetch($sql, [$id]);
        $this->render("view",['thing'=>$thing]);
    }
    public function writePage()
    {
        if(!isset($_SESSION['user'])){
            Lib::msgAndGo("권한이 없습니다. 로그인 후 시도하세요.", "/user/login" );
            exit();
        }
        $this->render("write");

    }
    public function writePageProcess()
    {
        if(!isset($_SESSION['user'])){
            Lib::msgAndGo("권한이 없습니다. 로그인 후 시도하세요.", "/login.php" );
            exit();
        }
        $title = $_POST['title'];
        $content = $_POST['content'];
        $writer = $_SESSION['user']->id;
        if(trim($title) === "" || trim($content) === ""){
            Lib::msgAndBack("필수값이 누락되어 있습니다.");
            exit();
        }
    
        $sql = "INSERT INTO boards (title,content, writer,date,image) VALUES (?,?,?,NOW(),?)";
    
        $img = $_FILES['image'];
        $db = new DB();  
        $result = $db->execute($sql , [$title , $content, $writer,$img['name']]);
    
        if($result){
            $id = $db->lastId();
            $target = __ROOT . "/upload/{$id}_{$img['name']}";
            move_uploaded_file($img['tmp_name'],$target);
            Lib::msgAndGo("성공적으로 글을 올렸습니다." , "/board");
        }else {
            Lib::msgAndBack("데이터 베이스 연결실패");
        }
    }

    public function modifyPage()
    {
        if (!isset($_GET['id'])) {
            lib::msgAndGo("잘못된 접근입니다.", "/");
            exit;
        }
        $id = $_GET['id'];
        $db = new DB();
        
        $b = $db->fetch("SELECT * FROM boards WHERE id = ?", [$id]);
        
        if (!isset($_SESSION["user"]) && $_SESSION['user']->id !== $b->writer) {
            lib::msgAndBack("권한이 없습니다.");
            exit;
        }
        $this->render("modify",['b'=>$b]);
    }
    public function modifyPageProcess()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = $_POST['id'];
        $db = new DB();
        $b = $db->fetch("SELECT * FROM boards WHERE id = ?", [$id]);
        if(!$b  ||!isset($_SESSION['user']) || $_SESSION['user']->id != $b->writer){
            Lib::msgAndGo("권한이 없습니다.", "/board");
            exit();
        }

        if(trim($title) === "" || trim($content) === ""){
            Lib::msgAndBack("필수값이 누락되어 있습니다.");
            exit();
        }

        $sql = "UPDATE boards SET title=?,content=? WHERE id = ?";

        $result = $db->execute($sql , [$title , $content, $id]);
        if($result){
            Lib::msgAndGo("성공적으로 글을 수정하였습니다." , "/board/view?id={$id}");
        }else {
            Lib::msgAndBack("데이터 베이스 연결실패");
        }
    }
    public function deletePage()
    {
        if(!isset($_GET['id'])) {
            lib::msgAndGo("잘못된 접근입니다." ,"/");
            exit;
        }
    
        $db = new DB();
        $id = $_GET['id'];
        $sql = "SELECT * FROM boards WHERE id = ?";
        $b = $db->fetch($sql,[$id]);
    
        if(!isset($_SESSION['user']) && $_SESSION['user']->id !== $b->writer){
            Lib::msgAndGo("권한이 없습니다. 로그인 후 시도하세요.", "/user/login" );
            exit();
        }
    
        $sql = "DELETE FROM boards WHERE id = ?";
    
        $result = $db->execute($sql , [$id]);
    
        if($result) {
            lib::msgAndGo("삭제되었습니다." ,"/board");
            exit;
        }else {
            lib::msgAndBack("삭제 중 오류 발생. 잠시 후 다시 시도하세요");
        }
    
    }

}

