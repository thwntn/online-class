import style from './statistical.module.css'
import RightBar from './rightbar.js'
import Static from './static.js';
import Log from '../log/log';

function Statistical() {
    return ( 
        <div className = {style.frame}>
            <Static></Static>
            <RightBar></RightBar>
        </div>
     );
}

export default Statistical;