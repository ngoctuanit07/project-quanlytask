<script src="<?php echo base_url() ?>public/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/js/bootstrap-datetimepicker.js"></script>

<div class="container">
    <form method="post" action="/chithi/them"class="form-horizontal">

        <?php //print_r($linhkien); die();?>
        <?php //if ($linhkien && isset($linhkien)): ?>
        <input type="hidden" name="id" value="<?php //echo $linhkien->id;  ?>"/>
        <?php //foreach ($linhkien as $key => $value) :
        ?>
        <div class="form-group mx-3">
               <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="malinhkien">Mã linh kiện</label>
                <input type="text" id="malinhkien" value="<?php //echo $linhkien->malinhkien  ?>"name="malinhkien" class="form-control validate">
            </div>
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="mamodel">Mã model</label>
                <input type="text" id="mamodel" value="<?php //echo $linhkien->malinhkien  ?>"name="mamodel" class="form-control validate">
            </div>
            <div class="md-form mb-4">
                <label data-error="wrong" data-success="right" for="sodiemgan">Số  điểm gắn</label>
                <input type="text" id="sodiemgan" name="sodiemgan" value="<?php //echo $linhkien->soluong  ?>" class="form-control validate">
            </div>
        </div>
        <?php //endforeach; ?>

        <?php //endif; ?>
        <button class="btn btn-default" type="submit">Save</button>
    </form>
</div>
