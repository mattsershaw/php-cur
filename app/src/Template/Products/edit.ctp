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
<div class="prodcuts form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('在庫の編集') ?></legend>
        <?php
            if (h($level) == 1) {
            echo $this->Form->control('name');
            echo $this->Form->control('amount');
            echo $this->Form->control('price');
            } else {
            echo $this->Form->control('name', ['disabled' => 'true']);
            echo $this->Form->control('amount', ['disabled' => 'true']);
            echo $this->Form->control('price', ['disabled' => 'true']);
            }
            if (h($level) == 1 && h($product->status) == 1) {
                echo $this->Form->select('status', [1 => '発注確認', 2 => '発注状態']);
            } elseif (h($level) == 1 && h($product->status) == 3) {
                echo $this->Form->select('status', [3 => '発注済み', 4 => '発注受け取り済み']);
            } elseif (h($level) == 3 && h($product->status) == 2) {
                echo $this->Form->select('status', [2 => '発注状態', 3 => '発注済み']);
            } 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
