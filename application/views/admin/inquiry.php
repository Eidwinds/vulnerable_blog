<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>お問い合わせ一覧</h1>
			<table class="table">
				<tr>
					<th class="col-md-1">時間</th>
					<th>名前<br>メールアドレス</th>
					<th>本文</th>
					<th class="col-md-1">削除</th>
				</tr>
				<?php foreach($inquiries as $inquiry): ?>
					<tr>
						<td><?= date("Y/m/d H:i:s", $inquiry->created_at); ?></td>
						<td><?= $inquiry->name; ?><br><?= $inquiry->email; ?></td>
						<td><?= nl2br($inquiry->body); ?></td>
						<td><a href="<?= base_url(); ?>admin/delinquiry/<?= $inquiry->id; ?>">削除</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?= $pager; ?>
		</div>
	</div>
</div>