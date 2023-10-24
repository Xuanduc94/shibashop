<div class="login-container col-md-4 col-md-offset-4" id="login-form">
    <div class="login-frame clearfix">
        <center>
            <h3 class="heading col-md-10 col-md-offset-1 padd-0"><i class="fa fa-lock"></i>Đăng ký tài khoản</h3>
        </center>
        <ul class="validation-summary-errors col-md-10 col-md-offset-1">
            <?php echo validation_errors(); ?>
        </ul>
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal login-form frm-sm" method="post" action="<?php echo "http://" . $_SERVER['HTTP_HOST'] ?>/authentication/register_account">
                <div class="form-group input-icon">
                    <label for="display_name" class="sr-only control-label">Tên người dùng</label>
                    <input type="text" name="data[display_name]" value="<?php echo cms_common_input(isset($_post) ? $_post : [], 'display_name'); ?>" class="form-control" id="display_name" placeholder="Tên người dùng">
                    <i class="fa fa-user icon-right"></i>
                </div>
                <div class="form-group input-icon">
                    <label for="username" class="sr-only control-label">Email</label>
                    <input type="text" name="data[username]" value="<?php echo cms_common_input(isset($_post) ? $_post : [], 'username'); ?>" class="form-control" id="username" placeholder="Tên đăng nhập">
                    <i class="fa fa-user icon-right"></i>
                </div>
                <div class="form-group input-icon">
                    <label for="email" class="sr-only control-label">Email</label>
                    <input type="text" name="data[email]" value="<?php echo cms_common_input(isset($_post) ? $_post : [], 'email'); ?>" class="form-control" id="email" placeholder="Email">
                    <i class="fa fa-envelope-o icon-right"></i>
                </div>
                <div class="form-group input-icon">
                    <label for="inputPassword3" class="sr-only control-label">Password</label>
                    <input type="password" name="data[password]" value="<?php echo cms_common_input(isset($_post) ? $_post : [], 'password'); ?>" class="form-control" id="inputPassword3" placeholder="Mật khẩu">
                    <i class="fa fa-lock icon-right"></i>
                </div>

                <div class="form-group">
                    <input type="submit" name="login" value="Đăng ký" class="btn btn-primary btn-sm" />
                </div>
            </form>
        </div>
    </div>
</div>