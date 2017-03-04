<html>
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
        <style>
           .container-fluid{
               padding-top: 3%;
           }
       </style>
    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./">
                        <span><?= $this->Html->image('elaporan.png',['height'=>'30px','width'=>'120px']) ?></span>
                    </a>
                </div>
            </div>
          <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>