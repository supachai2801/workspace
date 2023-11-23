// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAhs4M4wauwC_sHq_Tl_Y-WaXFW13TpH54",
  authDomain: "testfontendlogin.firebaseapp.com",
  projectId: "testfontendlogin",
  storageBucket: "testfontendlogin.appspot.com",
  messagingSenderId: "728209556555",
  appId: "1:728209556555:web:a9b35d292dda65e008b9ce",
  measurementId: "G-TCFNCK6VXH"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);