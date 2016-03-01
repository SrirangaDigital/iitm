<div class="container">
    <div class="row first-row">
        <!-- Column 1 -->
        <div class="col-md-12 text-center">
            <ul class="list-inline sub-nav">
                <li><a href="<?=BASE_URL?>listing/albums">Albums</a></li>
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
<div class="container">
    <div class="row gap-above-med">
        <div class="col-md-9">
            <div class="image-full-size">
                <img class="img-responsive" src="<?=PHOTO_URL . $data->albumID . '/' . $data->id . '.JPG'?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="image-desc-full">
                <ul class="list-unstyled">
                    <?=$viewHelper->displayFieldData($data->description)?>
                </ul>
            </div>
        </div>
    </div>
</div>