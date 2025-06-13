let swiper;

function initSwiper() {
    if (swiper) swiper.destroy(true, true);

    if (window.matchMedia("(min-width: 768px)").matches) {
        swiper = new Swiper('.swiper', {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            coverflowEffect: {
                depth: 100,
                modifier: 1,
                rotate: 50,
                scale: 1,
                stretch: 0,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    } else {
        swiper = new Swiper('.swiper', {
            direction: "vertical",
            spaceBetween: 32,
            loop: true,
            grabCursor: true,
        });
    }
}

// ページ読み込み時にSwiperを初期化
window.addEventListener('DOMContentLoaded', initSwiper);

// ウィンドウサイズが変更されたときもSwiperを再初期化（レイアウト切り替え対応）
window.addEventListener('resize', function() {
    initSwiper();
});