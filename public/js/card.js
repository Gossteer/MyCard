let elementsArray = document.querySelectorAll("#sourceCard");

elementsArray.forEach(function(elem) {
    elem.addEventListener('click', function(e){
        e.preventDefault();
    });
    elem.addEventListener('dblclick', function(){
        location = elem.href;
    });
});



