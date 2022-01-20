var open = true;

$('#toggle').click(function () {
    if (!open) {
        showMenu();
    }
    else {
        hideMenu();
    }
});
$('#toggl').click(function () {
    if (!open) {
        showMenu();
    }
    else {
        hideMenu();
    }
});
$('#a25').click(function () {
    if (!open) {
        showMenu();
    }
    else {
        hideMenu();
    }
});
$('#a50').click(function () {
    if (!open) {
        showMenu();
    }
    else {
        hideMenu();
    }
});

$('nav a').click(function () {
    hideMenu();
});

function hideMenu() {
    $('nav').removeClass('menu-left-open');
    $('.container').removeClass('menu-push-right');
    open = false;
};


function showMenu() {
    $('nav').addClass('menu-left-open');
    $('.container').addClass('menu-push-right');
    open = true;
};

// LEFT-BLUE-MENU
document.querySelectorAll(".left-blue-nav ").forEach(a => {
    a.addEventListener("click", () => {
        document.querySelectorAll(".extra").forEach(t => {
            t.style.display = "none";
        })
        let id = a.getAttribute("data-open");
        document.getElementById(id).style.display = 'block';
    });
})
// LEFT-BLUE-MENU-END