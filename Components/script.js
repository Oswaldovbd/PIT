const chk = document.getElementById('chk')

chk.addEventListener('change', () => {
  document.body.classList.toggle('dark')
})




function mascara_telefone ()
        {
         var telefone = document.getElementById("telefone").value
            console.log(telefone)
          telefone=telefone.slice(0,14) 
            console.log(telefone)
          document.getElementById("telefone").value=telefone
     telefone=document.getElementById("telefone").value.slice(0,10)
            
            
            var tel_formatado = document.getElementById("telefone").value
            if (tel_formatado[0]!="(")
            {
                if(tel_formatado[0]!=undefined)
                {
                    document.getElementById("telefone").value="("+tel_formatado[0];
                }
            }

            if (tel_formatado[3]!=")")
            {
                if(tel_formatado[3]!=undefined)
                {
                    document.getElementById("telefone").value=tel_formatado.slice(0,3)+")"+tel_formatado[3]
                }
            }

            if (tel_formatado[9]!="-")
            {
                if(tel_formatado[9]!=undefined)
                {
                    document.getElementById("telefone").value=tel_formatado.slice(0,9)+"-"+tel_formatado[9]
                }
            }
        }

    
function mascara_cpf ()
        {
            //máscara
           
            if (cpf.value.length ==3 ||cpf.value.length ==7)
            {
           
                cpf.value += "."
            }
            else if(cpf.value.length ==11){
                cpf.value += "-"
            }
           
        }