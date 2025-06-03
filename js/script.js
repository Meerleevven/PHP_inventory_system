//voor de dashboard
document.addEventListener('DOMContentLoaded', () => {
    const dbSidebar = document.querySelector('.dbSidebar');
    const dbcontent_Container = document.getElementById('dbcontent_Container');
    const username = document.getElementById('username');
    const toggleBtn = document.getElementById('toggleBtn');
    const dbsidebar_userImage = document.getElementById('dbsidebar_userImage');

    let isToggle = false; // Boolean

    toggleBtn.addEventListener('click', () => {
        isToggle = !isToggle; // Wissel de waarde

        if (isToggle) {
            // Sidebar ingeklapt
            dbSidebar.style.width = '10%';
            dbSidebar.style.transition = '0.3s all';
            dbcontent_Container.style.width = '90%';
            username.style.display = 'none';
            dbsidebar_userImage.style.marginLeft = '35px';
            

            let menuIconElements = document.getElementsByClassName('menuIcon');
            for (let i = 0; i < menuIconElements.length; i++) {
                menuIconElements[i].style.textAlign = 'center';
            }

            let menuTextElements = document.getElementsByClassName('menuText');
            for (let i = 0; i < menuTextElements.length; i++) {
                menuTextElements[i].style.display = 'none';
            }

            document.getElementById('dbsidebar_menuList').style.textAlign = 'center';
            document.getElementById('dbsidebar_Logo').style.textAlign = 'center';
        } else {
            // Sidebar uitgeklapt
            dbSidebar.style.width = '20%';
            dbcontent_Container.style.width = '80%';
            username.style.display = 'block';
            username.style.marginLeft = '90px';
            dbsidebar_userImage.style.marginLeft = '20px';

            let menuIconElements = document.getElementsByClassName('menuIcon');
            for (var i = 0; i < menuIconElements.length; i++) {
                menuIconElements[i].style.display -'inline-block';
            }
            
            let menuTextElements = document.getElementsByClassName('menuText');
            for (let i = 0; i < menuTextElements.length; i++) {
                menuTextElements[i].style.display = 'inline-block';
                menuTextElements[i].style.textAlign = 'left';
                menuTextElements[i].style.marginLeft = '10px'; // Ruimte tussen icon en tekst
            }
            
            document.getElementById('dbsidebar_Logo').style.textAlign = 'left';
            document.getElementById('dbsidebar_userImage').style.textAlign = 'left';
            document.getElementById('dbsidebar_menuList').style.textAlign = 'left';
        }
    });
});

//wachtwoordsterkte bar
document.addEventListener('DOMContentLoaded', () => {
const indicator = document.querySelector('.indicator');
const input = document.querySelector('.inputPas');
const weak = document.querySelector('.weak');
const meduim = document.querySelector('.meduim');
const strong = document.querySelector('.strong');
const showBtn = document.querySelector('.showBtn');
const txtStrength = document.querySelector('.txtStrength');

let regExpWeak = /[a-zA-Z]/;
let regExpMeduim = /\d+/;
let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;

function trigger() {
    if (input.value != ""){
        indicator.style.display = 'block';
        indicator.style.display = 'flex';
        if (input.value.length <= 3 && (input.value.match(regExpWeak) || input.value.match(regExpMeduim) || input.value.match(regExpStrong))) no=1;
        if (input.value.length >= 6 && ((input.value.match(regExpWeak) && input.value.match(regExpMeduim)) || (input.value.match(regExpMeduim) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && (input.value.match(regExpStrong))))) no=2;
        if (input.value.length >= 6 && input.value.match(regExpWeak) && input.value.match(regExpMeduim) && input.value.match(regExpStrong)) no=3;
        if (no==1) {
            weak.classList.add('active');
            txtStrength.style.display = 'block';
            txtStrength.textContent = 'Your password is to Weak';
            txtStrength.classList.add('weak');
        }
        if (no==2) {
            meduim.classList.add('active');
            txtStrength.textContent = 'Your password is Meduim';
            txtStrength.classList.add('meduim');
        }else{
            meduim.classList.remove('active');
            txtStrength.classList.remove('meduim');

        }
        if (no==3) {
            meduim.classList.add('active');
            strong.classList.add('active');
            txtStrength.textContent = 'Your password is strong';
            txtStrength.classList.add('strong');
        }else{
            strong.classList.remove('active');
            txtStrength.classList.remove('strong');

        }
        showBtn.style.display = 'block';
        showBtn.onclick = function() {
            if (input.type === 'password') {
                input.type = 'text';
                showBtn.textContent = 'HIDE';
                
            } else {
              input.type = 'password';
              showBtn.textContent = 'SHOW';
            }
        }
        
    } else {
        indicator.style.display = 'none';
        txtStrength.style.display = 'none';
        showBtn.style.display = 'none';
    }
}

input.addEventListener('input', trigger);
});

//wachtwoord matcher + email regex
document.addEventListener('DOMContentLoaded', () => {
    const pas1 = document.querySelector('.inputPas');
    const confirmPassword = document.querySelector('.inputPas2'); // Tweede wachtwoordveld
    const errorText = document.querySelector('.matchedPass'); // Melding ophalen
    const email = document.querySelector('.inputEmail');
    const errorEmail = document.querySelector('.regexCheck');
    const showBtn = document.getElementById('showBTN');

    regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    function validatepasswords() {
        if (confirmPassword.value !== pas1.value) {
            errorText.style.display = 'block';
            errorText.textContent = 'Passwords does not match';
        }
        else {
            errorText.style.display = 'none';
        }
    }

    function validateEmail() {
        if (email.value.match(regexEmail)) {
            errorEmail.style.display = 'none';
            showBtn.style.bottom = '-69px';
        } else {
            errorEmail.style.display = 'block';
            errorEmail.textContent = 'Invalid Email';
            showBtn.style.bottom = '-104px';
        }
    }

    confirmPassword.addEventListener('input', validatepasswords);
    email.addEventListener('input', validateEmail);
});

document.addEventListener('DOMContentLoaded', () => {
    const editBtn = document.getElementById('btnEdit');
    const nameSpace = document.getElementById('userInput');
    const emailSpace = document.getElementById('emailInput');
    nameSpace.disabled = true;
    emailSpace.disabled = true;

    // Toggle de disabled status van de invoervelden
    editBtn.addEventListener('click', () => {
        if (nameSpace.disabled) {
            nameSpace.disabled = false;
            emailSpace.disabled = false;
        } else {
            nameSpace.disabled = true;
            emailSpace.disabled = true;
        }
    }
    );
});