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

 <div class="col-sm-10">
    <?= $this->Form->create($srk) ?>
    <fieldset>
        <legend><?= __('Add Srk') ?></legend>
        <?php
            echo $this->Form->input('username',['class'=>'form-control']);
            echo $this->Form->input('password',['class'=>'form-control']);
            echo $this->Form->input('password2',['class'=>'form-control','label'=>'Confirm Password']);
            echo $this->Form->input('upk_id', ['options' => $upk,'class'=>'form-control']);
            echo $this->Form->input('name',['class'=>'form-control']);
            echo $this->Form->input('college',['class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
