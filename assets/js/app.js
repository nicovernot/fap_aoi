import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import 'primereact/resources/themes/nova-light/theme.css';
import 'primereact/resources/primereact.min.css';
import 'primeicons/primeicons.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import qr from './services/QueryService'
import Menu from './Menu';
import Tableau from './Tableau'
import axios from 'axios';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  useLocation,
  Link,
  useParams
} from "react-router-dom";

class App extends React.Component {
   
    constructor() {
        super();
     
        this.state = { 
          menus: [],
          menu : '',
          name :'',
          ssm : [],
        }
        this.tst = this.tst.bind(this);
        this.gettree = (id) => {
          
          console.log(id)
                 axios({
                   url: 'http://localhost:8001/api/graphql',
                   method: 'post',
                   data: {
                     query: qr
                   }
                 }).then((result) => {
                   const menus = result.data.data.menus.edges;
                   this.setState({ menus });
                 });
        }
        
      }
      
      
     
     tst= (ssm)=> {
    
     this.setState({ ssm });
    }

    componentDidMount() {
       this.gettree(5) 
      
      
    }

   
  
  render() {
   
      const el = document.getElementById('root');
      return (
        <div className="bg-alert">
          <Menu handler = {this.tst} menus={this.state.menus}/>
         
      <Router>
         <QueryParam ssm={this.state.ssm}/>
      </Router>
     
     
        </div>
      );
    }

  
  }

  function useQuery() {
    return new URLSearchParams(useLocation().search);
  }
  
  function QueryParam(props) {


    let query = useQuery();
    const ssm = props.ssm
    
    const Child = props => 
     <div>
    {query.get("name") ? (
   renderSwitch(query.get("name"),ssm)
    )
     :
    (
      
      <h3>There is no name in the query string</h3>
    )}
   
  </div>;
    return (
      <div>
        <Child/>
        
      </div>
    );
  }

  function renderSwitch(param,ssm) {

    const ong = ssm.node;
    console.log(ong)
    const columns = React.useMemo(
      () => [
        {
          Header: 'Column 1',
          accessor: 'col1', // accessor is the "key" in the data
        },
        {
          Header: 'Column 2',
          accessor: 'col2',
        },
      ],
      []
    )
  
    
  
    const data = React.useMemo(
      () => [
        {
          col1: 'Hello',
          col2: 'World',
        },
        {
          col1: 'react-table',
          col2: 'rocks',
        },
        {
          col1: 'whatever',
          col2: 'you want',
        },
      ],
      []
    )
    switch(param) {
      case 'home':
        console.log('home')
        return <Home/>;
        break;
      case 'about':
        console.log('about')
        return <About/>;
        break;
      case 'recherche':
        console.log('recherche')
        return <Tableau columns={columns} data={data}/>;
        break;  
    }
  }

 
  
  function Home() {
    return (
      <div>
        <h2>Home</h2>
      </div>
    );
  }
  
  function About() {
    return (
      <div>
        <h2>About</h2>
      </div>
    );
  }
  

  ReactDOM.render(
    <App />,
    document.getElementById('root')
  );