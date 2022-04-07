import { Line } from 'react-chartjs-2'
import { Chart } from 'chart.js/auto'
import { useState, useEffect } from 'react';
import Loading from '../../loading/loading';
import React from "react";

const chart = require('chart.js')

function LoginChart() {
    chart.defaults.font.size = 14;
    chart.defaults.font.family = 'Nunito'
    
    const objectStart = {
        labels: [],
        datasets: [
            {
                data: [],
            }
        ],
    }
    const [loginData, setLoginData] = useState(objectStart)
   
    const fetchData = () => {
        const url = 'http://localhost/online-class/src/administrator/api/statistical.php' 
        fetch(url)
        .then(response => response.json())
        .then(responseJson => {
            setLoginData({
                    labels: responseJson.login.map(item => {
                        return item.time.slice(-5)
                    }),
                    datasets: [
                        {
                            label: 'Đăng nhập',
                            data: responseJson.login.map(item => {
                                return item.amount
                            }),
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
        })
    }

    useEffect(() => fetchData(), [])

    useEffect(() => {
        const id = setInterval(() => {
            fetchData()
        }, 5000);
        return () => {
            clearInterval(id)
        }
    }, [loginData])

    return (
        <React.Fragment>
            {loginData == objectStart ? <Loading></Loading> : <Line data = {loginData}></Line>}
        </React.Fragment>
     );
}

export default LoginChart;