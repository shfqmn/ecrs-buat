<div class="col-md-10 col-md-offset-2">
    <table class="table table-hover">
    <thead>
        <tr>
            <th class="actions"><?= __('Name') ?></th>
            <th><?= $this->Paginator->sort('reportDate','Date') ?></th>
            <th><?= $this->Paginator->sort('status','Status') ?></th>
            <th><?= $this->Paginator->sort('reason','Reason') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reports as $report): ?>
        <tr>
            <td><?=h($report->user->name)?></td>
			<td><?= h($report->reportDate) ?></td>
			<td><?= h($report->status) ?></td>
			<td><?= h($report->reason) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View Report'), ['controller'=>'report','action' => 'pdf', $report->reference],['target' => '_blank']) ?>
                <?= $this->Html->link(__('Action'), ['controller'=>'report','action' => 'actions', $report->reference]) ?>
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
