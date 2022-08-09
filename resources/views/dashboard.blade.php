<x-app-layout>
    <div class="py-10 flex justify-center">
        <div class="shadow-lg rounded-lg w-1/2 flex flex-col justify-center bg-white">
            <h1 class="uppercase text-center text-3xl font-serif font-bold py-2">Monitoring Aquarium</h1>
            <div class="flex flex-row w-full">
                <div class="text-center text-2xl font-mono w-full border-r-2 border-black">
                    <p class="">Sisa Pakan</p>
                    <h2>70%</h2>
                </div>
                <div class="text-center text-2xl font-serif w-full border-l-2 border-black">
                    <p>Nilai Kekeruhan</p>
                    <h2>70%</h2>
                </div>
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
                <div>
                    <h2>Pagi</h2>
                    <input type="text" class="w-40 rounded-lg" placeholder="08.00 WIB">
                </div>
                <div>
                    <h2>Siang</h2>
                    <input type="text" class="w-40 rounded-lg" placeholder="12.00 WIB">
                </div>
                <div>
                    <h2>Malam</h2>
                    <input type="text" class="w-40 rounded-lg" placeholder="19.00 WIB">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
