import style from './fastView.module.css'

function FastView({ object }) {
    console.log(object);
    return ( 
        <div className={style.frame}>
            <div className={style.box}>
            <h4>
                {object.fastView.user_fullname}
                <button
                    onClick={() => object.setFastView(null)}
                ><i class="fal fa-times"></i></button>
            </h4>
            <p>
                Email: {object.fastView.user_email}  <br></br>
                Địa chỉ: {object.fastView.user_address}  <br></br>
                Thời gian đăng kí: {object.fastView.authen_time}  <br></br>
                Ngành học: {object.fastView.user_major}  <br></br>
                Số điện thoại: {object.fastView.user_phone}  <br></br>
                Giới tính: {object.fastView.user_sex == 1 ? 'Nam' : 'Nữ'}  <br></br>
                Loại tài khoản: {object.fastView.user_type == 8 ? 'Giảng viên' : 'Sinh viên'}
            </p>
            </div>
        </div>
     );
}

export default FastView