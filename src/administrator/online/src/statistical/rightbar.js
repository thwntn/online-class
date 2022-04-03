import { useState } from 'react';
import AddAdmin from './addadmin.js';
import style from './rightbar.module.css'


function RightBar() {
    const [addAd, setAddAd] = useState(false)

    return ( 
        <div className = {style.RightBar + ' col-md-4'}>
            <ul className = {style.listBar + ' row'}>
                <li className = 'col-md-3'>
                    <div className={style.user}>
                        <h5>834</h5>
                        <p>Tài khoản</p>
                    </div>
                </li>
                <li className = 'col-md-3'>
                    <div className={style.class}>
                        <h5>834</h5>
                        <p>Tài khoản</p>
                    </div>
                </li>
                <li className = 'col-md-3'>
                    <div className={style.document}>
                        <h5>834</h5>
                        <p>Tài khoản</p>
                    </div>
                </li>
                <li className = ' col-md-3'>
                    <div className={style.mess}>
                        <h5>834</h5>
                        <p>Tài khoản</p>
                    </div>
                </li>
            </ul>
            <div className={style.addAdmin + ' row'}><button
                className='col-md-5'
                onClick={() => setAddAd(!addAd)}
            >Thêm tài khoản quản trị</button></div>
            <div className = {style.administrators + ' row'}>
                <div className={style.item_ad + ' row'}>
                    <div className={style.img_ad + ' col-md-1'}>Hinh</div>
                    <div className={style.name_ad + ' col-md-4'}>Nguyễn Trần Thiên Tân</div>
                    <div className={style.status_ad + ' col-md-3'}><button></button></div>
                    <div className={style.change_ad + ' col-md-2'}><i className="fas fa-exchange"></i></div>
                    <div className={style.del_ad + ' col-md-1'}>Xóa</div>
                </div>
                <div className={style.item_ad + ' row'}>
                    <div className={style.img_ad + ' col-md-1'}>Hinh</div>
                    <div className={style.name_ad + ' col-md-4'}>Nguyễn Trần Thiên Tân</div>
                    <div className={style.status_ad + ' col-md-3'}><button></button></div>
                    <div className={style.change_ad + ' col-md-2'}><i className="fas fa-exchange"></i></div>
                    <div className={style.del_ad + ' col-md-1'}>Xóa</div>
                </div>
            </div>
            {addAd && <AddAdmin setAddAd = {setAddAd}></AddAdmin>}
        </div>
     );
}

export default RightBar;