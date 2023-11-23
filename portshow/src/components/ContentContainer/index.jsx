/*
<ContentConteiner
    title=" "
    data={[]}
/>
*/

import { useEffect, useState } from "react";
import FormattedDate from "../FormattedDate";
import Picture from "../Picture";
import TitleLink from "../TitleLink";
import Material from "../Material";
import Description from "../Description";
import Tech from "../Tech";

const ContentContainer = ({
    onInitial,
    title: sectionTitle ="",
    data =[],
}) =>{
    const [isMouseEnter,setIsMouseEnter]=useState({});

    const SECTION_ID =`${sectionTitle}-section`;
    
    useEffect(() =>{
        onInitial(SECTION_ID);
    },[])
    return (
        <div id={SECTION_ID} className="scroll-m-10">
            <div className="text-primaryAccent font-medium">{sectionTitle}</div>
            {
                data.map(({
                    date="",
                    title="",
                    link="",
                    materials=[],
                    descriptions=[],
                    skills=[],
                    picture="",
                },index)=>(
                    <div 
                        key={`${SECTION_ID}-${index}-${title.replaceAll(" ","")}`}
                        className={`grid grid-cols-[25%_75%] rounded-md py-6 transition-all ${isMouseEnter[`${SECTION_ID}-${index}`] ?"bg-gray-800":""}`}
                        onMouseEnter={()=>setIsMouseEnter({[`${SECTION_ID}-${index}`]:true})}
                        onMouseLeave={()=>setIsMouseEnter({[`${SECTION_ID}-${index}`]:false})}
                    >
                    <div>
                        <FormattedDate isHighlight={isMouseEnter[`${SECTION_ID}-${index}`]}>{date}</FormattedDate>
                        <Picture picture={picture} title={title}/>
                    </div>
                    <div className="grid gap-y-4">
                        <TitleLink isHighlight={isMouseEnter[`${SECTION_ID}-${index}`]} title={title} link={link}/>
                        {
                            materials.length > 0 ?
                            <div className="flex gap-4 text-xl item-center">
                                {
                                    materials.map((e,i)=>(
                                        <Material key={`${e}-material-${i}`} icon={e.type} link={e.link}/>
                                    ))
                                }
                                
                            </div>
                            : null
                        }
                        {
                            descriptions.map((e,i)=>(
                                < Description key={`${e}-description-${i}`} description={e}/>
                            ))
                        }
                        {
                            skills.map((e,i)=>(
                                <Tech key={`${e}-skill-${i}`} isHighlight={isMouseEnter[`${SECTION_ID}-${index}`]} data={e}/>
                            ))
                        }
                        
                        
                    </div>
                    </div>
                ))
            }
        </div>
    )
}
export default ContentContainer;