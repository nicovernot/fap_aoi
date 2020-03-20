import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Button} from 'primereact/button';
import {Rating} from 'primereact/rating';
import 'primereact/resources/themes/nova-light/theme.css';
import 'primereact/resources/primereact.min.css';
import 'primeicons/primeicons.css';
import 'bootstrap/dist/css/bootstrap.min.css';


class HelloMessage extends React.Component {

    constructor() {
        super();
        // N’appelez pas `this.setState()` ici !
        this.state = { 
            counter: 0 ,
            value : 3,
        };
        
      }
    render() {
      return (
        <div className="bg-primary">
          Hello {this.props.name}
          <Button label="Click" icon="pi pi-check" iconPos="right" />
          <Button variant="warning">Warning</Button>
          <Rating value={this.state.value} onChange={(e) => this.setState({value: e.value})} stars={5} />
        </div>
      );
    }
  }
  
  ReactDOM.render(
    <HelloMessage name="Taylor" />,
    document.getElementById('root')
  );