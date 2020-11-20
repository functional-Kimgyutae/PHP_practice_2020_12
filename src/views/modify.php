    <div class="container">
        <div class="row my-4">
            <div class="col-10 offset-1">
                <h2>글 수정하기</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-10 offset-1">
                <form action="/board/modify" method="post">
                <input type="hidden" name="id" value="<?= $b->id ?>"> 
                    <div class="form-group">
                        <label for="title">글 제목</label>
                        <input type="text" id="title" class="form-control" name="title" value="<?= $b->title ?>">
                    </div>
                    <div class="form-group">
                        <label for="content">글 내용</label>
                        <textarea class="form-control" name="content" id="content" rows="10"><?= $b->content ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">글수정</button>
                </form>
            </div> <!-- end of col-12 -->
        </div><!-- end of row -->
    </div> <!-- end of container -->