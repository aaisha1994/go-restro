importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyBhPkcymuz-dSPcLkCupXvKCfHHwMtWcFs",
    authDomain: "go-restro-418107.firebaseapp.com",
    projectId: "go-restro-418107",
    storageBucket: "go-restro-418107.appspot.com",
    messagingSenderId: "344791552147",
    appId: "1:344791552147:web:aec69dbe392cb080957d66",
    measurementId: "G-ZN7BJGENLD"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function ({ data: { title, body, icon } }) {
    return self.registration.showNotification(title, { body, icon });
});
