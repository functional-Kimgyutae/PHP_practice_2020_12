
    <div class="container">
        <div class="row my-4">
            <div class="col-10 offset-1">
                <h2>글쓰기</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-10 offset-1">
                <form action="/board/write" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">글 제목</label>
                        <input type="text" id="title" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">글 내용</label>
                        <textarea class="form-control" name="content" id="content" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">이미지</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">글쓰기</button>
                </form>

            </div> <!-- end of col-12 -->
        </div><!-- end of row -->
    </div> <!-- end of container -->
