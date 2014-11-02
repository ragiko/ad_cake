<div class="xvideos form">
<?php echo $this->Form->create('Xvideo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Xvideo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('vote');
		echo $this->Form->input('view');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Xvideo.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Xvideo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Xvideos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
