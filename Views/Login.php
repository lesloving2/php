<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
<section class="site-section">
    <div class="container">
        <div>
            <h2 class="mb-4">Đăng nhập vào trang ADMIN</h2>
            <form action="/php/Login/checklogin" class="p-4 border rounded" method="post">

                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Tài khoản</label>
                        <input type="text" id="name" class="form-control" placeholder="Tên tài khoản" name="name">
                    </div>
                </div>
                <div class="row form-group mb-4">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password" name="pass">
                        <input type="hidden" id="hide" class="form-control" placeholder="Password">
                        <div style="color:red" id="err"></div>
                    </div>
                </div>
                <div class=" row form-group mb-4">
                    <?Php if (!empty($_GET['msg'])) {
                        $msg = unserialize(urldecode($_GET['msg']));
                        foreach ($msg as $key => $value) {
                            echo '<span style="color:blue;font-weight:bold">' . $value . '</span>';
                        }
                    } else echo ' ' ?>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="submit" value="Log In" class="btn px-4 btn-primary text-white" onclick="return encrypt()">
                    </div>
                    <p>Don't have an account? <a href="#!" class="link-danger">Register</a></p>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>
<script>
    function encrypt() {
        var pass = document.getElementById('password').value;
        var hide = document.getElementById('hide').value;
        if (pass == "") {
            document.getElementById('err').innerHTML = 'Error:Password is missing';
            return false;
        } else {
            document.getElementById("hide").value = document.getElementById("password").value;
            var hash = CryptoJS.MD5(pass);
            document.getElementById('password').value = hash;
            return true;
        }
    }
</script>