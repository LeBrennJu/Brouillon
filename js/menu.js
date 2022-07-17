const menu = {
    init: function () {
        console.log('init menu OK');
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

        // pour mettre le menu sur le reste de la page, 
        // on calcule l'espace qu'il y entre le 1er élément du menu et le bas de page
        // let menuHaut = document.querySelector('.menu').offsetTop;
        // let menuBas = window.innerHeight;
        // document.querySelector('.menu--page').style.height = menuBas - menuHaut - 15 + 'px';

        document.querySelector('main').classList.toggle('hide');
        document.querySelector('footer').classList.toggle('hide');

        // si le menu est ouvert, on règle les hauteurs des éléments pour les répartir uniformément sur la page
        // document.querySelector('.menu--page').classList.toggle('menu--open--fullscreen__nav');
        // document.querySelector('.banner').classList.toggle('menu--open--fullscreen__header');
        // console.log(menuHaut, menuBas, menuBas - menuHaut);
    }

};