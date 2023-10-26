<input class="d-none" id="page_name" value="edit_prd">
<div class="products">
    <div class="breadcrumbs-fixed panel-action">
        <div class="row">
            <div class="products-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2><i class="fa fa-refresh" style="font-size: 14px; cursor: pointer;" onclick="cms_vcrproduct('1')"></i>Sửa sản phẩm</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary" onclick="cms_update_product(<?php if (isset($data['_detail_product'])) echo $data['_detail_product']['ID'] ?>);">
                                <i class="fa fa-check"></i> Lưu
                            </button>
                            <button type="button" class="btn btn-default" onclick="cms_javascript_redirect( cms_javascrip_fullURL() )"><i class="fa fa-arrow-left"></i> Hủy
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
                                    <input type="text" id="prd_name" value="<?php if (isset($data['_detail_product'])) echo $data['_detail_product']['prd_name'] ?>" class="form-control" placeholder="Nhập tên sản phẩm" />
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" id="prd_code" class="form-control" value="<?php if (isset($data['_detail_product'])) echo $data['_detail_product']['prd_code'] ?>" placeholder="Nếu không nhập, hệ thống sẽ tự sinh." />
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Số lượng</label>
                                    <input type="text" id="prd_sls" value="<?php if (isset($data['_detail_product'])) echo $data['_detail_product']['prd_sls'] ?>" placeholder="0" class="form-control text-right txtNumber" />
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label class="checkbox" style="display: block;"><input type="checkbox" id="prd_inventory" class="checkbox" name="confirm" value="1" <?php if (isset($data['_detail_product']) and $data['_detail_product']['prd_inventory'] == 1) echo 'checked="checked"' ?>><span></span> Theo dõi tồn kho?</label>
                                    <label class="checkbox"><input type="checkbox" id="prd_allownegative" class="checkbox" name="confirm" value="1" <?php if (isset($data['_detail_product']) and $data['_detail_product']['prd_allownegative'] == 1) echo 'checked="checked"' ?>>
                                        <span></span> Cho phép bán âm?</label>
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Giá vốn</label>
                                    <input type="text" id="prd_origin_price" value="<?php if (isset($data['_detail_product'])) echo number_format($data['_detail_product']['prd_origin_price']) ?>" class="form-control text-right txtMoney" placeholder="Nhập giá vốn" />
                                </div>

                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-6 padd-left-0">
                                    <label>Danh mục</label>
                                    <div class="col-md-11 padd-0">
                                        <select class="form-control" id="prd_group_id">
                                            <optgroup label="Chọn danh mục">
                                                <?php $group_id = 0;
                                                if (isset($data['_detail_product']))
                                                    $group_id = $data['_detail_product']['prd_group_id'];
                                                ?>
                                                <?php if (isset($data['_prd_group']) && count($data['_prd_group'])) :
                                                    foreach ($data['_prd_group'] as $key => $item) :
                                                ?>
                                                        <option <?php if ($group_id == $item['id']) echo 'selected ' ?> value="<?php echo $item['id']; ?>"><?php echo $item['prd_group_name']; ?></option>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </optgroup>
                                            <optgroup label="------------------------">
                                                <option value="product_group" data-toggle="modal" data-target="#list-prd-group">Tạo mới danh
                                                    mục
                                                </option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-1 padd-0">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#list-prd-group" style="border-radius: 0 3px 3px 0; box-shadow: none;">...
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 padd-right-0">
                                    <label>Nhà sản xuất</label>

                                    <div class="col-md-11 padd-0">
                                        <select class="form-control" id="prd_manufacture_id">
                                            <optgroup label="Chọn nhà sản xuất">
                                                <?php $manufacture_id = 0;
                                                if (isset($data['_detail_product']))
                                                    $manufacture_id = $data['_detail_product']['prd_manufacture_id'];
                                                echo $manufacture_id;
                                                ?>
                                                <?php if (isset($data['_prd_manufacture']) && count($data['_prd_manufacture'])) :
                                                    foreach ($data['_prd_manufacture'] as $key => $val) :
                                                ?>
                                                        <option <?php if ($manufacture_id == $val['ID']) echo 'selected ' ?> value="<?php echo $val['ID']; ?>"><?php echo $val['prd_manuf_name']; ?></option>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </optgroup>
                                            <optgroup label="------------------------">
                                                <option value="product_manufacture" data-toggle="modal" data-target="#list-prd-manufacture">Tạo mới
                                                    Nhà sản xuất
                                                </option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-1 padd-0">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#list-prd-manufacture" style="border-radius: 0 3px 3px 0; box-shadow: none;">...
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <h4>Thông tin giá bán</h4>
                        <small>Nhập thông tin giá bán của sản phẩm</small>
                    </div>

                    <div class="col-md-8 padd-0">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Đơn vị</th>
                                    <th>Giá bán lẻ</th>
                                    <th>Giá bán sỉ</th>
                                    <th>Mặc định</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="body_unit">
                                <?php $index = 0;
                                $unit = $data['_units']; ?>
                                <?php foreach ($data['_prices'] as $item) : $index++; ?>
                                    <tr class="unit" data-active="<?php echo $item['active'] ?>" data-whole="<?php echo $item['whole'] ?>" data-retail="<?php echo $item['retail'] ?>" data-unit="<?php echo $item['unit'] ?>" data-id="<?php echo $item['id'] ?>" id="<?php echo "unit-" . $item['id'] ?>">
                                        <td>
                                            <?php echo $index ?>
                                        </td>
                                        <td>
                                            <select onchange="cms_select_unit(<?php echo $item['id'] ?>, this.value)" class="form-control">
                                                <?php foreach ($unit as $unitItem) : ?>
                                                    <option <?php if ($unitItem['name'] === $item['unit']) echo "selected" ?> value="<?php echo $unitItem['name'] ?>"><?php echo $unitItem['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input value="<?php echo $item['retail'] ?>" onchange="cms_input_retail_price(<?php echo $item['id'] ?>, this.value)" type="number" class="form-control" />
                                        </td>
                                        <td><input value="<?php echo $item['whole'] ?>" onchange="cms_input_whole_price(<?php echo $item['id'] ?>, this.value)" type="number" class="form-control" /></td>
                                        <td>
                                            <label class="checkbox"><input <?php if ($item['active'] === "1") echo "checked" ?> id="chk_<?php echo $item['id'] ?>" onchange="active_product_unit(<?php echo $item['id'] ?>, this.checked)" type="checkbox" class="checkbox">
                                                <span></span> sử dụng</label>
                                        </td>
                                        <td>
                                            <i onclick="cms_delete_product_unit(<?php echo $item['id'] ?>)" class="fa fa-trash"></i>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td onclick="cms_add_product_units()" colspan="5" class="text-center hover">Thêm đơn vị</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    // initSample();
</script>