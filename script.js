// open profile img modal

const profileImgModal = document.querySelector('.form-profile-img');
const btnProfileImgModal = document.querySelector('.btn-modal-profileimg');

btnProfileImgModal.addEventListener('click', () => {
    console.log('hello');
    if(profileImgModal.style.display === "block"){
        profileImgModal.style.display = "none";
        btnProfileImgModal.innerHTML = "<div class=\"pencil-icon profile-icon\"></div>";
    } else {
        profileImgModal.style.display = "block";
        btnProfileImgModal.innerHTML = "close";
    }
})

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



const body = document.querySelector('body');
window.addEventListener('resize', (e) => {
    if(window.innerWidth > 1023) {
        sidebar.classList.remove('off');
    }
})

// logic for video calls

const videoBtn = document.querySelector('.video');
const videoCall = document.querySelector('.chat_video');
const cam = document.querySelector('video');
const hangupBtn = document.querySelector('.icon--hangup__container');

// declare stream variable (to get webcam) & add value with async function
// once we call it when videocall starts
let stream = null;

async function setStream() {
    stream = await navigator.mediaDevices.getUserMedia({ video: true });
}

// videocall starts, get webcam & display it on screen

async function videoCallSetup() {
    await setStream();
    cam.srcObject = stream;
}

async function stopVideoCall() {
    stream.getTracks().forEach(track => {
        track.stop();
    })
    videoCall.classList.remove('active');
}

videoBtn.addEventListener('click', () => {
    videoCall.classList.add('active');
    videoCallSetup();
})

hangupBtn.addEventListener('click', () => {
    stopVideoCall();
    console.log('shpould work')
})

// auth screen

const logBtn = document.querySelector('.btn--log');
const login = document.getElementById('login');
logBtn.addEventListener('click', () => {
    login.classList.add('active');
})

const registerBtn = document.querySelector('.btn--register');
const register = document.getElementById('register');
registerBtn.addEventListener('click', () => {
    register.classList.add('active');
})

// close log/register forms when pressing ESC key or outside the form

window.addEventListener('keydown', e => {
    if(e.keyCode === 27) {
        login.classList.remove('active');
        register.classList.remove('active');
    }
})

html.addEventListener('click', () => {
    login.classList.remove('active');
    register.classList.remove('active');
})

// prevent html click event from happening when clicking inside the form

logBtn.addEventListener('click', e => {
    e.stopPropagation();
})

registerBtn.addEventListener('click', e => {
    e.stopPropagation();
})

login.addEventListener('click', e => {
    e.stopPropagation();
})

register.addEventListener('click', e => {
    e.stopPropagation();
})

// CONTACTS FUNCTIONALITY && CHATS

const contactChats = document.querySelectorAll(".chat");
// enter and exit chat logic
const sidebar = document.getElementById('sidebar');
// const chat = document.querySelector('.chat1');
const chatScreen = document.querySelector('.chat_screen');
const welcome = document.querySelector('.welcome-page');
const arrowBack = document.querySelector('.arrow-back-icon.chat-icon');

const toggleChat = () => {
    console.log("hELLOOOO");
    if(document.documentElement.clientWidth < 1024) {
        sidebar.classList.toggle('off');
        chatScreen.classList.toggle('on');
    } else {
        chatScreen.classList.add('on');
        welcome.classList.add('off');
        sidebar.classList.remove('off');
    }}

arrowBack.addEventListener('click', toggleChat);

