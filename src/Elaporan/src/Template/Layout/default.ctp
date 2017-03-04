<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Elaporan</title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('Elaporan.font-awesome.min.css') ?>
        <?= $this->Html->css('Elaporan.bootstrap.min.css') ?>
        <?= $this->Html->css('Elaporan.bootstrap-datetimepicker.css') ?>
       
        <?= $this->Html->script('Elaporan.jquery-2.1.1.min.js') ?>
        <?= $this->Html->script('Elaporan.bootstrap.min.js') ?>
       <?= $this->Html->script('Elaporan.moment-with-locales.js') ?>
       <?= $this->Html->script('Elaporan.bootstrap-datetimepicker.js') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><a class="navbar-brand" href="http://elaporan-qxum.c9users.io/esrk/elaporan">
                    <span><?= $this->Html->image('elaporan.png',['height'=>'30px','width'=>'120px']) ?></span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="http://elaporan-qxum.c9users.io/esrk/elaporan">Home</a></li>
        <li><a href="http://elaporan-qxum.c9users.io/esrk/">eSRK</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo user()->username; ?>
                                
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?= $this->Html->link(__('Edit Profile'),['plugin'=>'user','controller' => 'Gateway','action' => 'me']) ?></li> 
                                <li><?= $this->Html->link(__('Logout'),['plugin'=>'user','controller' => 'Gateway','action' => 'logout']) ?></li> 
                          </ul>
                        </li>
                    </ul>
    </div>
  </div>
</nav>
   <div class="container-fluid" style="padding-top:3%;">
              <div class="row">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
              </div>
        </div>

</body>
</html>
