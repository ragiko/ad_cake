<div class="articles view">
<h2><?php echo __('Article'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($article['Article']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($article['Article']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($article['Article']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Nummber'); ?></dt>
		<dd>
			<?php echo h($article['Article']['video_nummber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Xvideo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($article['Xvideo']['id'], array('controller' => 'xvideos', 'action' => 'view', $article['Xvideo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($article['Article']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($article['Article']['modified']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Tags'); ?></dt>
        <dd>
	        <?php foreach ($tags as $tags): ?>
                <?php echo h($tags['Tag']['keyname']); ?>,
            <?php endforeach; ?>
        </dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Article'), array('action' => 'edit', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Article'), array('action' => 'delete', $article['Article']['id']), array(), __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Xvideos'), array('controller' => 'xvideos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Xvideo'), array('controller' => 'xvideos', 'action' => 'add')); ?> </li>
	</ul>
</div>
