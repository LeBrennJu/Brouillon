<template>
<footer >
<ul class="footer--list" >
    <li class="footer--list__link">Facebook</li>
    <li class="footer--list__link">Nous contacter</li>
    <li class="footer--list__link">Mentions légales</li>
</ul>

</footer>
</template>

<script>
export default {
  name: 'FooterLayout',
}
</script>

<style lang="scss">

footer{
    background-color: #46BFC7;
    height: 100%;
    margin-right: 1%;
    margin-left: 1%;
    font-weight: bold;
    font-size: small;
    .footer--list{        
        display: flex;
        list-style-type: none;
        li{
            width: 48%;
            height: 100%;
            margin: 1%;
            cursor: pointer;
            display: inline-block;
            position: relative;
        }
        //WE USE THE underlineAnim.scss for animate footer li  
        @import "../../assets/css/utils/underlineAnim.scss";
    }
}
//MEDIA QUERIES 
 @media (max-width: 425px){
    footer{
        margin: 0;
        margin-top: 2%;
        li:after{
            display: none;
        }
    }
 }
</style>