
function opentab(tabName,event) {
    const tabLinks = document.querySelectorAll('.tab-links');
    const tabContents = document.querySelectorAll('.tab-contents');

    tabLinks.forEach(link => link.classList.remove('active-link'));
    tabContents.forEach(content => content.classList.remove('active-tab'));

 
   event.currentTarget.classList.add('active-link');
    document.getElementById(tabName).classList.add('active-tab');

    console.log('Tab clicked:', tabName);
 
}

