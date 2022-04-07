import { Bar, Line, PolarArea } from 'react-chartjs-2'
import { Chart } from 'chart.js/auto'
import { useEffect, useState } from 'react';

const chart = require('chart.js')

function SignUpChart() {

    const [signupData, setSignUpData] = useState({
        labels: [],
        datasets: [
            {
                data: [],
            }
        ],
    })

    const fetchData = () => {
        const url = 'http://localhost/online-class/src/administrator/api/statictical.php' 
        fetch(url)
        .then(response => response.json())
        .then(responseJson => {
            setSignUpData({
                labels: responseJson.signUp.map(item => item.time.slice(-5)),
                datasets: [
                    {
                        label: 'Đăng kí',
                        data: responseJson.signUp.map(item => item.amount),
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
        })
    }

    useEffect(() => fetchData(), [])

    useEffect(() => {
        const id = setInterval(() => {
            fetchData()
        }, 6000);
        return () => {
            clearInterval(id)
        }
    }, [])

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

export default SignUpChart