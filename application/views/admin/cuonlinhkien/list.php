<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<div class="container">
    <h2>Danh Sách  Linh Kiện Mẫu </h2>
    <div class="text-center">
        <a href="" class="btn btn-default btn-rounded btn pull-right mb-4" data-toggle="modal" data-target="#modalLoginForm">Thêm</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Mã Cuộn Linh Kiện</th>
                <th>Số Lượng</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($linhkien && isset($linhkien)): ?>
                <?php foreach ($linhkien as $key => $value) :
                    ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->malinhkien; ?></td>
                        <td><?php echo $value->soluong; ?></td>
                    </tr>
                <?php endforeach; ?>
<?php endif; ?>
        </tbody>
    </table>
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Nhập linh kiện</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã cuộn linh kiện</label>
                        <input type="text" id="macuonlinhkien" name="macuonlinhkien" class="form-control validate">

                    </div>

                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="soluong">Số lượng</label>
                        <input type="text" id="soluong" class="form-control validate">

                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="themcuonlinhkien" class="btn btn-default">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#themcuonlinhkien').click(function () {
            //alert('aa'); //return;
            var url = "<?php echo base_url() . 'cuonlinhkien/them' ?>";
            var macuonlinhkien = jQuery('#macuonlinhkien').val();
            var soluong = jQuery('#soluong').val();
            var param = {_macuonlinhkien: macuonlinhkien, _soluong: soluong}
            $.ajax({
                url: url,
                type: "post",
                data: param,
                dataType: 'text',
                success: function (response) {
                    var html = jQuery.parseJSON(response);
                    if (html.success == 'success') {
                        location.reload();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

    });
</script>


