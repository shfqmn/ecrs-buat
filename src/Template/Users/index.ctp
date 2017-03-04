<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <div>
        <h3><?= __('Users') ?></h3>
        <table class="table" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">
                        <?= $this->Paginator->sort('username') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('email') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('name') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('home_num') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('hp_num') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('block') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('lvl') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('role') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('created') ?>
                    </th>
                    <th scope="col">
                        <?= $this->Paginator->sort('modified') ?>
                    </th>
                    <th scope="col" class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?= h($user->username) ?>
                        </td>
                        <td>
                            <?= h($user->email) ?>
                        </td>
                        <td>
                            <?= h($user->name) ?>
                        </td>
                        <td>
                            <?= h($user->home_num) ?>
                        </td>
                        <td>
                            <?= h($user->hp_num) ?>
                        </td>
                        <td>
                            <?= h($user->block) ?>
                        </td>
                        <td>
                            <?= h($user->lvl) ?>
                        </td>
                        <td>
                            <?= h($user->role) ?>
                        </td>
                        <td>
                            <?= h($user->created) ?>
                        </td>
                        <td>
                            <?= h($user->modified) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p>
                <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
            </p>
        </div>
    </div>