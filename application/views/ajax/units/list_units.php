<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox" class="checkbox chkAll"><span style="width: 15px; height: 15px;"></span></label></th>
            <th class="text-center">Tên đơn vị</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($data['_list_units']) && count($data['_list_units'])) :
            foreach ($data['_list_units'] as $key => $item) : ?>
                <tr>
                    <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox" value="<?php echo $item['Id']; ?>" class="checkbox chk"><span style="width: 15px; height: 15px;"></span></label>
                    </td>
                    <td class="text-left prd_name" onclick="<?php echo $item['name'] ?>
                        (<?php echo $item['Id']; ?>)" style="color: #2a6496; cursor: pointer;"><?php echo $item['name']; ?></td>
                    <td class="text-center">
                        <i onclick="cms_edit_unit(<?php echo $item['Id'] ?>)" class="fa fa-edit" title="Xoá" style="color: green;"></i>
                        <i class="fa fa-trash-o" style="color: darkred;" title="Xóa" onclick="cms_delete_unit(<?php echo $item['Id'] . ',' . $data['page']; ?>)"></i>
                    </td>
                </tr>
        <?php endforeach;
        else :
            echo '<tr><td colspan="3" class="text-center">Không có dữ liệu</td></tr>';
        endif;

        ?>

    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">SL đơn vị:
        <span><?php echo (isset($data['_sl_unit'])) ? $data['_sl_unit'] : 0; ?></span>
    </div>
    <div class="pull-right ajax-pagination">
        <?php echo $data['_pagination_link']; ?>
    </div>
</div>