<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sick'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Report'), ['controller' => 'Report', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Report', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sick index large-9 medium-8 columns content">
    <h3><?= __('Sick') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('datetime') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('courseCode') ?></th>
                <th><?= $this->Paginator->sort('ic') ?></th>
                <th><?= $this->Paginator->sort('tel') ?></th>
                <th><?= $this->Paginator->sort('studentNo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sick as $sick): ?>
            <tr>
                <td><?= $this->Number->format($sick->id) ?></td>
                <td><?= h($sick->datetime) ?></td>
                <td><?= h($sick->name) ?></td>
                <td><?= h($sick->courseCode) ?></td>
                <td><?= h($sick->ic) ?></td>
                <td><?= h($sick->tel) ?></td>
                <td><?= h($sick->studentNo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sick->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sick->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sick->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sick->id)]) ?>
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
