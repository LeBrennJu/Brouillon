<template>
    <main>
            <!-- //Liste Evenements  -->
        <section class="event--section">
                <ul class="event--list">

                    <li class="event--card">                        
                        <img class="event--card__img" v-bind:src="tilleulPic" >
                        <h2 class="event--card__title">Concours de lancer de menhir</h2>
                        <div class="event--card__content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime adipisci delectus amet quisquam quibusdam eius itaque, </div>
                    </li>

                    <li class="event--card">
                        <img class="event--card__img" v-bind:src="tilleulPic" >
                        <h2 class="event--card__title">Classe découverte de la faune et la flore</h2>
                        <div class="event--card__content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime adipisci delectus amet quisquam quibusdam eius itaque,</div>
                    </li>

                    <li class="event--card">
                        <img class="event--card__img" v-bind:src="tilleulPic" >
                        <h2 class="event--card__title">Concours du cri de la mouette</h2>
                        <div class="event--card__content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime adipisci delectus amet quisquam quibusdam eius itaque,</div>
                    </li>

                    <li class="event--card">
                        <img class="event--card__img" v-bind:src="tilleulPic" >
                        <h2 class="event--card__title">Championnat interstellaire de corde à sauter</h2>
                        <div class="event--card__content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime adipisci delectus amet quisquam quibusdam eius itaque, </div>
                    </li>

                </ul>
        </section>
            <!-- Liste Vente  -->
        <section class="sale--section">
            <ul class="sale--list">

                <li class="sale--card">
                    <h2 class="sale--card__title">Titre</h2>
                    <img class="sale--card__img">
                    <div class="sale--card__content">Paragraphe</div>
                </li>

                <li class="sale--card">
                    <h2 class="sale--card__title">Titre</h2>
                    <img class="sale--card__img">
                    <div class="sale--card__content">Paragraphe</div>
                </li>
                
                <li class="sale--card">
                    <h2 class="sale--card__title">Titre</h2>
                    <img class="sale--card__img">
                    <div class="sale--card__content">Paragraphe</div>
                </li>

                <li class="sale--card">
                    <h2 class="sale--card__title">Titre</h2>
                    <img class="sale--card__img">
                    <div class="sale--card__content">Paragraphe</div>
                </li>

            </ul>
        </section>

    </main>

</template>

<script>
import tilleul from '@/assets/images/tilleul.jpg'
export default {
  name: 'HeaderLayout',
      data() {
        return {
            tilleulPic: tilleul,
        }
    },

}
</script>

<style lang="scss" scoped>

main{
    height: 99%;
    display: flex;
    list-style-type: none;
    justify-content: space-between;
    margin: 1%;
    .sale--section{
        width: 30%;
        height: 100%;
        ul::-webkit-scrollbar {
            display: none;
        }
        ul{
            height: 100%;
            list-style-type: none;
            overflow: scroll;
            li{
                border: 1px solid black;
                height: 30%;
                margin-bottom: 1%;
            }
        }
    }
    .event--section{
        width: 100%;
        height: 93%;
       
        ul{
            display: flex;
            flex-wrap: wrap;
            list-style-type: none;
            margin-top: 3%;
            height: 100%;
            list-style-type: none;            
            li{
                border: 1px solid black;
                width:  47%;
                height: 47%;
                margin: 1%;
                display: flex;
                flex-direction: column;
                .event--card__img{
                    height: 8vh;
                    margin: 2%;

                }
                .event--card__title{

                }
                .event--card__content{

                }
            }
        }
    }
    //<---------------------MEDIA QUERIES ------------------------>
     @media (max-width: 425px){
        .event--section{
            height: 100%;
             ul::-webkit-scrollbar {
            display: none;
            }
            ul{
                overflow: scroll;
                margin-top: 3%;
                height: 99%;
                li{
                width: 95%;
            }
            }
            
            
        }
     }
}
</style>
