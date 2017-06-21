<div class="container">
    <div class="row first-row">
        <!-- Column 1 -->
        <div class="col-md-12 text-center">
            <ul class="list-inline sub-nav">
                <li><a href="<?=BASE_URL?>listing/albums">Albums</a></li>
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
            <a href="<?=BASE_URL?>Publications/Annual_Numbers">
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/an/007.jpg">
                <p class="image-desc">
                    <strong>Annual Numbers</strong>
                </p>
            </a>
        </div>
        <div class="post">
            <a href="<?=BASE_URL?>Publications/Campastimes">
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/ct/1966-02.jpg">
                <p class="image-desc">
                    <strong>Campastimes</strong>
                </p>
            </a>
        </div>
        <div class="post" id="spectator">
            <a href="<?=BASE_URL?>Publications/Spectator">
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/Spectator/1982-02-28.jpg">
                <p class="image-desc">
                    <strong>Spectator</strong>
                </p>
            </a>
        </div>
        <div class="post" id="the_rag_mandak">
            <a href="<?=BASE_URL?>Publications/The Rag Mandak">
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/The_Rag_Mandak_1981-03-29.jpg">
                <p class="image-desc">
                    <strong>The Rag Mandak</strong>
                </p>
            </a>
        </div>
        <div class="post" id="hochronicle">
            <a href="<?=BASE_URL?>Publications/Hochronicle">
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/Hochronicle_1981-09-02.jpg">
                <p class="image-desc">
                    <strong>Hochronicle</strong>
                </p>
            </a>
        </div>
        <div class="post" id="hochronicle">
            <a href="<?=BASE_URL?>Publications/Mardi_Gras">
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/Mardi_Gras-85.jpg">
                <p class="image-desc">
                    <strong>Mardi Gras</strong>
                </p>
            </a>
        </div>
        <div class="post" id="hochronicle">
            <a href="<?=BASE_URL?>Publications/Pradeep_Annual_Numbers">
                <img class="img-responsive" src="<?=PUBLIC_URL?>images/stock/P_an-001.jpg">
                <p class="image-desc">
                    <strong>Pradeep Annual Numbers</strong>
                </p>
            </a>
        </div>
    </div>
</div>
