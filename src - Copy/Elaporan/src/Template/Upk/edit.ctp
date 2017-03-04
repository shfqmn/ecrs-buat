<div class="upk form large-9 medium-8 columns content">
    <?= $this->Form->create($upk) ?>
    <fieldset>
        <legend><?= __('Edit Upk') ?></legend>
        <?php
            echo $this->Form->input('name',['class'=>'form-control']);
            echo $this->Form->input('sector',['class'=>'form-control']);
            echo $this->Form->input('password',['class'=>'form-control','label'=>'Current Password']);
            echo $this->Form->input('new-password',['class'=>'form-control','label'=>'New Password','type'=>'password']);
            echo $this->Form->input('new-password2',['class'=>'form-control','label'=>'Confirm Password','type'=>'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
