<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<div class="container">
    <h2>Danh Sách  Chỉ thị sản xuất</h2>
    <div class="text-center">
        <a href="/chithi/themchithi" class="btn btn-default btn-rounded btn pull-right mb-4" >Thêm</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Mã Linh Kiện</th>
                <th>Mã Model</th>
                <th>Số Điểm Gắn</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if ($kehoachsanxuat && isset($kehoachsanxuat)): ?>
                    <?php foreach ($kehoachsanxuat as $key => $value) :
                        ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->malinhkien; ?></td>
                        <td><?php echo $value->mamodel; ?></td>
                        <td><?php echo $value->sodiemgan; ?></td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

            </tr>


        </tbody>
    </table>