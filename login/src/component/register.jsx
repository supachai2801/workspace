import { Link } from "react-router-dom";
import { BiUser } from "react-icons/bi";
import { AiOutlineUnlock } from "react-icons/ai";

const register = () => {
    return (
        <div>
            <div className="bg-slate-800 border border-slate-400 rounded-md p-8 shadow-lg backdrop-filter backdrop-blur-sm bg-opacity-30 relative">
                <h1 className="text-4xl text-white font-bold text-center mb-10">Register</h1>
                <form action="">
                    <div className="relative my-6 mb-10">
                        <input type="email" className="block w-72 py-2.3 px-0 text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:text-white focus:border-blue-600 peer" placeholder=""/>
                        <label htmlFor="" className="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 bottom-0  -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Email</label>
                        <BiUser className="absolute right-4 bottom-1"/>
                    </div>
                    <div className="relative my-1 mb-10">
                        <input type="password" className="block w-72 py-2.3 px-0 text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:text-white focus:border-blue-600 peer" placeholder=""/>
                        <label htmlFor="" className="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 bottom-0 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Password</label>
                        <AiOutlineUnlock className="absolute right-4 bottom-1"/>
                    </div>
                    <div className="relative my-1 mb-10">
                        <input type="password" className="block w-72 py-2.3 px-0 text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:text-white focus:border-blue-600 peer" placeholder=""/>
                        <label htmlFor="" className="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 bottom-0 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password</label>
                        <AiOutlineUnlock className="absolute right-4 bottom-1"/>
                    </div>
                    
                    <button className="w-full mb-4 text-[18px] font-bold mt-6 rounded-full bg-white text-purple-800  hover:bg-purple-800 hover:text-white border-2 hover:border-white py-2 transition-colors duration-300" type ="submit">Register</button>
                    <div>
                        <span className="m-6">Already Create an Account ? <Link className="text-red-500" to='/Login' >Login</Link></span>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default register;