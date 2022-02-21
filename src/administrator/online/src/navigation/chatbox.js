import style from './chatbox.module.css'

const ChatBox = ({func}) => {
    return (
        <div className = {style.frame}>
            <div className = {style.navigation}>
                <button
                    className = {style.back}
                    onClick={(event) => {
                        event.stopPropagation()
                        func()
                    }}
                >
                    <i className="fas fa-angle-left"></i>
                </button>
                <div className = {style.image}></div>
                <h5 className ={style.name}>Nguyễn Trần Thiên Tân</h5>
            </div>
            <div className = {style.content}>
                <div className = {style.mess}>
                    <p className = {style.send}>Làm người yêu mình nhé {`<3`}</p>
                </div>
                <div className = {style.mess}>
                    <p className = {style.receive}>Tớ chỉ xem cậu là bạn thôi :)</p>
                </div>
                <div className = {style.mess}>
                    <p className = {style.send}>Làm người yêu mình nhé {`<3`}</p>
                </div>
                <div className = {style.mess}>
                    <p className = {style.receive}>Tớ chỉ xem cậu là bạn thôi :)</p>
                </div><div className = {style.mess}>
                    <p className = {style.send}>Làm người yêu mình nhé {`<3`}</p>
                </div>
                <div className = {style.mess}>
                    <p className = {style.receive}>Tớ chỉ xem cậu là bạn thôi :)</p>
                </div><div className = {style.mess}>
                    <p className = {style.send}>Làm người yêu mình nhé {`<3`}</p>
                </div>
                <div className = {style.mess}>
                    <p className = {style.receive}>Tớ chỉ xem cậu là bạn thôi :)</p>
                </div>
            </div>
            <div className = {style.navigationSend}>
                <input className = {style.inputChat} placeholder = "Nhập tin nhắn"></input>
                <button className = {style.buttonSend}><i className ="fad fa-paper-plane"></i></button>
            </div>
        </div>
    )
}
export default ChatBox