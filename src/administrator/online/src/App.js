import './App.css';
import Header from './navigation/header.js'
import HomePage from './homepage/homepage.js'
import Confirm from './confirm/confirm.js';
import Manage from './manage/manage';
import Log from './log/log.js'
import NavMobile from './navigation/navmobile.js';

function App() {
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
        <HomePage></HomePage>
        <Confirm></Confirm>
        <Manage></Manage>
        <Log></Log> 
        <NavMobile></NavMobile>
      </div>
  )
}

export default App;
