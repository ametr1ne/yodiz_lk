<!-- theory(start) -->

<?php showVideos() ?>

<!-- theory(end) -->

<!-- homework(start)-->


<!-- homework(end)-->

<!-- materials(start)-->

<?php showMaterials() ?>

<!-- materials(end)-->

<!-- checking-hw(start)-->

<div class="sale-card">
	<?php $dateEnd = '2022-05-07 21:00:00'; ?>
	<div class="tape">
		<div class="tape-item">
			<p class="tape-text">Скидка — 8 000 руб.*</p>
		</div>
		<div class="tape-item"></div>
		<div class="tape-item"></div>
	</div>
	<p class="sale-correction">*Скидка 8 000 руб. действует ограниченное количество времени</p>
	<div class="sale-title">
		<p class="title-text">Профессия веб-дизайнер</p>
		<div class="title-teachers">
			<img src="<?= get_template_directory_uri() ?>/assets/img/4_dima_ava.png" alt="dima">
			<img src="<?= get_template_directory_uri() ?>/assets/img/1_lika_ava%201.png" alt="dima">
			<img src="<?= get_template_directory_uri() ?>/assets/img/1_lecha_ava.png" alt="dima">
		</div>
	</div>
	<?php
	if ( date( 'U' ) < date( "U", strtotime( $dateEnd ) ) ) {
		$diff = date( "U", strtotime( $dateEnd ) ) - date( "U" );
		echo "<p data-diff=" . date($diff) . " class='sale-text' id='h1'>Успей записаться на основной курс
        со скидкой, страница закроется через —
        <span><span class='timer__days'>00</span> <span class='timer__text'></span>, <span class='timer__hours'>00</span>:<span
                            class='timer__minutes'>00</span>:<span class='timer__seconds'>00</span></span></p>";
	} else {
		echo "<p class='sale-text' style='margin: 0 auto'>Акция завершена</p>";
	} ?>
	<a href="https://yodizschool.ru/online/sales" target="_blank" class="sale-bnt">Записаться со скидкой</a>
</div>