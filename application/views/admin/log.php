<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>ログイン履歴</h1>
			<table class="table">
				<tr>
					<th>時間</th>
					<th>IP</th>
					<th>UA</th>
				</tr>
				<?php foreach($logs as $log): ?>
					<tr <?php
					if($log->result == 0)
					{
						echo 'style="background-color:#999;"';
					}
					?>>
						<td><?= date("Y/m/d H:i:s", $log->created_at); ?></td>
						<td><?=$log->ip; ?></td>
						<td><?=$log->ua; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?= $pager; ?>
		</div>
	</div>
</div>