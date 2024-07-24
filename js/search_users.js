$(document).ready(function(){
    $('#search').click(function(){
        let text = $('#searchField').val();
        if(text != null && text != ''){
            
            $.ajax({
                type: 'POST',
                cache: false,
                dataType: 'json',
                url: '/system/php/handlers_admin/search_users.php',
                data: {text: text},
                success: function(data) {
                    console.log(data);
                    let result = '';
                    if(data.result == '1'){
                        for(i =0;i<data.length;i++){
                            result += `<a href="../PAdmin/user.php?id_user=`+data[i].id+`" 
                            class="pd10 btn-default link-reset flex col textGeneral">
                <p class="backColor-inherit">id: `+data[i].id+`</p>
                <p class="backColor-inherit">Роль: `+data[i].role+`</p>
                <div class="flex row space-btw backColor-inherit">
                    <div class="flex row gap10 backColor-inherit">
                        <p class="backColor-inherit">`+data[i].SName+`</p>
                        <p class="backColor-inherit">`+data[i].FName+`</p>
                        <p class="backColor-inherit">`+data[i].TName+`</p>   
                    </div>
                    `+data[i].date_reg+`
                </div>
                <p class="backColor-inherit">`+data[i].email+`</p></a>`;//'<a href="../PUser/message.php?id_msg='+data[i].id +'" class="pd10 btn-default link-reset"><h4 class="backColor-inherit">'+data[i].head+'</h4><p class="backColor-inherit">'+data[i].msg+'</p></a>'; 
                        }
                        document.getElementById('results').innerHTML = result;
                    }
                    else{
                        document.getElementById('results').innerHTML = data.result;
                    }
                }
            })
        }
    })
    document.addEventListener('keydown', function(e){
        if(e.key === 'Enter'){
            let text = $('#searchField').val();
            if(text != null && text != ''){
                
                $.ajax({
                    type: 'POST',
                    cache: false,
                    dataType: 'json',
                    url: '/system/php/handlers_admin/search_users.php',
                    data: {text: text},
                    success: function(data) {
                        console.log(data);
                        let result = '';
                        if(data.result == '1'){
                            for(i =0;i<data.length;i++){
                                result += `<a href="../PAdmin/user.php?id_user=`+data[i].id+`" 
                                class="pd10 btn-default link-reset flex col textGeneral">
                    <p class="backColor-inherit">id: `+data[i].id+`</p>
                    <p class="backColor-inherit">Роль: `+data[i].role+`</p>
                    <div class="flex row space-btw backColor-inherit">
                        <div class="flex row gap10 backColor-inherit">
                            <p class="backColor-inherit">`+data[i].SName+`</p>
                            <p class="backColor-inherit">`+data[i].FName+`</p>
                            <p class="backColor-inherit">`+data[i].TName+`</p>   
                        </div>
                        `+data[i].date_reg+`
                    </div>
                    <p class="backColor-inherit">`+data[i].email+`</p></a>`;//'<a href="../PUser/message.php?id_msg='+data[i].id +'" class="pd10 btn-default link-reset"><h4 class="backColor-inherit">'+data[i].head+'</h4><p class="backColor-inherit">'+data[i].msg+'</p></a>'; 
                            }
                            document.getElementById('results').innerHTML = result;
                        }
                        else{
                            document.getElementById('results').innerHTML = data.result;
                        }
                    }
                })
            }
        }
    })
})