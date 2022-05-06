import './App.css';
import Header from './component/navigation/header.js'
import HomePage from './component/homepage/homepage.js'
import NavMobile from './component/navigation/navmobile.js';
import { useState, useEffect } from 'react';
import Profile from './component/profile/profile.js';

function App() {
  //create
  if(!localStorage.getItem('listFunc')){
    localStorage.setItem('listFunc', JSON.stringify([]))
  }

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
        <Header></Header>
      </div>
  )
}

export default App;
