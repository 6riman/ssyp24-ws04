function setSunrise() {
  const sunriseDiv = document.getElementById('sunrise');
  const sunsetDiv = document.getElementById('sunset');
  const novosibirskPosition = {
    coords: { latitude: 54.9844, longitude: 82.9075 }
  }

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
      showPosition(novosibirskPosition); 
    }
  }

  function showPosition(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const calendarInput = document.getElementById("calendar-input");
  
    fetch(`https://api.sunrise-sunset.org/json?lat=${latitude}&lng=${longitude}&date=${calendarInput.value}&formatted=0`)
      .then(response => response.json())
      .then(data => {
        const sunriseTime = new Date(data.results.sunrise).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const sunsetTime = new Date(data.results.sunset).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
  
        sunriseDiv.innerText = sunriseTime;
        sunsetDiv.innerText = sunsetTime;
      })
      .catch(error => {
        resultDiv.innerHTML = 'Unable to get data!';
        console.error(error);
      });
  }
  

  function showError(error) {
    console.error(error);
    showPosition(novosibirskPosition);
  }
  
  getLocation();
}

setSunrise();