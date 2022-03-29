import { Line } from 'react-chartjs-2'
import { Chart } from 'chart.js/auto'
import { useState } from 'react';

const chart = require('chart.js')

function LoginChart() {
    chart.defaults.font.size = 16;
    chart.defaults.font.family = 'Nunito'

    const [loginData, setLoginData] = useState({
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thurday', 'Friday', 'Saturday'],
        datasets: [
            {
                label: 'Thống kê đăng nhập',
                data: [5, 1, 7, 3, 9, 6, 6, 2, 4, 9],
                backgroundColor: [
                    "rgba(50, 200, 50, 0.12)",
                    "rgba(255, 100, 0, 0.5)",
                    "rgba(255, 0, 255, 0.5",
                    "rgba(50, 100, 255, 0.5)",
                    "rgba(255, 0, 0, 0.5)",
                    "rgba(0, 255, 0, 0.5)",
                    "rgba(0, 0, 100, 0.35)",
                    "rgba(120, 0, 255, 0.5)",
                ],
                borderColor: [
                    "rgba(50, 200, 50, 0.35)",
                    "rgba(255, 100, 0, 0.8)",
                    "rgba(255, 0, 255, 0.8)",
                    "rgba(50, 100, 255, 0.8)",
                    "rgba(255, 0, 0, 0.8)",
                    "rgba(0, 255, 0, 0.8)",
                    "rgba(0, 0, 100, 0.5)",
                    "rgba(120, 0, 255, 0.8)",
                ],
                borderWidth: 2,
                tension: 0.45,
                fill: true,
                pointBackgroundColor: 'rgba(0, 0, 200, 0)',
            }
        ],
    })
    return ( 
        <Line data = {loginData}></Line>
     );
}

export default LoginChart;