<div class="col-md-10 col-md-offset-2">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('college') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($upk as $upk): ?>
        <tr>
			<td><?= h($upk->name) ?></td>
            <td><?= h($upk->username) ?></td>
            <td><?= h($upk->_fields['college']) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View Reports'), ['controller'=>'upk','action' => 'report', $upk->id]) ?>
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
