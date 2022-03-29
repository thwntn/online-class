import { Bar, Line, PolarArea } from 'react-chartjs-2'
import { Chart } from 'chart.js/auto'
import { useState } from 'react';

const chart = require('chart.js')

function SignUpChart() {

    const [signupData, setSignUpData] = useState({
        labels: ['20/9', '21/9', '22/9', '23/9'],
        datasets: [
            {
                label: 'Thống kê đăng nhập',
                data: [5, 2, 7, 3, 9, 6, 6, 2, 4, 9],
                backgroundColor: [
                    "rgba(255, 100, 0 ,0.12)",
                    "rgba(255, 100, 0, 0.5)",
                    "rgba(255, 0, 0, 0.5",
                    "rgba(50, 100, 255, 0.5)",
                ],
                borderColor: [
                    "rgba(255, 100, 0, 0.35)",
                    "rgba(255, 100, 0, 0.8)",
                    "rgba(255, 0, 0, 0.8)",
                    "rgba(50, 100, 255, 0.8)",
                ],
                borderWidth: 2,
                tension: 0.5,
                fill: true,
                pointBackgroundColor: 'rgba(0, 0, 200, 0)',
            }
        ],
    })

    const options = {
        plugins: {
            legend: {
                display: false,
            },
        },
    }
    return ( 
        <Bar data = {signupData} options = {options}></Bar>
     );
}

export default SignUpChart;