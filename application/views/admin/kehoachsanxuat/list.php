<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<div class="container">
    <h2>Danh Sách  Kế hoạch sản xuất</h2>
    <div class="text-center">
        <a href="/kehoach/themkehoach" class="btn btn-default btn-rounded btn pull-right mb-4" >Thêm</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Ngày sản xuất</th>
                <th>Mã Model</th>
                <th>Lot sản xuất</th>
                <th>Số Lượng</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if ($kehoachsanxuat && isset($kehoachsanxuat)): ?>
                    <?php foreach ($kehoachsanxuat as $key => $value) :
                        ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->ngaysanxuat; ?></td>
                        <td><?php echo $value->mamodel; ?></td>
                        <td><?php echo $value->lotsanxuat; ?></td>
                        <td><?php echo $value->soluong; ?></td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

            </tr>


        </tbody>
    </table>