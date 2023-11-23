import { faGithub, faLinkedinIn } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

const Contact =()=>{
    return(
        <div className="mb-4">
           <div className='flex items-end gap-4 text-2xl'>
            <FontAwesomeIcon className='hover:scale-125 hover:text-primaryTitle transition-all'icon={faGithub}/>
            <FontAwesomeIcon className='hover:scale-125 hover:text-primaryTitle transition-all'icon={faLinkedinIn}/>     
          </div>
        </div>
    )
}

export default Contact;