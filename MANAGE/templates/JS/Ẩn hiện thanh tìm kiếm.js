document.addEventListener('DOMContentLoaded', function(){
    const searchIcon = document.getElementById('search-icon');
    const searchForm = document.getElementById('search-form');
    const searchButton = document.getElementById('button');
 
    searchIcon.addEventListener('click', function(){
        if(searchForm.style.display === 'block' || searchButton.style.display==='block'){
            searchForm.style.display = 'none';
            searchButton.style.display='none';
        }else{
            searchForm.style.display = 'block';
            searchButton.style.display='block';
        }
    });
 
    // Click out
    document.addEventListener('click', function(event){
        if(event.target != searchIcon && !searchForm.contains(event.target)){
            searchForm.style.display = 'none';
            searchButton.style.display='none';
        }
    });
});
