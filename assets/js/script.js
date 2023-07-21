function changeAvatar(url) {
    
    let avatarInput = document.getElementById('avatarInput');
    
    let avatarImg = document.getElementById('avatar');
    
    let render = new FileReader();
    
    render.onloadend = function () {
        avatarImg.setAttribute('src', render.result);
    }

    let file = avatarInput.files[0];

    if(file){
        render.readAsDataURL(file);
    }else{
        avatarImg.setAttribute('src', url);
    }
}