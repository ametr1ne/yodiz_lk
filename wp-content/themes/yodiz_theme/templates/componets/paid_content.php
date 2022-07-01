<!-- progress(start)-->

<?php include 'progressBlock.php' ?>

<!-- progress(end) -->

<!-- theory(start) -->

<?php showVideos() ?>

<!-- theory(end) -->

<!-- homework(start)-->


<!-- homework(end)-->

<!-- materials(start)-->

<?php showMaterials() ?>

<!-- materials(end)-->

<!-- checking-hw(start)-->

<?php if (get_field('show_hw')) { ?>
    <div class="checking-hw content-item paid-hw">
        <h2>Отправить домашнее задание на проверку</h2>
        <a href="https://t.me/yodizstudio" target="_blank" class="btn send-hw">
            Отправить
        </a>
    </div>
<?php } ?>

<!-- checking-hw(end)-->

<?php if (get_field('next-lesson-link') !== '-') { ?>

    <a data-href="<?php the_field('next-lesson-link') ?>" data-post="<?= $post->ID ?>" class="next-lesson content-item">
        Перейти к следующему уроку
        <svg width="41" height="15" viewBox="0 0 41 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M40.7071 8.16634C41.0976 7.77581 41.0976 7.14265 40.7071 6.75213L34.3431 0.388164C33.9526 -0.00236071 33.3195 -0.00236077 32.9289 0.388164C32.5384 0.778688 32.5384 1.41185 32.9289 1.80238L38.5858 7.45923L32.9289 13.1161C32.5384 13.5066 32.5384 14.1398 32.9289 14.5303C33.3195 14.9208 33.9526 14.9208 34.3431 14.5303L40.7071 8.16634ZM-8.74228e-08 8.45923L40 8.45923L40 6.45923L8.74228e-08 6.45923L-8.74228e-08 8.45923Z"
                  fill="black"/>
        </svg>
    </a> <?php } ?>