const Picture=({picture,title})=>{
    if(!picture)
        return null;
    return(
        <div className="w-5/6  rounded-md mt-2 ml-3 border-2 border-primaryContent">
            <img src={picture} alt={title}/>
        </div>
    )
}

export default Picture;