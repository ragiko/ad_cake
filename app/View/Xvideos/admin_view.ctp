<div class="xvideos view">
<h2><?php echo __('Xvideo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
            <?php echo h($xvideo['Xvideo']['id']); ?>
            <iframe src="http://flashservice.xvideos.com/embedframe/<?php echo h($xvideo['Xvideo']['id']); ?>" frameborder=0 width=510 height=400 scrolling=no></iframe>
			&nbsp;
		</dd>
		<dt><?php echo __('Vote'); ?></dt>
		<dd>
			<?php echo h($xvideo['Xvideo']['vote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('View'); ?></dt>
		<dd>
			<?php echo h($xvideo['Xvideo']['view']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($xvideo['Xvideo']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($xvideo['Xvideo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($xvideo['Xvideo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Xvideo'), array('action' => 'edit', $xvideo['Xvideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Xvideo'), array('action' => 'delete', $xvideo['Xvideo']['id']), array(), __('Are you sure you want to delete # %s?', $xvideo['Xvideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Xvideos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Xvideo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Articles'); ?></h3>
	<?php if (!empty($xvideo['Article'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Video Nummber'); ?></th>
		<th><?php echo __('Xvideo Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($xvideo['Article'] as $article): ?>
		<tr>
			<td><?php echo $article['id']; ?></td>
			<td><?php echo $article['title']; ?></td>
			<td><?php echo $article['date']; ?></td>
			<td><?php echo $article['video_nummber']; ?></td>
			<td><?php echo $article['xvideo_id']; ?></td>
			<td><?php echo $article['created']; ?></td>
			<td><?php echo $article['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), array(), __('Are you sure you want to delete # %s?', $article['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
