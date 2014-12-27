<div class="col-xs-9">
    <div class="articles view">
        <div class="view-main">
            <div class="video-wrapper">
                <iframe src="http://flashservice.xvideos.com/embedframe/<?php echo h($article['Xvideo']['id']); ?>" frameborder=0 width=510 height=400 scrolling=no></iframe>
            </div>
    	    <h1 class="view-title"><?php echo h($article['Article']['title']); ?></h1>
            <div class="view-info">
            <div class="row">
                <div class="col-xs-3">
                    <?php echo $this->Html->image(
                        "/files/article/photo/{$article['Article']['photo_dir']}/{$article['Article']['photo']}",
                            array('width'=>'','height'=>'','alt'=>'', 'class'=>'xv-thumb img-responsive')
                        )
                    ?>
                </div>
                <div class="col-xs-5">
                    <ul class="view-info-list">
                        <li><span>投稿日: <?php echo h($article['Article']['date']); ?></span></li>
                        <li><span>再生時間: <?php echo h($article['Xvideo']['time']); ?></span></li>
                        <li><span>タグ: 
                            <?php foreach (explode(",", $article['Article']['tags']) as $tag): ?>
                                <span>
                                    <a class="view-tags" href="" rel="nofollow" target="_blank"><?php echo $tag ?></a> 
                                </span>
                            <?php endforeach; ?>
                        </span></li>
                    </ul>
                </div>
                <div class="col-xs-4">
                    <h3 class="view-views"><?php echo h($article['Xvideo']['view']); ?> 回再生</h3>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-3">
<h1>あああああああああああああああああああああ</h1>
</div>

