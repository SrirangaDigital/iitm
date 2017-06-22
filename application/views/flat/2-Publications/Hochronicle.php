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
    <div id="posts">                                
        <div class="post">
            <a href="<?=PUBLIC_URL?>pdf/Hochronicle/1981-08-31.pdf" target="_blank">           
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/Hochronicle/1981-08-31.jpg">
            </a>
            <p class="image-desc">
                <strong>Issue No. 5 (31 Aug, 1981)</strong><br />
                <strong><a href="<?=PUBLIC_URL?>pdf/Hochronicle/1981-08-31.pdf" target="_blank">PDF</a></strong>
            </p>
        </div>
        <div class="post">
            <a href="<?=PUBLIC_URL?>pdf/Hochronicle/1981-09-02.pdf" target="_blank">
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/Hochronicle/1981-09-02.jpg">
            </a>    
            <p class="image-desc">
                <strong>Issue No. 7 (2 Sep, 1981)</strong><br />
                <strong><a href="<?=PUBLIC_URL?>pdf/Hochronicle/1981-09-02.pdf" target="_blank">PDF</a></strong>
            </p>
        </div>
    </div>
</div>
