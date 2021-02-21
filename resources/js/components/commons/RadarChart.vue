<script>
import { Radar, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins

export default {
    extends: Radar,
    mixins: [reactiveProp],
    props: ['chartData'],
    data() {
        return {
            options: {
                legend: {
                    display: false
                },
                scale: {
                    pointLabels: {       // 軸のラベル（"国語"など）
                        fontSize: 13,         // 文字の大きさ
                        fontColor: "gray"     // 文字の色
                    },
                    ticks: {             // 目盛り
                        min: 0,              // 最小値
                        max: 5,              // 最大値
                        stepSize: 1,         // 目盛の間隔
                        fontSize: 12,        // 目盛り数字の大きさ
                        fontColor: "grey"    // 目盛り数字の色
                    },
                },
                tooltips: {
                    displayColors: false,
                    intersect: false,
                    callbacks: {
                        title: function (tooltipItem, data) {
                            return ""
                        },
                        label: function(tooltipItem, data) {
                            // ツールチップに「かわいい 4.3」と表示
                            const point = tooltipItem.label || ''
                            const label = data.labels[tooltipItem.index] || ''
                            return label + ' ' + point
                        }
                    }
                },
            },
        }
    },
    mounted () {
        this.renderChart(this.chartData, this.options)
    }
}
</script>

<style>
</style>