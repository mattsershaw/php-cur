<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('操作') ?></li>
        <li><?= $this->Html->link(__('クライアント一覧'), ['controller' => 'Clients', 'action' => 'list']) ?></li>
        <?php if (h($level) == 1) { ?>
        <li><?= $this->Html->link(__('クライアントの新規登録'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <?php } ?>
        <li><?= $this->Html->link(__('在庫一覧'), ['action' => 'index']) ?></li>
        <?php if (h($level) == 2) { ?>
        <li><?= $this->Html->link(__('在庫の新規登録'), ['action' => 'add']) ?></li>
        <?php } ?>
        <li><?= $this->Html->link(__('在庫のCSV出力'), ['action' => 'export']) ?></li>
        <li><?= $this->Html->link(__('ログアウト'), ['action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('在庫の新規登録') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('amount');
            echo $this->Form->control('price');
            // 発注確認としての登録
            echo $this->Form->hidden('status', array('value' => 1));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
