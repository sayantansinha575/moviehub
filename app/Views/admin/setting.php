<?= $this->extend(config('SiteLayout')->adminLayout) ?>
<?= $this->Section('content') ?>
<div class="container">
    <h3><?= $title ?></h3>
</div>
<div class="container">
    <form action="<?= $url ?>" id="defaultForm" accept-charset="UTF-8" autocomplete="off">
        <?php if (!empty($settings)) : ?>
            <?php foreach ($settings as $sett) : ?>
                <?php if ($sett->type == 0) : ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Page Title</label>
                        <input type="text" value="<?= $sett->value ?>" name="<?= strtolower($sett->name) ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Page Title">
                    </div>
                <?php endif; ?>
                <?php if ($sett->type == 1) : ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Meta Title</label>
                        <input type="text" name="<?= strtolower($sett->name) ?>" value="<?= $sett->value ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Page Title">
                    </div>
                <?php endif; ?>
                <?php if ($sett->type == 2) : ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Meta Description</label>
                        <textarea class="form-control" name="<?= strtolower($sett->name) ?>" id="exampleFormControlTextarea1" rows="7"><?= $sett->value ?></textarea>
                    </div>
                <?php endif; ?>
                <?php if ($sett->type == 3) : ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Site Logo</label>
                        <img src="<?= site_url('assest/sitelogo/' . $sett->value) ?>" alt="..." style="height: 178px;width: 176px;" class="img-thumbnail form-control">
                        <label for="file-input">upload site Logo</label>
                        <input type="file" accept="image/*" id="file-input" class="form-control" name="<?= $sett->name ?>">
                    </div>
                <?php endif; ?>
                <?php if ($sett->type == 4) : ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Favicon Logo 32x32</label>
                        <img src="<?= site_url('favicon/' . $sett->value) ?>" alt="..." style="height: 178px;width: 176px;" class="img-thumbnail form-control">
                        <label for="file-input">upload Favicon Logo32x32</label>
                        <input type="file" accept="image/*" id="file-input" class="form-control" name="<?= $sett->name ?>">
                    </div>
                <?php endif ?>
                <?php if ($sett->type == 5) : ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Favicon Logo 16x16</label>
                        <img src="<?= site_url('favicon/' . $sett->value) ?>" alt="..." style="height: 178px;width: 176px;" class="img-thumbnail form-control">
                        <label for="file-input">upload Favicon Logo 16x16</label>
                        <input type="file" accept="image/*" id="file-input" class="form-control" name="<?= $sett->name ?>">
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="card-footer text-end">
            <div class="row">
                <button type="submit" class="btn btn-primary setting_update">Submit</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>