<div class="container">
    <div class="row first-row">
        <!-- Column 1 -->
        <div class="col-md-12 text-center">
            <ul class="list-inline sub-nav">
                <li><a href="<?=BASE_URL?>listing/collections">Photo Collection</a></li>
                <li><a>·</a></li>
                <li><a href="<?=BASE_URL?>Publications">Publications</a></li>
                <li><a>·</a></li>
                <li><a>Search</a></li>
                <li id="searchForm">
                    <form class="navbar-form" role="search" action="<?=BASE_URL?>search/field/" method="get">
                        <div class="input-group add-on">
                            <input type="text" class="form-control" placeholder="Keywords" name="description" id="description">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="grid" class="container-fluid">
<?php if($data) { ?>
    <?php foreach ($data as $row) { ?>
        <div class="row gap-above-med">
            <?php if($row->type == 'photo') { ?>        
                <div class="col-md-3 text-right">
                    <?php $actualID = $viewHelper->getActualID($row->id); ?>
                    <?php $albumID = $viewHelper->getAlbumID($row->id); ?>
                    <a class="imgresize" href="<?=BASE_URL?>describe/photo/<?=$albumID . '/' . $row->id?>" title="View Details">
                        <img src="<?=PHOTO_URL . $albumID . '/thumbs/' . $actualID . '.JPG'?>">
                    </a>
                </div>
                <div class="col-md-2 text-left">
                    <p><?= $albumID?> / <?= $actualID?></p>
                </div>        
            <?php }else{ ?>
                <div class="col-md-3 text-right">
                    <a class="imgresize" href="<?=BASE_URL?>listing/photos/<?=$row->id?>" title="View Details">
                        <img src="<?=$viewHelper->includeRandomThumbnail($row->id)?>">
                    </a>
                </div>
                <div class="col-md-2 text-left">
                    <p><?= $row->id?></p>
                </div>
            <?php } ?>            
            <div class="col-md-2 text-left">
                <a href="<?=BASE_URL?>moderate/verifydetails/<?=$row->id?>/<?=$row->moderationid?>" class="btn btn-info" role="button">Moderate</a>
            </div>
        </div>    
    <?php } ?>
<?php }else{ ?>    
    <div class="row gap-above-med">
        <div class="col-md-12 text-left">
            <p class="journal-article-subtitle">No items to moderate</p>
        </div>
    </div>
<?php } ?>
</div>
