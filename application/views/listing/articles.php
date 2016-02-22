<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins <?=$data[0]->journal?>"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Journals</li>
                            <li><?=$viewHelper->journalFullNames{$data[0]->journal}?></li>
                            <li>Volume <?=$viewHelper->displayNumber($data[0]->volume)?></li>
                            <li><?=$viewHelper->displayIssue($data[0]->issue)?></li>
                        </ol>                           
                        <ul class="list-unstyled">
                            <li class="journal-article">
                                <?=$viewHelper->displayIssueCover($data[0])?>
                                <p class="journal-article-title">
                                    Volume <?=$viewHelper->displayNumber($data[0]->volume)?>, 
                                    <?=$viewHelper->displayIssue($data[0]->issue)?>
                                </p>
                                <p class="journal-article-subtitle">
                                    <?=$viewHelper->displayMonth($data[0]->month)?> <?=$data[0]->year?>,&nbsp;&nbsp;
                                    pages <?=$viewHelper->displayIssuePageRange($data)?>
                                </p>
                                <div class="journal-article-meta">
                                    <span class="journal-article-meta-feature"><?=$data[0]->info?></span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news">
                        <ul class="list-unstyled">
<?php foreach($data as $row) { ?>

                            <li class="journal-article-list">
                                <p class="journal-article-list-page">
                                    <span class="journal-article-meta-feature">pp <?=$viewHelper->displayNumber($row->page)?></span>
                                    <span class="journal-article-meta-feature"><?=$row->feature?></span>
                                </p>
                                <p class="journal-article-list-title"><a href="<?=BASE_URL.'describe/article/' . $row->journal . '/' . $row->volume . '/' . $row->issue . '/' . $row->page?>"><?=$row->title?></a></p>
                                <p class="journal-article-list-authors"><?=$viewHelper->displayAuthors($row->authors, $row->journal)?></p>
                                <div class="journal-article-list-meta">
                                    <span><a href="<?=BASE_URL.'describe/article/' . $row->journal . '/' . $row->volume . '/' . $row->issue . '/' . $row->page?>">More Details</a></span>
                                    <?php if ($row->abstract): ?>
                                    <span><a class="trigger-abstract" id="display_<?=$row->id?>" href="javascript:void(0);">Abstract</a></span>
                                    <?php endif; ?>
                                    <span><?=$viewHelper->linkArticle($row)?></span>
                                </div>
                                <?php if($row->abstract) { ?>
                                <div class="journal-article-list-abstract" id="abstract_<?=$row->id?>">
                                    <?=$row->abstract?>
                                </div>
                                <?php } ?>
                            </li>
<?php } ?>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
