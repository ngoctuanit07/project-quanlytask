<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<div class="container">
    <h2>Danh Sách  Linh Kiện</h2>
    <div class="text-center">
        <a href="" class="btn btn-default btn-rounded btn pull-right mb-4" data-toggle="modal" data-target="#modallinhkien">Chia linh kiện</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Mã Cuộn Linh Kiện</th>
                <th>Mã A</th>
                <th>Số Lượng</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if ($linhkien && isset($linhkien)): ?>
                    <?php foreach ($linhkien as $key => $value) :
                        ?>
                    <tr>
                        <td ><p id="maid"><?php echo $value->id; ?></p></td>
                        <td><?php echo $value->malinhkien; ?></td>
                        <td><?php echo $value->maa; ?></td>
                        <td><?php echo $value->soluong; ?></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                        <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

            </tr>


        </tbody>
    </table>
    <div class="modal fade" id="modallinhkien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Chia linh kiện</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã cuộn linh kiện được chia</label>
                        <input type="text" id="macuonlinhkienduocchia" name="macuonlinhkienduocchia" class="form-control inputs validate">
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã A được chia</label>
                        <input type="text" id="maaduocchia" required name="maaduocchia" class="form-control inputs validate">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Số lượng được chia</label>
                        <input type="text" id="soluongduocchia" required name="soluongduocchia" class="form-control inputs validate">

                    </div>

                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã cuộn linh kiện bị chia</label>
                        <input type="text" id="macuonlinhkienbichia" name="macuonlinhkien" class="form-control inputs validate">
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã A bị chia</label>
                        <input type="text" id="maabichia" required name="maabichia" class="form-control inputs validate">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Số lượng bị chia</label>
                        <input type="text" id="soluongbichia" required name="soluongbichia" class="form-control inputs validate">

                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="themlinhkien" class="btn btn-default">Chia Linh Kiện</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.inputs').keydown(function (e) {
        if (e.which === 13) {
            var index = $('.inputs').index(this) + 1;
            $('.inputs').eq(index).focus();
        }
    });
    $(document).ready(function () {

        $('#themlinhkien').click(function () {

            var url = "<?php echo base_url() . 'linhkien/chia' ?>";
            // alert(url); return;
            var macuonlinhkienduocchia = jQuery('#macuonlinhkienduocchia').val();
            var macuonlinhkienbichia = jQuery('#macuonlinhkienbichia').val();
            var maaduocchia = jQuery('#maaduocchia').val();
            var maabichia = jQuery('#maabichia').val();
            var soluongduocchia = jQuery('#soluongduocchia').val();
            var soluongbichia = jQuery('#soluongbichia').val();
            var param = {_macuonlinhkienduocchia: macuonlinhkienduocchia, _soluongduocchia: soluongduocchia, _maaduocchia: maaduocchia,
                _macuonlinhkienbichia: macuonlinhkienbichia, _soluongbichia: soluongbichia,_maabichia: maabichia}
            $.ajax({
                url: url,
                type: "post",
                data: param,
                dataType: 'text',
                success: function (response) {
                    var html = jQuery.parseJSON(response);

                    if (html.success == 'success') {
                        alert(html.messeage);
                        location.reload();
                    } else {
                        alert(html.messeage);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

    });
</script>