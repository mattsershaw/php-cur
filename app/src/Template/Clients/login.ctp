<div class="clients form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
	<fieldset>
		<legend>アカウント名とパスワードを入力して下さい。</legend>
		<?= $this->Form->control('name') ?>
		<?= $this->Form->control('password') ?>
	</fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>
