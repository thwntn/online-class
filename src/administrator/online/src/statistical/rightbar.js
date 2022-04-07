import { useReducer, useState } from 'react';
import AddAdmin from './addadmin.js';
import style from './rightbar.module.css'
import { useEffect } from 'react'
import AskDelete from './deleteUser.js';
import Count from './count.js';


function RightBar() {
    const [refesh, setRefesh] = useState(0)
    const [addAd, setAddAd] = useState(false)
    const [fetchAdmin, setFetchAdmin] = useState([])
    const [userDelete, setUserDelete] = useState()
    const [fullName, setFullName] = useState()

    useEffect(() => {
        const url = 'http://localhost/online-class/src/administrator/api/fetchAdmin.php'
        fetch(url)
        .then(response => response.json())
        .then(responseJson => {
            setFetchAdmin(responseJson)
        })
    }, [refesh])
    return ( 
        <div className = {style.RightBar + ' col-md-4'}>
            <Count></Count>
            <div className={style.addAdmin + ' row'}><button
                className='col-md-5'
                onClick={() => setAddAd(!addAd)}
            >Thêm tài khoản quản trị</button></div>
            <div className = {style.administrators + ' row'}>
                {fetchAdmin.map(user => {
                    return (
                        <div className={style.item_ad + ' row'}>
                            <div className={style.img_ad + ' col-md-1'}>{user.user_image}</div>
                            <div className={style.name_ad + ' col-md-5'}>{user.user_fullname}</div>
                            <div className={style.status_ad + ' col-md-2'}><button></button></div>
                            <div className={style.change_ad + ' col-md-2'}><i className="fas fa-exchange"></i></div>
                            <div
                                className={style.del_ad + ' col-md-1'}
                                onClick = {() => {
                                    setUserDelete(user.user_name)
                                    setFullName(user.user_fullname)
                                }}
                            >Xóa</div>
                        </div>
                    )
                })}

            </div>
            {(userDelete != undefined) && <AskDelete setRefesh = {setRefesh} fullName={fullName} setUserDelete = {setUserDelete} user = {userDelete}></AskDelete>}
            {addAd && <AddAdmin setRefesh={setRefesh} setAddAd = {setAddAd}></AddAdmin>}
        </div>
     );
}

export default RightBar;