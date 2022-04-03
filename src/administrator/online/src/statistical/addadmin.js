import style from './addadmin.module.css'

function AddAdmin({ setAddAd }) {
    console.log(setAddAd);
    return ( 
        <div className={style.frame}>
            <div className={style.boxAdd}>
                <h5>Quản trị viên</h5>
                <input className={style.userName} placeholder = "Tên đăng nhập"></input>
                <input className={style.Pass} placeholder = "Mật khẩu"></input>
                <input className={style.fullName} placeholder = "Tên đầy đủ"></input>
                <div className={style.nav}>
                    <button
                        className={style.close}
                        onClick={() => setAddAd(false)}
                    >Đóng</button>
                    <button
                        className={style.fns}
                        onClick={() => setAddAd(false)}
                    >Hoàn tất</button>
                </div>
            </div>
        </div>
     );
}

export default AddAdmin;