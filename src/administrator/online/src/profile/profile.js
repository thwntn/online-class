import style from './profile.module.css'

function Profile() {
    return ( 
        <div className={style.frame + ' row'}>
            <div className={style.background}></div>
            <div className={style.leftBar + ' col-md-3'}>
                <div className = 'row'>
                    <div className={style.imageUser + ' col-md-12'}>
                        <button className = {style.changeUser}><i class="fal fa-camera-alt"></i></button>
                    </div>
                </div>
                <div className={style.infoAdd + ' row'}>
                    <h4>Thiên Tân</h4>
                    <i>Mạng máy tính và truyền thông dữ liệu</i>
                    <button>Kết bạn</button>
                </div>
                <div className={style.count + ' row'}>
                    <p className={style.homeWork}>
                        <h3>23</h3>
                        <l>Bài tập</l>
                    </p>
                    <p className={style.class}>
                        <h3>23</h3>
                        <l>Lớp học</l>
                    </p>
                </div>
            </div>
            <div className={style.rightBar + ' col-md-9'}>
                <div className={style.banner + ' row'}>
                    <div className={style.bannerImg}></div>
                </div>
                <div className={style.content + ' row'}>
                    <div className={style.ofUser + ' col-md-9'}>
                        <h5>Bạn bè</h5>
                        <div className={style.friend + ' row'}>
                            <div className={style.friendItem}>
                                <div className={style.imageFriend}></div>
                            </div>
                            <div class  Name={style.friendItem}>
                                <div className={style.imageFriend}></div>
                            </div>
                            <div className={style.friendItem}>
                                <div className={style.imageFriend}></div>
                            </div>
                        </div>
                        <h5>Môn học</h5>
                        <div className={style.subject + ' row'}>
                            <div className={style.subjectItem}>
                                <div className={style.icon}>
                                    <i className="fad fa-book-reader" style={{color: `rgb(${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)})`}}></i>
                                </div>
                                <div className={style.imageSubject}></div>
                                <div className={style.infoSuject}>
                                    <p>
                                        <h5>Lập trình căn bản</h5>
                                        <l>Trúc phương</l>
                                        <button>Truy cập</button>
                                    </p>
                                </div>
                            </div>
                            <div className={style.subjectItem}>
                                <div className={style.icon}>
                                    <i className="fad fa-book-reader" style={{color: `rgb(${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)})`}}></i>
                                </div>
                                <div className={style.imageSubject}></div>
                                <div className={style.infoSuject}>
                                    <p>
                                        <h5>Mạng máy tính</h5>
                                        <l>Ngô Bá Hùng</l>
                                        <button>Truy cập</button>
                                    </p>
                                </div>
                            </div>
                            <div className={style.subjectItem}>
                                <div className={style.icon}>
                                    <i className="fad fa-book-reader" style={{color: `rgb(${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)})`}}></i>
                                </div>
                                <div className={style.imageSubject}></div>
                                <div className={style.infoSuject}>
                                    <p>
                                        <h5>Kỹ thuật phát hiện tấn công mạng</h5>
                                        <l>Đỗ Thanh Nghị</l>
                                        <button>Truy cập</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className={style.discription + ' col-md-3'}>
                        <h5>Description</h5>
                        <p>
                        Experts predict that annual eCommerce sales will exceed $6 trillion dollars by 2023. 

                        Retail conglomerates and small businesses alike turn to online stores to sell products to a wider audience and increase their revenue. 

                        However, as more eCommerce websites pop up each day, staying competitive can be challenging. 

                        When it comes to your online store, you don’t have the luxury of an in-person sales team to close the deal. Conversions come down to the effectiveness of your product page and product descriptions. 
                        </p>
                    </div>
                </div>
            </div>

        </div>
     );
}

export default Profile;