<h1>Journals</h1>
<h2>Published by the Indian Academy of Sciences</h2>


<!-- <p>Among the activities undertaken by the Academy since 1934, publication of scientific journals has occupied the pride of place. This programme is characterized by the basic philosophy that no journal published by the Academy will be in competition with other similar ones published in the country; that the Academy will co-operate with other agencies in bringing out its journals; that papers for publication need not be communicated by Fellows; and that all papers submitted would be subject to scrutiny by referees.</p> -->
<p>Publication of scientific journals has been a major activity of the Academy since its formation in 1934 and the Proceedings of the Indian Academy of Sciences Parts A and B began publication that very year. The Academy today publishes 10 journals, several of which grew out of the original Proceedings.</p>
<p>In 1978, the Proceedings split into several themes and today these are (in the intervening years, there have been some changes in the earlier names) <a href="<?=BASE_URL?>Journals/Proceedings_&ndash;_Mathematical_Sciences">Proceedings – Mathematical Sciences</a>, <a href="<?=BASE_URL?>Journals/Sadhana">Sadhana – Academy Proceedings in Engineering Sciences</a>, <a href="<?=BASE_URL?>Journals/Journal_of_Chemical_Sciences">Journal of Chemical Sciences</a>, <a href="<?=BASE_URL?>Journals/Journal_of_Earth_System_Science">Journal of Earth System Science</a>, and <a href="<?=BASE_URL?>Journals/Journal_of_Biosciences">Journal of Biosciences.</a></p>
<p>In 1985, the Academy took over publication of the <a href="<?=BASE_URL?>Journals/Journal_of_Genetics">Journal of Genetics</a>, which is among the oldest English language journals in genetics, having been founded in 1910.</p>
<p>New journals that have been launched include <a href="<?=BASE_URL?>Journals/Pramana_&ndash;_Journal_of_Physics">Pramana – journal of Physics</a> in 1973, <a href="<?=BASE_URL?>Journals/Bulletin_of_Materials_Science">Bulletin of Materials Science</a> in 1979, <a href="<?=BASE_URL?>Journals/Journal_of_Astrophysics_and_Astronomy">Journal of Astrophysics and Astronomy</a> in 1980, and <a href="<?=BASE_URL?>Journals/Resonance_&ndash;_Journal_of_Science_Education">Resonance – journal of science education</a> in 1996.</p>
<p>Our publication programme is guided by the principle that no journal published by the Academy should be in direct competition with other journals published in the country. To the extent possible, the Academy co-operates with other agencies in bringing out its journals, contributions to which are peer-reviewed.</p>
<p>Since 2007, all our journals are co-published with Springer, and since 2015, with Springer Nature.</p>
<p>Academy Policy on Plagiarism can be read <a href="Academy_Policy_on_Plagiarism">here.</a></p>

<?php

$model = new Model();

$current['jcsc'] = $model->getCurrentIssue('jcsc');
$current['pmsc'] = $model->getCurrentIssue('pmsc');
$current['jess'] = $model->getCurrentIssue('jess');
$current['sadh'] = $model->getCurrentIssue('sadh');
$current['pram'] = $model->getCurrentIssue('pram');
$current['jbsc'] = $model->getCurrentIssue('jbsc');
$current['boms'] = $model->getCurrentIssue('boms');
$current['joaa'] = $model->getCurrentIssue('joaa');
$current['jgen'] = $model->getCurrentIssue('jgen');
$current['reso'] = $model->getCurrentIssue('reso');

?>

<div class="row gap-above">
    <?php $journal = 'boms'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Bulletin of<br />Materials Science</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
    <?php $journal = 'joaa'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Journal of<br /><span class="shrink">Astrophysics and Astronomy</span></a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
    <?php $journal = 'jbsc'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Journal of<br />Biosciences</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
</div>
<div class="row gap-above">
    <?php $journal = 'jcsc'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Journal of<br />Chemical Sciences</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
    <?php $journal = 'jess'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Journal of<br />Earth System Science</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
    <?php $journal = 'jgen'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Journal of<br />Genetics</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
