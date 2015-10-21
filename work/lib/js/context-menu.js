var contextMenuClassName = "context-menu";
var contextMenuItemClassName = "context-menu__item";
var contextMenuLinkClassName = "context-menu__link";
var contextMenuActive = "context-menu--active";

var taskItemClassName = "task";
var taskItemInContext;

var clickCoords;
var clickCoordsX;
var clickCoordsY;

var menu = document.querySelector("#context-menu");
//var menuItems = menu.querySelectorAll(".context-menu__item");
var menuState = 0;
var menuWidth;
var menuHeight;
var menuPosition;
var menuPositionX;
var menuPositionY;

var windowWidth;
var windowHeight;

var active = "context-menu--active";


"use strict";

var taskItems = document.querySelectorAll(".task");

for (var i = 0, len = taskItems.length; i < len; i++) {
    var taskItem = taskItems[i];
    contextMenuListener(taskItem);
}

function contextListener() {
    document.addEventListener("contextmenu", function (e) {
        taskItemInContext = clickInsideElement(e, taskItemClassName);

        if (taskItemInContext) {
            e.preventDefault();
            toggleMenuOn();


        } else {

            taskItemInContext = null;
            toggleMenuOff();
        }
    });
}


function contextMenuListener(el) {
    el.addEventListener("contextmenu", function (e) {
        e.preventDefault();
        toggleMenuOn();
        positionMenu(e);
    });
}

function toggleMenuOn() {
    if (menuState !== 1) {
        menuState = 1;
        document.querySelector("#context-menu").classList.add(contextMenuActive);
    }
}

function toggleMenuOff() {
    if (menuState !== 0) {
        menuState = 0;
        document.querySelector("#context-menu").classList.remove(contextMenuActive);
    }
}

function clickInsideElement(e, className) {
    var el = e.srcElement || e.target;

    if (el.classList.contains(className)) {
        return el;
    } else {
        while (el = el.parentNode) {
            if (el.classList && el.classList.contains(className)) {
                return el;
            }
        }
    }

    return false;
}
function clickListener() {
    document.addEventListener("click", function (e) {
        var clickeElIsLink = clickInsideElement(e, contextMenuLinkClassName);

        if (clickeElIsLink) {
            e.preventDefault();
            menuItemListener(clickeElIsLink);
        } else {
            var button = e.which || e.button;
            if (button === 1) {
                toggleMenuOff();
            }
        }
    });
}

function keyupListener() {
    window.onkeyup = function (e) {
        if (e.keyCode === 27) {
            toggleMenuOff();
        }
    }
}

function getPosition(e) {
    var posx = 0;
    var posy = 0;

    if (!e) var e = window.event;

    if (e.pageX || e.pageY) {
        posx = e.pageX;
        posy = e.pageY;
    } else if (e.clientX || e.clientY) {
        posx = e.clientX + document.body.scrollLeft +
            document.documentElement.scrollLeft;
        posy = e.clientY + document.body.scrollTop +
            document.documentElement.scrollTop;
    }

    return {
        x: posx,
        y: posy
    }
}

function positionMenu(e) {
    clickCoords = getPosition(e);
    clickCoordsX = clickCoords.x;
    clickCoordsY = clickCoords.y;

    menuWidth = document.querySelector("#context-menu").offsetWidth + 4;
    menuHeight = document.querySelector("#context-menu").offsetHeight + 4;

    windowWidth = window.innerWidth;
    windowHeight = window.innerHeight;

    if ((windowWidth - clickCoordsX) < menuWidth) {
        document.querySelector("#context-menu").style.left = windowWidth - menuWidth + "px";
    } else {
        document.querySelector("#context-menu").style.left = clickCoordsX + "px";
    }

    if ((windowHeight - clickCoordsY) < menuHeight) {
        alert(menuHeight)
        document.querySelector("#context-menu").style.top = windowHeight - menuHeight + "px";
    } else {

        document.querySelector("#context-menu").style.top = clickCoordsY + "px";
    }
}

function resizeListener() {
    window.onresize = function (e) {
        toggleMenuOff();
    };

    function menuItemListener(link) {
        console.log("Task ID - " +
            taskItemInContext.getAttribute("data-id") +
            ", Task action - " + link.getAttribute("data-action"));
        toggleMenuOff();
    }
}
