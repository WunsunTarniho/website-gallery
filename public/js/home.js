// // document.addEventListener('scroll', function () {
// //     let navbar = document.querySelector('header');
// //     let navLink = document.querySelector('header a');
// //     let sidebarButton = document.querySelector('.navbar-nav svg');

// //     let isScrolled = window.scrollY > 50;

// //     navbar.classList.toggle('bg-white', isScrolled);
// //     navLink.classList.toggle('text-dark', isScrolled);
// //     navbar.classList.toggle('bg-transparent', !isScrolled);
// //     navLink.classList.toggle('text-white', !isScrolled);
// //     sidebarButton.classList.toggle('text-white', !isScrolled);
// //     sidebarButton.classList.toggle('text-dark', isScrolled);
// // });

$(document).ready(function () {
    let navbar = $('header');
    let navLink = $('header a');
    let svg = $('header svg');

    svg.each(function () {
        $(this).toggleClass('text-dark');
        $(this).toggleClass('text-white');
    })

    navbar.toggleClass('sticky-top');
    navbar.toggleClass('fixed-top');
    navbar.toggleClass('bg-transparent');
    navbar.toggleClass('bg-white');
    navLink.toggleClass('text-dark');
    navLink.toggleClass('text-white');

    $(document).scroll(function () {
        let isScrolled = window.scrollY > 50;

        svg.each(function () {
            $(this).toggleClass('text-dark', isScrolled);
            $(this).toggleClass('text-white', !isScrolled);
        })

        navbar.toggleClass('bg-white', isScrolled);
        navbar.toggleClass('bg-transparent', !isScrolled);
        navLink.toggleClass('text-dark', isScrolled);
        navLink.toggleClass('text-white', !isScrolled);
    });

    $('.posts').each(function () {
        $(this).on('mouseenter',
            function () {
                $(this).children('.button-post').removeClass('opacity-0');
                $(this).children('.title-post').removeClass('opacity-0');
            }
        );

        $(this).on('mouseleave',
            function () {
                $(this).children('.button-post').addClass('opacity-0');
                $(this).children('.title-post').addClass('opacity-0');
            }
        );
    })
});
