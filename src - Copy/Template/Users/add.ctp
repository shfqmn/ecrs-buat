<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
        <fieldset>
            <legend>
                <?= __('Register') ?>
            </legend>
            <?php
            echo $this->Form->control('username',['class'=>'form-control']);
            echo $this->Form->control('email',['class'=>'form-control']);
            echo $this->Form->control('password',['class'=>'form-control']);
            echo $this->Form->control('name',['class'=>'form-control']);
            echo $this->Form->control('home_num',['class'=>'form-control']);
            echo $this->Form->control('hp_num',['class'=>'form-control']);
            echo $this->Form->control('block',[
                'label'=>'Block',
                'class'=>'form-control',
                'type'=>'select',
                'options'=>[''=>'Select Block','Taming Sari'=>'Taming Sari','Sepanau Riau'=>'Sepanau Riau','Nilam'=>'Nilam','Mutiara'=>'Mutiara','Baiduri'=>'Baiduri']
            ]);
            echo $this->Form->control('lvl',[
                'class'=>'form-control',
                'label'=>'Level',
                'type'=>'select',
                'options'=>[''=>'Select Level','Level 1','Level 2','Level 3','Level 4']
            ]);
            echo $this->Form->control('profile_pic',['type'=>'file']);
            echo $this->Form->control('sign_pic',['type'=>'file']);
        ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
</div>