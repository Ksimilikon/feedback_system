$(document).ready(function(){
    let wasSearch = false;
    $('#search').click(function(){
        let text= $('#searchField').val();
        if(text != null && text != ''){
            wasSearch=true;
            $.ajax({
                type: 'POST',
                cache: false,
                dataType: 'json',
                url: '/system/php/handlers/search_browse.php',
                data: {text: text},
                success: function(data) {
                    let result = '';
                    if(data.result == '1'){
                        for(i =0;i<data.length;i++){
                             result +=`<a href="../PUser/message.php?id_msg=`+data[i].id+`" class="pd10 btn-default link-reset">
                    <div class="flex row space-btw backColor-inherit">
                        <h4 class="backColor-inherit">`+data[i].head+`</h4>
                        `+data[i].status+`
                    </div>
                        <p class="backColor-inherit cut_strokes">`+data[i].msg+`</p>
                        <p class="backColor-inherit mr-t5">`+data[i].time+`</p>  
                    </a>`; 
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
                let text= $('#searchField').val();
            if(text != null && text != ''){
                wasSearch=true;
                $.ajax({
                    type: 'POST',
                    cache: false,
                    dataType: 'json',
                    url: '/system/php/handlers/search_browse.php',
                    data: {text: text},
                    success: function(data) {
                        let result = '';
                        if(data.result == '1'){
                            for(i =0;i<data.length;i++){
                                result += `<a href="../PUser/message.php?id_msg=`+data[i].id+`" class="pd10 btn-default link-reset">
                    <div class="flex row space-btw backColor-inherit">
                        <h4 class="backColor-inherit">`+data[i].head+`</h4>
                        `+data[i].status+`
                    </div>
                        <p class="backColor-inherit cut_strokes">`+data[i].msg+`</p>
                        <p class="backColor-inherit mr-t5">`+data[i].time+`</p>  
                    </a>`;
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
    });
    
        setInterval(function(){
            if(!wasSearch){
                let page = window.location.search;
                page = page.substring(6);
                if (page == ''){
                    page = 1;
                }
                if(page<1){
                    page = 1;
                }
                console.log(page);
            $.ajax({
                type: 'POST',
                cache: false,
                dataType: 'json',
                url: '/system/php/handlers/update_browse.php',
                data: {page: page},
                success: function(data) {
                    let result = '';
                    console.log(data);
                    if(data.result == '1'){
                        for(i =0;i<data.length;i++){
                            result += `<a href="../PUser/message.php?id_msg=`+data[i].id+`" class="pd10 btn-default link-reset">
                    <div class="flex row space-btw backColor-inherit">
                        <h4 class="backColor-inherit">`+data[i].head+`</h4>
                        `+data[i].status+`
                    </div>
                        <p class="backColor-inherit cut_strokes">`+data[i].msg+`</p>
                        <p class="backColor-inherit mr-t5">`+data[i].time+`</p>  
                    </a>`;
                       }
                        document.getElementById('result').innerHTML = result;
                    }
                    else{
                        document.getElementById('result').innerHTML = data.result;
                    }
                }
            })
         }
        }, 20000);
   
})