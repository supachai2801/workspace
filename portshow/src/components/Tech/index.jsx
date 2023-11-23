const Tech=({isHighlight,data})=>{
    return(
        <div>
            <div className="text-primarynoob flex gap-4 text-sm">
                {
                    data.map((e,i)=>(
                        <div key={`${e}-tech-${i}`}className={`bg-primaryAccent px-2 py-1 rounded-sm ${isHighlight ?"text-primaryBase":""}`}>{e}</div>
                    ))
                }
            </div>
        </div>
    )
}

export default Tech;