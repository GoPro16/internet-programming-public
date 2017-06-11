import React, { Component } from "react";
import "./style.scss";
import StatisticPanel from "../StatisticPanel";
import "bootstrap/dist/css/bootstrap.css";
import * as bs from "react-bootstrap";

class Home extends Component {
  constructor(props) {
    super(props);

    this.state = {
      output: false,
      currentIntegers: "",
      intList: [],
      results: false
    };
  }

  updatePage() {
    if (this.state.home) {
      this.setState({ home: false });
    } else {
      this.setState({ home: true });
    }
  }

  getPage() {
    if (this.state.home) {
      return <h1>Test</h1>;
    } else {
      return <StatisticPanel />;
    }
  }

  updateIntegers(event) {
    this.setState({ currentIntegers: event.target.value });
  }
  calculate(event) {
    event.preventDefault();
    var arr = this.state.intList;
    arr.push(this.state.currentIntegers);
    this.setState({
      intList: arr,
      output: true,
      currentIntegers: "",
      results: false
    });
  }

  getOutput() {
    if (this.state.output) {
      if (this.state.results) {
        return (
          <div>
            <bs.Panel className="output-stats" header="Unit Test Results">
              <div className="row">
                <div className="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <bs.Table striped bordered condensed hover>
                    <thead>
                      <tr>
                        <th>Inputs</th>
                        <th>Sum</th>
                        <th>Mean</th>
                        <th>Median</th>
                        <th>Mode</th>
                        <th>Variance</th>
                        <th>Standard Deviation</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Set 1</td>
                        <td>
                          1103.00 | <span className="excel">1103.00</span>
                        </td>
                        <td>22.06 | <span className="excel">22.06</span></td>
                        <td>21.00 | <span className="excel">21.00</span></td>
                        <td>21.00 | <span className="excel">21.00</span></td>
                        <td>229.28 | <span className="excel">224.63</span></td>
                        <td>15.14 | <span className="excel">14.99</span></td>
                      </tr>
                      <tr>
                        <td>Set 2</td>
                        <td>1263.00| <span className="excel">1263.00</span></td>
                        <td>25.26 | <span className="excel">25.26</span></td>
                        <td>28.00 | <span className="excel">28.00</span></td>
                        <td>28.00 | <span className="excel">28.00</span></td>
                        <td>199.50 | <span className="excel">195.58</span></td>
                        <td>14.12 | <span className="excel">13.98</span></td>
                      </tr>
                      <tr>
                        <td>Set 3</td>
                        <td>
                          1459.00 | <span className="excel">1459.00</span>
                        </td>
                        <td>29.18 | <span className="excel">29.18</span></td>
                        <td>30.00 | <span className="excel">30.00</span></td>
                        <td>30.00 | <span className="excel">30.00</span></td>
                        <td>183.35 | <span className="excel">179.62</span></td>
                        <td>13.54 | <span className="excel">13.40</span></td>
                      </tr>
                      <tr>
                        <td><span className="excel">Green</span> => Excel</td>
                        
                        </tr>
                    </tbody>
                  </bs.Table>
                  <bs.Table striped bordered condensed hover>
                    <thead>
                      <tr>
                        <th>Set</th>
                        <th>Values</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>One</td>
                        <td>
                          32 33 31 8 14 29 32 1 11 2
                          7 25 32 8 10 22 44 7 23 10 29 21 43
                          8 48 37 44 10 49 27 2 16 11 7 13 21
                          20 6 45 7 36 48 18 24 44 2 26 47 1 12{" "}
                        </td>
                      </tr>
                      <tr>
                        <td>Two</td>
                        <td>
                          41 28 14 26 31 0 32 34 21 42 48 2
                          40 16 33 21 28 17 30 4 13 49 0 14 38 32
                          7 7 4 46 35 30 33 22 19 17 15 3 22 26 20
                          42 50 37 35 12 32 32 16 47
                        </td>
                      </tr>
                      <tr>
                        <td>Three</td>
                        <td>
                          40 25 19 44 38 48 15 48 19 14 23
                          38 34 16 37 37 19 30 30 1 21 46 32 30 38
                          6 49 30 39 30 3 5 8 10 19 41 47 47 31
                          44 28 32 46 30 39 29 46 25 13 20
                        </td>
                      </tr>
                    </tbody>
                  </bs.Table>
                </div>
              </div>
            </bs.Panel>
          </div>
        );
      } else {
        return <StatisticPanel integers={this.state.intList} />;
      }
    } else {
      return null;
    }
  }

  reset(event) {
    event.preventDefault();
    this.setState({
      output: false,
      intList: []
    });
  }

  showResults(event) {
    event.preventDefault();
    this.setState({
      results: true,
      output: true
    });
  }

  render() {
    return (
      <div className="container">
        <div className="jumbotron">
          <h1>Statistics Calculator</h1>
        </div>
        <div>
          This page will take in a list of numbers seperated by spaces and perform Statistical
          {" "}
          calculations on them. The output will be displayed in a table below. You may enter as
          many inputs as you like and the table will grow with more inputs.
        </div>
        <div className="input-container">
          <form onSubmit={this.calculate.bind(this)} className="math-form">
            <bs.FormGroup controlId="formControlsText">
              <bs.ControlLabel>Integers</bs.ControlLabel>
              <bs.FormControl
                ref="integers"
                componentClass="textarea"
                placeholder="Enter Array Of Integers Seperated By Space"
                value={this.state.currentIntegers}
                style={{ height: 200 }}
                onChange={this.updateIntegers.bind(this)}
              />
            </bs.FormGroup>
            <div className="row stat-buttons">
              <button className="btn btn-success calculateButton col-lg-4 col-md-4 col-sm-4 col-xs-12">
                Calculate
              </button>
              <a
                href=""
                onClick={this.reset.bind(this)}
                className="btn btn-danger col-lg-4 col-md-4 col-sm-4 col-xs-12"
              >
                Reset
              </a>
              <a
                href=""
                onClick={this.showResults.bind(this)}
                className="btn btn-warning col-lg-4 col-md-4 col-sm-4 col-xs-12"
              >
                Show Unit Tests
              </a>
            </div>
          </form>
        </div>
        <div className="output-container">
          {this.getOutput()}
        </div>
        <a
          href="../"
          className="go-back btn btn-primary col-xs-12 col-sm-12 col-md-12 col-lg-12"
        >
          Go Back
        </a>
      </div>
    );
  }
}

export default Home;
