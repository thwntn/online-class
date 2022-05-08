import './App.css';
import Header from './component/navigation/header.js'
import HomePage from './component/homepage/homepage.js'
import NavMobile from './component/navigation/navmobile.js';
import { useState, useEffect, useContext } from 'react';
import Profile from './component/profile/profile.js';
import Toast from './toast/Toast';
import { PageContext } from './context/MainContext';
import cookie from './login/cookie';
import Login from './component/Login/Login';



function App() {
  const page = useContext(PageContext)
  const [ser, setSer] = useState(<Login></Login>)
  useEffect (()  => {
    function securityWebsite () {
      cookie(1)
      .then ( res => res.json())
      .then (res => {
        if(res != 1) {
          page.setToast(<Toast props={{ type: 'error', content: 'Lỗi đăng nhập', sub: 'Hãy đăng nhập lại' }}></Toast>)
          setTimeout(() => {
            page.setToast(null)
            setSer(<Login></Login>)
          }, 2000);
        } else {
          setSer(<Header></Header>)
        }
      })
    }
    securityWebsite()
  }, [])
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
        {ser}
      </div>
  )
}

export default App;
