import React, { Component } from "react";
import "./style.scss";
var Statistics = require("./Statistics.js");

const StatisticPanel = props => {
  const { integers } = props;
  const array = integers.split(" ");
  var arr = array.map(function(x) {
    return parseInt(x, 10);
  });
  let sum = Statistics.findSum(arr);
  let mean = Statistics.findMean(arr);
  let variance = Statistics.findVariance(arr);
  let standardDev = Statistics.findStandardDeviation(arr);
  array.map(function(element) {
    console.log(element);
  });
  return (
    <div>
        <div className="original">
            {integers}
                </div>
      {sum}<br />
      {mean}<br />
      {variance}<br />
      {standardDev}
    </div>
  );
};
export default StatisticPanel;
