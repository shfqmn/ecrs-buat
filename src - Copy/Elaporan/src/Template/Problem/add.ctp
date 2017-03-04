<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Problem'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reportproblem'), ['controller' => 'Reportproblem', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reportproblem'), ['controller' => 'Reportproblem', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="problem form large-10 medium-9 columns">
    <?= $this->Form->create($problem) ?>
    <fieldset>
        <legend><?= __('Add Problem') ?></legend>
        <?php
            echo $this->Form->input('details');
            echo $this->Form->input('timePlace');
            echo $this->Form->input('action');
            echo $this->Form->input('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
