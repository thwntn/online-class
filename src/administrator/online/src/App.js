import './App.css';
import Header from './navigation/header.js'
import HomePage from './homepage/homepage.js'
import NavMobile from './navigation/navmobile.js';
import { useState } from 'react';

function App() {
  console.log(sessionStorage.getItem('userOL') == undefined);
  const [main, setMain] = useState(<HomePage></HomePage>)
  if (window.innerWidth < 998) {
    return (
      <div className='container-fluid' style = {{ padding: '0px', margin: '0px'}}>
        <HomePage></HomePage>
        <NavMobile></NavMobile>
      </div>
    )
  }
  else return (
      <div className='container-fluid' style = {{ padding: '0px', margin: '0px'}}>
        <Header setMain = {setMain}></Header>
        {main}
      </div>
  )
}

export default App;
