let endDate = new Date("Sep 25, 2025 12:10:00").getTime();
function updateCountdown(){
    let now = new Date().getTime();
    let distance = endDate - now;
    if(distance > 0){
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("days").innerText = days.toString().padStart(2, '0');
        document.getElementById("hours").innerText = hours.toString().padStart(2, '0');
        document.getElementById("minutes").innerText = minutes.toString().padStart(2, '0');
        document.getElementById("seconds").innerText = seconds.toString().padStart(2, '0');
    }else{
        document.getElementById("countdown").innerHTML = "<h2>¡Tiempo Finalizado!</h2>";
        clearInterval(interval);
    }

}

let interval = setInterval(updateCountdown, 1000);
updateCountdown();
