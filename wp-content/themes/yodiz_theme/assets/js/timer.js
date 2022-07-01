document.addEventListener('DOMContentLoaded', function() {

    let diff = $('#h1').data('diff')

    let timerId = null;

    function declensionNum(num, words) {
        return words[(num % 100 > 4 && num % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][(num % 10 < 5) ? num % 10 : 5]];
    }
    // вычисляем разницу дат и устанавливаем оставшееся времени в качестве содержимого элементов
    function countdownTimer() {

        if (diff <= 0) {
            clearInterval(timerId);
        }

        const days = diff > 0 ? Math.floor(diff / 60 / 60 / 24) : 0;
        const hours = diff > 0 ? Math.floor(diff / 60 / 60) % 24 : 0;
        const minutes = diff > 0 ? Math.floor(diff / 60) % 60 : 0;
        const seconds = diff > 0 ? diff % 60 : 0;
        $days.textContent = days < 10 ? '0' + days : days;
        $txt.textContent = declensionNum(days, ['день', 'дня', 'дней']);
        $hours.textContent = hours < 10 ? '0' + hours : hours;
        $minutes.textContent = minutes < 10 ? '0' + minutes : minutes;
        $seconds.textContent = seconds < 10 ? '0' + seconds : seconds;
        $days.dataset.title = declensionNum(days, ['день', 'дня', 'дней']);

        diff -= 1;
    }

    const $days = document.querySelector('.timer__days');
    const $hours = document.querySelector('.timer__hours');
    const $minutes = document.querySelector('.timer__minutes');
    const $seconds = document.querySelector('.timer__seconds');
    const $txt = document.querySelector('.timer__text');

    countdownTimer();

    timerId = setInterval(countdownTimer, 1000);
});