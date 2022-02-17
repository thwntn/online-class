import style from './infouser.module.css'


const InfoUser = (property) => {
    console.log(property);
    return (
    <div className = {style.boxInfo}>
        <div className = {style.imgUser}></div>
        <div className = {style.nameUser}>Tên tài khoản</div>
        <input className = {style.inputInfo} value = 'nttansv@gmail.com'></input>
        <input className = {style.inputInfo} type = 'password' value = 'hfjkfdblgl'></input>
        <input className = {style.inputInfo} value = '216 Tầm Vu, Ninh Kiều, cần Thơ'></input>
        <input className = {style.inputInfo} value = 'Nam'></input>
        <input className = {style.inputInfo} value = 'Mạng máy tính và truyền thông dữ liệu'></input>
        <input className = {style.inputInfo} value = 'Tài khoản sinh viên'></input>
        <div className = {style.nav}>
            <button className = {style.close} onClick = {property.func.close}>Đóng</button>
            <button className = {style.finish} onClick = {property.func.close}>Cập nhật</button>
        </div>
    </div>
)}

export default InfoUser