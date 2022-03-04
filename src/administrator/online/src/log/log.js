import style from './log.module.css'

const Log = () => {
    return (
        <div id = 'log' className = {style.frame + ' row pad'}>
            <h2 className = {style.title + ' row-md-10'}>Nhật kí</h2>
            <div className = {style.boxLog}>
                <ul className ={style.labelNav}>
                    <li className = {style.titleNav}>STT</li>
                    <li className = {style.titleNav}>Nội dung</li>
                    <li className = {style.titleNav}>Thời gian</li>
                    <li className = {style.titleNav}>Tài khoản</li>
                    <li className = {style.titleNav}>Loại</li>
                </ul>
                <div className = {style.content}>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                    <ul className = {style.items}>
                        <li className={style.item}>1</li>
                        <li className={style.item}>Đăng kí tài khoản</li>
                        <li className={style.item}>9:00 am 4/2/2020</li>
                        <li className={style.item}>nttansv</li>
                        <li className={style.item}>Tài khoản chưa xác định</li>
                    </ul>
                </div>
            </div>
        </div>
    )
}

export default Log