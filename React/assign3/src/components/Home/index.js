import React, { Component } from "react";
import "./style.scss";
import StatisticPanel from "../StatisticPanel";
import style from "bootstrap/dist/css/bootstrap.css";
import * as bs from 'react-bootstrap';

class Home extends Component {
  constructor(props) {
    super(props);

    this.state = {
      output: false,
      integers: ""
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

  updateIntegers(event){
    this.setState({integers:event.target.value});
  }
  calculate(event){
   event.preventDefault();
   this.setState({output:true});
  }

  getOutput(){
      if(this.state.output){
          return <StatisticPanel integers={this.state.integers}/>;
      }else{
          return null;
      }
  }

  reset(event){
      event.preventDefault();
      this.setState({output:false});
  }

  render() {
    return (
      <div className="container">
        <div className="thumbnail">
          
        </div>
        <div className="input-container">
          <form onSubmit={this.calculate.bind(this)} className="math-form">
            <bs.FormGroup controlId="formControlsText">
                <bs.ControlLabel>Integers</bs.ControlLabel>
                <bs.FormControl
                ref="integers"
                type="text"
                placeholder="Enter Array of Integers"
                value={this.state.integers}
                onChange={this.updateIntegers.bind(this)}
                />
            </bs.FormGroup>
            <button className="btn btn-default calculateButton">Calculate</button>
            <a href="" onClick={this.reset.bind(this)} className="btn btn-primary">Reset</a>
          </form>
        </div>
        <div className="output-container">
        {this.getOutput()}
        </div>
        <a href="../" className="btn btn-primary">Go Back</a>
      </div>
    );
  }
}

export default Home;
