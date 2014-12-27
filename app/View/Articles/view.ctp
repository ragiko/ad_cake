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
            <?php echo h($article['Article']['tags']); ?>,
        </dd>
	</dl>
</div>

