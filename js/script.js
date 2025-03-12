document.addEventListener('DOMContentLoaded', () => {
    const dbSidebar = document.querySelector('.dbSidebar');
    const dbcontent_Container = document.getElementById('dbcontent_Container');
    const username = document.getElementById('username');
    const toggleBtn = document.getElementById('toggleBtn');

    let isToggle = false; // Boolean om de status bij te houden

    toggleBtn.addEventListener('click', () => {
        isToggle = !isToggle; // Wissel de waarde

        if (isToggle) {
            // Sidebar ingeklapt
            dbSidebar.style.width = '10%';
            dbcontent_Container.style.width = '90%';
            username.style.display = 'none';

            let menuIconElements = document.getElementsByClassName('menuIcon');
            for (let i = 0; i < menuIconElements.length; i++) {
                menuIconElements[i].style.display = 'none';
            }

            let menuTextElements = document.getElementsByClassName('menuText');
            for (let i = 0; i < menuTextElements.length; i++) {
                menuTextElements[i].style.display = 'none';
            }
        } else {
            // Sidebar uitgeklapt
            dbSidebar.style.width = '20%';
            dbcontent_Container.style.width = '80%';
            username.style.display = 'block';

            let menuIconElements = document.getElementsByClassName('menuIcon');
            for (let i = 0; i < menuIconElements.length; i++) {
                menuIconElements[i].style.display = 'block';
                menuIconElements[i].style.textAlign = 'left';
            }

            let menuTextElements = document.getElementsByClassName('menuText');
            for (let i = 0; i < menuTextElements.length; i++) {
                menuTextElements[i].style.display = 'block';
            }
        }
    });
});
