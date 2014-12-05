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
    <div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Export</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="">Nav item</a></li>
        <li><a href="">Nav item again</a></li>
        <li><a href="">One more nav</a></li>
        <li><a href="">Another nav item</a></li>
        <li><a href="">More navigation</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="">Nav item again</a></li>
        <li><a href="">One more nav</a></li>
        <li><a href="">Another nav item</a></li>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">サイト</h1>

      <div class="row placeholders">
        <?php foreach ($articles as $article): ?>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="http://img100-064.xvideos.com/videos/thumbslll/07/72/47/07724700927d81178ff7207ee0942b5a/07724700927d81178ff7207ee0942b5a.26.jpg" alt="" class="img-responsive">
	        <h4><?php echo h($article['Article']['title']); ?>&nbsp;</h4>
	        <h4><?php echo h($article['Article']['date']); ?>&nbsp;</h4>
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
