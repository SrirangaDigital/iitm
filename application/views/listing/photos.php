<?php $albumDetails = $data['albumDetails']; unset($data['albumDetails']);?>

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
<div id="grid" class="container-fluid">
    <div id="posts">
        <div class="post no-border">
            <div class="image-desc-full">
                <?=$viewHelper->displayFieldData($albumDetails->description)?>
            </div>
        </div>
<?php foreach ($data as $row) { ?>
        <div class="post">
            <a href="<?=BASE_URL?>describe/photo/<?=$row->albumID . '/' . $row->id?>" title="View Details">
                <img src="<?=PHOTO_URL . $row->albumID . '/thumbs/' . $row->id . '.JPG'?>">
                <?php
                    $caption = $viewHelper->getDetailByField($row->description, 'Caption', 'Title');
                    $event = $viewHelper->getDetailByField($row->description, 'Event');

                    if ($caption | $event) { 
                        
                        echo '
                            <p class="image-desc">
                                <strong>' . $caption . '</strong><br>
                                <small>' . $event . '</small>
                            </p>
                        ';
                    }
                ?>
            </a>
        </div>
<?php } ?>
    </div>
</div>
