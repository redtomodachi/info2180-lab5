document.addEventListener("DOMContentLoaded", function() 
{
    console.log("Page loaded");
    var  city = document.getElementById("lookupcity");
    var look = document.getElementById("lookup");
    look.addEventListener("click", search.bind(this,"country"));
    city.addEventListener("click", search.bind(this,"city"));
});

function search(query) 
{
    var getSearch = document.getElementById("result");
    var searchCountry = document.getElementById("country");
    var xammy = new XMLHttpRequest();
    xammy.onreadystatechange = function() {
        if (xammy.readyState === XMLHttpRequest.DONE) {
            if (xammy.status === 200) {
                getSearch.innerHTML = xammy.responseText;
            } 
            else 
            {
                console.error("Error");
            }
        }
    }
    if(query == "country")
    {
        xammy.open("GET", "http://localhost/info2180-lab5/world.php?country="+ searchCountry.value, true);
    }
    else
    {
        xammy.open("GET","http://localhost/info2180-lab5/world.php?country=" + searchCountry.value + "&lookup=cities", false)
    }
    xammy.send();
}