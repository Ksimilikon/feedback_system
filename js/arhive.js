function request(idTheme, page){
    //console.log('request');
    $.ajax({
        type: 'POST',
        cache: false,
        dataType: 'json',
        url: '/system/php/handlers/arhive_data.php',
        data: { idTheme: idTheme,
                page: page
            },
        success: function(data) {
            //console.log('start');
            let result = '';
            //console.log(data);
            if(data.result == '1'){
                for(i =0;i<data.length;i++){
                    if(data[i].text == null){
                        data[i].text = '';
                    }
                    result += `<a href="arhive_unit.php?id_unit=`+data[i].id+`" class="pd10 btn-default link-reset width100p">
                        <b class="backColor-inherit"><p class="backColor-inherit">`+data[i].head+`</p></b>
                        <p class="backColor-inherit cut_strokes">`+data[i].text+`</p>
                        <p class="backColor-inherit">`+data[i].time+`</p>
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
function searchRequest(idTheme, searchStroke, page){
    console.log('search');
    $.ajax({
        type: 'POST',
        cache: false,
        dataType: 'json',
        url: '/system/php/handlers/search_arhive.php',
        data: { idTheme: idTheme,
                page: page,
                str: searchStroke
            },
        success: function(data) {
            //console.log('searchSuccess');
            let result = '';
            //console.log(data);
            if(data.status == '1'){
                if(data.result == 'Ничего не найдено'){
                    //console.log('замена');
                    result=data.result;
                }
                else{
                    //console.log("нет");
                    for(i =0;i<data.length;i++){
                    if(data[i].text == null){
                        data[i].text = '';
                    }
                    result += `<a href="arhive_unit.php?id_unit=`+data[i].id+`" class="pd10 btn-default link-reset width100p">
                        <b class="backColor-inherit"><p class="backColor-inherit">`+data[i].head+`</p></b>
                        <p class="backColor-inherit cut_strokes">`+data[i].text+`</p>
                        <p class="backColor-inherit">`+data[i].time+`</p>
                    </a>`;
                    }
                }
                
                document.getElementById('results').innerHTML = result;
            }
            else{
                document.getElementById('results').innerHTML = 'Ничего не найдено';
            }
        }
    })
}


$(document).ready(function(){
    let current;
    let countPage = document.getElementById('countPage');
    let idTheme = 0;
    let page = 1;
    let isSearch = false;
    

    let select = document.querySelectorAll('select');
    select.forEach(function(element){
        element.addEventListener('change', function(event){
            page=1;
            countPage.innerHTML = page;

            isSearch=false;
            current = event.target;
            idTheme=event.target.value;
            console.log(idTheme);

            request(idTheme, page);

            document.getElementById('selectedTheme').innerHTML = event.target.selectedOptions[0].innerText;
            select.forEach(function(el){
                if(current != el){
                    el.selectedIndex = 0;
                }
            })
        });
        
    });
    $('#minusPage').click(function(){
        if(idTheme!=0){
            if(page > 1){
                page-=1;
            }
            countPage.innerHTML = page;

            if(isSearch){
                let str = document.getElementById('searchField').value;
                if(str!='' && str!=null){
                    searchRequest(idTheme, str, page);
                }
                
            }
            else{
                request(idTheme, page);
            }
        }
        else{
            document.getElementById('results').innerHTML = 'Сначала выберите тему';
        }
    });
    $('#plusPage').click(function(){
        if(idTheme!=0){
            page+=1;
            countPage.innerHTML = page;

            if(isSearch){
                let str = document.getElementById('searchField').value;
                if(str!='' && str!=null){
                    searchRequest(idTheme, str, page);
                }
            }
            else{
                request(idTheme, page);
            }
        }
        else{
            document.getElementById('results').innerHTML = 'Сначала выберите тему';
        }
    });
   
    $('#search').click(function(){
        let str = document.getElementById('searchField').value;
        if(str != '' && str!=null){
            if(idTheme != '' && idTheme!=null){
                page=1;
                countPage.innerHTML = page;

                isSearch=true;
                searchRequest(idTheme, str, page);
            }
            else{
                document.getElementById('results').innerHTML = 'Сначала выберите тему';
            }
        }
    });
    document.addEventListener('keydown', function(e){
        if(e.key === 'Enter' && ($('#searchField').is(':focus'))){
            //console.log('enter');
            let str = document.getElementById('searchField').value;
            if(str != '' && str!=null){
                if(idTheme != '' && idTheme!=null){
                    page=1;
                    countPage.innerHTML = page;

                    isSearch=true;
                    searchRequest(idTheme, str, page);
                }
                else{
                    document.getElementById('results').innerHTML = 'Сначала выберите тему';
                }
            }
        }
    })
    // setInterval(function(){
    //     console.log('isSearch: '+isSearch);
    // }, 1000);
});