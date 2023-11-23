// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyCjKbOYglrz-y5PiEyL4b-4S6d7rfwWQig",
  authDomain: "myportfolio123-3cdcc.firebaseapp.com",
  projectId: "myportfolio123-3cdcc",
  storageBucket: "myportfolio123-3cdcc.appspot.com",
  messagingSenderId: "449721075357",
  appId: "1:449721075357:web:8a9820f26934d98aed7674",
  measurementId: "G-HC323L7J1P"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);