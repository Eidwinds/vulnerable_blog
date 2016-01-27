<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ようこそ。みんなのブログへ</title>
	<link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>css/style.css" rel="stylesheet" />
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php if($is_signin): ?>
			<p><a href="<?= base_url(); ?>admin">トップ</a>　|　<a href="<?= base_url(); ?>admin/blog">記事一覧</a>　|　<a href="<?= base_url(); ?>admin/log">ログイン履歴</a>　|　<a href="<?= base_url(); ?>admin/inquiry">お問い合わせ一覧</a>　|　<a href="<?= base_url(); ?>admin/key">管理キー変更</a>　|　<a href="<?= base_url(); ?>admin/logout">ログアウト</a></p>
			<?php endif; ?>
		</div>
	</div>
</div>