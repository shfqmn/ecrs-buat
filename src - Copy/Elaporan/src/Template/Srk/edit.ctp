<?php unset($srk['password']); ?>

<div class="srk form large-10 medium-9 columns">
    <?= $this->Form->create($srk) ?>
    <fieldset>
        <legend><?= __('Edit Srk') ?></legend>
        <?php
            echo $this->Form->input('name',['class'=>'form-control']);
            echo $this->Form->input('college',['class'=>'form-control']);
            echo $this->Form->input('password',['class'=>'form-control','label'=>'Current Password']);
            echo $this->Form->input('new-password',['class'=>'form-control','label'=>'New Password','type'=>'password']);
            echo $this->Form->input('new-password2',['class'=>'form-control','label'=>'Confirm Password','type'=>'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
