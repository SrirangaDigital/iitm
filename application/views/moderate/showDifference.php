<div class="container">
    <div class="row first-row">
        <!-- Column 1 -->
        <div class="col-md-12 text-center">
            <ul class="list-inline sub-nav">
                <li><a href="<?=BASE_URL?>listing/collections">Photo Collection</a></li>
                <li><a>·</a></li>
                <li><a href="#">Publications</a></li>
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
<?php $actualID = $viewHelper->getActualID($data[0]->id) ?>
<?php if($data[0]->type == 'photo') {
        $albumID = $viewHelper->getAlbumID($data[0]->id); 
    }
    else{
        $albumID = $data[0]->id;
    }
?>
<div class="container">
    <div class="row gap-above-med">
        <div class="col-md-12">
            <div class="image-align-center image-reduced-size">
                <?php if($data[0]->type == 'photo') { ?>
                    <img class="img-responsive" src="<?=PHOTO_URL . $data["original"]["albumID"] . '/thumbs/' . $data["original"]["id"] . '.JPG'?>">
                <?php }else{ ?>
                    <img class="img-responsive" src="<?=$viewHelper->includeRandomThumbnail($data[0]->id)?>">
                <?php } ?>
            </div>
        </div>            
    </div>
    <div class="row gap-above-med">        
        <div class="col-md-5">
        <h3>Original Data</h3>

          <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Key</th>
                    <th>Value</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($data["original"] as $key=>$value) { ?>

                  <tr>
                    <td><?=$key?></td>
                    <td><?=$value?></td>
                  </tr>            

                <?php } ?> 

                </tbody>
              </table>
          </div>
        </div>
        <div class="col-md-7">
            <h3>Modified Data</h3>
            <div class="image-desc-full">
                <?php if($data[0]->type == 'photo') { ?>
                    <form  method="POST" class="form-horizontal" role="form" id="updateData" action="<?=BASE_URL?>data/updateJson/<?=$albumID?>/<?=$data[0]->moderationid?>" onsubmit="return validate()">
                <?php }else{ ?>
                    <form  method="POST" class="form-horizontal" role="form" id="updateData" action="<?=BASE_URL?>data/updateAlbumJson/<?=$albumID?>/<?=$data[0]->moderationid?>" onsubmit="return validate()">                
                <?php } ?>    
                    <?=$viewHelper->displayDataInForm($data[0]->description)?>
                </form>    
            </div>
        </div>
    </div> 
    <div class="row gap-above-med">        
        <div class="col-md-5">
        &nbsp;
        </div>
        <div class="col-md-7 text-left">
            <a href="<?=BASE_URL?>moderate/discard/<?=$data[0]->id?>/<?=$data[0]->moderationid?>" class="btn btn-info" role="button">discard modified data</a>        
        </div>
    </div>            
</div>

<script type="text/javascript" src="<?=PUBLIC_URL?>js/addnewfields.js"></script>
<script type="text/javascript" src="<?=PUBLIC_URL?>js/validate.js"></script>