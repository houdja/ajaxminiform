let form = document.getElementById('utilisateur');

form.addEventListener('submit', function(e){
    e.preventDefault();

    let xhr = new XMLHttpRequest();

    //passer à FormDATA le formulaire
    let data = new FormData(this);

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200){
                let res = xhr.response;
                console.log(res);
                alert(res.msg);
            }else{
                console.log('Une erreur est survenue..')
            }
        }
    };

    xhr.open('POST', 'php/script.php', true);
    xhr.responseType = "json";
    xhr.send(data);
})