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
