<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Report'), ['controller' => 'Report', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Report', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('name');
            echo $this->Form->control('home_num');
            echo $this->Form->control('hp_num');
            echo $this->Form->control('block');
            echo $this->Form->control('lvl');
            echo $this->Form->control('profile_pic');
            echo $this->Form->control('sign_pic');
            echo $this->Form->control('token');
            echo $this->Form->control('token_expires', ['empty' => true]);
            echo $this->Form->control('api_token');
            echo $this->Form->control('activation_date', ['empty' => true]);
            echo $this->Form->control('approved');
            echo $this->Form->control('active');
            echo $this->Form->control('role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
