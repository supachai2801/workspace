const FormattedDate=({isHighlight,children})=>{
    return(
        <div>
            <span className={`text-sm ml-10 ${isHighlight ?"text-primarynoob":""} `}>
                {children}
            </span>
        </div>
    )
}

export default FormattedDate;