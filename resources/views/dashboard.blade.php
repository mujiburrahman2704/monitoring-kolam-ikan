<x-app-layout>
    <div class="py-10 flex justify-center">
        <div class="shadow-lg rounded-lg w-1/2 flex flex-col justify-center bg-white">
            <h1 class="uppercase text-center text-3xl font-serif font-bold py-2">Monitoring Aquarium</h1>
            <div class="flex flex-row w-full">
                @foreach ($data['data'] as $i)
                    <div class="text-center text-2xl font-mono w-full border-r-2 border-black">
                        <p class="">Sisa Pakan</p>
                        <h2>{{ $i['pakan'] }}</h2>
                    </div>
                    <div class="text-center text-2xl font-serif w-full border-l-2 border-black">
                        <p>Nilai Kekeruhan</p>
                        <h2>{{ $i['kekeruhan'] }}</h2>
                    </div>
                @endforeach
            </div>
            <div class="text-center text-xl font-serif w-full border-t-4 border-black pt-2">
                <div class="rounded-lg overflow-hidden">
                    <div class="px-5 text-xl">Grafik Kekeruhan</div>
                    <canvas class="" id="chartLine"></canvas>
                </div>
                <!-- Required chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <!-- Chart line -->
                <script>
                    const labels = ["January", "February", "March", "April", "May", "June"];
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: "My First dataset",
                            backgroundColor: "hsl(252, 82.9%, 67.8%)",
                            borderColor: "hsl(252, 82.9%, 67.8%)",
                            data: [0, 10, 5, 2, 20, 30, 45],
                        }, ],
                    };

                    const configLineChart = {
                        type: "line",
                        data,
                        options: {},
                    };

                    var chartLine = new Chart(
                        document.getElementById("chartLine"),
                        configLineChart
                    );
                </script>
            </div>
            <h2 class="text-center font-bold uppercase text-2xl py-2">Jadwal Pemberian Pakan</h2>
            <div class="flex flex-row justify-center text-center space-x-4 py-2">
                @foreach ($data['data'] as $i)
                    <div>
                        <h2>Pagi</h2>
                        <input type="time" class="w-40 rounded-lg" value="{{ $i['pagi'] }}">
                    </div>
                    <div>
                        <h2>Siang</h2>
                        <input type="time" class="w-40 rounded-lg" value="{{ $i['siang'] }}">
                    </div>
                    <div>
                        <h2>Malam</h2>
                        <input type="time" class="w-40 rounded-lg" value="{{ $i['malam'] }}">
                    </div>
                @endforeach
            </div>
        </div>
        <p class="message" id="message"> </p>
    </div>
    <script>
        const clientId = 'mqttjs_' + Math.random().toString(16).substr(2, 8)

        const host = 'ws://broker.emqx.io:8083/mqtt'

        const options = {
            keepalive: 30,
            clientId: clientId,
            protocolId: 'MQTT',
            protocolVersion: 4,
            clean: true,
            reconnectPeriod: 1000,
            connectTimeout: 30 * 1000,
            will: {
                topic: 'WillMsg',
                payload: 'Connection Closed abnormally..!',
                qos: 0,
                retain: false
            },
            rejectUnauthorized: false
        }

        console.log('connecting mqtt client')
        const client = mqtt.connect(host, options)

        client.on('error', (err) => {
            console.log('Connection error: ', err)
            client.end()
        })

        client.on('reconnect', () => {
            console.log('Reconnecting...')
        })

        client.on('connect', () => {
            console.log('Client connected:' + clientId)
            client.subscribe('/mqtt/data', {
                qos: 0
            })
            client.publish('testtopic', 'ws connection demo...!', {
                qos: 0,
                retain: false
            })
        })

        client.on('message', (topic, message, packet) => {
            console.log('Received Message: ' + message.toString() + '\nOn topic: ' + topic)
            const list = document.getElementById('message');
            list.removeChild(list.firstChild);
            document.getElementById('message')
                .appendChild(document.createElement('li'))
                .appendChild(document.createTextNode(message.toString()));
        })

        client.on('close', () => {
            console.log(clientId + ' disconnected')
        })
    </script>
</x-app-layout>
