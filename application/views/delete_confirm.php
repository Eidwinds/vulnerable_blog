<?php if($blog != null): ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><?= $blog[0]->title; ?>(<?= date("Y/m/d H:i:s", $blog[0]->created_at); ?>)</h1>
				<p>削除キー:<?= $blog[0]->del_key; ?></p>
				<p><?= nl2br($blog[0]->body); ?></p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>この記事を削除してよろしいですか？</h1>
				<form action="<?= base_url(); ?>delete/finish" method="post">
					<input type="hidden" name="id" value="<?= $blog[0]->id; ?>">
					<button type="submit" class="btn btn-danger btn-block">削除する</button>
				</form>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>無効な削除キーです。</h1>
			</div>
		</div>
	</div>
<?php endif;?>