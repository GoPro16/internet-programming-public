import React from "react";
import "./style.scss";
import * as bs from "react-bootstrap";
var Statistics = require("./Statistics.js");

const StatisticPanel = props => {
  const intLists = props.integers;
  /*
  console.log(intList);
  var output;
  intList.map(integers => {
    const array = integers.split(" ");
    var arr = array.map(function(x) {
      return parseInt(x, 10);
    });
    let sum = Statistics.findSum(arr).toFixed(2);
    let mean = Statistics.findMean(arr).toFixed(2);
    let median = Statistics.findMedian(arr).toFixed(2);
    let mode = Statistics.findMode(arr).toFixed(2);
    let variance = Statistics.findVariance(arr).toFixed(2);
    let standardDev = Statistics.findStandardDeviation(arr).toFixed(2);

    output += (
      <div>
        <tr>
          <td>{sum}</td>
          <td>{mean}</td>
          <td>{median}</td>
          <td>{mode}</td>
          <td>{variance}</td>
          <td>{standardDev}</td>
        </tr>
      </div>
    );
  });*/
  return (
    <div>
      <bs.Panel className="output-stats" header="Output">
        <div className="row">
          <div className="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <bs.Table striped bordered condensed hover>
              <thead>
                <tr>
                  <th>Sum</th>
                  <th>Mean</th>
                  <th>Median</th>
                  <th>Mode</th>
                  <th>Variance</th>
                  <th>Standard Deviation</th>
                </tr>
              </thead>
              <tbody>
                {loadCards(intLists)}
              </tbody>
            </bs.Table>
          </div>
        </div>
      </bs.Panel>
    </div>
  );
};

function loadCards(intList) {
  return intList.map(integers => {
    const array = integers.split(" ");
    var arr = array.map(function(x) {
      return parseInt(x, 10);
    });
    let sum = Statistics.findSum(arr).toFixed(2);
    let mean = Statistics.findMean(arr).toFixed(2);
    let median = Statistics.findMedian(arr).toFixed(2);
    let mode = Statistics.findMode(arr).toFixed(2);
    let variance = Statistics.findVariance(arr).toFixed(2);
    let standardDev = Statistics.findStandardDeviation(arr).toFixed(2);
    return(
        <tr key={Math.random()}>
          <td>{sum}</td>
          <td>{mean}</td>
          <td>{median}</td>
          <td>{mode}</td>
          <td>{variance}</td>
          <td>{standardDev}</td>
        </tr>
    );
  });
} //load Cards

export default StatisticPanel;
