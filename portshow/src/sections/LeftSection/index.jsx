import Contact from "../Contact";
import Header from "../Header";
import Navbar from "../Navbar";

const LeftSection =({navBarItems,currentSection})=>{
    return(
        <div>
            <div className='sticky top-10 px-5'>
                <div className='grid gap-y-5 lg:grid-rows-[35%_65%_5%] lg:h-[85vh]'>
                    <Header />
                    <Navbar navBarItems={navBarItems} currentSection={currentSection}/>
                    <Contact />
                </div>
            </div>
        </div>
    )
}

export default LeftSection;