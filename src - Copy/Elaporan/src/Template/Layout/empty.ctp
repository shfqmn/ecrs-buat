<html>
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('bootstrap.css') ?>
        <?= $this->Html->script('jquery.min.js') ?>
        <?= $this->Html->script('bootstrap.min.js') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
<body>
    <?= $this->fetch('content'); ?>
    </body>
        