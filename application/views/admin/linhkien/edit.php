<div class="container">
    <form method="post" action="/linhkien/sua"class="form-horizontal">
        
        <?php //print_r($linhkien); die();?>
        <?php if ($linhkien && isset($linhkien)): ?>
        <input type="hidden" name="id" value="<?php echo $linhkien->id;?>"/>
            <?php //foreach ($linhkien as $key => $value) :
                ?>
                <div class="form-group mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="macuonlinhkien">Mã cuộn linh kiện</label>
                        <input type="text" disabled="true" id="macuonlinhkien" value="<?php echo $linhkien->malinhkien?>"name="macuonlinhkien" class="form-control validate">
                    </div>
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="soluong">Mã A</label>
                        <input type="text" id="maa" disabled="true" value="<?php echo $linhkien->maa?>" name="maa"class="form-control validate">
                    </div>
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="soluong">Số lượng</label>
                        <input type="text" id="soluong" name="soluong" value="<?php echo $linhkien->soluong?>" class="form-control validate">
                    </div>
                </div>
            <?php //endforeach; ?>

        <?php endif; ?>
        <button class="btn btn-default" type="submit">Save</button>
    </form>
</div>
