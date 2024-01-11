    //Guardando o valor de dna na variável
        var dna = document.querySelector("#input-dna")
        var rnam = document.querySelector("#input-rnam")

        console.log(proteinas[0][0])
    //Execuções de Eventos com funções
        document.querySelector("#calcular").addEventListener('click', calcular)

       window.addEventListener('load', calcular)

        if(dna !== null){
            dna.addEventListener('keyup',corrigirdna)
        }

        if(rnam !== null){
            rnam.addEventListener('keyup',corrigirrnam)
        }

    //Função limitando digitação
        function corrigirdna(ev){

            const input = ev.target;
            input.value = input.value.replace(/B|[D-F]|[H-S]|[U-Z]|\ /gi, '')

        }

        function corrigirrnam(ev){

            const input = ev.target;
            input.value = input.value.replace(/B|[D-F]|[H-T]|[V-Z]|\ /gi, '')

        }
        
    //Função o calculo de Chargaff
        function calcular(){   

            if(rnam.disabled){

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

                teste[i] =rnat[c]+rnat[c+1]+rnat[c+2]

                c = c + 3

            }

            var spant = document.querySelector('#idrnat')

            spant.innerHTML = teste

            var input_proteina = document.querySelector('#inputproteina')

             for(var j =0; j<teste.length;j++){

                if(proteinas[j][0] == teste[j]){

                    console.log(proteinas[j][1])

                }

            }

            input_proteina.innerHTML = proteinas[0][1]

            } else{
                
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
    
                
    
                spanm.innerHTML =  dna

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

                teste[i] =rnat[c]+rnat[c+1]+rnat[c+2]
                c = c + 3
            }

            var spant = document.querySelector('#idrnat')

            spant.innerHTML = teste

        }

    }

