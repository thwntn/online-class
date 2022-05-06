import { useContext, useEffect, useState } from 'react';
import clsx from 'clsx'

import styles from './Pinned.module.css'
import { PageContext } from '../../context/MainContext';
import Statistical from '../statistical/statistical';
import Confirm from '../confirm/confirm';
import Log from '../log/log';

import { FaUserAlt, FaMicrosoft, FaPenFancy } from 'react-icons/fa'


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
                                className={styles.log}
                                onClick={() => {
                                    page.setMain(<Log></Log>)
                                }}
                        ><FaPenFancy size={20}></FaPenFancy></button>
                        )
                    }
                    case 'account': {
                        return <button
                            className={styles.account}
                        >
                        <FaUserAlt size={20}></FaUserAlt>
                        </button>
                    }
                    case 'manage': {
                        return <button
                            className={styles.manage}
                        ><FaMicrosoft size={30}></FaMicrosoft></button>
                    }
                    case 'accountActive': {
                        return <button
                            className={styles.accountActive}
                        >Tài khoản</button>
                    }
                    case 'waitUser': {
                        return <button
                            className={styles.waitUser}
                        >Xác nhận</button>
                    }
                }
            })}
        </div>
     );
}

export default Pinned;