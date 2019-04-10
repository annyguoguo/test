var chosen = [];

function bindClick (e) {
    console.log(e.value);
    let value = parseInt(e.value);
    let index = chosen.indexOf(value);
    if(index == -1) {
        chosen.push(value);
    } else {
        chosen.splice(index, 1);
    };
    console.log(chosen);

    if(chosen.length >= 2) {
        disable("checkbox");
    } else {
        enableAll("checkbox");
    };

    renderClass();
}

function disable(classname) {  
    let checkboxes = getClasses(classname); // "checkbox"
    for(let i = 0; i < checkboxes.length; i++) {
        if(chosen.indexOf(parseInt(checkboxes[i].value)) === -1) {
            checkboxes[i].disabled = true;
        };
    };
}

function enableAll(classname) {
    let checkboxes = getClasses(classname); // "checkbox"
    for(let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].disabled = false;
    };
}

function renderClass() {
    let containers = getClasses("checkbox_container");
    for (let i = 0; i < containers.length; i++) {
        let index = chosen.indexOf(i);
        if(chosen.indexOf(i) != -1) {
            let color = getColor(index);
            containers[i].style.color = color;
        } else {
            containers[i].style.color = "";
        };
    };
}

function getColor(index) {
    switch(index) {
        case 0: 
            return "red";
        case 1: 
            return "blue";
        default:
            return "unknown index";
    };
}

function getClasses(classname) {
    let classes = document.getElementsByClassName(classname);
    console.log(classes);
    return classes;
}