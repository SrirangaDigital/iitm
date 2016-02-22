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
                            <li><a href="<?=BASE_URL . 'listing/forthcoming/' . $journal?>">Forthcoming Articles</a></li>
                            <li><a href="<?=BASE_URL . 'search/index/' . $journal?>">Search</a></li>
                            <li class="gap-above"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal}) . '/Editorial_Board'?>">Editorial Board</a></li>
                            <li><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal}) . '/Information_for_Authors'?>">Information for Authors</a></li>
                            <li><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal}) . '/Subscription'?>">Subscription</a></li>
                        </ul>
                    </li>
                </ul>
<!--                <ul class="list-unstyled clear-margins">
                    <li class="widget-container widget_recent_news">
                        <h1 class="title-widget"><?=$viewHelper->journalFullNames{$journal}?> | News</h1>
                        <ul class="list-unstyled">
                            <li class="recent-news-wrap">
                                <h1 class="title-median"><a href="#" title="Special issue">Special issue on Computer Vision and Artificial Intelligence</a></h1>
                                <div class="recent-news-meta">
                                    <div class="recent-news-date">April 20, 2015</div>
                                </div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <p>
                                            A special issue on Artificial Intelligence and Computer Vision will be brought out in November 2015. Deadline for submission of papers is 1<sup>st</sup> September 2015. <a href="#" class="moretag" title="read more">MORE</a> 
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="recent-news-wrap">
                                <h1 class="title-median"><a href="#" title="New Board">Academy Welcomes its new Editorial Board</a></h1>
                                <div class="recent-news-meta">
                                    <div class="recent-news-date">March 1, 2015</div>
                                </div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <p>
                                            Academy heartily welcomes its new editorial board. Headed by Viswanadham N, the team comprises of more than sixty eminent scholars. <a href="#" class="moretag" title="read more">MORE</a> 
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul><!- - widgets end - -> -->
            </div>
        </div>
    </div>
</div>
