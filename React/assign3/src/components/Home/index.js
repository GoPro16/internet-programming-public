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
      intList: []
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
      currentIntegers: ""
    });
  }

  getOutput() {
    if (this.state.output) {
      return <StatisticPanel integers={this.state.intList} />;
    } else {
      return null;
    }
  }

  reset(event) {
    event.preventDefault();
    this.setState({ 
      output: false,
      intList:[]
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
              <button className="btn btn-success calculateButton col-lg-6 col-md-6 col-sm-6 col-xs-12">
                Calculate
              </button>
              <a
                href=""
                onClick={this.reset.bind(this)}
                className="btn btn-danger col-lg-6 col-md-6 col-sm-6 col-xs-12"
              >
                Reset
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
