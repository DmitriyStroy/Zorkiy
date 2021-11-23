const popupsLinks = document.querySelectorAll('.popups-link');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll(".lock-padding");

let unlock = true;

const timeout = 800;

if (popupsLinks.length > 0) {
    for (let index = 0; index < popupsLinks.length; index++) {
        const popupsLink = popupsLinks[index];
        popupsLink.addEventListener("click", function(e) {
            const popupsName = popupsLink.getAttribute('href').replace('#', '');
            const curentpopups = document.getElementById(popupsName);
            popupsOpen(curentpopups);
            e.preventDefault();
        })
    }
}
const popupsCloseIcon = document.querySelectorAll('.close-popups');
if (popupsCloseIcon.length > 0) {
    for (let index = 0; index < popupsCloseIcon.length; index++) {
        const el = popupsCloseIcon[index];
        el.addEventListener('click', function(e) {
            popupsClose(el.closest('.popups'));
            e.preventDefault();
        });
    }
}

function popupsOpen(curentpopups) {
    if (curentpopups && unlock) {
        const popupsActive = document.querySelector('.popups.open');
        if (popupsActive) {
            popupsClose(popupsActive, false);
        } else {
            bodyLock();
        }
        curentpopups.classList.add('open');
        curentpopups.addEventListener("click", function(e) {
            if (!e.target.closest('.popups__content')) {
                popupsClose(e.target.closest('.popups'));
            }
        });
    }
}

function popupsClose(popupsActive, doUnlock = true) {
    if (unlock) {
        popupsActive.classList.remove('open');
        if (doUnlock) {
            bodyUnLock();
        }
    }
}

function bodyLock() {
    const lockPaddingValue = /*window.innerWidth - document.querySelector('.wrapper').offsetWidth */ 17 + 'px';

    if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
            const el = lockPadding[index];
            el.style.paddingRight = lockPaddingValue;
        }
    }
    body.style.paddingRight = lockPaddingValue;
    body.classList.add('lock');

    unlock = false;
    setTimeout(function() {
        unlock = true;
    }, timeout);
}

function bodyUnLock() {
    setTimeout(function() {
        if (lockPadding.length > 0) {
            for (let index = 0; index < lockPadding.length; index++) {
                const el = lockPadding[index];
                el.style.paddingRight = '0px';
            }
        }
        body.style.length.paddingRight = '0px';
        body.classList.remove('lock');
    }, timeout);

    unlock = false;
    setTimeout(function() {
        unlock = true;
    }, timeout);
}