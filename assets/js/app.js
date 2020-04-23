import React, { Component,useState,useEffect,useCallback } from 'react';
import ReactDOM from 'react-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import qr from './services/QueryService'
import Menu from './Menu';
import Tableau from './Tableau'
import axios from 'axios';
import {Strelement,Urlelement,Titlelelement,Imgelement,Btnelement} from './Element'
import Cards from './Cards'
import {
  BrowserRouter as Router,
  Redirect,
  
} from "react-router-dom";
import Button from 'react-bootstrap/Button';


class App extends React.Component {
   
    constructor() {
        super();
     
        this.state = { 
          menus: [],
          menu : '',
          name :'',
          ssm : [],
          data : [],
          qchamps : [],
          listchmp: [],
          ongquery : "",
        }

        
      }

      gettree = (id,list,itemq) => {
        let finalquery =""
        
        switch(id){
          case 1 : 
            finalquery =  qr.genQuery;
            break;
          case 2:
            finalquery = list;  
            break;
          }
         
               axios({
                 url: 'http://localhost:8001/api/graphql',
                 method: 'post',
                 data: {
                   query: finalquery
                 }
               }).then((result) => {
                switch(id){
                  case 1 : 
                    const menus = result.data.data.menus.edges;
                    this.setState({ menus });
                    localStorage.setItem('menus', JSON.stringify(menus));
                  break;
                  case 2:
                    const x = itemq
                    const data = result.data.data[x].edges;
                    this.setState({ data });
                  break;  
                }

               });
      }
      

     tst= (ssm,urlp)=> {
      window.history.pushState('page2', 'Title', urlp);
      this.setState({ ssm });
      localStorage.setItem('ssm', JSON.stringify(ssm));
      let qchamps = []
      let query = ""  
    for (let [key, value] of Object.entries(ssm)) {
      qchamps = value.onglet.edges[0].node.champs.edges
      query = value.onglet.edges[0].node.ongsql
    
    }
    this.setState({ qchamps });
 
    const result = qchamps.filter(word => word.node.chprec > 0); 
    let listchmp =[]
    result.forEach(element => {
     listchmp.push(element.node.chpcha)
    });
   
    this.setState({ listchmp });
     const ongquery = qr.list(listchmp,query)
     this.setState({ ongquery });
   
     this.gettree(2,ongquery,query) 
    }

    urlresolver = () => {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString)
      const menu = urlParams.get('name')
      this.setState({menu})
      const ssmlib = urlParams.get('ssm')
      const localssm = JSON.parse(localStorage.getItem("ssm"))
     if(this.state.data.length==0){
       this.tst(localssm,queryString)
     }
    }



    componentDidMount() {
       this.gettree(1) 
       this.urlresolver()
      
      }
      

  
  render() {
      const ttl = <h1>title</h1>
      const arr = [ <Imgelement src="/img/85cd8e466d3a38f2c645a6ba23f51b21.jpeg" class="bg-info"/>, <Imgelement src="/img/85cd8e466d3a38f2c645a6ba23f51b21.jpeg" class="bg-info"/>]
      arr.push(ttl)
      const el = document.getElementById('root');
      return (
        <div className="bg-alert">
          <Menu handler = {this.tst} menus={this.state.menus}  />
        
          <ol>    
  { arr.map(item => <div >{item}</div>) }
</ol>
      <Router>
        <div>
         <QueryParam ssm={this.state.ssm}  menus={this.state.menus} getData={this.state.data}/>
        
        </div>
   
      </Router>
        </div>
      );
    }

  
  }


  function QueryParam(props) {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    const menu = urlParams.get('name')
 
    const ssm = props.ssm
    let ong = []
    let data = []
    data = props.getData

    for (let [key, value] of Object.entries(ssm)) {
      ong = value.onglet.edges[0].node.champs.edges
    }
   
    
    const Child = props => 
     <div>
    {menu ? (
   renderSwitch(menu,ong,data)
    )
     :
    (
      <Home/>
    )}
  </div>;

    return (
      <div>
     
        <Child/>
        
      </div>
    );
  }

  function renderSwitch(param,ong,data1) {
    
    const result = ong.filter(word => word.node.chprec > 0); 
    let reduc = []
    let listchmp =[]
    result.forEach(element => {
     reduc.push({Header: element.node.chplib,accessor:element.node.chplib});    
     listchmp.push(element.node.chplib)
    });
    let nodedata = []
    data1.forEach(element => {
    nodedata.push(element.node)
    });   

    const columns = React.useMemo(
      () => reduc,
      []
      )
      
      const data = React.useMemo(
        () => nodedata,
        []
        )
    switch(param) {
      case 'home':
       
        return <Home/>;
        break;
      case 'contact':
      
        return <About/>;
        break;
      case 'recherche':
       
        return <Tableau columns={columns} data={data}/>;
        break;  
      case 'cards':
       
        return <Cards columns={result} data={data}/>;
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