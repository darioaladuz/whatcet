##### TODO #####

### AJAX && WEBSOCKETS ###
[AXAJ FOR EVERYTHING (OR ALMOST EVERYTHING)]
ADD FUNCTIONALITY FOR INSTANT MESSAGES
YOU'LL PROBABLY HAVE TO CREATE A NEW TABLE FOR NOTIFICATIONS? WE'LL SEE

### FORMS ###
SANITIZE DATA
FORM VALIDATION
ERRORS

### PROFILE IMAGES ###

ASK WHAT IS BEST PRACTICE: STORING ID & QUERY EVERYTIME YOU NEED IMG
OR STORING FULL PATH SO YOU CAN USE IT MULTIPLE TIMES WITHOUT QUERY

### ICONS ###

# FIXED: (declared width twice instead of width + height)
#   FIND OUT WHY TF THEY AREN'T WORKING (NEW ONES, PENCIL)

### CSS ###

REFACTOR?
SCSS?
DIFFERENT DIRECTORIES?

### CODE IN GENERAL ###

REFACTOR
DIFFERENT DIRECTORIES
BEST PRACTICES
MYSQLI I GUESS

### USERS RELATIONSHIPS ###

SEND MSG TO ANOTHER USER
OTHER USER CAN SEE MSG
THEY HAVE THE OPTION TO ADD YOU AS A CONTACT
YOU CAN ADD THEM AS A CONTACT TOO
SEND FILES
// IN FUTURE //
SEND CONTACTS (just reference to ID but they can see name)

### DB ###

Users
    Contacts relation with Users > is it possible? I guess
    Messages
    Username
    Email
    Password
    Status
    ProfileImage
    ID (int)
Conversations ?
    Messages
    Both users
Messages
    Sender relation with Users
    Receiver relation with Users
    ID
    Type
    Datetime
Groups ?
    Participants relation with Users
    Messages