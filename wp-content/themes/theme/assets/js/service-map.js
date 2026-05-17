(function () {
  const config = window.themeServiceMap;
  const mapNode = document.getElementById('service-yandex-map');

  if (!config || !mapNode || typeof ymaps === 'undefined') {
    return;
  }

  ymaps.ready(function () {
    const map = new ymaps.Map(
      mapNode,
      {
        center: config.center,
        zoom: config.zoom,
        controls: ['zoomControl', 'fullscreenControl'],
      },
      {
        suppressMapOpenBlock: true,
      }
    );

    const placemarks = (config.points || []).map(function (point) {
      const placemark = new ymaps.Placemark(
        [point.lat, point.lng],
        {
          balloonContentHeader: point.title || '',
          balloonContentBody: point.district && config.districts[point.district] ? config.districts[point.district] : '',
        },
        {
          preset: 'islands#redDotIcon',
        }
      );

      placemark.properties.set('district', point.district || '');
      return placemark;
    });

    const collection = new ymaps.GeoObjectCollection({}, {});
    placemarks.forEach(function (placemark) {
      collection.add(placemark);
    });

    map.geoObjects.add(collection);

    const filtersRoot = document.querySelector('[data-service-map-filters]');
    const filterButtons = filtersRoot
      ? Array.prototype.slice.call(filtersRoot.querySelectorAll('[data-service-map-district]'))
      : [];

    let visiblePlacemarks = placemarks.slice();

    function fitVisibleBounds() {
      if (!visiblePlacemarks.length) {
        return;
      }

      if (visiblePlacemarks.length === 1) {
        map.setCenter(visiblePlacemarks[0].geometry.getCoordinates(), 14, { duration: 200 });
        return;
      }

      const bounds = ymaps.util.bounds.getBounds(
        visiblePlacemarks.map(function (item) {
          return item.geometry.getCoordinates();
        })
      );

      map.setBounds(bounds, { checkZoomRange: true, zoomMargin: 48, duration: 200 });
    }

    function applyDistrictFilter(district) {
      collection.removeAll();
      visiblePlacemarks = placemarks.filter(function (placemark) {
        const pointDistrict = placemark.properties.get('district') || '';

        return district === 'all' || !district || district === pointDistrict;
      });

      visiblePlacemarks.forEach(function (placemark) {
        collection.add(placemark);
      });

      fitVisibleBounds();
    }

    filterButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        const district = button.getAttribute('data-service-map-district') || 'all';

        filterButtons.forEach(function (item) {
          item.classList.toggle('is-active', item === button);
        });

        applyDistrictFilter(district);
      });
    });

    if (!filterButtons.length) {
      fitVisibleBounds();
    }
  });
})();
