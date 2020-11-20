<!DOCTYPE html>
<html lang="ko">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
</head>
</head>
<body>
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">기능반</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">홈</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/board">게시판</a>
                    </li>
                </ul>
                <div class="menu">
                    <?php if(isset($_SESSION['user'])) :?>
                        <button class ="btn btn-info mr-1"><?= $_SESSION['user']->name ?></button>
                        <a href="/user/logout" class="btn btn-outline-success">로그아웃</a>
                    <?php else :?>
                    <a href="/user/login" class="btn btn-outline-primary mr-1">로그인</a>
                    <a href="/user/register" class="btn btn-outline-success">회원가입</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</div>
</div>

<!-- php unset($_SESSION['user']); .과 로그아웃 되게 함 -->