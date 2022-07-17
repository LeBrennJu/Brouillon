const menu = {
    init: function () {
        console.log('init menu OK');

        // on initialise les classes 'hide suivant le format d'affichage
        if (window.innerWidth < 800) {
            document.querySelector('.menu--close.btn').classList.add('hide');
            document.querySelector('.menu').classList.add('hide');

        } else {
            document.querySelector('.menu').classList.remove('hide');
        }

        const menuBtnOpen = document.querySelector('.menu--open.btn');
        const menuBtnClose = document.querySelector('.menu--close.btn');
        menuBtnOpen.addEventListener('click', menu.handleshowMenu);
        menuBtnClose.addEventListener('click', menu.handleshowMenu);
    },


    handleshowMenu: function () {

        // on bascule l'affichage avec la classe 'hide' sur les bouttons du menu, la nav, le main et le footer
        document.querySelector('.menu--open.btn').classList.toggle('hide');
        document.querySelector('.menu--close.btn').classList.toggle('hide');
        document.querySelector('.menu').classList.toggle('hide');
        // document.querySelector('main').classList.toggle('hide');
        // document.querySelector('footer').classList.toggle('hide');

    }

};