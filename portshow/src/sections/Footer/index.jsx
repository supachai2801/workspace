import { faGithub } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

const Footer=() =>{
    return (
        <div className="flex justify-end mb-10">
            <span>
            Powered by React.js and Tailwind
            <FontAwesomeIcon icon={faGithub} className="text-xl ml-3"/>
            </span>
        </div>
    )
}

export default Footer;