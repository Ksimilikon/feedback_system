$(document).ready(function(){
    document.getElementById('superTheme').addEventListener('change', function(event){
        let superThemeValue = event.target.options[event.target.selectedIndex].value;
        $.ajax({
            type: 'POST',
            cache: false,
            dataType: 'json',
            url: '/system/php/handlers/getTheme.php',
            data: { superTheme: superThemeValue},
            success: function(data) {
                console.log(data);
                let result = '<option value="0" selected disabled>Не выбрано</option>';
                if(data.result==1){
                    for(i=0;i<data.length;i++){
                        result += `<option value="${data[i].id}">${data[i].theme}</option>`;
                    }
                    let theme = document.getElementById('theme');
                    theme.style.display = 'block';
                    theme.innerHTML = result;
                }
            }
        });

    })
})