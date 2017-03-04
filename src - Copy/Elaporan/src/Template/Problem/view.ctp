<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Problem'), ['action' => 'edit', $problem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Problem'), ['action' => 'delete', $problem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $problem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Problem'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Problem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reportproblem'), ['controller' => 'Reportproblem', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reportproblem'), ['controller' => 'Reportproblem', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="problem view large-10 medium-9 columns">
    <h2><?= h($problem->id) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($problem->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Details') ?></h6>
            <?= $this->Text->autoParagraph(h($problem->details)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('TimePlace') ?></h6>
            <?= $this->Text->autoParagraph(h($problem->timePlace)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Action') ?></h6>
            <?= $this->Text->autoParagraph(h($problem->action)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Notes') ?></h6>
            <?= $this->Text->autoParagraph(h($problem->notes)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Reportproblem') ?></h4>
    <?php if (!empty($problem->reportproblem)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Problem Id') ?></th>
            <th><?= __('Report Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($problem->reportproblem as $reportproblem): ?>
        <tr>
            <td><?= h($reportproblem->problem_id) ?></td>
            <td><?= h($reportproblem->report_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Reportproblem', 'action' => 'view', $reportproblem->problem_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Reportproblem', 'action' => 'edit', $reportproblem->problem_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reportproblem', 'action' => 'delete', $reportproblem->problem_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reportproblem->problem_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
