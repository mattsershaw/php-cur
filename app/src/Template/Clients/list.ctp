<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
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
<div class="clients index large-9 medium-8 columns content">

    <h3><?= __('クライアント一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $this->Number->format($client->id) ?></td>
                <td><?= h($client->name) ?></td>
                <td>********</td>
                <?php if (h($client->level == 1)): ?>
                <td>在庫発注管理者</td>
                <?php elseif(h($client->level == 2)): ?>
                <td>在庫発注社員</td>
                <?php elseif(h($client->level == 3)): ?>
                <td>在庫受注社</td>
                <?php endif; ?>
                <td class="actions">
                    <?php if (h($level) == 1) { ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $client->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $client->id], ['confirm' => __('ID{0}のクライアントを削除してもよろしいですか?', $client->id)]) ?>
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
