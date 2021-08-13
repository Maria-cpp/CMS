function viewPost(){
    const id = document.getElementById('postid').value;
    localStorage.setItem("POSTID", id);
    return;
}