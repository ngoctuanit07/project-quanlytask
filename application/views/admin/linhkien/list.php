<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<div class="container">
    <h2>Danh Sách  Các Task Đã Hoàn Thành</h2>
    <div class="text-center">
        <a href="/kehoach/themkehoach" class="btn btn-default btn-rounded btn pull-right mb-4" >Báo Cáo</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Task</th>
                <th>Ngày Tạo</th>
                <th>Id Task</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if ($linhkien && isset($linhkien)): ?>
                    <?php foreach ($linhkien as $key => $value) :
                        ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->tentask; ?></td>
                         <td><?php echo $value->ngayTao; ?></td>
                        <td><?php echo $value->idtasktrello; ?></td>
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
                    <h4 class="modal-title w-100 font-weight-bold">Nhập linh kiện</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã cuộn linh kiện</label>
                        <input type="text" id="macuonlinhkien" name="macuonlinhkien" class="form-control inputs validate">
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã A</label>
                        <input type="text" id="maa" required name="maa" class="form-control inputs validate">

                    </div>

                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="soluong">Số lượng</label>
                        <input type="text" id="soluong" name="soluong" class="form-control inputs validate">  
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="themlinhkien" class="btn btn-default">Save</button>
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
            //alert('aa'); //return;
            var url = "<?php echo base_url() . 'linhkien/them' ?>";
            var macuonlinhkien = jQuery('#macuonlinhkien').val();
            var soluong = jQuery('#soluong').val();
            var maa = jQuery('#maa').val();
            var param = {_macuonlinhkien: macuonlinhkien, _soluong: soluong, _maa: maa}
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