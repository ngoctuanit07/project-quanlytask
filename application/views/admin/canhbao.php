<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/js/bootstrap-datetimepicker.js"></script>
<div class="container">
    <h2>Cảnh báo  Linh Kiện</h2>
    <div class="text-center">
        <label>Từ ngày : </label>

        <input id="tungay" name="tungay" type="text"/>
        <label> Đến ngày : </label>

        <input id="denngay" name="denngay" type="text"/>
        <button type="submit" class="btn btn-default  btn-linhkien" >Show</button>


    </div>

    <table class="table table-searchlinhkien table-bordered" >
        <thead>
            <tr>

                <th>Mã  Linh Kiện</th>
                <th>Số lượng sản xuất đủ</th>
                <th>Số lượng sản xuất còn thiếu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="malinhkien">b</td>
                <td class="soluongsanxuatdu"></td>
                <td class="soluongsanxuatthieu"></td>
            </tr>





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
        $('.table-searchlinhkien').hide();
        $('.btn-linhkien').click(function () {
            var url = "<?php echo base_url() . 'canhbao/searchLinhkien' ?>";
            var tungay = jQuery('#tungay').val();
            var denngay = jQuery('#denngay').val();
            var param = {_tungay: tungay, _denngay: denngay};
            $.ajax({
                url: url,
                type: "post",
                data: param,
                dataType: 'text',
                success: function (response) {
                    var html = jQuery.parseJSON(response);
                    if (html.success == 'success') {
                        $('.malinhkien').text(html.malinhkien);
                        $('.soluongsanxuatdu').text(html.soluongsanxuatdu);
                        $('.soluongsanxuatthieu').text(html.soluongsanxuatthieu);
                        $('.table-searchlinhkien').show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script>
<script>
    $('#tungay').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        format: 'yyyy-mm-dd',
    });
    $('#denngay').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        format: 'yyyy-mm-dd',
    });
</script>