document.addEventListener('DOMContentLoaded', () => {

    const $body = document.body;
    const $burger = document.querySelector('.burger');
    const $mobItems = document.querySelectorAll('.mob-item');
    const $btns = document.querySelectorAll('.btn-menu');
    const $catalogMenuLeftItems = document.querySelectorAll(' .left-side__item');
    const $catalogMenuRightLists = document.querySelectorAll('.right-side__list');

    if (window.innerWidth <= 878) {

        document.querySelector('nav').classList.add('header-menu__mob');
        const $headerMenuMob = document.querySelector('.header-menu__mob');

        $burger.addEventListener('click', function () {

            if ($headerMenuMob.classList.contains('active-menu')) {

                $($headerMenuMob).hide(500);
                $headerMenuMob.classList.remove('active-menu')
                $body.classList.remove('lock')
            } else {

                $($headerMenuMob).show(500)
                $headerMenuMob.classList.add('active-menu')
                $body.classList.add('lock')
            }
        })
    }

    if ($btns && $catalogMenuLeftItems) {
        $btns.forEach(btn => {

            if (window.innerWidth <= 878) {
                btn.addEventListener('click', (event) => {

                    event.preventDefault();

                    const $catalogMenuMob = $($(event.target).parent().get(0)).find('.catalog-menu__mob');

                    if ($catalogMenuMob.hasClass('catalog-menu__mob-active')) {

                        $catalogMenuMob.removeClass('catalog-menu__mob-active')
                        $catalogMenuMob.hide(500);
                    } else {

                        $catalogMenuMob.addClass('catalog-menu__mob-active')
                        $catalogMenuMob.show(500);
                    }

                    $mobItems.forEach((item) => {
                        item.addEventListener('click', event => {

                            event.stopPropagation();
                            event.preventDefault();

                            const $mobItemsWrapper = $catalogMenuMob.find('.mob-item__wrapper');

                            $mobItemsWrapper.each(function () {

                                if ($(item).data('child') === $(this).data('parent')) {

                                    $(this).prev().toggleClass('catalog-arrow__top');
                                    $(this).toggleClass('mob-item__wrapper-active');
                                } else {

                                    $(this).prev().removeClass('catalog-arrow__top');
                                    $(this).removeClass('mob-item__wrapper-active');
                                }
                            })
                        })
                    })
                })
            } else {
                btn.addEventListener('mouseenter', (event) => {

                    btn.querySelector('.catalog-menu').classList.add('catalog-active');
                    event.target.querySelector('.catalog-arrow').style.borderColor = '#0880AE';
                    event.target.querySelector('.h-menu__item-link').style.color = '#0880AE';
                });

                btn.addEventListener('mouseleave', (event) => {

                    btn.querySelector('.catalog-menu').classList.remove('catalog-active');
                    event.target.querySelector('.catalog-arrow').style.borderColor = '#252525';
                    event.target.querySelector('.h-menu__item-link').style.color = '#252525';
                });
            }
        })

        $catalogMenuLeftItems.forEach((item) => {

            item.addEventListener('mouseenter', (event) => {

                if (event.target.querySelector('.sub-menu__item-link')) {
                    event.target.querySelector('.catalog-arrow').style.borderColor = '#0880AE';
                    event.target.querySelector('.sub-menu__item-link').style.color = '#0880AE';
                }

                $catalogMenuRightLists.forEach((list) => {

                    if (event.target.dataset.id === list.dataset.category) {

                        list.classList.add('active-list');
                        $(list).fadeIn(100);
                    } else {

                        list.classList.remove('active-list');
                        $(list).hide();
                        list.style.right = '-100%';
                    }
                });
            });

            item.addEventListener('mouseleave', (event) => {

                if (event.target.querySelector('.sub-menu__item-link')) {
                    event.target.querySelector('.catalog-arrow').style.borderColor = '#252525';
                    event.target.querySelector('.sub-menu__item-link').style.color = '#252525';
                }

                $catalogMenuRightLists.forEach((list) => {

                    list.classList.remove('active-list');
                    $(list).hide();
                });
            })
        });
    }
});

function scrollTo(name, time = 1000) {
    if (document.querySelector(name)) {
        $('html,body').animate({
            scrollTop: $(name).offset().top - 100
        }, time);
    }
}
