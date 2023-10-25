<?php
/* Địa chỉ SQL Server */
$serverName = "DESKTOP-MBVAN7C\SQLEXPRESS";
/* Tài khoản kết nối */
$uid = 'sa';
$pwd = '123';

/* Cấu hình kết nối */
$connectionInfo =  ["UID" => $uid, "PWD" => $pwd, "Database" => "QLBH", "TrustServerCertificate" => true];

/* Thực hiện kết nối */
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {

    die(print_r(sqlsrv_errors(), true));
}



/* Thực hiện truy vấn dữ liệu, lấy 5 dòng đầu tiên của bảng Sanpham */
$tsql = "SELECT * FROM SanPham";
/* Chạy câu truy vấn */
$stmt = sqlsrv_query($conn, $tsql);
if ($stmt === false) {
    echo "Lỗi truy vấn.</br>";
    die(print_r(sqlsrv_errors(), true));
}
# Export product json
/* Đọc các dòng thông tin. */
$rows = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $item = new stdClass();
    $item->Name =  mb_convert_encoding($row['TenSanPham'], "UTF-8", "UTF-8");
    $item->code = mb_convert_encoding($row['MaSanPham'], "UTF-8", "UTF-8");
    $item->origin_price = $row['GiaNhap'];
    $units = array();
    $unitList = sqlsrv_query($conn, "select TenDonVi, GiaLe, GiaSi, Selected from DonViTinh_SanPham join DonViTinh on DonViTinh_SanPham.DonViTinh = DonViTinh.id where DonViTinh_SanPham.SanPham = " . $row['id']);
    while ($rowUnit = sqlsrv_fetch_array($unitList, SQLSRV_FETCH_ASSOC)) {
        $itemUnit = new stdClass();
        $itemUnit->unit = mb_convert_encoding($rowUnit["TenDonVi"], "UTF-8", "UTF-8");
        $itemUnit->retail = $rowUnit['GiaLe'] != null ? $rowUnit['GiaLe'] : 0;
        $itemUnit->whole = $rowUnit['GiaSi'] != null ? $rowUnit['GiaSi'] : 0;
        $itemUnit->active = $rowUnit['Selected'];
        array_push($units, $itemUnit);
    }
    $item->unit = $units;
    array_push($rows, $item);
}
$jsonstr = json_encode($rows, JSON_THROW_ON_ERROR);
$path = 'data.json';
$fp = fopen($path, 'w');
fwrite($fp, $jsonstr);
fclose($fp);
echo "OK";
sqlsrv_free_stmt($stmt);  // Giải phóng tài nguyên câu truy vấn
sqlsrv_close($conn);      // Giải phóng, ngắt kết nối SQL Server
