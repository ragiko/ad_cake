<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
        // Bootstrap core CSS
        $this->Html->css('bootstrap', null, array('inline' => false));
        // Custom styles for this template
        $this->Html->css('dashboard', null, array('inline' => false));

		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    ?>


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <?php $this->Html->script('ie-emulation-modes-warning', array('inline' => false)); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div id="container">
		<div id="header">
			<h1></h1>
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
		</div>
		<div id="content">
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
            		<?php echo $this->Session->flash(); ?>
            		<?php echo $this->fetch('content'); ?>
                </div>
              </div>
            </div>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php echo $this->Html->script('slider'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('doc.min'); ?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo $this->Html->script('ie10-viewport-bug-workaround'); ?>
</body>
</html>
