
import ContentContainer from "../../components/ContentContainer";
import { data as experienceData } from "../../contents/experience";
import { data as projectData } from "../../contents/projects";
import { data as skillsData } from "../../contents/skills";
import About from "../About";
import Footer from "../Footer";


const RightSection =({onInitial})=>{
    return(
        <div>
            <div className="grid gap-y-40 px-5">
                <About
                    onInitial={onInitial}
                    title="About"
                />
                <ContentContainer 
                    onInitial={onInitial}
                    title="Experience"
                    data={experienceData}
                />
                <ContentContainer 
                    onInitial={onInitial}
                    title="Project"
                    data={projectData}
                />
                <ContentContainer 
                    onInitial={onInitial}
                    title="Skills"
                    data={skillsData}
                />
                <Footer/>
                
            </div>
        </div>
    )
}

export default RightSection;