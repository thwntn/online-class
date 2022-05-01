import { useEffect, useState } from 'react';
import styles from './Pinned.module.css'

function Pinned() {

    const [listPin, setListPin] = useState(JSON.stringify([]))

    useEffect(() => {
        setListPin(JSON.parse(localStorage.getItem('listFunc')))
    }, [])
    
    console.log(listPin);

    return ( 
        null
     );
}

export default Pinned;