<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $products
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
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('在庫一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->amount) ?></td>
                <td><?= h($product->price) ?></td>
                <?php if (h($product->status == 1)): ?>
                <td>発注確認</td>
                <?php elseif(h($product->status == 2)): ?>
                <td>発注状態</td>
                <?php elseif(h($product->status == 3)): ?>
                <td>発注済み</td>
                <?php elseif(h($product->status == 4)): ?>
                <td>発注受け取り済み</td>
                <?php endif; ?>
                <td class="actions">
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $product->id]) ?>
                    <?php if (h($level) == 1) { ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $product->id], ['confirm' => __('ID{0}の在庫を削除してもよろしいですか?', $product->id)]) ?>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
