<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>

<div class="users form">
<?php echo $this->Form->create('User'); ?>

    <fieldset>
		<legend><?php echo __('Add Article'); ?></legend>
    <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('password');
		echo $this->Form->input('role');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