contactChats.forEach(contactChat => {
    contactChat.addEventListener("click", () => {
        console.log(contactChat.dataset.username);
        const contactId = contactChat.dataset.id;
        chatScreen.dataset.contact = contactId;
        let contactName;

        $.ajax({
            method: "POST",
            url: "modules/find_contact.php",
            data: { "contactId": contactId },
            beforeSend: () => console.log('Sending'),
        }).done((info) => {
            const contact = JSON.parse(info);

            contactName = contact.fullname;

            console.log(contact);

            const chatDOMUsername = document.querySelector(".chat-user-name");
            const chatDOMUserImg = document.querySelector(".chat-user-img");

            chatDOMUsername.textContent = contactName;
            chatDOMUserImg.src = `profile_images/${contact.path}`;
        })

        $.ajax({
            method: "POST",
            url: "modules/find_messages.php",
            data: { "contactId": contactId },
            beforeSend: () => console.log('Sending'),
        }).done((info) => {
            const messages = JSON.parse(info);

            const dateFormatter = (timestamp) => {
                const dt = new Date(timestamp);

                let y = dt.getFullYear();
                let d = dt.getDate();
                let m = dt.getMonth() + 1;
                
                if(d < 10){
                    d = `0${d}`;
                }

                if(m < 10){
                    m = `0${m}`;
                }

                const formattedDate = `${y}-${m}-${d}`;

                return formattedDate;
            }

            const messagesWithFormattedDate = messages.map(message => ({...message, date: dateFormatter(message.timestamp)}));

            let today = new Date();
            let yesterday = new Date();

            yesterday.setDate(yesterday.getDate() - 1);

            // const group = arr => {
            //     return arr.reduce((acc, val) => {
            //         const { data, map } = acc;
            //         const ind = map.get(val);
            //         // console.log({ map });
            //         // console.log({ val });
            //         // console.log({ data });
            //         console.log({ ind });
            //         if(map.has(val.date)){
            //             console.log("working");
            //             data[ind - 1].push(val);
            //         } else {
            //             map.set(val, data.push([val.date]));
            //         }
            //         return { data, map };
            //         }, {
            //         data: [],
            //         map: new Map()
            //         }).data;
            //  };

            //  const messagesByDay = group(messagesWithFormattedDate);

            //  console.log({messagesByDay});

            // console.log({ today: dateFormatter(today) })

            // console.log({messagesWithFormattedDate});

            // console.log(messages);

            function groupArrayOfObjects(list, key) {
                return list.reduce(function(rv, x) {
                  (rv[x[key]] = rv[x[key]] || []).push(x);
                  return rv;
                }, {});
              };

            const messagesByDayTemp = groupArrayOfObjects(messagesWithFormattedDate, "date");

            console.log( messagesByDayTemp );

            const messagesByDay = Object.entries(messagesByDayTemp);

            console.log(messagesByDay);

            // messagesByDay.forEach(message => console.log(message));

            const messagesDOM = document.querySelector(".messages");

            messagesDOM.innerHTML = "";

            if(messages.length === 0) {
                const emptyChatMessage = document.createElement("p");

                emptyChatMessage.classList.add("alert");
                emptyChatMessage.classList.add("alert-empty-chat");

                emptyChatMessage.textContent = `This chat is empty. Send your first message to ${contactName}!`;

                messagesDOM.appendChild(emptyChatMessage);
            }

            messagesByDay.forEach(messageGroup => {
                if(messageGroup[0] === dateFormatter(today)){
                    console.log("Today : ");
                } else {
                    console.log(`${messageGroup[0]} : `);
                }
                messageGroup[1].forEach(message => {
                    console.log(message);
                })
            })

            messagesByDay.forEach(messageGroup => {
                messageGroup[1].forEach(message => {
                    const messageDOM = document.createElement("li");
                    const messageTextDOM = document.createElement("span");
                    const messageDetailsDOM = document.createElement("div");
                    const messageTimeDOM = document.createElement("span");
    
                    const sender = contactId === message.user_sender_id ? false : true;
    
                    messageDOM.classList.add("message");
                    messageDOM.classList.add(`${sender ? "user-message" : "contact-message"}`);
                    messageTextDOM.classList.add(`${sender ? "user-message-text" : "contact-message-text"}`);
                    messageDetailsDOM.classList.add(`${sender ? "user-message-details" : "contact-message-details"}`);
                    messageTimeDOM.classList.add("message-time");
    
                    messageTextDOM.textContent = message.text;
    
                    messageDetailsDOM.appendChild(messageTimeDOM);
                    messageDOM.appendChild(messageTextDOM);
                    messageDOM.appendChild(messageDetailsDOM);
                    messagesDOM.appendChild(messageDOM);
    
                    // format hours here
    
                    const hourFormatter = (timestamp) => {
                        const dt = new Date(timestamp);
    
                        let h = dt.getHours();
                        let m = dt.getMinutes();
                        
                        if(h < 10){
                            h = `0${h}`;
                        }
    
                        if(m < 10){
                            m = `0${m}`;
                        }
    
                        const formattedHour = `${h}:${m}`;
    
                        return formattedHour;
                    }
    
                    messageTimeDOM.textContent = hourFormatter(message.timestamp);
                })
                let dateText = "";

                    if(messageGroup[0] === dateFormatter(today)) { 
                        dateText = "Today";
                    } else if (messageGroup[0] === dateFormatter(yesterday)) {
                        dateText = "Yesterday";
                    } else {
                        dateText = messageGroup[0].split("-").reverse().join("-");
                    }

                     const dateDOM = document.createElement("p");
                        
                    dateDOM.classList.add("date");
    
                    dateDOM.textContent = dateText;
    
                    messagesDOM.appendChild(dateDOM);
            })

            // const chatDOMUsername = document.querySelector(".chat-user-name");
            // const chatDOMUserImg = document.querySelector(".chat-user-img");

            // chatDOMUsername.textContent = contact.fullname;
            // chatDOMUserImg.src = `profile_images/${contact.path}`;
        })
        
        toggleChat();
        
        // }
        // // enter chat
        // chat.addEventListener('click', toggleChat)
        // // go back

        // start scrolling from the bottom on chat

        const messages = document.querySelector('.messages');
        messages.scrollTo(0, messages.scrollHeight);

        // fix small bug:
        // remove sidebar class that makes it disappear
        // when window is resized to tablet panoramic or small laptop size
        // due to bad functionality when resizing after clicking chat
    })
})

// frontend login form (just for now until db is added)

// const authScreen = document.getElementById('authentication__screen');
// const logForm = document.getElementById('form__log');

// logForm.addEventListener('submit', (e) => {
//     e.preventDefault();

//     authScreen.classList.add('inactive');
// })

// change name (display input)

// const nameInput = document.querySelector('');
// const changeNameBtn = document.querySelector('btn-change-name');

// changeNameBtn.addEventListener

// change status (display input)