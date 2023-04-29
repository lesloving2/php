<!-- POPUP thông báo xoá -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cảnh Báo!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn Có chắc chắn muốn xoá không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <a id="truyenid"><button type="button" class="btn btn-secondary">Xoá</button></a>
            </div>
        </div>
    </div>
</div>

<!-- POPUP xem BV -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="bigModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview Trước</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php require 'Views/XemBaiViet.php' ?>
        </div>
    </div>
</div>



<section class="site-section">
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="p-4 p-md-5 border rounded">
                <?Php if (!empty($_GET['msg'])) {
                    $msg = unserialize(urldecode($_GET['msg']));
                    foreach ($msg as $key => $value) {
                        echo '<span style="color:blue;font-weight:bold">' . $value . '</span>';
                    }
                } else echo ' ' ?>
                <table class="table ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Stt</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Công Ty</th>
                            <th scope="col">Ngày Đăng</th>
                            <th scope="col">Hạn Nộp </th>
                            <th scope="col">Vị Trí</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Hình Thức</th>
                            <th scope="col">Mức Lương</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($data as $key => $value) {
                            $i++; ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td> <img class="img" id="frame2" alt="" width="70" height="70" src="/php/<?php echo $value['Logo'] ?>" /></td>
                                <td><?php echo $value['TenCongTy'] ?></td>
                                <td><?php echo  date_create($value['NgayDang'])->format('d/m/Y') ?></td>
                                <td><?php echo  date_create($value['HanNop'])->format('d/m/Y') ?></td>
                                <td><?php echo $value['ViTri'] ?></td>
                                <td><?php echo $value['SoLuong'] ?></td>
                                <td><?php echo $value['DiaChiLamViec'] ?></td>
                                <td><?php echo $value['HinhThuc'] ?></td>
                                <td><?php echo $value['Luong'] ?></td>
                                <td><?php echo $value['Email'] ?></td>
                                <td><a href="#"><span class="icon-delete" style="font-size: 30px" data-toggle="modal" data-target="#exampleModalCenter" onclick="TruyenId('<?php echo $value['IdBaiViet'] ?>')"></span></a> ||
                                    <a href="<?php echo BASE_URL ?>BaiViet/Capnhap/<?php echo $value['IdBaiViet'] ?>"> <span class="icon-edit" style="font-size: 30px"></span></a>||
                                    <a href="#" data-toggle="modal" data-target="#bigModal"> <span class="icon-pageview" style="font-size: 30px" onclick="preview('<?php echo $value['IdBaiViet'] ?>')"></span></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function TruyenId($data) {
        document.getElementById("truyenid").href = "<?php echo BASE_URL ?>BaiViet/Xoa/" + $data;
    }

    function preview($id) {
        console.log("cut")
        console.log("cut2")
        var obj = <?php echo json_encode($data); ?>;
        const newData = obj.filter(n => n['IdBaiViet'].toString() === $id.toString())
        const newResult = newData[0]
        console.log(newResult)
        document.getElementById("title").textContent = newResult['ViTri']
        document.getElementById("Name-CongTy").textContent = newResult['TenCongTy'].toString()
        document.getElementById("DiaChi-CongTy").textContent = newResult['DiaChiLamViec'].toString()
        document.getElementById("HinhThuc-CongTy").textContent = newResult['HinhThuc'].toString()
        document.getElementById("img-logo").src = "/php/" + newResult['Logo'].toString()
        let date = new Date(Date.parse(newResult['NgayDang'], "MM-DD-YYYY"))
        document.getElementById("NgayDang-CongTy").textContent = date.toLocaleDateString();
        document.getElementById("SoLuong-CongTy").textContent = newResult['SoLuong'].toString()
        document.getElementById("HinhThuc2-CongTy").textContent = newResult['HinhThuc'].toString()
        document.getElementById("KinhNghiem-CongTy").textContent = newResult['KinhNghiem'].toString()
        document.getElementById("DiaChi2-CongTy").textContent = newResult['DiaChiLamViec'].toString()
        document.getElementById("Luong-CongTy").textContent = newResult['Luong'].toString()
        let date2 = new Date(Date.parse(newResult['HanNop'], "MM-DD-YYYY"))
        document.getElementById("HanNop-CongTy").textContent = date2.toLocaleDateString();
        document.getElementById("banner").src = "/php/" + newResult['Image'].toString()
        document.getElementById("Mota-CongTy").innerHTML = newResult['MoTa'].toString()

    }
</script>