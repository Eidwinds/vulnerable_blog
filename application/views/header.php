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
		<div class="col-lg-11">
			<h1><a href="<?= base_url(); ?>">ようこそ。みんなのブログへ</a></h1>
			<p>このホームページでは誰でもブログを投稿することができます。<br>
				また投稿された記事は本人以外が削除することはできません！</p>
			<a href="<?= base_url(); ?>submit">記事を投稿する</a>
		</div>
		<div class="col-lg-1">
			<a href="<?= base_url(); ?>admin" class="btn btn-default">管理ページへ</a>
		</div>
	</div>
</div>