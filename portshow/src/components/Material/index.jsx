import { faGithub } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

const Material=({icon,link})=>{
    return(
        <div>
            <a href={link} target="_blank" className="hover:scale-125 hover:text-primaryTitle">
            <FontAwesomeIcon icon={icon}/></a>
        </div>
    )
}

export default Material;