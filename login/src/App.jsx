import React from 'react';
import Login from './component/login';
import Register from './component/register';
import { Route, Routes } from 'react-router-dom';

function App() {
  return(
    <div className="text-white h-[100vh] flex justify-center items-center bg-cover">
    <Routes>
      <Route path = '/' element={ <Login/> }/>
      <Route path = 'Login' element={ <Login/> }/>
      <Route path = 'Register' element={ <Register/> }/>
    </Routes>
    </div>
  )
}

export default App
