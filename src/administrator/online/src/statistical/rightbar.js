import style from './rightbar.module.css'


function RightBar() {
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
        </div>
     );
}

export default RightBar;