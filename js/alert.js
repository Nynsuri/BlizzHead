var checkbox = document.getElementById('cek');
checkbox.addEventListener('change',function(){
    if (!checkbox.checked){
        alert('Prosím zaškrtnite súhlas o spracovaní údajov.')
    }
})