document.addEventListener("DOMContentLoaded", function() 
{
    console.log("Page loaded");

    var look = document.getElementById("lookup");
    look.addEventListener("click", search);
});

function search() 
{
    var getCountry = document.getElementById("result");
    var searchCountry = document.getElementById("country");

    var xammy = new XMLHttpRequest();
    xammy.onreadystatechange = function() {
        if (xammy.readyState === XMLHttpRequest.DONE) {
            if (xammy.status === 200) {
                getCountry.innerHTML = xammy.responseText;
            } else {
                console.error("Error");
            }
        }
    };

    xammy.open("GET", `http://localhost/info2180-lab5/world.php?country=${searchCountry.value}`, true);
    xammy.send();
}