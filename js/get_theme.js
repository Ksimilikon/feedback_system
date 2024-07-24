$(document).ready(function(){
    document.getElementById('superTheme').addEventListener('change', function(event){
        document.getElementById('theme').style.display = 'block';
        let superTheme=event.target.value;
        $.ajax({
            type: 'POST',
            cache: false,
            dataType: 'json',
            url: '/system/php/handlers_admin/getTheme.php',
            data: {id: superTheme},
            success: function(data) {
                //console.log('start');
                let result = '<option value="0" selected disabled>Не выбрано</option>';
                console.log(data);
                if(data.result == '1'){
                    for(i =0;i<data.length;i++){
                        result += `<option value="${data[i].id}">${data[i].theme}</option>`;
                   }
                    document.getElementById('theme').innerHTML = result;
                }
                else{
                    document.getElementById('theme').innerHTML = data.result;
                }
            }
        })
    })
})