import { useContext, useEffect, useState } from 'react';
import styles from './Pinned.module.css'
import { PageContext } from '../../context/MainContext';
import Statistical from '../statistical/statistical';
import Confirm from '../confirm/confirm';
import Log from '../log/log';


function Pinned() {
    const page = useContext(PageContext)
    const [listPin, setListPin] = useState(JSON.parse(localStorage.getItem('listFunc')))
    
    console.log(listPin);

    return ( 
        <div className={styles.pinned}>
            {listPin.map((item, index) => {
                switch(item) {
                    case 'log': {
                        return (
                            <button 
                                style={{border: '2px solid rgba(255, 81, 0, 0.3)'}}
                                onClick={() => {
                                    page.setMain(<Log></Log>)
                                }}
                            >Nhật kí</button>
                        )
                    }
                    case 'account': {
                        return <button style={{border: '2px solid rgb(0, 255, 255, 0.3)'}}>Người dùng</button>
                    }
                    case 'manage': {
                        return <button style={{border: '2px solid rgba(255, 0, 212, 0.3)'}}>Quản lí</button>
                    }
                }
            })}
        </div>
     );
}

export default Pinned;