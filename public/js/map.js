function initMap() {
    var gurtozhytok = { lat: 50.449858, lng: 30.45315 };
    var korpus = { lat: 50.449096, lng: 30.46568 };
    var plaza = { lat: 50.451374, lng: 30.467837 };
    var sumylushpy = { lat: 50.908361, lng: 34.822766 };
    var sumygymnasium = { lat: 50.912424435044464, lng: 34.81142829537973 };
    const mapOptions = {
      zoom: 15,
      center: { lat: 50.448931, lng: 30.460385 },
    };
    const map = new google.maps.Map(
      document.getElementById("map"),
      mapOptions
    );
    var markergurtozhytok = new google.maps.Marker({
      position: gurtozhytok,
      map: map,
    });
    var markerkorpus = new google.maps.Marker({
      position: korpus,
      map: map,
    });
    var markerplaza = new google.maps.Marker({
      position: plaza,
      map: map,
    });
    var markerlushpy = new google.maps.Marker({
      position: sumylushpy,
      map: map,
    });
    var markergymnasium = new google.maps.Marker({
      position: sumygymnasium,
      map: map,
    });
  }