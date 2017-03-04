<?php unset($admin['password']); ?>
<div class="admin form large-10 medium-9 columns">
    <?= $this->Form->create($admin) ?>
    <fieldset>
        <legend><?= __('Edit Admin') ?></legend>
        <?php
            echo $this->Form->input('name',['class'=>'form-control']);
            echo $this->Form->input('password',['class'=>'form-control','label'=>'Current Password']);
            echo $this->Form->input('new-password',['class'=>'form-control','label'=>'New Password','type'=>'password']);
            echo $this->Form->input('new-password2',['class'=>'form-control','label'=>'Confirm Password','type'=>'password']);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
