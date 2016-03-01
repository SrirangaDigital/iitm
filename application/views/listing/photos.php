<?php $albumDetails = $data['albumDetails']; unset($data['albumDetails']);?>

<div class="container">
    <div class="row first-row">
        <!-- Column 1 -->
        <div class="col-md-12 text-center">
            <ul class="list-inline sub-nav">
                <li><a href="<?=BASE_URL?>listing/albums">Photographs</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Tags</a></li>
                <li><a href="#">Search</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="grid" class="container-fluid">
    <div id="posts">
        <div class="post no-border">
            <div class="image-desc-full">
                <?=$viewHelper->displayFieldData($albumDetails->description)?>
            </div>
        </div>
<?php foreach ($data as $row) { ?>
        <div class="post">
            <a href="<?=BASE_URL?>describe/photo/<?=$row->id?>" title="View Details">
                <img src="<?=PHOTO_URL . $row->albumID . '/thumbs/' . $row->id . '.JPG'?>">
                <p class="image-desc">
                    <strong><?=$viewHelper->getDetailByField($row->description, 'Title', 'Caption')?></strong><br>
                    <small><?=$viewHelper->getDetailByField($row->description, 'Event')?></small>
                </p>
            </a>
        </div>
<?php } ?>
    </div>
</div>
