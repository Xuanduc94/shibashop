<div class="login-container col-md-4 col-md-offset-4" id="login-form">
    <div class="login-frame clearfix">
        <center>
            <h3 class="heading col-md-10 col-md-offset-1 padd-0"><i class="fa fa-lock"></i>Tạo cửa hàng</h3>
        </center>
        <ul class="validation-summary-errors col-md-10 col-md-offset-1">
            <?php echo validation_errors(); ?>
        </ul>
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal login-form frm-sm" method="post" action="<?php echo "http://" . $_SERVER['HTTP_HOST'] ?>/authentication/cms_register_store">
                <div class="form-group input-icon">
                    <label for="stock_name" class="sr-only control-label">Tên cửa hàng</label>
                    <input type="text" name="data[stock_name]" value="<?php echo cms_common_input(isset($_post) ? $_post : [], 'stock_name'); ?>" class="form-control" id="stock_name" placeholder="Tên cửa hàng">
                    <i class="fa fa-user icon-right"></i>
                </div>
                <div class="form-group">
                    <input type="number" value="<?php echo $user_id ?>" id="user_init" name="data[user_init]" style="display: none;" />
                    <input type="submit" name="login" value="Đăng ký" class="btn btn-primary btn-sm" />
                </div>
            </form>
        </div>
    </div>
</div>