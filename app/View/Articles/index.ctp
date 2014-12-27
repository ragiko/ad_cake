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
      </ul>
    </div>
    <div class="col-md-10 col-xs-offset-2 main">
      <h1 class="page-header">サイト</h1>

      <div class="row placeholders">
        <?php foreach ($articles as $article): ?>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="<?php echo "/files/article/photo/{$article['Article']['photo_dir']}/{$article['Article']['photo']}"; ?>" alt="" class="img-responsive">
	        <h4><?php echo h($article['Article']['title']); ?>&nbsp;</h4>
	        <h4><?php echo h($article['Article']['date']); ?>&nbsp;</h4>
	        <h4>tag: <?php echo h($article['Article']['tags']); ?>&nbsp;</h4>
	        <h4>vote: <?php echo h($article['Xvideo']['vote']); ?>&nbsp;</h4>
	        <h4>view: <?php echo h($article['Xvideo']['view']); ?>&nbsp;</h4>
	        <h4>time: <?php echo h($article['Xvideo']['time']); ?>&nbsp;</h4>
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
