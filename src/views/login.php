    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>로그인</h2>
            </div>
        </div>
        <div class="row mt-4 offset-1">
            <div class="col-12">
                <form action="/user/login" method="post">
                    <div class="form-group">
                        <label for="userId">아이디</label>
                        <input type="text" class="form-control" id="userId" name="id">
                    </div>
                    <div class="form-group">
                        <label for="password">비밀번호</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">로그인</button>
                </form>
            </div>
        </div>
    </div> <!-- end of container -->