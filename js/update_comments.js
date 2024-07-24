$(document).ready(function(){
    let id_message = window.location.search;
    id_message = id_message.substring(8);
    //console.log(id_message);
    setInterval(function(){
        $.ajax({
            type: 'POST',
            cache: false,
            dataType: 'json',
            url: '/system/php/handlers/update_comments.php',
            data: {id_message, id_message},
            success: function(data) {
                //console.log(data);
                let result = '';
                if(true){
                    for(i =0;i<data.length;i++){
                         result += `<div class="flex col border-t"><div class="flex row space-btw backColor-add pd-b10">
                        <b class="backColor-inherit"><a href="../PGeneral/page.php?id_user=`+data[i].user_id+`" 
                        class="link-reset backColor-inherit">Пользователь: `+data[i].FName+` `+data[i].SName+` `+data[i].TName+`</a></b>
                        <p class="backColor-inherit">`+data[i].time+`</p>
                    </div>
                    <div class="mr-b10 backColor-gray pd5">
                        <p class="backColor-inherit">`+data[i].desc+`</p>
                    </div></div>`;
                    }
                    document.getElementById('messages').innerHTML = result;
                }
                else{
                    //document.getElementById('results').innerHTML = data.result;
                }
            }
        })
    }, 10000);
})