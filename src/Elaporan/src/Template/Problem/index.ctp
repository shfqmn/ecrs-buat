<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Problem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reportproblem'), ['controller' => 'Reportproblem', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reportproblem'), ['controller' => 'Reportproblem', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="problem index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($problem as $problem): ?>
        <tr>
            <td><?= $this->Number->format($problem->id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $problem->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $problem->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $problem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $problem->id)]) ?>
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
