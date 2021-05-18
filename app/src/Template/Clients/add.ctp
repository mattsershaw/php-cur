<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('操作') ?></li>
        <li><?= $this->Html->link(__('クライアント一覧'), ['action' => 'list']) ?></li>
        <?php if (h($level) == 1) { ?>
        <li><?= $this->Html->link(__('クライアントの新規登録'), ['action' => 'add']) ?></li>
        <?php } ?>
        <li><?= $this->Html->link(__('在庫一覧'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <?php if (h($level) == 2) { ?>
        <li><?= $this->Html->link(__('在庫の新規登録'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <?php } ?>
        <li><?= $this->Html->link(__('在庫のCSV出力'), ['controller' => 'Products', 'action' => 'export']) ?></li>
        <li><?= $this->Html->link(__('ログアウト'), ['action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('クライアントの新規登録') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('password');
            echo $this->Form->select('level', [1 => '在庫発注管理者', 2 => '在庫発注社員', 3 => '在庫受注社']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
