    <div class="container">

        <div class="row mt-4">
            <div class="col-10 offset-1">
                <h2>자유게시판</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-10 offset-1">
                <table class="table table-striped">
                    <tr>
                        <th>글번호</th>
                        <th width="60%">글제목</th>
                        <th>글쓴이</th>
                        <th>작성일</th>
                    </tr>
                    <?php foreach ($list as $b) : ?>
                        <tr>
                            <td> <?= $b->id ?> </td>
                            <td> <a href="/board/view?id=<?= $b->id ?>"><?= $b->title ?></a> </td>
                            <td> <?= $b->writer ?> </td>
                            <td> <?= $b->date ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                
            </div><!-- end of col-12 -->
        </div> <!-- end of row -->
        <?php if(isset($_SESSION['user'])) : ?>
            <div class="row my-2">
                <div class="col-10 offset-1 text-right">
                    <a href="/board/write" class="btn btn-primary">글쓰기</a>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-10 offset-1">
                <nav class="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if($pg->prev): ?>
                            <li class="page-item"><a href="/board?p=<?= $pg->start - 1 ?>" class="page-link">이전</a></li>
                        <?php endif; ?>
                        
                        <?php for($i = $pg->start; $i <= $pg->end; $i++): ?>
                                <li class="page-item <?php $i == $page ? "active" : "" ?>"><a href="/board?p=<?= $i ?>" class="page-link"><?= $i ?></a></li>
                        <?php endfor; ?>
                        <?php if($pg->next): ?>
                            <li class="page-item"><a href="/board?p=<?= $pg->end + 1 ?>" class="page-link">다음</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div><!-- end of container -->
