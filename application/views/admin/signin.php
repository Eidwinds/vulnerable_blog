<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>管理ページログイン</h1>
			<p>管理キーを入力してください。</p>
			<?php if($error): ?>
			<p class="text-danger">管理キーは<?= $key; ?>ではありません!!!!!</p>
			<?php endif; ?>
			<form action="" method="post">
				<div class="form-group">
					<label>管理キー</label>
					<input type="text" name="key" class="form-control" required="">
				</div>
				<button type="submit" class="btn btn-primary btn-block">ログイン</button>
			</form>
		</div>
	</div>
</div>