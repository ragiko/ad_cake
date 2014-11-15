<div class="xvideos index">
	<h2><?php echo __('Xvideos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('vote'); ?></th>
			<th><?php echo $this->Paginator->sort('view'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($xvideos as $xvideo): ?>
	<tr>
		<td><?php echo h($xvideo['Xvideo']['id']); ?>&nbsp;</td>
		<td><?php echo h($xvideo['Xvideo']['vote']); ?>&nbsp;</td>
		<td><?php echo h($xvideo['Xvideo']['view']); ?>&nbsp;</td>
		<td><?php echo h($xvideo['Xvideo']['time']); ?>&nbsp;</td>
		<td><?php echo h($xvideo['Xvideo']['created']); ?>&nbsp;</td>
		<td><?php echo h($xvideo['Xvideo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $xvideo['Xvideo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $xvideo['Xvideo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $xvideo['Xvideo']['id']), array(), __('Are you sure you want to delete # %s?', $xvideo['Xvideo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Xvideo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
