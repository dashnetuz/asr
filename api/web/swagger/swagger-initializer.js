window.onload = function() {
  window.ui = SwaggerUIBundle({
    url: "http://127.0.0.1:8183/v1/swagger/json",
    dom_id: '#swagger-ui',
    deepLinking: true,
    presets: [
      SwaggerUIBundle.presets.apis,
      SwaggerUIStandalonePreset
    ],
    layout: "StandaloneLayout"
  });
};