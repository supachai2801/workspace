import { faArrowRight } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { useState } from "react";

const navs =[
    { title:"About",sectionId:"About-section"},
    { title:"Experience",sectionId:"Experience-section"},
    { title:"Project",sectionId:"Project-section"},
    { title:"Skills",sectionId:"Skills-section"}
]
const Navbar = ({navBarItems,currentSection}) =>{
    const [isMouseEnter,setIsMouseEnter] = useState({});
    const handleClick =(sectionId)=>{
        
        document.getElementById(sectionId).scrollIntoView({behavior: "smooth"})
    }
    return(
        <div>
            <div className='hidden lg:flex flex-col gap-4 font-semibold'>
                {
                    navBarItems.map((e,i) =>(
                        <div key={`nav-${e}-${i}`}
                            onClick={()=> handleClick(e.sectionId)}
                            onMouseEnter={()=> setIsMouseEnter({[e.title]:true})}
                            onMouseLeave={()=> setIsMouseEnter({[e.title]:false})}
                            className="cursor-pointer flex "
                            >
                                <div>
                                    <FontAwesomeIcon 
                                    
                                    className={` new-arrow ${currentSection === e.sectionId ? "text-primaryTitle" : isMouseEnter [e.title] ?"":"hidden"}`}icon={faArrowRight}
                                    />
                                </div>
                            
                            <div className={`${currentSection === e.sectionId || isMouseEnter [e.title]? "translate-x-3":""} duration-500 ease-out`}>{e.title}</div>
                        </div>
                    ))
                }
               
            </div>
        </div>
    )
}

export default Navbar;