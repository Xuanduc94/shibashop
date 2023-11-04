<?php if (isset($_detail_product) && count($_detail_product)) : ?>
    <div class="breadcrumbs-fixed panel-action">
        <div class="row">
            <div class="products-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Chi tiết sản phẩm</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary " onclick="cms_edit_product(<?php echo $_detail_product['ID']; ?>)"><i class="fa fa-pencil-square-o"></i> Sửa
                            </button>
                            <button type="button" class="btn btn-danger" onclick="cms_restore_product_deleted_bydetail(<?php echo $_detail_product['ID']; ?>)"><i class="fa fa-trash-o"></i> Khôi phục
                            </button>
                            <button type="button" class="btn btn-default" onclick="cms_javascript_redirect( cms_javascrip_fullURL() )"><i class="fa fa-arrow-left"></i> Trở về
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-space customer"></div>

    <div class="products-content" style="margin-bottom: 25px;">
        <div class="basic-info">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 padd-0">
                        <h4>Thông tin cơ bản</h4>
                        <small>Nhập tên và các thông tin cơ bản của sản phẩm</small>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Tên sản phẩm</label>

                                    <div><?php echo $_detail_product['prd_name']; ?></div>
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Mã sản phẩm</label>

                                    <div><?php echo $_detail_product['prd_code']; ?></div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Số lượng</label>
                                    <div><?php echo $_detail_product['prd_sls']; ?></div>
                                </div>
                                <div class="col-md-6">
                                    <div style="padding-bottom: 5px; font-weight: 700; color: #9d9d9d; "><span>Theo dõi tồn kho :</span> <?php echo (isset($_detail_product['prd_inventory']) && ($_detail_product['prd_inventory'] == '1')) ? '<span class="yes">Có</span>' : '<span class="no">Không</span>'; ?>
                                    </div>
                                    <div style="padding-bottom: 5px; font-weight: 700; color: #9d9d9d; "><span>Cho phép bán âm :</span> <?php echo (isset($_detail_product['prd_allownegative']) && ($_detail_product['prd_allownegative'] == '1')) ? '<span class="yes">Có</span>' : '<span class="no">Không</span>'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-12 padd-left-0">
                                    <label>Giá vốn</label>

                                    <div><?php echo number_format($_detail_product['prd_origin_price']); ?></div>
                                </div>

                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Danh mục</label>

                                    <div class="col-md-12 padd-0">
                                        <div><?php echo (cms_getNamegroupbyID($_detail_product['prd_group_id']) == 'Chưa có') ? 'Chưa có danh mục' : cms_getNamegroupbyID($_detail_product['prd_group_id']); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Nhà sản xuất</label>

                                    <div class="col-md-12 padd-0">
                                        <div><?php echo (cms_getNamemanufacturebyID($_detail_product['prd_manufacture_id']) == 'Chưa có') ? 'Chưa có Nhà sản xuất' : cms_getNamemanufacturebyID($_detail_product['prd_manufacture_id']); ?></div>
                                    </div>
                                </div>

                            </div>
                            <!--                            <div class="form-group clearfix">-->
                            <!--                                <div class="col-md-6 padd-0">-->
                            <!--                                    <label>Thuế VAT</label>-->
                            <!---->
                            <!--                                    <div>-->
                            <?php //echo $_detail_product['prd_vat'] . '%'; 
                            ?><!--</div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <h4>Thông tin giá bán</h4>
                    </div>

                    <div class="col-md-8 padd-0">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Đơn vị</th>
                                    <th>Giá bán lẻ</th>
                                    <th>Giá bán sỉ</th>
                                    <th>Sử dụng</th>
                                </tr>
                            </thead>
                            <tbody id="body_unit">
                                <?php $index = 0 ?>
                                <?php foreach ($_units as $item) : $index++ ?>
                                    <tr>
                                        <td><?php echo $index ?></td>
                                        <td><?php echo $item['unit'] ?></td>
                                        <td><?php echo number_format($item['prd_retail_price']) ?></td>
                                        <td><?php echo number_format($item['prd_whole_price']) ?></td>
                                        <td><?php echo $item['active'] == 1 ? "Mặc định" : "" ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
    </div>