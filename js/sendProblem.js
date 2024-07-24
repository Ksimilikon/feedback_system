let count = 0;

$(document).ready(function (){
    //add
    $('#add').click(function (){
        count+=1;
        let input;
        input = '<div id="plane'+count+'" class="flex row gap5 col-center border border-radius space-btw width100p">';
        input += '<input type="file" name="img'+count+'" id="img'+count+'" class="load" accept=".jpg, .jpeg, .png">';
        input += '<p id="result'+count+'"></p>';
        input += '<input type="button" value="-" id="clear'+count+'" class="btn-reset btn-default" style=" border-top-right-radius: 5px;border-bottom-right-radius: 5px;">';
        input += '</div>';
        document.getElementById('count').value = count;
        
        document.getElementById('imgs').insertAdjacentHTML('beforeend',input);
    });
    //delete
    document.getElementById('imgs').addEventListener('click', function (e){
        if(e.target.id.substring(0, 5) === 'clear'){
            let index = e.target.id.substring(5);
            document.getElementById('plane'+index).remove();
        }
    });
    
});