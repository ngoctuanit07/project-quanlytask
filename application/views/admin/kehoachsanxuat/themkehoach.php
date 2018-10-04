<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/js/bootstrap-datetimepicker.js"></script>

<div class="container">
    <form method="post" action="/kehoach/them"class="form-horizontal">

        <?php //print_r($linhkien); die();?>
        <?php //if ($linhkien && isset($linhkien)): ?>
        <input type="hidden" name="id" value="<?php //echo $linhkien->id;  ?>"/>
        <?php //foreach ($linhkien as $key => $value) :
        ?>
        <div class="form-group mx-3">
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="macuonlinhkien">Ngày sản xuất</label>
                <input type="datetime"  id="ngaysanxuat" value="<?php //echo $linhkien->malinhkien  ?>"name="ngaysanxuat" class="form-control validate">
            </div>
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã model</label>
                <input type="text" id="mamodel" value="<?php //echo $linhkien->malinhkien  ?>"name="mamodel" class="form-control validate">
            </div>
            <div class="md-form mb-4">
                <label data-error="wrong" data-success="right" for="soluong">Lót sản xuất</label>
                <input type="text" id="lotsanxuat"  value="<?php //echo $linhkien->maa  ?>" name="lotsanxuat"class="form-control validate">
            </div>
            <div class="md-form mb-4">
                <label data-error="wrong" data-success="right" for="soluong">Số lượng</label>
                <input type="text" id="soluong" name="soluong" value="<?php //echo $linhkien->soluong  ?>" class="form-control validate">
            </div>
        </div>
        <?php //endforeach; ?>

        <?php //endif; ?>
        <button class="btn btn-default" type="submit">Save</button>
    </form>
</div>
<script>
    $('#ngaysanxuat').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        format: 'yyyy-mm-dd',
    });
</script>
