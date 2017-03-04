<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sick'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Report'), ['controller' => 'Report', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Report', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sick form large-9 medium-8 columns content">
    <?= $this->Form->create($sick) ?>
    <fieldset>
        <legend><?= __('Add Sick') ?></legend>
        <?php
            echo $this->Form->input('datetime');
            echo $this->Form->input('name');
            echo $this->Form->input('courseCode');
            echo $this->Form->input('ic');
            echo $this->Form->input('tel');
            echo $this->Form->input('studentNo');
            echo $this->Form->input('notes');
            echo $this->Form->input('homeAddress');
            echo $this->Form->input('collegeAddress');
            echo $this->Form->input('report_id', ['options' => $report]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
