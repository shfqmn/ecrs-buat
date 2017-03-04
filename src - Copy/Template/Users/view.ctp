<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Report'), ['controller' => 'Report', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Report', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Home Num') ?></th>
            <td><?= h($user->home_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hp Num') ?></th>
            <td><?= h($user->hp_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Block') ?></th>
            <td><?= h($user->block) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lvl') ?></th>
            <td><?= h($user->lvl) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile Pic') ?></th>
            <td><?= h($user->profile_pic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sign Pic') ?></th>
            <td><?= h($user->sign_pic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Token') ?></th>
            <td><?= h($user->token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Api Token') ?></th>
            <td><?= h($user->api_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($user->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Token Expires') ?></th>
            <td><?= h($user->token_expires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activation Date') ?></th>
            <td><?= h($user->activation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= $user->approved ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Report') ?></h4>
        <?php if (!empty($user->report)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('WorkingDates') ?></th>
                <th scope="col"><?= __('WorkingTimes') ?></th>
                <th scope="col"><?= __('ReportDate') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->report as $report): ?>
            <tr>
                <td><?= h($report->id) ?></td>
                <td><?= h($report->user_id) ?></td>
                <td><?= h($report->status) ?></td>
                <td><?= h($report->reason) ?></td>
                <td><?= h($report->workingDates) ?></td>
                <td><?= h($report->workingTimes) ?></td>
                <td><?= h($report->reportDate) ?></td>
                <td><?= h($report->created) ?></td>
                <td><?= h($report->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Report', 'action' => 'view', $report->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Report', 'action' => 'edit', $report->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Report', 'action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
