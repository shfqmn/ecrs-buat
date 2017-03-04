<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Report'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Srk'), ['controller' => 'Srk', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Srk'), ['controller' => 'Srk', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Problem'), ['controller' => 'Problem', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problem', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sick'), ['controller' => 'Sick', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sick'), ['controller' => 'Sick', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="report index large-9 medium-8 columns content">
    <h3><?= __('Report') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('srk_id') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('reason') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($report as $report): ?>
            <tr>
                <td><?= $this->Number->format($report->id) ?></td>
                <td><?= h($report->date) ?></td>
                <td><?= $report->has('srk') ? $this->Html->link($report->srk->name, ['controller' => 'Srk', 'action' => 'view', $report->srk->id]) : '' ?></td>
                <td><?= h($report->status) ?></td>
                <td><?= h($report->reason) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $report->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $report->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
