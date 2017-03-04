<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Srk'), ['action' => 'edit', $srk->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Srk'), ['action' => 'delete', $srk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $srk->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Srk'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Srk'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Upk'), ['controller' => 'Upk', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Upk'), ['controller' => 'Upk', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="srk view large-10 medium-9 columns">
    <h2><?= h($srk->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($srk->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($srk->password) ?></p>
            <h6 class="subheader"><?= __('Upk') ?></h6>
            <p><?= $srk->has('upk') ? $this->Html->link($srk->upk->name, ['controller' => 'Upk', 'action' => 'view', $srk->upk->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($srk->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($srk->id) ?></p>
            <h6 class="subheader"><?= __('College') ?></h6>
            <p><?= $this->Number->format($srk->college) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Report') ?></h4>
    <?php if (!empty($srk->report)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Date') ?></th>
            <th><?= __('Srk Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($srk->report as $report): ?>
        <tr>
            <td><?= h($report->id) ?></td>
            <td><?= h($report->date) ?></td>
            <td><?= h($report->srk_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Report', 'action' => 'view', $report->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Report', 'action' => 'edit', $report->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Report', 'action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
