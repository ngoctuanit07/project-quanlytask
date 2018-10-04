<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<div class="container">
    <h2>Tồn kho  Linh Kiện</h2>
    <div class="text-center">


        <button type="button" class="btn btn-default btn-show-tonkho btn-rounded btn" >Show</button>
    </div>

    <table class="table table-tonkho table-bordered">
        <thead>
            <tr>

                <th>Mã Cuộn Linh Kiện</th>
                <th>Mã A</th>
                <th>Số Lượng</th>

            </tr>
        </thead>
        <tbody>



            <?php if ($linhkien && isset($linhkien)): ?>
                <?php foreach ($linhkien as $key => $value):
                    ?>
                    <tr>
                        <td><?php echo $value->malinhkien; ?></td>
                        <td><?php echo $value->maa; ?></td>
                        <td><?php echo $value->soluong; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>








        </tbody>
    </table>

</div>
<script>
    $('.inputs').keydown(function (e) {
        if (e.which === 13) {
            var index = $('.inputs').index(this) + 1;
            $('.inputs').eq(index).focus();
        }
    });
    $(document).ready(function () {
        $('.table-tonkho').hide();
        $('.btn-show-tonkho').click(function () {
            $('.table-tonkho').show();
        });

    });
</script>