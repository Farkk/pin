(function () {
  if (typeof Fancybox === "undefined") {
    return;
  }

  Fancybox.bind("[data-fancybox]", {
    groupAll: false,
    Images: {
      zoom: true,
    },
    Thumbs: false,
    Toolbar: {
      display: {
        left: [],
        middle: [],
        right: ["close"],
      },
    },
  });
})();
