<template>
    <div>
        <header>
                <div class="header--title">

                         <img class="header--title__logo" v-bind:src="logoApe" alt="">

                        <h1><span>A</span>ssociations des <span>P</span>arents d'<span>E</span>leve <div class="header--town">de Crosmières</div></h1>

                      <div class="header--profil__picture">
                        <div class="header--nav__Inscription" style="margin-right: 4px;">Inscription /</div>
                        <div class="header--nav__Connexion"> Connexion</div>
                      </div>
        <!-- /*<--------------------Button menu BURGER HIDDEN IN DESKTOP---------------------------->
                    <div class="header--burger__container">

                        <div id="menu_button">
                            <input type="checkbox" id="menu_checkbox" v-on:click="showMenu">
                            <label for="menu_checkbox" id="menu_label">
                            <div id="menu_text_bar"></div>

                        </label>
                        </div>
                    </div>
                    <!--       END BURGER         -->
                </div>                
            
                <nav>
                    <div class="header--nav__Accueil">Accueil</div>
                    <div class="header--nav__Vente">Vente</div>
                    <div class="header--nav__Evenement">Evenement</div>
                    <div class="header--nav__Presentation">Présentation APE</div>
                        
                </nav>
        </header>
          <!-- /*<--------------------MENU BURGER HIDDEN IN DESKTOP---------------------------->
        <div class="header--burger__menu">
            <ul>
                <li class="header--nav__Accueil">Accueil</li>
                <li class="header--nav__Vente">Vente</li>
                <li class="header--nav__Evenement">Evenement</li>
                <li class="header--nav__Presentation">Présentation APE</li>
                <li class="header--nav__Inscription">Inscription</li>
                <li class="header--nav__Connexion">Connexion</li>
            </ul>
            <div v-bind:class="'burger--menu__picture'">
                <img v-bind:src="profilPic">
            </div>
        </div>
    </div>

</template>

<script>
import profil from '@/assets/images/profil.svg'
import assoLogo from '@/assets/images/logoAPE.jpeg'
export default {
  name: 'HeaderLayout',
      data() {
        return {
            profilPic: profil,
            logoApe: assoLogo
        }
    },
    methods: {
        showMenu(){
            let headerMenu= document.querySelector(".header--burger__menu")
            let body=document.querySelector("body")
            body.classList.toggle("overflow--hidden")
            headerMenu.classList.toggle("active")
        },
        
    }
}
</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&display=swap');
@import "../../assets/css/utils/burgerAnim.scss";
header{
    width: 100%;
    display: flex;
    flex-wrap: wrap;     
    //<--------------BANNER------------>
    .header--title{
    background-color: #46BFC7;;
    width: 100%;
    display: flex;
    align-items: center;
    margin: 1%;
    margin-bottom: 0%;
    justify-content: space-around;
        text-shadow: 1px 1px 1px black;
        
    .header--title__logo{
        border-radius: 50%;
        margin: 1%;
        position: absolute;
        left: 10px;
        z-index: 1;
        border: 3px solid black;
        box-shadow: -1px 1px 3px 0px black;
    }
        .header--profil__picture{
               
                display: flex;
                padding: 1%;
                align-items: flex-end;
                width: 20%;
                margin-bottom: 6px;
                flex-wrap: wrap;
                
        }
        .header--profil__picture div:hover{
                    color: #0087ca;
                }
        
        h1{
            width: 100%;
            font-size: 3rem; 
            color: white;
            font-family: 'Merienda', cursive;
            span {
                color:#FBAD18;
            }
            .header--town {
                font-size: 2rem;
            }
        }


    }
    //<-----------NAV----------->
    nav{
     display: flex;
    flex-direction: row;
    width: 100%;
    margin-left: 1%;
    margin-right: 1%;
    margin-top: 4px;
    
    .header--nav__Accueil{
        background-color: #85B689; 
     
    }
    .header--nav__Vente{
        background-color:#FBAD18 ;
      
    }
    .header--nav__Evenement{
        background-color: #EF6852;
     
    }
    .header--nav__Presentation{
        background-color:  #F8AAA4;
      
    }
    
        div{
                width: 25%;
                display: inline-block;
                position: relative;
                font-size: large;
                border-radius: 7px;
                margin-right: 4px;
                text-shadow: 1px 1px 1px black;
                padding: 3px;

        }
        //WE USE THE underlineAnim.scss for animate nav  
        @import "../../assets/css/utils/underlineAnim.scss";     
    } 
}
//<----------------------MENU BURGER ---------------->
.header--burger__menu{
    display: none;
    height: 1000vh;
    
    ul{
        padding-top: 2%;
        display:flex;
        flex-direction:column;
        list-style-type: none;
        .header--nav__Accueil{
        background-color: #85B689; }
         .header--nav__Vente{
        background-color: #FBAD18 ; }
         .header--nav__Evenement{
        background-color: #EF6852; }
         .header--nav__Presentation{
        background-color: #8FCED7; }
         .header--nav__Inscription{
        background-color: #F8AAA4; }
         .header--nav__Connexion{
        background-color:  #946973; }
        li{
                font-size: x-large;
                height: 100%;
                padding: 6%;
                font-weight: bold;
                margin-top: 1%;
                color: white;
                border-radius: 22px;
                box-shadow: 1px 1px 1px;
                margin: 1%;
        }
    }
    .burger--menu__picture{
        height: 100vh;
    }
    img{
       margin: 11%;
        height: 80px;
        width: 80px;
        border: 1px solid black;
        border-radius: 50%;
        padding: 4%;
        box-shadow: -0.5em 0.5em black;
    }
}


//<----------Media queries-------->
@media (max-width: 1311px) {
    header .header--title .header--title__logo{
        position: unset;
        float: left;
        border-radius: 50%;
        margin:0;
        left: 0;
        z-index: 1;
        
    }
  }
  @media (max-width: 800px) {
    .header--title__logo{
        height: 12vh;
    }
  }
    @media (max-width: 425px) {
        header{

            .header--title{
                  margin: 0;
                  padding: 4%;
                h1{
                  font-size: 1.4rem;  
                  text-align: start;
                  width: 60%;
                }
                 .header--profil__picture{
                    display: none;
                }
                .header--burger__container{
                    display: unset;
                    height: 100%;
                    display: contents;
                }    
            }

            nav{
                margin: 0;
                div {
                display: none;
                }
            }

        }
        .active{
            display: contents;
             .header--profil__picture{
                    width: 20px;
                    height: 20px;
                }
        }
        
    }
</style>
