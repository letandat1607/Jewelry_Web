const haveChild = document.querySelector('#have_child');
const childItems = document.querySelector('#nav-child-items');
let clicks = false
haveChild.addEventListener ('click', () => {
    if (!clicks){
        childItems.classList.add('navbar-nav-child-items');
        clicks = true;
    }
    else{
        childItems.classList.remove('navbar-nav-child-items');
        clicks = false;
    }
})