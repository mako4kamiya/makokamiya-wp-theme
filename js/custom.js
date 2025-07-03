let swiper;

function initSwiper() {
    // 現在のURLが /works/ の場合、Swiperを初期化しない
    if (window.location.pathname === '/portfolio/works/') {
        return;
    }

    // モバイル画面の場合、Swiperを初期化しない
    if (window.matchMedia("(max-width: 768px)").matches) {
        return;
    }

    // 既存のSwiperインスタンスを破棄
    if (swiper) {
        swiper.destroy(true, true);
    }

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
}

// ページ読み込み時にSwiperを初期化
window.addEventListener('DOMContentLoaded', initSwiper);

// ウィンドウサイズが変更されたときもSwiperを再初期化（レイアウト切り替え対応）
window.addEventListener('resize', function() {
    initSwiper();
});