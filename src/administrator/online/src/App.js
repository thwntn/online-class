import './App.css';
import Header from './navigation/header.js'
import HomePage from './homepage/homepage.js'
import Confirm from './confirm/confirm.js';
import Manage from './manage/manage';
import Log from './log/log.js'

function App() {
  return (
      <div className='container-fluid' style = {{ padding: '0px' }}>
        <Header></Header>
        <HomePage></HomePage>
        <Confirm></Confirm>
        <Manage></Manage>
        <Log></Log>
      </div>
  )
}

export default App;
