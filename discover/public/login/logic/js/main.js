/* set sidenav */
// $("#mySidenav").html("../common/sidebar.html");


/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    // document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("mySidenav").classList.toggle('open');
    // document.getElementById("main").style.marginLeft = "250px";
    // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").classList.toggle('open');
    // document.body.style.backgroundColor = "white";
}


document.getElementById("mySidenav").addEventListener('mouseenter', ()=>{
    document.getElementById("mySidenav").classList.remove('open');
});
