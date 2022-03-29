import style from './static.module.css'
import { useState } from 'react'
import { Bar, Line } from 'react-chartjs-2'
import { Chart } from 'chart.js/auto'

import LoginChart from './component/loginchart'
import SignUpChart from './component/signupchart'
import ActionChart from './component/actionchart'

const chart = require('chart.js')

function Static() {
    return ( 
        <div className = {style.frame + ' ' + 'col-md-8'}>
            <h2 className = {style.title + ' row'}>Xin chào! Chúc buổi sáng tốt lành</h2>
            <div className = {style.graph + ' row'}>
                <div className = {style.graphLogin + ' col-md-8'}><LoginChart></LoginChart></div>
                <div className = {style.framePerson + ' col-md-4'}>
                    <div className = {style.graphSignUp + ' row'}>
                        <div className = {style.countSignup + ' col-md-12'}><SignUpChart></SignUpChart></div>
                        <h5 className = 'col-md-12'>Đăng kí</h5>
                    </div>
                    <div className = {style.graphInteractive + ' row'}>
                        <div className = {style.countInteractive + ' col-md-6'}><ActionChart></ActionChart></div>
                        <h5 className = 'col-md-6'>Tương tác</h5>
                    </div>
                </div>
            </div>
            <div className = {style.mainSession + ' row'}>
                <h4 className = {style.statusTitle}>Trạng thái</h4>
                <div className = {style.itemLogin + ' row'}>
                    <div className = {style.img + ' col-md-1'}>
                        <div></div>
                    </div>
                    <div className = {style.name + ' col-md-6'}><p>Đăng nhập</p></div>
                    <div className = {style.status_frame + ' col-md-3'}>
                        <div className = {style.status}>
                            <div></div>
                            Kích hoạt
                        </div>
                    </div>
                    <div className = {style.button + ' col-md-2'}><button>Thay đổi</button></div>
                </div>
                <div className = {style.itemSignUp + ' row'}>
                    <div className = {style.img + ' col-md-1'}>
                        <div></div>
                    </div>
                    <div className = {style.name + ' col-md-6'}><p>Đăng kí</p></div>
                    <div className = {style.status_frame + ' col-md-3'}>
                        <div className = {style.status}>
                            <div></div>
                            Kích hoạt
                        </div>
                    </div>
                    <div className = {style.button + ' col-md-2'}><button>Thay đổi</button></div>
                </div>
                <div className = {style.itemDocument + ' row'}>
                    <div className = {style.img + ' col-md-1'}>
                        <div></div>
                    </div>
                    <div className = {style.name + ' col-md-6'}><p>Tài liệu</p></div>
                    <div className = {style.status_frame + ' col-md-3'}>
                        <div className = {style.status}>
                            <div></div>
                            Kích hoạt
                        </div>
                    </div>
                    <div className = {style.button + ' col-md-2'}><button>Thay đổi</button></div>
                </div>
            </div>
        </div>
     );
}

export default Static;