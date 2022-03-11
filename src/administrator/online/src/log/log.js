import style from './log.module.css'

const Log = (property) => {
    console.log(property)
    return (
        <div id = 'log' className = {style.frame + ' row pad'}>
            <h2 className = {style.title + ' row-md-10'}>Nhật kí</h2>
            <div className = {style.titleMobile}>
                <h5>Nhật kí</h5>
            </div>
            <div className = {style.frameLog}>
                <div className = {style.frameClose}>
                    <button onTouchMove={() => property.data(false)}></button>
                </div>
                <div className = {style.boxLog}>
                    <ul className ={style.labelNav}>
                        <li className = {style.titleNav}><h5>Nội dung</h5></li>
                    </ul>
                    <div className = {style.content}>
                        <ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul>
                        <ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul>
                        <ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul>
                        <ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul><ul className = {style.items}>
                            <li className={style.item}>Đăng kí tài khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Log