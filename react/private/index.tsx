// Libs
import React from "react";
import ReactDom from "react-dom";
import App from "./App";
import "./index.scss";

ReactDom.render(<App />, document.getElementById("wordpress_theme_react"));

if (module.hot) {
  module.hot.accept();
}
