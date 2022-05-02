import { createContext, useContext, useEffect, useState } from "react";

import HomePage from "../component/homepage/homepage.js";
import Statistical from "../component/statistical/statistical.js";
import Log from "../component/log/log.js";
import Confirm from "../component/confirm/confirm.js";

const PageContext = createContext()

function find(arr, string) {
    let result = arr.find(item => item == string)
    let final
    result == undefined ? final = false : final = (result == string)
    return final
}


function pinItem (key) {
    let listFunc = JSON.parse(localStorage.getItem('listFunc'))
    if(!find(listFunc, key)) {
        listFunc.push(key)
        alert('Create shortcut')
        localStorage.setItem('listFunc', JSON.stringify(listFunc))
    } else {
        alert('Shortcut exits')
    }
}

function PageProvider({ children }) {
    const [main, setMain] = useState(<HomePage></HomePage>)

    return ( 
        <PageContext.Provider value = {{ HomePage, Confirm, Statistical, Log, setMain, pinItem }}>
            { children } {main}
        </PageContext.Provider>
     );
}

export { PageContext, PageProvider };