function passwardChange(pl) {     //passwardLength
    console.log(pl);
    let passInput = document.getElementsByTagName('input')[2];
    let passHint = document.getElementById('pass_hint');
    let passWarn = document.getElementById('pass_warning');
    if(pl < 6) {
        passHint.innerText = "密码长度不足";
        passHint.style.height = "16px";
        passInput.style.color = "#FFD74D";
        passInput.style.caretColor = "#FFD74D";
        passInput.style.borderBottom = "1px solid #FFD74D";
        passWarn.style.width = "16px";
        passWarn.style.height = "16px";
        passWarn.style.backgroundImage = "url(photos/warning_sign.svg)";
    } else {
        passHint.innerText = "";
        passHint.style.height = "0px";
        passInput.style.color = "white";
        passInput.style.caretColor = "#B71C1C";
        passInput.style.borderBottom = "1px solid rgba(255, 255, 255, 0.54)";
        passWarn.style.width = "";
        passWarn.style.height = "";
        passWarn.style.backgroundImage = "";
    }
}

function repeatPasswardChange() {
    let passInput = document.getElementsByTagName('input')[2];
    let repeatPassInput = document.getElementsByTagName('input')[3];
    let repeatPassHint = document.getElementById('repeat_pass_hint');
    let repeatPassWarn = document.getElementById('repeat_pass_warning');
    console.log(!!!repeatPassInput.value);
    if( passInput.value != repeatPassInput.value && !!repeatPassInput.value) {
        repeatPassHint.innerText = "重复输入密码错误";
        repeatPassHint.style.height = "16px";
        repeatPassInput.style.color = "#FFD74D";
        repeatPassInput.style.caretColor = "#FFD74D";
        repeatPassInput.style.borderBottom = "1px solid #FFD74D";
        repeatPassWarn.style.width = "16px";
        repeatPassWarn.style.height = "16px";
        repeatPassWarn.style.backgroundImage = "url(photos/warning_sign.svg)";
    } else if(passInput.value == repeatPassInput.value || !!!repeatPassInput.value) {
        repeatPassHint.innerText = "";
        repeatPassHint.style.height = "0px";
        repeatPassInput.style.color = "white";
        repeatPassInput.style.caretColor = "#B71C1C";
        repeatPassInput.style.borderBottom = "1px solid rgba(255, 255, 255, 0.54)";
        repeatPassWarn.style.width = "";
        repeatPassWarn.style.height = "";
        repeatPassWarn.style.backgroundImage = "";
    }
}

function phoneChange(pl, i) {     //phoneLength   
    console.log(pl);
    console.log(i);
    let phoneInput = document.getElementsByClassName('people_phone');
    let ph_hint = document.getElementsByClassName('ph_hint');
    let waring_pic = document.getElementsByClassName('waring_pic');
    if (pl != 11) {
        ph_hint[i].innerText = "请输入正确的手机号";
        phoneInput[i].style.color = "#FFD74D";
        phoneInput[i].style.caretColor = "#FFD74D";
        phoneInput[i].style.borderBottom = "1px solid #FFD74D";
        waring_pic[i].style.float = "right";
        waring_pic[i].style.zIndex = "5";
        waring_pic[i].style.marginRight = "8px";
        waring_pic[i].style.marginTop = "-11px";
        waring_pic[i].style.width = "16px";
        waring_pic[i].style.height = "16px";
        waring_pic[i].style.backgroundImage = "url(photos/warning_sign.svg)";
    } else if (pl = 11) {
        ph_hint[i].innerText = "";
        phoneInput[i].style.color = "white";
        phoneInput[i].style.caretColor = "#B71C1C";
        phoneInput[i].style.borderBottom = "1px solid rgba(255, 255, 255, 0.54)";
        waring_pic[i].style.float = "";
        waring_pic[i].style.zIndex = "";
        waring_pic[i].style.marginRight = "";
        waring_pic[i].style.marginTop = "";
        waring_pic[i].style.width = "";
        waring_pic[i].style.height = "";
        waring_pic[i].style.backgroundImage = "";
    }
}

function addMember() {
    let members = document.getElementById('members');
    let newDiv = document.createElement('div');
    let newButton = document.createElement('button');
    let newSpan = document.createElement('span');
    let newNameInput = document.createElement('input');
    let newMajorInput = document.createElement('input');
    let newPhoneInput = document.createElement('input');
    let newPhoneHint = document.createElement('div');
    let newWarn = document.createElement('span');
    let membersLength = members.getElementsByTagName('button').length;
    if (membersLength < 5) {
        newButton.type = "button";
        //newButton.innerText = "删除成员";
        newSpan.className = "memberIndex";
        newNameInput.type = "text";
        newNameInput.className = "people";
        newNameInput.name = "people_name[]";
        newNameInput.placeholder = "姓名";
        newMajorInput.type = "text";
        newMajorInput.className = "people";
        newMajorInput.name = "people_major[]";
        newMajorInput.placeholder = "专业班级";
        newPhoneInput.type = "text";
        newPhoneInput.className = "people_phone";
        newPhoneInput.name = "people_phone[]";
        newPhoneInput.placeholder = "电话号码";
        newPhoneHint.className = "ph_hint";
        newWarn.className = "waring_pic";
        //newDiv.style.position = "relative";   //应该不用
        newDiv.className = "people_container";
        newDiv.appendChild(newButton);
        newDiv.appendChild(newSpan);
        newDiv.appendChild(newNameInput);
        newDiv.appendChild(newMajorInput);
        newDiv.appendChild(newPhoneInput);
        newDiv.appendChild(newPhoneHint);
        newDiv.appendChild(newWarn);
        members.appendChild(newDiv);
        deleteMember();
    };
}

function deleteMember() {
    let buttons = document.getElementById('members').getElementsByTagName('button');
    let memberIndex = document.getElementById('members').getElementsByClassName('memberIndex');
    let phoneInput = document.getElementsByClassName('people_phone');
    for (let i = 0; i < buttons.length; i++) {      //闭包    //我特么发现不用闭包也可以，有空再看看闭包具体是啥吧- -  //闭包是关系长大到具有某个性质的最小关系
        // (function (i) {                    //立即执行函数 
        buttons[i].onclick = function () {
            if (i >= 2) {
                let members = document.getElementById('members');
                let p = members.removeChild(members.childNodes[i]);
                deleteMember();
            };
        };
        memberIndex[i].innerText = "队员" + (i+1);
        phoneInput[i].onchange = function () { phoneChange(phoneInput[i].value.length, i) };
        // }
        // )(i);
        //console.log(i);  //控制台可见在for循环内部i有多种取值
    };
}

function validate_form(thisform) {
    with (thisform) {
        let phoneInput = document.getElementsByClassName('people_phone');
        let l_ = phoneInput.length;
        let Input = document.getElementsByTagName('input');
        let l = Input.length - 1;
        for (let j = 0; j < l_; j++) {
            phoneChange(phoneInput[j].value.length, j);
        };
        for (let i = 0; i < l; i++) {
            if (Input[i].value == null || Input[i].value == '') {
                Input[i].focus();
                return false;
            };
        };
        return true;
    };
}


addMember();
addMember();

var add = document.getElementById('addMember');
var passInput = document.getElementsByClassName('singleInput')[2];
var repeatPassInput = document.getElementsByClassName('singleInput')[3];
var userNameInput = document.getElementsByClassName('singleInput')[0];

userNameInput.focus();

add.onclick = function() {
    addMember();
};

passInput.onchange = function () {
    passwardChange(passInput.value.length);
}

repeatPassInput.onchange = function () {
    repeatPasswardChange(repeatPassInput.value);
}
