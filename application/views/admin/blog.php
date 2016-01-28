<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>記事一覧</h1>
			<table class="table">
				<tr>
					<th class="col-md-1">時間</th>
					<th>タイトル<br>削除キー</th>
					<th>本文</th>
				</tr>
				<?php foreach($blogs as $blog): ?>
					<tr>
						<td><?= date("Y/m/d H:i:s", $blog->created_at); ?></td>
						<td><?= $blog->title; ?><br><?= $blog->del_key; ?></td>
						<td><?= nl2br($blog->body); ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?= $pager; ?>
		</div>
	</div>
</div>