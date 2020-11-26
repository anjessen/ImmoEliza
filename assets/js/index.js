
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



const type_of_property = document.getElementsByClassId("type_of_property");
const number_of_rooms = document.getElementsByClassId("Number_of_rooms");
const house_area = document.getElementsByClassId("house-area");
const inputCityPC = document.getElementsByClassId("inputCityPC")

document.getElementById('type_of_property').addEventListener('click', function(){
    if (type_of_property == NULL || number_of_rooms == NULL || house_area == NULL || inputCityPC == NULL)
    {
        document.body.innerHTML = `<p class="error">Vous n'avez pas remplie tous les champs!</p>`;
    }
})