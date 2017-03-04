<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Upk'), ['action' => 'edit', $upk->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Upk'), ['action' => 'delete', $upk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $upk->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Upk'), ['action' => 'display']) ?> </li>
        <li><?= $this->Html->link(__('New Upk'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Srk'), ['controller' => 'Srk', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Srk'), ['controller' => 'Srk', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="upk view large-10 medium-9 columns">
    <h2><?= h($upk->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($upk->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($upk->password) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($upk->name) ?></p>
            <h6 class="subheader"><?= __('College') ?></h6>
            <p><?= h($upk->college) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($upk->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Srk') ?></h4>
    <?php if (!empty($upk->srk)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Upk Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('College') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($upk->srk as $srk): ?>
        <tr>
            <td><?= h($srk->id) ?></td>
            <td><?= h($srk->username) ?></td>
            <td><?= h($srk->password) ?></td>
            <td><?= h($srk->upk_id) ?></td>
            <td><?= h($srk->name) ?></td>
            <td><?= h($srk->college) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Srk', 'action' => 'view', $srk->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Srk', 'action' => 'edit', $srk->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Srk', 'action' => 'delete', $srk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $srk->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
