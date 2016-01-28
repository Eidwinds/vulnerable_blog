<?php foreach($blogs as $blog): ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><?= $blog->title; ?>(<?= date("Y/m/d H:i:s", $blog->created_at); ?>)</h1>
				<p><?= nl2br($blog->body); ?></p>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<div class="container">
	<div class="row">
<?= $pager; ?>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>削除キーの入力</h1>
			<p>投稿した時の削除キーを入力すると記事を削除することができます。</p>
			<a href="<?= base_url(); ?>delete">削除キーの入力へ</a>
		</div>
	</div>
</div>