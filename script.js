// logic for opening and closing profile

const profileBtn = document.querySelector('.user-img');
const profileArrowBtn = document.querySelector('.profile-arrow');
const profile = document.querySelector('.user-profile');

const toggleProfile = () => {
    profile.classList.toggle('active');
    profileArrowBtn.classList.toggle('active');
}

profileBtn.addEventListener('click', toggleProfile);
profileArrowBtn.addEventListener('click', toggleProfile);

const menuBtn = document.querySelector('.btn-menu');
const dropdownMenu = document.querySelector('.dropdown-menu');
const html = document.querySelector('html');

// logic for opening dropdown menu

const dropdownMenuOpen = (e) => {
    // add open class to show menu
    dropdownMenu.classList.add('open');
    console.log('added');
    // add click event to screen so we can close menu 
    // when we click outside
    html.addEventListener('click', dropdownMenuClose)
    // if we click the menu it doesn't close
    dropdownMenu.addEventListener('click', (e) => {
        console.log('working');
        e.stopPropagation();
    })
    e.stopPropagation();
}
// closing menu and removing event listener from html
const dropdownMenuClose = () => {
    dropdownMenu.classList.remove('open');
    html.removeEventListener('click', dropdownMenuClose);
    console.log('removed');
}

menuBtn.addEventListener('click', dropdownMenuOpen);

//chat menu dropdown make it more simple all-in-one function in the future, 
// for now leave it like this

const chatMenuBtn = document.querySelector('.chat-menu-btn');
const chatDropdownMenu = document.querySelector('.chat-dropdown-menu');
// const html = document.querySelector('html');

// logic for opening dropdown menu

const chatDropdownMenuOpen = (e) => {
    // add open class to show menu
    chatDropdownMenu.classList.add('open');
    console.log('added');
    // add click event to screen so we can close menu 
    // when we click outside
    html.addEventListener('click', chatDropdownMenuClose)
    // if we click the menu it doesn't close
    chatDropdownMenu.addEventListener('click', (e) => {
        console.log('working');
        e.stopPropagation();
    })
    e.stopPropagation();
}
// closing menu and removing event listener from html
const chatDropdownMenuClose = () => {
    chatDropdownMenu.classList.remove('open');
    html.removeEventListener('click', chatDropdownMenuClose);
    console.log('removed');
}

chatMenuBtn.addEventListener('click', chatDropdownMenuOpen);

// enter and exit chat logic
const sidebar = document.getElementById('sidebar')
const chat = document.querySelector('.chat1');
const chatScreen = document.querySelector('.chat_screen');
const arrowBack = document.querySelector('.arrow-back-icon.chat-icon');
const welcome = document.querySelector('.welcome-page');

const toggleChat = () => {
    if(document.documentElement.clientWidth < 1024) {
        sidebar.classList.toggle('off');
        chatScreen.classList.toggle('on');
    } else {
        chatScreen.classList.add('on');
        welcome.classList.add('off');
        sidebar.classList.remove('off');
    } 
}
// enter chat
chat.addEventListener('click', toggleChat)
// go back
arrowBack.addEventListener('click', toggleChat)

// start scrolling from the bottom on chat

// const messages = document.querySelector('.messages');
// messages.scrollTo(0, messages.scrollHeight);

// fix small bug:
// remove sidebar class that makes it disappear
// when window is resized to tablet panoramic or small laptop size
// due to bad functionality when resizing after clicking chat

const body = document.querySelector('body');
window.addEventListener('resize', (e) => {
    if(window.innerWidth > 1023) {
        sidebar.classList.remove('off');
    }
})