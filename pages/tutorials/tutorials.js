$(document).on("click", ".handle", function () {
    handleClicked($(this));
});

$(document).on("touchstart", ".slider", function (event) {
    const touchStartX = event.originalEvent.touches[0].pageX;
    $(this).data('touchStartX', touchStartX);
});

$(document).on("touchmove", ".slider", function (event) {
    event.preventDefault();
    
    const touchEndX = event.originalEvent.touches[0].pageX;
    $(this).data('touchDiffX', $(this).data('touchStartX') - touchEndX);
});

$(document).on("touchend", ".slider", function () {
    const touchDiffX = $(this).data('touchDiffX');
    const $container = $(this).closest('.container1');

    if (Math.abs(touchDiffX) > 50) {
        if (touchDiffX > 0) {
            $container.find(".right-handle").trigger('click');
        } else {
            $container.find(".left-handle").trigger('click');
        }
    }

    $(this).removeData('touchStartX').removeData('touchDiffX');
});

const resizeThrottle = throttle(() => $(".progress-bar").each(updateProgressBar), 250);
$(window).on("resize", resizeThrottle);

$(".progress-bar").each(updateProgressBar);

function updateProgressBar() {
    const $pBar = $(this);
    $pBar.empty();

    const $sliderElem = $pBar.closest(".row").find(".slider");
    const totalItems = $sliderElem.children().length;
    const itemsInView = parseInt($sliderElem.css("--items-per-screen"), 10);
    let currentSliderIndex = parseInt($sliderElem.css("--slider-index"), 10);
    const barItemsCount = Math.ceil(totalItems / itemsInView);

    if (currentSliderIndex >= barItemsCount) {
        $sliderElem.css("--slider-index", barItemsCount - 1);
        currentSliderIndex = barItemsCount - 1;
    }

    for (let idx = 0; idx < barItemsCount; idx++) {
        const $indicator = $("<div>").addClass("progress-item");

        if (idx === currentSliderIndex) {
            $indicator.addClass("active");
        }

        $pBar.append($indicator);
    }
}

function handleClicked($detectedHandle) {
    const $pBar = $detectedHandle.closest(".row").find(".progress-bar");
    const $sliderElem = $detectedHandle.closest(".container1").find(".slider");
    const currentSliderIndex = parseInt($sliderElem.css("--slider-index"), 10);
    const barItemsCount = $pBar.children().length;

    const setActiveIndicator = (index) => {
        $pBar.children().eq(currentSliderIndex).removeClass("active");
        $pBar.children().eq(index).addClass("active");
    };

    if ($detectedHandle.hasClass("left-handle")) {
        const newIndex = currentSliderIndex - 1 < 0 ? barItemsCount - 1 : currentSliderIndex - 1;
        $sliderElem.css("--slider-index", newIndex);
        setActiveIndicator(newIndex);
    }

    if ($detectedHandle.hasClass("right-handle")) {
        const newIndex = currentSliderIndex + 1 >= barItemsCount ? 0 : currentSliderIndex + 1;
        $sliderElem.css("--slider-index", newIndex);
        setActiveIndicator(newIndex);
    }
}

function throttle(func, waitTime = 1000) {
    let isThrottled = false;
    let savedArgs;

    const delayedExecution = () => {
        if (!savedArgs) {
            isThrottled = false;
        } else {
            func(...savedArgs);
            savedArgs = null;
            setTimeout(delayedExecution, waitTime);
        }
    };

    return (...args) => {
        if (isThrottled) {
            savedArgs = args;
            return;
        }

        func(...args);
        isThrottled = true;
        setTimeout(delayedExecution, waitTime);
    }
}
