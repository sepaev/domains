var contextMenuClassName = "dropdown-menu";
var contextMenuItemClassName = "dropdown-menu__item";
var contextMenuLinkClassName = "dropdown-menu__link";
var contextMenuActive = "dropdown-menu--active";

var taskItemClassName = "form-control";
var taskItemInContext;

var clickCoords;
var clickCoordsX;
var clickCoordsY;

var menu = document.querySelector("#dropdown-menu");
//var menuItems = menu.querySelectorAll(".dropdown-menu__item");
var menuState = 0;
var menuWidth;
var menuHeight;
var menuPosition;
var menuPositionX;
var menuPositionY;

var windowWidth;
var windowHeight;

var active = "dropdown-menu--active";


"use strict";

var taskItems = document.querySelectorAll(".form-control");

for (var i = 0, len = taskItems.length; i < len; i++) {
    var taskItem = taskItems[i];
    contextMenuListener(taskItem);
}

function getUrl(obj,sign) {
    var wr = $('#where').val();
    if (!wr) {
        url = document.location.href + "/?where=" + obj.name + sign + obj.value
    } else {
        url = document.location.href + ";" + obj.name + sign + obj.value
    }
    //alert(url)
    var enc = encodeURI(url);
    //alert(enc)
    var dec = decodeURI(enc);
    //alert(dec)
    return (dec);
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
        contextUri(el);
    });
}

function contextUri(obj){
    $("#like").text("Равно: "+obj.value);
    $("#like").attr('href', getUrl(obj, "="));

    $("#notlike").text("Не равно: "+obj.value);
    $("#notlike").attr('href', getUrl(obj, "<>"));

    var int=parseInt(obj.value);
    var date=new Date(obj.value);
    if (int == obj.value) {
        $("#more").text("Более: " + obj.value);
        $("#more").attr('href', getUrl(obj, ">"));

        $("#less").text("Менее: " + obj.value);
        $("#less").attr('href', getUrl(obj, "<"));
    } else if (date=obj.value){
        $("#more").text("Познее: " + obj.value);
        $("#more").attr('href', getUrl(obj, ">"));

        $("#less").text("Ранее: " + obj.value);
        $("#less").attr('href', getUrl(obj, "<"));
    }
    else{
        $("#more").text("");
        $("#more").attr('href', "");

        $("#less").text("");
        $("#less").attr('href', "");
    }
    console.log($("#clearFilter"));
    var currentUrl = location.href;
    var separator = /\s*\?\s*/;
    var tagList = currentUrl.split(separator);
    $("#clear").attr('href', tagList[0])
}

function toggleMenuOn() {
    if (menuState !== 1) {
        menuState = 1;
        document.querySelector("#dropdown-menu").classList.add(contextMenuActive);
        console.log($(this));

        //$("#like").attr('href', url);
    }
}

function toggleMenuOff() {
    if (menuState !== 0) {
        menuState = 0;
        document.querySelector("#dropdown-menu").classList.remove(contextMenuActive);
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

    menuWidth = document.querySelector("#dropdown-menu").offsetWidth + 4;
    menuHeight = document.querySelector("#dropdown-menu").offsetHeight + 4;

    windowWidth = window.innerWidth;
    windowHeight = window.innerHeight;

    if ((windowWidth - clickCoordsX) < menuWidth) {
        //document.querySelector("#dropdown-menu").style.left = windowWidth - menuWidth + "px";
        document.querySelector("#dropdown-menu").style.left = clickCoordsX + "px";
    } else {
        document.querySelector("#dropdown-menu").style.left = clickCoordsX + "px";
    }


    if ((windowHeight - clickCoordsY) < menuHeight) {
        //document.querySelector("#dropdown-menu").style.top = windowHeight - menuHeight + "px";
        document.querySelector("#dropdown-menu").style.top = clickCoordsY + "px";
    } else {
        document.querySelector("#dropdown-menu").style.top = clickCoordsY + "px";
    }
    //alert(document.querySelector("#dropdown-menu").style.left+" "+document.querySelector("#dropdown-menu").style.top)
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
