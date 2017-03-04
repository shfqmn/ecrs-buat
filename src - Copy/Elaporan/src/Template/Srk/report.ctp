

<nav class="col-md-2">
    <ul class="list-group">
    <li class="list-group-item"><?= $this->Html->link(_('New Report'),['controller'=>'Report','action'=>'add',])?></li>
	<li class="list-group-item"><?= $this->Html->link(_('List Report'),['controller'=>'Srk','action'=>'report'])?></li>
</ul>
</nav>

<div class="col-md-10">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Date') ?></th>
            <th><?= $this->Paginator->sort('Last Updated') ?></th>
            <th><?= $this->Paginator->sort('Status')?></th>
            <th><?= $this->Paginator->sort('Reason')?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reports as $report): ?>
        <tr>
            <td><?=h($report->reportDate) ?></td>
            <td><?=h($report->last_updated)?></td>
            <td><?=h($report->status)?></td>
			<td><?= h($report->reason) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['controller'=>'report','action' => 'edit', $report->id],['target'=>'_blank']) ?>
                <?= $this->Html->link(__('View'), ['controller'=>'report','action' => 'pdf', $report->id],['target'=>'_blank']) ?>
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
