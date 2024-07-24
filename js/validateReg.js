$(document).ready(function (){
    //console.log('succ');
    $("#send").click(function (){
        document.getElementById('formReg').reportValidity();

        if(document.getElementById('formReg').checkValidity()){
            let elems=document.getElementById('formReg').querySelectorAll(':valid');
            elems.forEach(function(el){
                el.classList.remove('border-alert');
            })
        }
        else{
            let elems=document.getElementById('formReg').querySelectorAll(':invalid');
            elems.forEach(function (el){
                el.classList.add('border-alert');
            })
        }

        
        
    })
    //check Email unique
    
    $('#checkEmail').click(function (){
        let email = $('#email').val();
        //document.getElementById('email').classList.add(':invalid');
        if(email){
            console.log('send');
            $.ajax({
                type: 'POST',
                cache: true,
                dataType: 'json',
                url: '/system/php/handlers/checkEmail.php',
                data: {email: email},
                success: function(data) {
                    console.log(data);
                    if(data.status == '0'){
                        document.getElementById('email').classList.add('border-alert');
                        document.getElementById('email').classList.remove('border-success');
                        document.getElementById('errorEmail').innerHTML='Почта уже используется';
                    }
                    else{
                        document.getElementById('email').classList.remove('border-alert');
                        document.getElementById('email').classList.add('border-success');
                        document.getElementById('errorEmail').innerHTML='';

                    }
                }
            })
        }
        
    })
})