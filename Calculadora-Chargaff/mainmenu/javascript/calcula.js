//Guardando o valor de dna na variável
var dna = document.querySelector("#input-dna")
var rnam = document.querySelector("#input-rnam")
var selected = document.getElementsByName("mg")


//Execuções de Eventos com funções
document.querySelector("#calcular").addEventListener('click', calcular)
window.addEventListener('load', calcular)

/*dna.addEventListener('change', () => {
    if(rnam.value != ""){
        document.getElementById('calcular').disabled = true
    } else {
       document.getElementById('calcular').disabled = false
    }
})*/


if(dna !== null){
    dna.addEventListener('keyup',corrigirdna)
}

if(rnam !== null){
    rnam.addEventListener('keyup',corrigirrnam)
}

//Função limitando digitação
function corrigirdna(ev){

    const input = ev.target;
    input.value = input.value.replace(/B|[D-F]|[H-S]|[U-Z]||\ /gi, '') // /[&\/\\#,+()$~%.'":*?<>{}]/g,'_'
    input.value = input.value.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g,'')
}

function corrigirrnam(ev){

    const input = ev.target;
    input.value = input.value.replace(/B|[D-F]|[H-T]|[V-Z]|\ /gi, '')
    input.value = input.value.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g,'')

}

//Função o calculo de Chargaff
function calcular(){  

    if(dna.value == ''){

        transRna()

    } else{

        transDna()  
       
}

}

function transDna(){

rnam=""

    for(var i = 0; dna.value.length > i; i++){

        if(dna.value[i].search(/A/i) !== -1){

            rnam +='U'

        } else if(dna.value[i].search(/T/i) !== -1){

            rnam+= 'A'

        } else if(dna.value[i].search(/C/i) !== -1){

            rnam+= 'G'

        } else if(dna.value[i].search(/G/i) !== -1){

            rnam+= 'C'

        } else {

            rnam+= ''

        }

    }

    var spanm = document.querySelector('#na')

    spanm.innerHTML = rnam

    var rnat=''

    for(var i = 0; rnam.length > i; i++){

        if(rnam[i].search(/A/i) !== -1){

            rnat +='U'

        } else if(rnam[i].search(/U/i) !== -1){

            rnat+= 'A'

        } else if(rnam[i].search(/C/i) !== -1){

            rnat+= 'G'

        } else if(rnam[i].search(/G/i) !== -1){

            rnat+= 'C'

        } else {

            rnat+= ''

        }

    }

    var teste = []

    var c = 0
    for(var i = 0;i<rnat.length/3;i++){

        teste[i] =rnat[c]

        if(rnat[c+1] !== undefined){

            teste[i] +=rnat[c + 1]

        }

        if(rnat[c+2] !== undefined){

            teste[i] +=rnat[c + 2]

        }

        c = c + 3

    }

    var spant = document.querySelector('#idrnat')

    spant.innerHTML = teste.join(" ")

    var sequenciaproteina = []

    var remover = 0
    
    for(c = 0;c<teste.length;c++){

        for(j=0;j<proteinas.length;j++){


            if(teste[c] == proteinas[j][0] ){

                sequenciaproteina[c] = proteinas[j][1]

            }

            if(sequenciaproteina[c] == 'PARADA'){

                remover = c+1

            }
            

        }

    }  

    if(remover > 0){
    sequenciaproteina = sequenciaproteina.splice(0,remover)
    }

    
    var inputproteina = document.getElementById('inputproteina')
    inputproteina.innerHTML= sequenciaproteina
    
}

function transRna(){

dna=""

        for(var i = 0; rnam.value.length > i; i++){

            if(rnam.value[i].search(/A/i) !== -1){

                dna +='T'

            } else if(rnam.value[i].search(/U/i) !== -1){

                dna+= 'A'

            } else if(rnam.value[i].search(/C/i) !== -1){

                dna+= 'G'

            } else if(rnam.value[i].search(/G/i) !== -1){

                dna+= 'C'

            } else {

                dna+= ''

            }

        }

       
        var spanm = document.querySelector('#na')

        spanm.innerHTML = dna

        var rnat=''

    for(var i = 0; rnam.value.length > i; i++){

        if(rnam.value[i].search(/A/i) !== -1){

            rnat +='U'

        } else if(rnam.value[i].search(/U/i) !== -1){

            rnat+= 'A'

        } else if(rnam.value[i].search(/C/i) !== -1){

            rnat+= 'G'

        } else if(rnam.value[i].search(/G/i) !== -1){

            rnat+= 'C'

        } else {

            rnat+= ''

        }

    }

    var teste = []

    var c = 0
    for(var i = 0;i<rnat.length/3;i++){

        //teste[i] =rnat[c]+rnat[c+1]+rnat[c+2]

        teste[i] =rnat[c]

        if(rnat[c+1] !== undefined){

            teste[i] +=rnat[c + 1]

        }

        if(rnat[c+2] !== undefined){

            teste[i] +=rnat[c + 2]

        }


        c = c + 3
    }

    var spant = document.querySelector('#idrnat')

    spant.innerHTML = teste.join(" ")

    var sequenciaproteina = []

    var remover = 0
    
    for(c = 0;c<teste.length;c++){

        for(j=0;j<proteinas.length;j++){


            if(teste[c] == proteinas[j][0]){

                sequenciaproteina[c] = proteinas[j][1]

            }

            if(sequenciaproteina[c] == 'PARADA'){

                remover = c+1

            }
            

        }

    }  

    if(remover > 0){
    sequenciaproteina = sequenciaproteina.splice(0,remover)
    }

    var inputproteina = document.getElementById('inputproteina')
    inputproteina.innerHTML= sequenciaproteina

    

}


