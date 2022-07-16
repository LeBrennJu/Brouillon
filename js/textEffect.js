const textEffect = {

    init: function () {
        console.log('init textEffect OK');
        var texte = document.getElementById("description").innerHTML;
        console.log(texte);
        setTimeout(function () {
            textEffect.machineAEcrire(texte, "", 0, 0);
        }, 500);
    },

    machineAEcrire: function (texteorigine, newtexte, indice) {

        //pour le sens d'écriture de gauche à droite

        if (indice < texteorigine.length) {
            lettre = texteorigine.charAt(indice);
            indice++;
            newtexte = newtexte + lettre;
            if (indice == texteorigine.length) {
                document.getElementById("description").textContent = newtexte;
            } else {
                document.getElementById("description").textContent = newtexte + "|";
            }
            setTimeout(function () {
                textEffect.machineAEcrire(texteorigine, newtexte, indice);
            }, 125);

        }



    }
}

document.addEventListener('DOMContentLoaded', textEffect.init);