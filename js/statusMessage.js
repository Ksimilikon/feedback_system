function updateStatus(idMessage, idList){
    let listValue = idList.options[idList.selectedIndex].value;
    //console.log(listValue);
    $.ajax({
        type: 'POST',
        cache: false,
        dataType: 'json',
        url: '/system/php/handlers/updateStatusMessage.php',
        data: {id: idMessage},
        success: function(data) {
            //console.log(data);
                for(i=0;i<idList.options.length;i++){
                    if(idList.options[i].value == data.status){
                        idList.selectedIndex=i;
                        //console.log('succ');
                        break;
                    }
                }
            let idArhive=document.getElementById('arhiveCell');
            if(data.result == 1){
                if(data.status == 1){
                    idArhive.innerHTML = '<a href="../PModer/new_arhiveUnit.php?id_message='+idMessage+'"><button class="btn-reset btn-default">В архив</button></a>'
                }
                else{
                    idArhive.innerHTML = '';
                }
            }
        }
    });
}

$(document).ready(function (){
    let idMessage;
    let url = window.location.search;
        url = url.substring(8);
        idMessage = url;
    let select = document.getElementById('status');
    select.addEventListener('change', function(event){
        $.ajax({
            type: 'POST',
            cache: false,
            dataType: 'json',
            url: '/system/php/handlers/changeMessageStatus.php',
            data: {status: event.target.value,
                id: url
            },
            success: function(data) {
                //console.log(data.s);
                let idArhive=document.getElementById('arhiveCell');
            
                if(event.target.value == 1){
                    idArhive.innerHTML = '<a href="../PModer/new_arhiveUnit.php?id_message='+idMessage+'"><button class="btn-reset btn-default">В архив</button></a>'
                }
                else{
                    idArhive.innerHTML = '';
                }
            
            }
        }); 

    });

    setInterval(function(){
        updateStatus(idMessage, select);
    }, 10000);
    setInterval(function(){
        idArhive = document.getElementById('arhiveCell');
        
    }, 1000);
})