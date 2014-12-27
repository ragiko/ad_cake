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
                       array('width'=>'','height'=>'','alt'=>'', 'id'=>$article['Xvideo']['id'], 'class'=>'xv-thumb img-responsive')
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
