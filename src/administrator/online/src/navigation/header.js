import style from './header.module.css'
const items = ['Trang chủ', 'Tài khoản', 'Thông báo', 'Tin nhắn', 'Nhật kí']

function Header () {
    return(
        <div className = {style.background}>
            <h2 className = {style.title}>Online Class</h2>
            <ul style = {{display: 'flex', listStyle: 'none'}}>
                {items.map((items) => <li key = {items} className = {style.item}>{items}</li>)}
            </ul>
        </div>
    )
}

export default Header