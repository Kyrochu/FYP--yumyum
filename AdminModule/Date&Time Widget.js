function updateClock() {
    const currentDate = new Date();

    // Update date elements
    document.getElementById('day').textContent = currentDate.toLocaleString('en-US', { weekday: 'long' });
    document.getElementById('month').textContent = currentDate.toLocaleString('en-US', { month: 'long' });
    document.getElementById('daynum').textContent = currentDate.getDate();
    document.getElementById('year').textContent = currentDate.getFullYear();

    // Update time elements
    const hours = currentDate.getHours();
    const minutes = currentDate.getMinutes();
    const seconds = currentDate.getSeconds();
    const period = hours >= 12 ? 'PM' : 'AM';
    const formattedHours = hours % 12 || 12; // Convert to 12-hour format

    document.getElementById('hour').textContent = formattedHours.toString().padStart(2, '0');
    document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
    document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
    document.getElementById('period').textContent = period;
}

// Update the clock immediately and then every second
updateClock();
setInterval(updateClock, 1000);