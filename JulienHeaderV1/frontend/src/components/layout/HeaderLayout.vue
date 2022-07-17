<template>
    <div>
        <header>
                <div class="header--title">
                    
                        <h1>APE Crosmieres</h1> 
                    
                    <div v-bind:class="'header--profil__picture'">
                    <div>
                        <img v-bind:src="profilPic">
                    </div>
                        
                        <div class="header--profil__user">
                            Admin
                        </div>
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
                    <div>Accueil</div>
                    <div>Vente</div>
                    <div>Evenement</div>
                    <div>Présentation</div>
                    <div>Inscription</div>
                    <div>Connexion</div>            
                </nav>
        </header>
          <!-- /*<--------------------MENU BURGER HIDDEN IN DESKTOP---------------------------->
        <div class="header--burger__menu">
            <ul>
                <li>Accueil</li>
                <li>Vente</li>
                <li>Evenement</li>
                <li>Présentation</li>
                <li>Inscription</li>
                <li>Connexion</li>
            </ul>
            <div v-bind:class="'burger--menu__picture'">
                <img v-bind:src="profilPic">
            </div>
        </div>
    </div>

</template>

<script>
import profil from '@/assets/images/profil.svg'
export default {
  name: 'HeaderLayout',
      data() {
        return {
            profilPic: profil,
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
@import "../../assets/css/utils/burgerAnim.scss";
header{
    width: 100%;
    display: flex;
    flex-wrap: wrap;     
    //<--------------BANNER------------>
    .header--title{
    background-color: #0087ca;
    width: 100%;
    display: flex;
    align-items: center;
    margin: 1%;
    margin-bottom: 0%;
    border:outset;
    justify-content: space-around;
        .header--profil__picture{
            background-color: white;
            width: 40px;
            padding: 2%;
            border: outset;
            box-shadow: inset 0px 0px 2px 2px black;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            font-weight: bold;           
                    
        }
        img{
            height: 80%;
            width: 80%;
        }
        h1{
            width: 100%;
            font-size: 4rem;
            font-weight: 900;
            background-image: linear-gradient(0.25turn, #ec473f,40%, #fdd14d,60%, #c7b1d6,8%, #b0ca00,80%, #27a7c3);
            background-clip: text;
            color:transparent;  
        }
        .header--burger__container{
            display: none;
        }

    }
    //<-----------NAV----------->
    nav{
    display: flex;
    flex-direction: row;
    margin:2%;
    width: 100%;
        div{
            width: 16.6666%;
            display: inline-block;
            position: relative;
            font-size: large;
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
        border: outset;
        
        li{
            border: 1px solid #0087ca;
            font-size: x-large;
            height: 100%;
            padding: 4%;
            border: outset;
            font-weight: bold;
            margin-top: 1%;
            background-color: #333;
            color: white;
        }
        li:nth-child(2n+0){
            box-shadow: inset -0.2em 0.2em #0087ca;
        }
        li:nth-child(2n+1){
            box-shadow: inset 0.2em 0.2em #0087ca;            
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
