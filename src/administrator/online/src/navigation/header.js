const items = ['Trang chủ', 'Tài khoản', 'Thông báo', 'Tin nhắn', 'Nhật kí']

function Header () {
    return(
        <div style = {{backdropFilter: 'blur(4px)', height : '56px', position: 'fixed', top: 0, left: 0, right: 0, display: 'flex', justifyContent: 'space-between', backgroundColor: 'rgba(255, 255, 255, 0.1)', boxShadow: '0px 0px 4px rgba(0, 0, 0, 0.2', color: 'white', textShadow: '1px 1px rgba(0, 0, 0, 0.4'}}>
            <h2 style = {{display: 'flex', alignItems: 'center'}}>Online Class</h2>
            <ul style = {{display: 'flex', listStyle: 'none'}}>
                {items.map((items) => <li key = {items} style = {{padding: '0px 32px', display: 'flex', alignItems: 'center'}}>{items}</li>)}
            </ul>
        </div>
    )
}

export default Header