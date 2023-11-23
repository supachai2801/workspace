import { faGithub, faLinkedinIn,faExpeditedssl,faDochub } from "@fortawesome/free-brands-svg-icons";
import pic1Exp from "../assets/profilecard.png"
import logo from "../assets/logo.png"
import imageExp from "../assets/qrcodegenerator.png"
import document from "../assets/finproject.pdf"
import pic2Exp from "../assets/fontendlogin.png"


export const data = [
    {
        date: "2021-2022",
        title:"Music Work",
        link:"https://music-work-laravel.000webhostapp.com/",
        materials:[
             {type: faExpeditedssl,link:"https://music-work-laravel.000webhostapp.com/admin/login"},
             {type: faDochub,link:document},
        ],
        descriptions:[
            "Music Work is a project used for graduation.",
            "Admin website username: admin ,password: welcome",
            
        ],
        skills:[
            ["Laravel", "mySQL","000webhost"],
            
        ],
        picture: logo,
    },
    {
        date: "2022-2023",
        title:"Profile Card",
        link:"https://profilecardnew.web.app/",
        materials:[
             
             
        ],
        descriptions:[
            "A simple and minimalist portfolio for developers built with React and TailwindCSS, designed to be clean and fast."
        ],
        skills:[
            ["Html", "Css", "Javascript"],
            ["Firebase"],
            
        ],
        picture: pic1Exp,
    },
    {
        date: "2022-2023",
        title:"QR Code Generator",
        link:"https://qrcodegenerator-19747.firebaseapp.com/?_gl=1*gb82ve*_ga*MTM0NzEzNjI2Ni4xNjk4NjYxNTAw*_ga_CW55HF8NVT*MTY5OTAxNDczNi4zLjEuMTY5OTAxNzU4Mi41OS4wLjA&fbclid=IwAR08M4uESHj2Zt8ZfjIbRNMmgCNCIx3C9SMw-UjEBP-ELTvsW_l7I0ccu6c",
        materials:[
             
             
        ],
        descriptions:[
            "Create QR codes as you like."
        ],
        skills:[
            ["Html", "Css", "Javascript"],
            ["qrcodejs","Firebase"]
        ],
        picture: imageExp,
    },
    {
        date: "2022-2023",
        title:"fontendLogin",
        link:"https://testfontendlogin.web.app/",
        materials:[
             
             
        ],
        descriptions:[
            "Decorate and make the login page appear."
        ],
        skills:[
            ["Vite", "Tailwind", "React"],
            ["Firebase"],
            
        ],
        picture: pic2Exp,
    }
]
