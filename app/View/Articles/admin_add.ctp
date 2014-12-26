<div class="articles form">
<?php echo $this->Form->create('Article', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Article'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('date');
		echo $this->Form->input('video_nummber');
		echo $this->Form->input('xvideo_id');
		echo $this->Form->input('tags');
        echo $this->Form->input('photo', array('type' => 'file'));
        echo $this->Form->input('photo_dir', array('type' => 'hidden')); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Xvideos'), array('controller' => 'xvideos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Xvideo'), array('controller' => 'xvideos', 'action' => 'add')); ?> </li>
	</ul>
</div>
