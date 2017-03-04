<nav class="col-md-2">
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Add New Admin'),['controller'=>'admin','action'=>'add'])?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Admin'),['controller'=>'admin','action'=>'display'])?></li>
         <li class="list-group-item"><?= $this->Html->link(__('Add New SRK'),['controller'=>'srk','action'=>'add'])?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List SRK'),['controller'=>'srk','action'=>'display'])?></li>
         <li class="list-group-item"><?= $this->Html->link(__('Add New UPK'),['controller'=>'upk','action'=>'add'])?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List UPK'),['controller'=>'upk','action'=>'display'])?></li>
    </ul>
</nav>

<div class="col-md-10">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($admin as $admin): ?>
        <tr>
            <td><?= h($admin->username) ?></td>
            <td class="actions">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete {0}?', $admin->name)]) ?>
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
