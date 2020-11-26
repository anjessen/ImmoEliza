
document.getElementById('garden_yes').addEventListener('click', function(){
    document.getElementsByClassName("display")[0].style.display = 'inline';
})
document.getElementById('garden_no').addEventListener('click', function(){
   document.getElementsByClassName("display")[0].style.display = 'none';
})
document.getElementById('terrace_yes').addEventListener('click', function(){
    document.getElementsByClassName("display")[1].style.display = 'inline';
})
document.getElementById('terrace_no').addEventListener('click', function(){
    document.getElementsByClassName("display")[1].style.display = 'none';
})
