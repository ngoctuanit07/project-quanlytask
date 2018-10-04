<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<div class="container">
    <h2>Tồn kho  Linh Kiện</h2>
    <div class="text-center">
        <label>Mã linh kiện : </label>

        <input id="malinhkien" name="malinhkien" type="text"/>
        <button type="submit" class="btn btn-default  btn-linhkien" >Show</button>


    </div>

    <table class="table table-searchlinhkien table-bordered" >
        <thead>
            <tr>

                <th>Mã Cuộn Linh Kiện</th>
                
                <th>Tồn kho</th>
            </tr>
        </thead>
        <tbody>


            <tr>

                <td class="malinhkien">b</td>
               
                <td class="tonkho"></td>

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
            var url = "<?php echo base_url() . 'tonkholinhkien/searchLinhkien' ?>";
            var macuonlinhkien = jQuery('#malinhkien').val();
            var param = {_macuonlinhkien: macuonlinhkien};
            $.ajax({
                url: url,
                type: "post",
                data: param,
                dataType: 'text',
                success: function (response) {
                    var html = jQuery.parseJSON(response);
                    if (html.success == 'success') {

                        $('.malinhkien').text(html.message.malinhkien);
                     //   $('.maa').text(html.message.maa);
                      //  $('.soluong').text(html.message.soluong);
                        $('.tonkho').text(html.tong);
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