<?php
$index = 0;
foreach ($data['arr_product_units'] as $key => $item) :
    $index++;
?>
    <tr id="<?php echo "unit-" . $item['id'] ?>">
        <td>
            <?php echo $index ?>
        </td>
        <td>
            <select onchange="cms_select_unit(<?php echo $item['id'] ?>, this.value)" class="form-control">
                <option value="CHUA XAC DINH">Chưa xác định</option>
                <?php foreach ($unit as $unitItem) : ?>
                    <option <?php if ($unitItem['name'] === $item['unit']) echo "selected" ?> value="<?php echo $unitItem['name'] ?>"><?php echo $unitItem['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <td>
            <input value="<?php echo $item['retail'] ?>" onchange="cms_input_retail_price(<?php echo $item['id'] ?>, this.value)" type="text" class="form-control txtMoney" />
        </td>
        <td><input value="<?php echo $item['whole'] ?>" onchange="cms_input_whole_price(<?php echo $item['id'] ?>, this.value)" type="text" class="form-control txtMoney" /></td>
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