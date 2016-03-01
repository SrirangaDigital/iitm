<div class="container">
    <div class="row first-row">
        <!-- Column 1 -->
        <div class="col-md-12 text-center">
            <ul class="list-inline sub-nav">
                <li><a href="<?=BASE_URL?>listing/albums">Albums</a></li>
                <li><a>·</a></li>
                <li><a href="#">Search</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row gap-above-med">
        <div class="col-md-9">
            <div class="image-full-size">
                <img class="img-responsive" src="<?=PHOTO_URL . $data['photoDetails']->albumID . '/' . $data['photoDetails']->id . '.JPG'?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="image-desc-full">
                <ul class="list-unstyled">
                    <?=$viewHelper->displayFieldData($data['photoDetails']->description, $data['albumDetails']->description)?>
                </ul>
            </div>
        </div>
    </div>
</div>