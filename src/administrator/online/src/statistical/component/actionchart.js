import { Bar, Line, PolarArea, Doughnut } from 'react-chartjs-2'
import { Chart } from 'chart.js/auto'
import { useEffect, useState } from 'react';

const chart = require('chart.js')

function ActionChart() {
    const [actionData, setActionData] = useState({
        labels: [],
        datasets: [
            {
                data: [5, 2, 7, 3],
            }
        ],
    })

    const fetchData = () => {
        const url = 'http://localhost/online-class/src/administrator/api/statistical.php' 
        fetch(url)
        .then(response => response.json())
        .then(responseJson => {
            setActionData({
                labels: responseJson.interactive.map(item => item.time.slice(-5)),
                datasets: [
                    {
                        label: 'Tương tác',
                        data: responseJson.interactive.map(item => item.amount),
                        backgroundColor: [
                            "rgba(255, 100, 0 ,0.12)",
                            "rgba(255, 100, 0, 0.5)",
                            "rgba(255, 0, 255, 0.5",
                            "rgba(0, 255, 0, 0.5)",
                        ],
                        borderColor: [
                            "rgba(255, 100, 0, 0.35)",
                            "rgba(255, 100, 0, 0.8)",
                            "rgba(255, 0, 255, 0.8)",
                            "rgba(0, 255, 0, 0.8)",
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
        }, 5000);
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
        <PolarArea data = {actionData} options = {options}></PolarArea>
     );
}

export default ActionChart;