<div class="container">
    <div class="row first-row">
        <!-- Column 1 -->
        <div class="col-md-12 text-center">
            <ul class="list-inline sub-nav">
                <li><a href="#">Photographs</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Tags</a></li>
                <li><a href="#">Search</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="grid" class="container-fluid">
    <div id="posts">
<?php foreach ($data as $row) { ?>
        <div class="post">
            <a href="#" title="View Album">
                <div class="fixOverlayDiv">
                    <img class="img-responsive" src="<?=$viewHelper->includeRandomThumbnail($row->albumID)?>">
                    <div class="OverlayText"><?=$viewHelper->getPhotoCount($row->albumID)?><br /><small><?=$viewHelper->getDetailByField($row->description, 'Event')?></small> <span class="link"><i class="fa fa-link"></i></span></div>
                </div>
            </a>
            <p class="image-desc">
                <strong><?=$viewHelper->getDetailByField($row->description, 'Title')?></strong>
            </p>
        </div>
<?php } ?>
    </div>
</div>
