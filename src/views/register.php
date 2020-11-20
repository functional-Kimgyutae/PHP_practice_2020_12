    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>회원가입</h2>
            </div>
        </div>
        <div class="row mt-4 offset-1">
            <div class="col-12">
                <form action="/user/register" method="post">
                    <div class="form-group">
                        <label for="userId">아이디</label>
                        <input type="text" class="form-control" id="userId" name="id">
                    </div>
                    <div class="form-group">
                        <label for="name">이름</label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="password">비밀번호</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="passwordc">비밀번호 확인</label>
                        <input type="password" class="form-control" id="passwordc" name="passwordc">
                    </div>
                    <button type="submit" class="btn btn-primary">회원가입</button>
                </form>
            </div>
        </div>


    </div> <!-- end of container -->
