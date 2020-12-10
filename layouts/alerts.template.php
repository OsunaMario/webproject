		<?php if (isset($_SESSION) && isset($_SESSION['error']) ): ?>
		<h5>
			Error: <?= $_SESSION['error'] ?>
		</h5>
		<?php unset($_SESSION['error']); ?>
		<?php endif ?>

		<?php if (isset($_SESSION) && isset($_SESSION['success']) ): ?>
		<h5>
			Correcto: <?= $_SESSION['success'] ?>
		</h5>
		<?php unset($_SESSION['success']); ?>
		<?php endif ?>
		