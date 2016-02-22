<!-- Column 2 -->
        <div class="col-md-4 clear-paddings">
            <div class="col-padded col-shaded"><!-- inner custom column -->             
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                    <li class="widget-container widget_nav_menu"><!-- widget -->
                        <h1 class="title-widget"><strong><?=$viewHelper->journalFullNames{$journal}?></strong></h1>
                        <div class="journal-desc">
                            <figure class="recent-news-thumb">
                                <a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current->volume . '/' . $current->issue?>" title="Current Issue : Vol. <?=$viewHelper->displayNumber($current->volume)?>, Issue <?=$viewHelper->displayNumber($current->issue)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="Current Issue : Vol. <?=$viewHelper->displayNumber($current->volume)?>, Issue <?=$viewHelper->displayNumber($current->issue)?>"></a>
                            </figure>
                            <div class="journal-current-issue">
                                <p>
                                    <span class="text-primary"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current->volume . '/' . $current->issue?>">Current Issue</a></span><br />
                                    Volume <?=$viewHelper->displayNumber($current->volume)?> | Issue <?=$viewHelper->displayNumber($current->issue)?><br />
                                    <?=$viewHelper->displayMonth($current->month)?> <?=$viewHelper->displayNumber($current->year)?><br />
                                    <!-- <span class="text-primary">Special issue on signal-processing and computation fluid dynamics</span><br /> -->
                                </p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="journal-menu">
                            <li><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Home</a></li>
                            <li><a href="<?=BASE_URL . 'listing/issues/' . $journal?>">Volumes &amp; Issues</a></li>
                            <li><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal}) . '/Special_Issues'?>">Special Issues</a></li>
                            <li><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal}) . '/Forthcoming_Articles'?>">Forthcoming Articles</a></li>
                            <li><a href="<?=BASE_URL . 'search/index/' . $journal?>">Search</a></li>
                            <li class="gap-above"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal}) . '/Editorial_Board'?>">Editorial Board</a></li>
                            <li><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal}) . '/Information_for_Authors'?>">Information for Authors</a></li>
                            <li><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal}) . '/Subscription'?>">Subscription</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                    <li class="widget-container widget_recent_news"><!-- widgets list -->
                        <h1 class="title-widget"><?=$viewHelper->journalFullNames{$journal}?> | News</h1>
                        <ul class="list-unstyled">
                            <li class="recent-news-wrap">
                                <h1 class="title-median">Continuous Article Publication</h1>
                                <div class="recent-news-meta">
                                    <div class="recent-news-date">Posted on January 27, 2016</div>
                                </div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <p>
                                            From January 2016, the Journal of Astrophysics and Astronomy will move from the current publishing mode to Continuous Article Publishing (CAP) mode. This means that the each accepted article will be published immediately online with DOI and article citation ID with starting page number 1. Article will also be visible in Web of Science immediately. All these will help shorten the publication time and improve visibility of the articles.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
    </div>
</div>