</div>
<div class="row gap-above">
    <?php $journal = 'pram'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Pramana<br />Journal of Physics</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
    <?php $journal = 'pmsc'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Proceedings<br />Mathematical Sciences</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
    <?php $journal = 'reso'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><br /><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Resonance</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
</div>
<div class="row gap-above gap-below">
    <?php $journal = 'sadh'; ?>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>">Sadhana</a></p>
        <a href="<?=BASE_URL . 'Journals/' . str_replace(' ', '_', $viewHelper->journalFullNames{$journal})?>" title="<?=$viewHelper->displayMonth($current{$journal}->month)?> <?=$viewHelper->displayNumber($current{$journal}->year)?>"><img src="<?=PUBLIC_URL?>images/stock/<?=$journal?>.jpg" alt="jcsc"></a>
        <p class="current"><a href="<?=BASE_URL . 'listing/articles/' . $journal . '/' . $current{$journal}->volume . '/' . $current{$journal}->issue?>">Vol. <?=$viewHelper->displayNumber($current{$journal}->volume)?> No. <?=$viewHelper->displayNumber($current{$journal}->issue)?></a></p>
    </div>
    <div class="col-md-4 journal-desc-card">
        <p class="title"><a target="_blank" href="http://www.currentscience.ac.in/">Current Science<sup class="text-primary">*</sup></a></p>
        <a target="_blank" href="http://www.currentscience.ac.in/" title="Current Science"><img src="<?=PUBLIC_URL?>images/stock/csci.jpg" alt="csci"></a>
    </div>
    <div class="col-md-4">&nbsp;</div>
</div>
<p class="gap-above-med"><em><sup class="text-primary">*</sup>Current Science is published by the Current Science Association in collaboration with the Indian Academy of Sciences.</em></p>

<?php $journal = ''; ?>

<h3 class="gap-above">Inter-Journal Search</h3>
<ul class="list-unstyled gap-above">
    <li>
        <form method="post" action="<?=BASE_URL . 'search/allJournals'?>" class="form-horizontal">
            <div class="form-group">
                <label for="title" class="control-label col-xs-2">Title</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="title" name="title" placeholder="">
                </div>
                <div class="col-xs-2">&nbsp;</div>
            </div>
            <div class="form-group">
                <label for="authors" class="control-label col-xs-2">Author</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="authors" name="authors" placeholder="">
                </div>
                <div class="col-xs-2">&nbsp;</div>
            </div>
            <div class="form-group">
                <label for="keywords" class="control-label col-xs-2">Keywords</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="">
                </div>
                <div class="col-xs-2">&nbsp;</div>
            </div>
            <div class="form-group">
                <label for="fulltext" class="control-label col-xs-2">Fulltext</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="fulltext" name="fulltext" placeholder="">
                </div>
                <div class="col-xs-2">&nbsp;</div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <input type="hidden" id="journal" name="journal" value="">
                    <button type="submit" class="btn btn-primary naked">Submit</button>
                </div>
            </div>
        </form>
    </li>
</ul>

<h3>Subscription</h3>
<h4>Outside India</h4>
<p>Subscriptions outside India, for all journals except Current Science, are handled by Springer.</p>
<p>
    For prices and other information contact:<br />
    <em>Customers in all countries outside North and South America:</em> Springer Distribution Centre GmbH, Customer Service Journals, Haberstrasse 7, D-69126 Heidelberg, Germany. Email: subscriptions@springer.com.<br />
    <em>Customers in North and South America:</em> Springer, Journal Fulfilment, P. O. Box 2485, Seacaucus, NJ 07096, USA. Email: journals-ny@springer.com.
</p>
<p>
    <strong>Note on Subscription prices</strong><br />
    <a target="_blank" href="<?=RESOURCES_URL?>Journals/Subscription/subscriptions_2015.pdf">2015 subscription</a> prices in India (<a href="<?=RESOURCES_URL?>Journals/Subscription/Price_List_Personal.pdf" target="_blank">Personal</a> | <a href="<?=RESOURCES_URL?>Journals/Subscription/Price_List_Institutions.pdf" target="_blank">Library</a>). For more details please refer to individual journal websites.
</p>
