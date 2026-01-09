import './bootstrap';


document.addEventListener('DOMContentLoaded', () => {

    const tempEl = document.getElementById('weather-temp')
    const humidityEl = document.getElementById('weather-humidity')
    const windEl = document.getElementById('weather-wind')
    const updatedEl = document.getElementById('weather-updated')

    async function fetchWeather() {
    try {
        const response = await fetch(
            'https://api.open-meteo.com/v1/forecast?latitude=-31.416667&longitude=-64.183333&current=temperature_2m,relative_humidity_2m,wind_speed_10m&timezone=auto'
        )

        if (!response.ok) {
            throw new Error('Weather API error')
        }

        const data = await response.json()

        const temp = data.current.temperature_2m
        const wind = data.current.wind_speed_10m
        const humidity =



        tempEl.textContent = Math.round(temp)
        windEl.textContent = Math.round(wind)
        humidityEl.textContent = humidity

        const now = new Date()
        const hours = now.getHours().toString().padStart(2, '0')
        const minutes = now.getMinutes().toString().padStart(2, '0')

        updatedEl.textContent = `${hours}:${minutes}`

    } catch (error) {
        console.error('Error fetching weather:', error)
    }
}

    // Primera carga apenas abre la página
    fetchWeather()

    // Refresco automático cada 1 minuto (60000 ms)
    setInterval(fetchWeather, 1000)

})