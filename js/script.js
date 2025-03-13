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
