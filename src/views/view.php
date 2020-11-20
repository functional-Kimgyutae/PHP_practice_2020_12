
    <div class="container">
        <div class="row my-4">
            <div class="col-10 offset-1 mb-3">
                <div class="info">
                    <div class="tags mr-3">
                        <span class="tag bg-dark text-white">글쓴이</span>
                        <span class="tag bg-primary text-white"><?= $thing->writer ?></span>
                    </div>
                    <div class="tags">
                        <span class="tag bg-dark text-white">작성일</span>
                        <span class="tag bg-info text-white"><?= $thing->date ?></span>
                    </div>
                </div>
            </div>

            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h4><?= htmlentities($thing->title) ?></h4>
                    </div>
                    <?php if($thing->image != "") : 
                        echo $thing->image;
                        ?>
                    <img src= "/upload/<?= $thing->id . "_" .$thing->image ?>" class="card-img-top" alt="첨부이미지">
                    <?php endif; ?>
                    <div class="card-body">
                        <?= nl2br(htmlentities($thing->content)) ?>
                    </div>
                    <div class="card-footer text-right">
                        <a href="/board" class="btn btn-primary">목록</a>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']->id == $thing->writer) : ?>
                            <a href="/board/modify?id=<?= $thing->id ?>" class="btn btn-warning">수정</a>
                            <a href="/board/delete?id=<?= $thing->id ?>" class="btn btn-danger">삭제</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end of container -->
