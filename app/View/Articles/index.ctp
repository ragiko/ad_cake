<?php
// Bootstrap core CSS
$this->Html->css('bootstrap', null, array('inline' => false));
// Custom styles for this template
$this->Html->css('dashboard', null, array('inline' => false));
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Project name</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Help</a></li>
      </ul>
      <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search...">
      </form>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-2 sidebar">
      <h3>タグリスト</h3>
      <ul class="nav nav-sidebar">
        <li><a href="#">巨乳(20)</a></li>
        <li><a href="#">爆乳(102)</a></li>
        <li><a href="#">フェラ(32)</a></li>
        <li><a href="#">フェラ(32)</a></li>
      </ul>
    </div>
    <div class="col-xs-10 col-xs-offset-2 main">
      <h1 class="page-header">サイト</h1>

      <div class="row placeholders">
        <?php foreach ($articles as $article): ?>
        <div class="col-xs-2 placeholder-wrapper">
            <div class="placeholder">
                <div class="placeholder-first">
                    <?php 
                    echo $this->Html->link(
                        $this->Html->image(
                            "/files/article/photo/{$article['Article']['photo_dir']}/{$article['Article']['photo']}",
                             array('width'=>'','height'=>'','alt'=>'', 'class'=>'xv-thumb img-responsive')
                        ),
                        array('action' => 'view', $article['Article']['id']), // 必須
                        array('escape'=>false)
                    ); 
                    ?>
                    <span class="label-time"><?php echo h($article['Xvideo']['time']); ?></span>
                    <span class="label-site"><img src="/img/xv.png" alt="" width="65" height="16"></span>
                    <p>
                        <img width="14" height="5" alt="タグ" src="/img/tag.png">
                    </p>
                    <ul>
                        <?php foreach (explode(",", $article['Article']['tags']) as $tag): ?>
                            <li>
                                <a href="" rel="nofollow" target="_blank"><?php echo $tag ?></a> 
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="placeholder-icons">
                        <span class="glyphicon glyphicon-thumbs-up icon-vote" aria-hidden="true"></span><span class="label-vote"><?php echo h($article['Xvideo']['vote']); ?></span>
                        <span class="glyphicon glyphicon-eye-open icon-view" aria-hidden="true"></span><span class="label-view"><?php echo h($article['Xvideo']['view']); ?></span>
                    </div>
                </div>
                <div class="placeholder-second">
                    <h2>
                        <?php 
                        echo $this->Html->link(
                            h($article['Article']['title']),
                            array('action' => 'view', $article['Article']['id']) // 必須
                        ); 
                        ?>
                    </h2>
                    <p class="label-date"><?php echo h($article['Article']['date']); ?> 更新</p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php $this->Html->script('bootstrap.min'); ?>
<?php $this->Html->script('doc.min'); ?>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<?php $this->Html->script('ie10-viewport-bug-workaround'); ?>
