// JavaScript to handle opening and closing of popups
document.addEventListener("DOMContentLoaded", function () {
    // Get elements
    var loginBtn = document.getElementById("loginBtn");
    var loginPopup = document.getElementById("loginPopup");
    var registrationPopup = document.getElementById("registrationPopup");
    var registerNowBtn = document.getElementById("registerNowBtn");
    var loginNowBtn = document.getElementById("loginNowBtn");
    var closeBtns = document.getElementsByClassName("close-btn");

    // Show login popup
    loginBtn.onclick = function () {
        loginPopup.style.display = "block";
    };

    // Switch to registration popup
    registerNowBtn.onclick = function () {
        registrationPopup.style.display = "block";
        loginPopup.style.display = "none";
    };

    // Switch to login popup
    loginNowBtn.onclick = function () {
        loginPopup.style.display = "block";
        registrationPopup.style.display = "none";
    };

    // Close popups
    Array.from(closeBtns).forEach(function (element) {
        element.onclick = function () {
            loginPopup.style.display = "none";
            registrationPopup.style.display = "none";
        }
    });

    // Close popups when clicking outside of the content
    window.onclick = function (event) {
        if (event.target == loginPopup) {
            loginPopup.style.display = "none";
        } else if (event.target == registrationPopup) {
            registrationPopup.style.display = "none";
        }
    };
});

document.getElementById('forgotPasswordBtn').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'none';
    document.getElementById('forgotPasswordPopup').style.display = 'block';
});

document.getElementById('registerNowBtn').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'none';
    document.getElementById('registrationPopup').style.display = 'block';
});

document.getElementById('loginNowBtn').addEventListener('click', function() {
    document.getElementById('registrationPopup').style.display = 'none';
    document.getElementById('loginPopup').style.display = 'block';
});

document.getElementById('loginNowFromForgot').addEventListener('click', function() {
    document.getElementById('forgotPasswordPopup').style.display = 'none';
    document.getElementById('loginPopup').style.display = 'block';
});

document.querySelectorAll('.close-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.popup').forEach(popup => {
            popup.style.display = 'none';
        });
    });
});

