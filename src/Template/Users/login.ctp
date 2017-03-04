<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <?php echo __('Sign In'); ?>
            </div>
        </div>
        <div class="panel-body">
            <?php echo $this->Flash->render(); ?>
                <?php echo $this->Form->create(); ?>
                    <?php echo $this->Form->control('username',
                                                    ['class'=>'form-control',
                                                     'label'=>false,
                                                     'placeholder'=>'Username or Email',
                                                     'error'=>['wrap'=>'label']]); ?>
                        <?php  echo $this->Form->control('password',['class'=>'form-control','label'=>false,'placeholder'=>'Password']); ?>
                            <p>
                                <?php echo $this->Form->submit(__('Sign in'),['class'=>'btn btn-primary']); ?>
                                    <div class="pull-right"> <small><?php echo $this->Html->link(__('Forgot password?'), ['controller' => 'Users','action' => 'forgot']); ?></small>
                                        <br /> <small><?php echo $this->Html->link(__('Resend activation email?'), ['controller' => 'Users','action' => 'activate']); ?></small> </div>
                            </p>
                            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>